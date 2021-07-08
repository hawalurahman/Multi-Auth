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
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('dashboard/posts', 'App\Http\Controllers\DashboardController@posts')->name('dashboard.posts');
    Route::get('feeds', 'App\Http\Controllers\DashboardController@feeds')->name('feeds');
});

//for user
Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/dashboard/profile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
    
});

//for contributor
Route::group(['middleware' => ['auth', 'role:contributor']], function() {
    
    Route::get('/dashboard/createpost', 'App\Http\Controllers\DashboardController@createpost')->name('dashboard.createpost');
});

//for admin
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::resource('posts', PostController::class);
    Route::get('/dashboard/createpost', 'App\Http\Controllers\DashboardController@createpost')->name('dashboard.createpost');
});

Route::resource('posts', PostController::class);

use App\Http\Controllers\EventController;
Route::resource('events', EventController::Class);

//upload file
use App\Http\Controllers\CloudinaryController;
Route::get('/upload', [CloudinaryController::class, 'showUploadForm']);
Route::post('/upload', [CloudinaryController::class, 'storeUploads']);


Route::put('/editposter', [EventController::class, 'editposter'])->name('events.editposter');

Route::get('/articles', 'App\Http\Controllers\PostController@showallpost')->name('articles');
Route::get('/joinevents', 'App\Http\Controllers\EventController@showcase')->name('joinevents');

use App\Http\Controllers\EventTransactionController;
Route::get('/joinevents/join/{id}', [EventTransactionController::class, 'register'])->name('events.register');
Route::get('/joinevents/thankyou', [EventTransactionController::class, 'processRegister'])->name('events.thankyou');
Route::get('/joinevents/history', [EventTransactionController::class, 'history'])->name('events.history');
Route::get('/orders', [EventTransactionController::class, 'orders'])->name('orders');
Route::get('/transactions', [EventTransactionController::class, 'transactionList'])->name('transactions');
Route::get('/orders/confirm/{id}', [EventTransactionController::class, 'confirm'])->name('orders.confirm');

use App\Http\Controllers\DashboardController;
Route::get('/users', [DashboardController::class, 'users'])->name('users');
Route::get('/contributors', [DashboardController::class, 'contributors'])->name('contributors');
Route::get('/admins', [DashboardController::class, 'admins'])->name('admins');
Route::get('/users/delete/{id}', [DashboardController::class, 'destroy'])->name('users.delete');


Route::get('/cekrole', [DashboardController::class, 'cekrole']);

use App\Http\Controllers\UserController;
Route::get('join2contribute', [UserController::class, 'contribute']);


require __DIR__.'/auth.php';
