<?php

//format tags for news post edit

use App\Models\Language;

function formatTags(array $tags): String
{
    return implode(',', $tags);
}

/** get user selected language from the session */
function getLanguage() : String
{
    if(session()->has('language')){
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
   if($number<1000){
     return $number;
   } elseif ($number < 1000000){
     return round($number/1000, 1).'K';
   }else {
    return round($number / 1000000, 1).'M';
   }
}
