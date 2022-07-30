<?php

use App\Models\Ad;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Advertiser;
use Illuminate\Http\Request;
use App\Mail\AdvertiserRemainder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('category', CategoryController::class);

Route::resource('tag', TagController::class);

Route::get('ads', [AdController::class, 'index']);

Route::get('advertiser/{id}/ads', [AdController::class, 'advertisersAds']);
