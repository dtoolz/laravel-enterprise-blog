<?php

//format tags for news post edit

use App\Models\Language;
use App\Models\Setting;

function formatTags(array $tags): String
{
    return implode(',', $tags);
}

/** get user selected language from the session */
function getLanguage(): String
{
    if (session()->has('language')) {
        return session('language');
    } else {
        try {
            $language = Language::where('default', 1)->first();
            setLanguage($language->lang);

            return $language->lang;
        } catch (\Throwable $th) {
            setLanguage('en');

            return $language->lang;
        }
    }
}

/** set language code in session */
function setLanguage(string $code): void
{
    session(['language' => $code]);
}

//truncate long texts
function truncate(string $text, int $limit = 50): String
{
    return \Str::limit($text, $limit, '...');
}

//format a number so that above a thousand can be represented as k
function formatHugeNumbers(int $number): String
{
    if ($number < 1000) {
        return $number;
    } elseif ($number < 1000000) {
        return round($number / 1000, 1) . 'K';
    } else {
        return round($number / 1000000, 1) . 'M';
    }
}

//active sidebar function
function setSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }
    return '';
}

//get setting model
function getSetting($key)
{
    $data = Setting::where('key', $key)->first();
    return $data->value;
}

/** check permission */

function hasPermission(array $permissions){

    return auth()->guard('admin')->user()->hasAnyPermission($permissions);
 }
