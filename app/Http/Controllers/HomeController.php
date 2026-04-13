<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\ClienteleCategory;
use App\Models\Cms;
use App\Models\Faq;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brands = ClienteleCategory::where('name', 'ourClients')->first();
        $pages = Cms::count();
        $blogs = BlogPost::count();
        $productCategories = ProductCategory::count();
        $product = Product::count();
        $sliders = Slider::count();
        $faqs = Faq::count();
        return view('home', compact('brands', 'productCategories', 'product', 'pages', 'blogs', 'sliders', 'faqs'));
    }

    public function ckeditorFileUpload(Request $request)
    {
        if ($request->hasfile('upload')) {
            $name = uploadImage($request->file('upload'), CKEDITOR_IMAGE_PATH);
            $url = asset(CKEDITOR_IMAGE_PATH . '/' . $name);

            $response = [
                'uploaded' => true,
                'url' => $url
            ];

            return response()->json($response);
        }
    }
}
