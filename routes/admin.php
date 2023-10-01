<?php

use App\Http\Controllers\Admin\AdvertController;
use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSectionSettingController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SocialCountController;
use App\Http\Controllers\Admin\SubscriberController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
   Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
   Route::post('login', [AdminAuthenticationController::class, 'handleLogin'])->name('handle-login');
   Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');
   Route::get('forgot-password', [AdminAuthenticationController::class, 'forgotPassword'])->name('forgot-password');
   Route::post('forgot-password', [AdminAuthenticationController::class, 'sendResetLink'])->name('forgot-password.send');
   Route::get('reset-password/{token}', [AdminAuthenticationController::class, 'resetPassword'])->name('reset-password');
   Route::post('reset-password', [AdminAuthenticationController::class, 'handleResetPassword'])->name('reset-password.send');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function(){
   Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
   //admin profile routes
   Route::put('profile-password-update/{id}', [ProfileController::class, 'passwordUpdate'])->name('profile-password.update');
   Route::resource('profile', ProfileController::class);

   //Language Route
    Route::resource('language',  LanguageController::class);
    //Category Route
    Route::resource('category', CategoryController::class);
    //News Routes
    Route::get('fetch-news-category', [NewsController::class, 'fetchCategory'])->name('fetch-news-category');
    Route::get('toggle-news-status', [NewsController::class, 'toggleNewsStatus'])->name('toggle-news-status');
    Route::get('news-copy/{id}', [NewsController::class, 'copyNews'])->name('news-copy');
    Route::resource('news', NewsController::class);

    //Home Section Setting Route
    Route::get('home-section-setting', [HomeSectionSettingController::class, 'index'])->name('home-section-setting.index');
    Route::put('home-section-setting', [HomeSectionSettingController::class, 'update'])->name('home-section-setting.update');

    //Social Count Route
    Route::resource('social-count', SocialCountController::class);

    //advertisement
    Route::resource('advert', AdvertController::class);

    //subscribers
    Route::resource('subscribers', SubscriberController::class);
});
