<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagement\UserController;
use App\Http\Controllers\ApplicationSettings\ApplicationSettingController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Auth;
use Spatie\Honeypot\ProtectAgainstSpam;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PagesController::class, 'index']);

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('/contact-form-submission', [App\Http\Controllers\PagesController::class, 'contactSubmission'])->middleware(ProtectAgainstSpam::class);
Route::post('/catering-form-submission', [App\Http\Controllers\PagesController::class, 'cateringSubmission'])->middleware(ProtectAgainstSpam::class);
Route::post('/career-form-submission', [App\Http\Controllers\PagesController::class, 'careerSubmission']);
Route::middleware(['auth'])->prefix('admin')->group(function () {
    /* CK Editor Image Upload */
    Route::post(
        '/ckeditor-file-upload',
        [App\Http\Controllers\HomeController::class, 'ckeditorFileUpload']
    )->name('ckeditor-file-upload');
    Route::view('/browse', 'browse');

    /* Media Routes */
    Route::controller(MediaController::class)->group(function () {
        Route::get('media', 'media');
        Route::post('upload-media', 'uploadMedia');
        Route::get('remove-media/{img}', 'removeMedia');
    });

    /* User Management Routes */
    Route::resource('permissions', App\Http\Controllers\UserManagement\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\UserManagement\RoleController::class);
    Route::controller(UserController::class)->group(function () {
        Route::resource('users', UserController::class);
        Route::get('users/reset/{id}', 'reset');
        Route::post('users/reset', 'resetPassword');
    });

    /* Application Settings */
    Route::resource(
        'applicationSettingTypes',
        App\Http\Controllers\ApplicationSettings\ApplicationSettingTypeController::class
    );
    Route::resource(
        'applicationSettingCategories',
        App\Http\Controllers\ApplicationSettings\ApplicationSettingCategoryController::class
    );
    Route::controller(ApplicationSettingController::class)->group(function () {
        Route::resource('applicationSettings', ApplicationSettingController::class);
        Route::get('settings', 'settingsView');
        Route::get('removesettingsiamge/{id}','removeSettingsImage');
        Route::post('update-application-settings', 'updateSettings');
        Route::get('remove-multiple-image-item/{id}/{key}', 'removeGalleryItem');
    });

    /* Slider */
    Route::resource('sliders', App\Http\Controllers\SliderController::class);

    /* CMS */
    Route::resource('cms', App\Http\Controllers\CmsController::class);

    /* Services */
    Route::resource('serviceCategories', App\Http\Controllers\ServiceCategoryController::class);
    Route::resource('services', App\Http\Controllers\ServiceController::class);
    Route::get('remove-multiple-service-image-item/{id}/{key}', [App\Http\Controllers\ServiceController::class, 'removeGalleryItem']);
   Route::get('removesingleimage/{model_name}/{id}/{label}', [App\Http\Controllers\ServiceController::class, 'removeSingleImage']);

    Route::resource('clienteleCategories', App\Http\Controllers\ClienteleCategoryController::class);

    Route::resource('clienteles', App\Http\Controllers\ClienteleController::class);

    Route::resource('blogCategories', App\Http\Controllers\BlogCategoryController::class);

    Route::resource('blogPosts', App\Http\Controllers\BlogPostController::class);
    Route::get('remove-multiple-blogPosts-image-item/{id}/{key}', [App\Http\Controllers\BlogPostController::class, 'removeGalleryItem']);

    Route::resource('testimonialCategories', App\Http\Controllers\TestimonialCategoryController::class);

    Route::resource('testimonials', App\Http\Controllers\TestimonialController::class);

    Route::resource('statistics', App\Http\Controllers\StatisticsController::class);

    Route::resource('productCategories', App\Http\Controllers\ProductCategoryController::class);

    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::get('remove-multiple-products-image-item/{id}/{key}', [App\Http\Controllers\ProductController::class, 'removeGalleryItem']);

    Route::resource('teamCategories', App\Http\Controllers\TeamCategoryController::class);

    Route::resource('teams', App\Http\Controllers\TeamController::class);

    Route::resource('faqCategories', App\Http\Controllers\FaqCategoryController::class);
    Route::post('get-page-names-list', [App\Http\Controllers\FaqCategoryController::class, 'getPageNamesList']);

    Route::resource('faqs', App\Http\Controllers\FaqController::class);
});

Route::controller(PagesController::class)->group(function () {
   Route::get('/blog', 'blog');
    Route::get('/blogs/{name}', 'categoryBlog');
    Route::get('/blog/{slug}', 'blogDetails');
    Route::get('/testimonials/{name}', 'testimonialCategory');
    Route::get('/testimonial', 'testimonials');
    Route::get('/contact', 'contact');
    Route::get('/careers', 'career');
    Route::get('/our-menu', 'product');
    Route::get('/products/{category}', 'categoryProduct');
    Route::get('/products-detail/{name}', 'productDetails');
    Route::get('/search-results', 'searchResults');
    Route::get('/{slug}', 'innerPageView');
});