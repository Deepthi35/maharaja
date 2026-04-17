<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Location;
use App\Models\BlogPost;
use App\Models\ClienteleCategory;
use App\Models\Cms;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use App\Models\Statistics;
use App\Models\Team;
use App\Models\TeamCategory;
use App\Models\Testimonial;
use App\Models\TestimonialCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;

class PagesController extends Controller
{
    public function contactSubmission(Request $request)
    {
        $to = applicationSettings('secondary-email');
        Mail::send(
            'emails.contact',
            array(
                'request' => $request,
            ),
            function ($message) use ($to) {
                
                $message->to($to)->subject('Maharaja Restaurant - Contact Form Submission');
            }
        );
        return view('pages.success');
    }

    public function cateringSubmission(Request $request)
    {
        $to = applicationSettings('secondary-email');
        Mail::send(
            'emails.contact',
            array(
                'request' => $request,
            ),
            function ($message) use ($to) {
                $message->to($to)->subject('Maharaja Restaurant  - Catering Requirement');
            }
        );
        return view('pages.catering-success');
    }

    
    public function careerSubmission(Request $request)
    {
        $path = null;
        $resume = uploadImage($request->file('resume'), 'images/career-form/');
        $to = applicationSettings('secondary-email');
        Mail::send(
            'emails.career-mail',
            ['request' => $request],
            function ($message) use ($to, $resume) {
                $message->to($to)->subject('Maharaja Restaurant - Career Form Submission');
                if ($resume) {
                    $message->attach(public_path('images/career-form/' . $resume));
                }
            }
        );
        
        if ($resume) {
            removeImage($resume, 'images/career-form/');
        }
        return view('pages.success');
    }
    public function index()
    {
        $page = Cms::where('slug', 'home')->first();
        $sliders = Slider::where('publish', 1)->orderBy('sort')->get();
        $blogPosts = BlogPost::where('publish', 1)->orderBy('post_date', 'asc')->limit(3)->get();
        $specialProducts = Product::where('publish', 1)->where('special_product', 1)->orderBy('post_date', 'asc')->get();
        $productCategories = ProductCategory::latest()->take(3)->get();
        $products = Product::where('publish', 1)->get();
        $testimonials = Testimonial::latest()->take(6)->get();
        $faqCategory = !empty($page)
            ? !empty($page) ? getFaqCategory('pages', $page->id) : null
            : null;

        $featuredCategories = ProductCategory::where('show_in_home_page', 1)->get();

        return view('pages.index', compact('page', 'sliders', 'blogPosts', 'testimonials', 'specialProducts', 'faqCategory', 'productCategories', 'products', 'featuredCategories'));
    }
    public function innerPageView($slug)
    {
        $page = Cms::where('slug', $slug)->firstOrFail();
        if($page->type == 'nopage'){
            abort(404);
        }
        $teamCategories = TeamCategory::all();
        $teams = Team::all();
        $productCategories = ProductCategory::all();
        $testimonials = Testimonial::latest()->take(6)->get();
        $faqCategory = !empty($page) ? getFaqCategory('pages', $page->id) : null;
        $faqs = Faq::orderby('sort', 'ASC')->get();
        $ourCaterings = getServiceCategory('catering-services') ? getServiceCategory('catering-services')->services->where('publish',1) : null;
        $whyChooseOurCatering = getServiceCategory('why-choose-us-catering') ? getServiceCategory('why-choose-us-catering')->services->where('publish',1) : null;        
        return view('pages.inner-page', compact('whyChooseOurCatering','ourCaterings','page', 'faqs','teamCategories', 'teams', 'testimonials', 'faqCategory', 'productCategories'));
    }
    public function blog()
    {
        
        $page = Cms::where('slug', 'blog')->first();
        $blogPosts = BlogPost::where('publish', 1)->orderBy('sort')->latest()->paginate(10);
        $faqCategory = !empty($page) ? getFaqCategory('pages', $page->id) : null;
        $otherBlogsList = getClienteleCategory('other-blogs')
                    ->clienteles()
                    ->where('publish', 1)
                    ->paginate(10);
               
        return view('pages.blog', compact('blogPosts', 'faqCategory', 'page','otherBlogsList'));
    }
    public function blogDetails($slug)
    {
        $blogPost = BlogPost::where('slug', $slug)->first();
        if ($blogPost) {
            $blogPosts = BlogPost::where('publish', 1)->orderBy('post_date', 'asc')->get();
            $blogCategories = BlogCategory::all();
            $faqs = Faq::all();
            $faqCategory = getFaqCategory('blogs', $blogPost->id);
            return view('pages.blog-details', compact('blogPost', 'blogCategories', 'blogPosts', 'faqCategory', 'faqs'));
        } else {
            abort(404);
        }
    }
    public function categoryBlog($name)
    {
        $category = BlogCategory::where('name', $name)->first();
        if ($category) {
            $blogPosts = BlogPost::where('blog_category_id', $category->id)->latest()->paginate(10);
            return view('pages.blog', compact('blogPosts', 'category',));
        } else {
            abort(404);
        }
    }
    public function setLocation(Request $request)
    {
        $request->validate(['location_id' => 'required|exists:locations,id']);
        session(['selected_location_id' => (string) $request->location_id]);
        return redirect('/our-menu');
    }

