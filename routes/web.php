<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LivestreamController;
use App\Http\Controllers\BannerController;
/*use App\Http\Controllers\ArticleController
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::view('/404-page','admin.404-page')->name('404-page');
    Route::view('/blank-page','admin.blank-page')->name('blank-page');
    Route::view('/buttons','admin.buttons')->name('buttons');
    Route::view('/cards','admin.cards')->name('cards');
    Route::view('/utilities-colors','admin.utilities-color')->name('utilities-colors');
    Route::view('/utilities-borders','admin.utilities-border')->name('utilities-borders');
    Route::view('/utilities-animations','admin.utilities-animation')->name('utilities-animations');
    Route::view('/utilities-other','admin.utilities-other')->name('utilities-other');
    Route::view('/chart','admin.chart')->name('chart');
    Route::view('/tables','admin.tables')->name('tables');
    Route::view('/404-page','admin.404-page')->name('404-page');
    //Highlight
    Route::get('/highlight', [HighlightController::class,'index'])->name('highlight');
    Route::get('/highlight/create', [HighlightController::class, 'create'])->name('highlight/create');
    Route::post('/highlight/store', [HighlightController::class,'store']);
    Route::get('/highlight/{id}/question', [HighlightController::class, 'question']);
    Route::get('/highlight/{id}/destroy', [HighlightController::class, 'destroy']);
    Route::get('/highlight/{id}/edit', [HighlightController::class, 'edit']);
    Route::patch('/highlight/{id}/update', [HighlightController::class, 'update']);
    //Article
    Route::get('/article', [ArticleController::class,'index'])->name('article');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article/create');
    Route::post('/article/store', [ArticleController::class,'store']);
    Route::get('/article/{id}/question', [ArticleController::class, 'question']);
    Route::get('/article/{id}/destroy', [ArticleController::class, 'destroy']);
    Route::get('/article/{id}/edit', [ArticleController::class, 'edit']);
    Route::patch('/article/{id}/update', [ArticleController::class, 'update']);
    //Popular
    Route::get('/popular', [PopularController::class,'index'])->name('popular');
    Route::get('/popular/create', [PopularController::class, 'create'])->name('popular/create');
    Route::post('/popular/store', [PopularController::class,'store']);
    Route::get('/popular/{id}/question', [PopularController::class, 'question']);
    Route::get('/popular/{id}/destroy', [PopularController::class, 'destroy']);
    Route::get('/popular/{id}/edit', [PopularController::class, 'edit']);
    Route::patch('/popular/{id}/update', [PopularController::class, 'update']);
    //banner
    Route::get('/banner', [BannerController::class,'index'])->name('banner');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner/create');
    Route::post('/banner/store', [BannerController::class,'store']);
    Route::get('/banner/{id}/question', [BannerController::class, 'question']);
    Route::get('/banner/{id}/destroy', [BannerController::class, 'destroy']);
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit']);
    Route::patch('/banner/{id}/update', [BannerController::class, 'update']);
    //livestream
    Route::get('/livestream', [LivestreamController::class,'index'])->name('livestream');
    Route::get('/livestream/create', [LivestreamController::class, 'create'])->name('livestream/create');
    Route::post('/livestream/store', [LivestreamController::class,'store']);
    Route::get('/livestream/{id}/question', [LivestreamController::class, 'question']);
    Route::get('/livestream/{id}/destroy', [LivestreamController::class, 'destroy']);
    Route::get('/livestream/{id}/edit', [LivestreamController::class, 'edit']);
    Route::patch('/livestream/{id}/update', [LivestreamController::class, 'update']);

    //Bot
    Route::get('/bot', [SettingController::class,'bot'])->name('bot');
    Route::post('/bot/store', [SettingController::class, 'bot_store']);
    Route::post('/bot/update', [SettingController::class, 'bot_update']);
    Route::get('/bot/{id}/question', [SettingController::class, 'bot_question']);
    Route::get('/bot/{id}/destroy', [SettingController::class, 'bot_destroy']);
    //Category
    Route::get('/category', [SettingController::class,'category'])->name('category');
    Route::post('/category/store', [SettingController::class, 'category_store']);
    Route::post('/category/update', [SettingController::class, 'category_update']);
    Route::get('/category/{id}/question', [SettingController::class, 'category_question']);
    Route::get('/category/{id}/destroy', [SettingController::class, 'category_destroy']);
});

