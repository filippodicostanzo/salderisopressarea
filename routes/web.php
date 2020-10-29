<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CheckPasswordController;


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


/*
|--------------------------------------------------------------------------
| ADMIN ROUTE
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Auth', 'prefix' => 'admin', 'middleware' => ['role:superadministrator|administrator']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoryController');
    Route::resource('documents', 'DocumentController');
    Route::resource('videos', 'VideoController');
    Route::resource('galleries', 'GalleryController');
    Route::resource('logos', 'LogoController');
    Route::get('/account', 'AccountController@edit')->name('account.edit');
    Route::patch('/account/update/{id}', 'AccountController@update')->name('account.update');
});

Route::group(['namespace' => 'Auth', 'prefix' => 'admin', 'middleware' => ['role:superadministrator']], function () {
    Route::resource('users', 'UserController');
});

Route::post('/submit', [CheckPasswordController::class, 'submit']);

Route::get('/', function () {
    return view('front.index');
});

Route::get('/home', function () {
    return view('front.home');
})->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/galleries', function () {
    return view('front.galleries.index');
})->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/videos', function () {
    return view('front.videos.index');
})->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/documents', function () {
    return view('front.documents.index');
})->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/logos', function () {
    return view('front.logos.index');
})->middleware(\App\Http\Middleware\CheckSession::class);


Route::get('/galleries/download-zip/{id}', [\App\Http\Controllers\Auth\ZipController::class, 'downloadZip'])
    ->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/galleries/{id}', [\App\Http\Controllers\Auth\FrontController::class, 'gallery'])
    ->middleware(\App\Http\Middleware\CheckSession::class);

/*Route::get('/', function () {
    return view('welcome');
});*/




Auth::routes();



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

/*Route::get('/', function () {
    return view('welcome');
});*/

