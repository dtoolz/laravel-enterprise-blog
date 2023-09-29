<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'home_top_bar_advert',
        'home_middle_page_advert',
        'news_details_page_advert',
        'news_page_advert',
        'side_bar_advert',
        'home_top_bar_advert_status',
        'home_middle_page_advert_status',
        'news_details_page_advert_status',
        'news_page_advert_status',
        'side_bar_advert_status',
        'home_top_bar_advert_url',
        'home_middle_page_advert_url',
        'news_details_page_advert_url',
        'news_page_advert_url',
        'side_bar_advert_url',
    ];
}
