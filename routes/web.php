<?php

use Illuminate\Support\Facades\Route;

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

// Original Code
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Modification for tutorial
Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

//for user
Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/dashboard/profile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
});

//for contributor
Route::group(['middleware' => ['auth', 'role:contributor']], function() {
    Route::get('/dashboard/createpost', 'App\Http\Controllers\DashboardController@createpost')->name('dashboard.createpost');
});

//Post
use App\Http\Controllers\PostController;
Route::resource('posts', PostController::class);

require __DIR__.'/auth.php';
