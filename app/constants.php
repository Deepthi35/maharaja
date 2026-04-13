<?php

// Roles

use App\Models\BlogPost;
use App\Models\Cms;
use App\Models\Product;
use App\Models\Service;

if (!defined('DEVELOPER_ROLE')) {
    define('DEVELOPER_ROLE', 'Developer Admin');
}

if (!defined('SADMIN_ROLE')) {
    define('SADMIN_ROLE', 'Super Admin');
}

// Admin Mail
if (!defined('ADMIN_MAIL')) {
    define('ADMIN_MAIL', 'web@f9tech.com');
}

//Image Paths
if (!defined('APPLICATION_SETTING_IMAGE_PATH')) {
    define('APPLICATION_SETTING_IMAGE_PATH', 'images/site-images/');
}

if (!defined('SLIDER_IMAGE_PATH')) {
    define('SLIDER_IMAGE_PATH', 'images/slider/');
}

if (!defined('CMS_IMAGE_PATH')) {
    define('CMS_IMAGE_PATH', 'images/inner-pages/');
}

if (!defined('CKEDITOR_IMAGE_PATH')) {
    define('CKEDITOR_IMAGE_PATH', 'images/media/');
}

if (!defined('SERVICE_IMAGE_PATH')) {
    define('SERVICE_IMAGE_PATH', 'images/services/');
}

if (!defined('CLIENTELE_IMAGE_PATH')) {
    define('CLIENTELE_IMAGE_PATH', 'images/clientele/');
}

if (!defined('BLOG_CATEGORY_IMAGE_PATH')) {
    define('BLOG_CATEGORY_IMAGE_PATH', 'images/blogcategories/');
}

if (!defined('BLOG_POST_IMAGE_PATH')) {
    define('BLOG_POST_IMAGE_PATH', 'images/blogpost/');
}

if (!defined('TESTIMONIAL_IMAGE_PATH')) {
    define('TESTIMONIAL_IMAGE_PATH', 'images/testimonial/');
}

if (!defined('PRODUCT_CATEGORY_IMAGE_PATH')) {
    define('PRODUCT_CATEGORY_IMAGE_PATH', 'images/productcategories/');
}

if (!defined('PRODUCT_IMAGE_PATH')) {
    define('PRODUCT_IMAGE_PATH', 'images/products/');
}

if (!defined('TEAM_CATEGORY_IMAGE_PATH')) {
    define('TEAM_CATEGORY_IMAGE_PATH', 'images/teamCategories/');
}

if (!defined('TEAM_IMAGE_PATH')) {
    define('TEAM_IMAGE_PATH', 'images/teams/');
}

// Variables
if (!defined('INPUT_TYPES')) {
    define(
        'INPUT_TYPES',
        [
            'heading' => 'heading',
            'textbox' => 'textbox',
            'textarea-normal' => 'textarea normal',
            'textarea' => 'textarea editor', 'select' =>
            'select', 'radio' => 'radio',
            'checkbox' => 'checkbox',
            'file' => 'single file',
            'multiple-files' => 'multiple files',
            'color' => 'color',
            'switch' => 'switch'
        ]
    );
}

if (!defined('PAGE_TYPES')) {
    define(
        'PAGE_TYPES',
        [
            'pages' => new Cms(),
            'blogs' => new BlogPost(),
            'products' => new Product(),
            'services' => new Service(),
        ]
    );
}
