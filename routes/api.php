<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Login URL */

Route::post('login', [App\Http\Controllers\API\AuthAPIController::class, 'login']);

Route::middleware(['auth.token'])->group(function () {
    /* Logout URL */
    Route::post('/logout', [App\Http\Controllers\API\AuthAPIController::class, 'logout']);

    /* User Management */
    Route::resource('permissions', App\Http\Controllers\API\UserManagement\PermissionAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('roles', App\Http\Controllers\API\UserManagement\RoleAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('users', App\Http\Controllers\API\UserManagement\UserAPIController::class)
        ->except(['create', 'edit']);

    /* Application Settings */
    Route::resource('applicationSettingTypes', App\Http\Controllers\API\ApplicationSettings\ApplicationSettingTypeAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('applicationSettingCategories', App\Http\Controllers\API\ApplicationSettings\ApplicationSettingCategoryAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('applicationSettings', App\Http\Controllers\API\ApplicationSettings\ApplicationSettingAPIController::class)
        ->except(['create', 'edit']);

    /* Slider */
    Route::resource('sliders', App\Http\Controllers\API\SliderAPIController::class)
        ->except(['create', 'edit']);

    /* CMS */
    Route::resource('cms', App\Http\Controllers\API\CmsAPIController::class)
        ->except(['create', 'edit']);

    /* Services */
    Route::resource('serviceCategories', App\Http\Controllers\API\ServiceCategoryAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('services', App\Http\Controllers\API\ServiceAPIController::class)
        ->except(['create', 'edit']);
});

Route::resource('clienteleCategories', App\Http\Controllers\API\ClienteleCategoryAPIController::class)
    ->except(['create', 'edit']);


Route::resource('clienteles', App\Http\Controllers\API\ClienteleAPIController::class)
    ->except(['create', 'edit']);

Route::resource('blog-categories', App\Http\Controllers\API\BlogCategoryAPIController::class)
    ->except(['create', 'edit']);

Route::resource('blog-posts', App\Http\Controllers\API\BlogPostAPIController::class)
    ->except(['create', 'edit']);

Route::resource('testimonial-categories', App\Http\Controllers\API\TestimonialCategoryAPIController::class)
    ->except(['create', 'edit']);

Route::resource('testimonials', App\Http\Controllers\API\TestimonialAPIController::class)
    ->except(['create', 'edit']);

Route::resource('statistics', App\Http\Controllers\API\StatisticsAPIController::class)
    ->except(['create', 'edit']);

Route::resource('product-categories', App\Http\Controllers\API\ProductCategoryAPIController::class)
    ->except(['create', 'edit']);

Route::resource('products', App\Http\Controllers\API\ProductAPIController::class)
    ->except(['create', 'edit']);

Route::resource('team-categories', App\Http\Controllers\API\TeamCategoryAPIController::class)
    ->except(['create', 'edit']);

Route::resource('teams', App\Http\Controllers\API\TeamAPIController::class)
    ->except(['create', 'edit']);

Route::resource('faq-categories', App\Http\Controllers\API\FaqCategoryAPIController::class)
    ->except(['create', 'edit']);

Route::resource('faqs', App\Http\Controllers\API\FaqAPIController::class)
    ->except(['create', 'edit']);