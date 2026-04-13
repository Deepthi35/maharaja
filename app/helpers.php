<?php

use App\Models\ApplicationSetting;
use App\Models\ApplicationSettingCategory;
use App\Models\Clientele;
use App\Models\ClienteleCategory;
use App\Models\Cms;
use App\Models\FaqCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Statistics;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists("uniqueCode")) {
    function uniqueCode($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}
if (!function_exists("getOnlyNameFromImage")) {
    function getOnlyNameFromImage($image)
    {
        $name = $image->getClientOriginalName();
        $filename = pathinfo($name, PATHINFO_FILENAME);
        return str_replace(' ', '-', $filename);
    }
}
if (!function_exists("uploadImage")) {
    function uploadImage($image, $path)
    {
        if ($image != '') {
            $name = getOnlyNameFromImage($image) . '_' . uniqueCode(9) . '.' . $image->extension();
            $image->move(public_path($path), $name);
            return $name;
        }
    }
}
if (!function_exists("uploadMultipleImage")) {
    function uploadMultipleImage($images, $path, $altText, $oldData)
    {
        $data = $oldData != null ? json_decode($oldData, true) : [];
        if ($data != [] && $altText != null) {
            foreach ($altText as $key => $text) {
                $data[$key]['alt_text'] = $text;
            }
        }
        $count = count($data);
        if ($images != null) {
            foreach ($images as $key => $image) {
                $data[$count + $key]['path'] = uploadImage($image, $path);
                $data[$count + $key]['alt_text'] = '';
            }
        }
        return json_encode($data);
    }
}
if (!function_exists("uploadImageAPI")) {
    function uploadImageAPI($image, $path)
    {
        if ($image != '') {
            $fileName = getOnlyNameFromImage($image) . '_' . uniqueCode(9) . "." . pathinfo($image, PATHINFO_EXTENSION);
            $fullPath = $path . $fileName;
            // Copy the file to the public folder
            if (file_exists($image)) {
                copy($image, $fullPath);
            }
            return $fileName;
        }
    }
}
if (!function_exists("uploadMultipleImagesAPI")) {
    function uploadMultipleImagesAPI($images, $path, $data)
    {
        if ($images != '') {
            foreach (json_decode($images) as $key => $image) {
                $data[$key]['path'] = uploadImageAPI($image['path'], $path);
                $data[$key]['alt_text'] = $image['alt_text'];
            }
            return $data;
        }
    }
}
if (!function_exists("removeImage")) {
    function removeImage($image, $path)
    {
        if (!empty($image) && file_exists(public_path($path . $image))) {
            unlink(public_path($path . $image));
        }
    }
}
if (!function_exists("removeMultipleImages")) {
    function removeMultipleImages($images, $path)
    {
        if (!empty($images)) {
            foreach ($images as $image) {
                if (!empty($image) && file_exists(public_path($path . $image))) {
                    unlink(public_path($path . $image));
                }
            }
        }
    }
}
if (!function_exists("applicationSettings")) {
    function applicationSettings($slug)
    {
        $applicationSettings = ApplicationSetting::where('slug', $slug)->first();
        return $applicationSettings != null ? $applicationSettings->value : '';
    }
}
if (!function_exists("applicationSettingsAltText")) {
    function applicationSettingsAltText($slug)
    {
        $applicationSettings = ApplicationSetting::where('slug', $slug)->first();
        return $applicationSettings != null ? $applicationSettings->alt_text : '';
    }
}
if (!function_exists("applicationCategorySettings")) {
    function applicationCategorySettings($categoryName)
    {
        $category = ApplicationSettingCategory::where('name', $categoryName)->first();
        if ($category != null) {
            return ApplicationSetting::where('category_id', $category->id)->get();
        } else {
            return null;
        }
    }
}
if (!function_exists("mainMenu")) {
    function mainMenu()
    {
        return Cms::where('parent', 'root')
            ->where('main_menu', 1)
            ->where('publish', 1)
            ->orderBy('sort')
            ->get();
    }
}
if (!function_exists("getSubMenu")) {
    function getSubMenu($id)
    {
        return Cms::where('parent', $id)
            ->where('publish', 1)
            ->orderBy('sort')
            ->get();
    }
}
if (!function_exists("footerMenu")) {
    function footerMenu()
    {
        return Cms::where('footer_menu', 1)
            ->where('publish', 1)
            ->orderBy('sort')
            ->get();
    }
}
if (!function_exists("topMenu")) {
    function topMenu()
    {
        return Cms::where('parent', 'root')
            ->where('top_menu', 1)
            ->where('publish', 1)
            ->orderBy('sort')
            ->get();
    }
}
if (!function_exists("pageLink")) {
    function pageLink($type, $slug, $customUrl)
    {
        if ($slug === 'home') {
            return url('/');
        } elseif ($type === 'nopage') {
            return '#';
        } else {
            return $customUrl ?: url("/$slug");
        }
    }
}
if (!function_exists("getUserRole")) {
    function getUserRole($id)
    {
        $user = User::find($id);
        return $user->roles->first() != '' ? $user->roles->first()->name : '';
    }
}
if (!function_exists("getLoggedInUserRole")) {
    function getLoggedInUserRole()
    {
        return getUserRole(Auth::user()->id);
    }
}
if (!function_exists("getLoggedInUser")) {
    function getLoggedInUser()
    {
        return User::find(Auth::user()->id);
    }
}
if (!function_exists("getAPIUser")) {
    function getAPIUser()
    {
        $authenticatedUser = auth('api')->user();
        if ($authenticatedUser !== null) {
            return User::find($authenticatedUser->id);
        } else {
            return User::find(1);
        }
    }
}

if (!function_exists("getSTats")) {
    function getStats()
    {
        return Statistics::all();
    }
}
if (!function_exists("getColor")) {
    function getColor()
    {
        $setting = ApplicationSetting::all();
        $color = $setting['4']->value;
        return $color;
    }
}

if (!function_exists("getPageNames")) {

    function getPageNames($pageType, $pageIds)
    {
        if (array_key_exists($pageType, PAGE_TYPES)) {
            if (!empty($pageIds)) {
                $pageNames = PAGE_TYPES[$pageType]->whereIn('id', $pageIds)->pluck('title')->implode(', ');
            } else {
                $pageNames = PAGE_TYPES[$pageType]->where('publish', 1)->pluck('title', 'id');
            }
        } else {
            $pageNames = null;
        }

        return $pageNames;
    }
}

if (!function_exists("getFaqCategory")) {

    function getFaqCategory($type, $id)
    {
        return FaqCategory::where('page_type', $type)->whereJsonContains('page_name', (string) $id)->first();
    }
}

if (!function_exists("getServiceCategory")) {

    function getServiceCategory($slug)
    {
        return ServiceCategory::where('slug', $slug)->first();
    }
}

if (!function_exists("getClienteleCategory")) {

    function getClienteleCategory($slug)
    {
        return ClienteleCategory::where('type', $slug)->first();
    }




    
}

