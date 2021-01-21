<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'PagesController@welcome')->name('welcome');

Route::get('/index', 'PostController@index')->name('index');
Route::get('/create', 'PostController@create')->name('create');
Route::get('/create', 'PostController@store')->name('create');
Route::get('/show/{id}', 'PostController@show')->name('show');
Route::get('/edit/{id}', 'PostController@edit')->name('edit');

Route::get('/uploaded_baners', 'BannerController@index')->middleware('auth')->name('uploaded_baners');
Route::get('/banner', 'BannerController@create')->middleware('auth')->name('banner');
Route::post('/banner', 'BannerController@store')->middleware('auth')->name('banner');
Route::get('/show_banners/{id}', 'BannerController@show')->middleware('auth')->name('show_banners');

Route::resource('visitors', 'PostController');
Route::resource('banners', 'BannerController');

Auth::routes();
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
