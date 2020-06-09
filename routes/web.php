<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('discussions', 'DiscussionsController');

Route::post('discussions/store', 'DiscussionsController@insert')->name('discussions.insert');

Route::resource('discussions/{discussion}/replies', 'RepliesController');

// Route::resource('user', 'UserController');

Route::get('user/notifications', [UserController::class , 'notifications'])->name('user.notifications');

Route::post('discussions/{discussion}/replies/{reply}/mark-as-best-reply', 'DiscussionsController@reply')->name('discussions.best-reply');