    public function product(Request $request)
    {
        $page = Cms::where('slug', 'our-menu')->first();
        $testimonials = Testimonial::latest()->take(6)->get();
        $locations = Location::where('publish', 1)->get();
        $selectedLocationId = session('selected_location_id');

        $productsQuery = Product::where('publish', 1);
        if ($selectedLocationId) {
            $productsQuery->whereJsonContains('location_id', (string) $selectedLocationId);
        }
        $products = $productsQuery->orderBy('sort', 'asc')->get();
        $productCategories = ProductCategory::where('featured', 1)->orderBy('sort', 'asc')->get();
        $faqCategory = !empty($page) ? getFaqCategory('pages', $page->id) : null;
        $selectedLocation = $locations->firstWhere('id', $selectedLocationId);

        return view('pages.product', compact(
            'products', 'productCategories', 'faqCategory',
            'testimonials', 'page', 'locations', 'selectedLocationId', 'selectedLocation'
        ));
    }
    public function categoryProduct(Request $request, $categoryname)
    {
        $perPage = $request->per_page ?? 10;
        $page = Cms::where('slug', 'products')->first();
        $category = ProductCategory::where('name', $categoryname)->first();
        $productsQuery = Product::where('publish', 1);
        if ($category) {
            $productsQuery->where('product_category_id', $category->id);
            $products = $productsQuery->orderBy('post_date', 'asc')->paginate($perPage);
            $productCategories = ProductCategory::all();
            $faqCategory = !empty($page) ? getFaqCategory('pages', $page->id) : null;
            $categoriesWithProductCount = ProductCategory::withCount('product')->get();
            return view('pages.product', compact('products', 'productCategories', 'categoryname', 'faqCategory', 'categoriesWithProductCount', 'page'));
        } else {
            abort(404);
        }
    }
    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            $productCategories = ProductCategory::all();
            $relatedProducts = Product::latest()->take(10)->get();
            $faqCategory = getFaqCategory('products', $product->id);
            return view('pages.product-detail', compact('product', 'productCategories', 'relatedProducts',  'faqCategory'));
        } else {
            abort(404);
        }
    }
    public function testimonials()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        $stats = Statistics::all();
        return view('pages.testimonials', compact('testimonials', 'stats'));
    }
    public function contact()
    {
        $page = Cms::where('slug', 'contact')->first();
        $testimonials = Testimonial::latest()->take(6)->get();
        $products = Product::all();
        $faqCategory = !empty($page) ? getFaqCategory('pages', $page->id) : null;
        return view('pages.contact', compact('faqCategory', 'products', 'testimonials', 'page'));
    }
    public function career()
    {
        $page = Cms::where('slug', 'career')->first();
        $faqCategory = !empty($page) ? getFaqCategory('pages', $page->id) : null;
        return view('pages.career', compact('faqCategory'));
    }
    public function testimonialCategory($name)
    {
        $category = TestimonialCategory::where('name', $name)->first();
        if ($category) {
            $testimonials = Testimonial::where('testimonial_category_id', $category->id)->latest()->paginate(10);
            return view('pages.testimonials', compact('testimonials', 'category', 'stats',));
        } else {
            abort(404);
        }
    }
    public function searchResults()
    {
        $search = request()->input('search');
        $blogPosts = BlogPost::where('title', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->paginate(10);
        $products = Product::where('title', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->paginate(10);
        return view('pages.search-results', compact('blogPosts', 'products', 'search'));
    }

}