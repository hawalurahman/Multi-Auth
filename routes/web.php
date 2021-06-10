<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('mentalheal.landing');
});

Route::get('/bootstrap', function() {
    return view('bootstraptemplate');
});

Route::get('/nulis', function() {
    return view('mentalheal.posts.create');
});

Route::get('/headertailwind', function() {
    return view('headertailwind');
});

Route::get('/adminpanel', function() {
    return view('mentalheal.admin');
});

// Original Code
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Modification for tutorial
Route::group(['middleware' => ['auth']], function() {
    Route::resource('posts', PostController::class);
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('dashboard/posts', 'App\Http\Controllers\DashboardController@posts')->name('dashboard.posts');
});

//for user
Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/dashboard/profile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
});

//for contributor
Route::group(['middleware' => ['auth', 'role:contributor']], function() {
    Route::get('/dashboard/createpost', 'App\Http\Controllers\DashboardController@createpost')->name('dashboard.createpost');
});




require __DIR__.'/auth.php';
