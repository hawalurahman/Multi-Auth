<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTransactionController;
use App\Http\Controllers\DashboardController;
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

// success login
Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('dashboard/posts', 'App\Http\Controllers\DashboardController@posts')->name('dashboard.posts');
    Route::get('feeds', 'App\Http\Controllers\DashboardController@feeds')->name('feeds');
});

//for all
Route::group(['middleware' => ['auth', 'role:user|admin|contributor']], function() {
    Route::get('/dashboard/profile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('profile/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/profile/edit/{id}', [UserController::class, 'update'])->name('user.update');

    // Route::resource('events', EventController::Class)->only(['show']);
    // Route::resource('posts', PostController::class)->only(['show']);

    // Route::resource('events', EventController::Class)->except(['index', 'create', 'store', 'update', 'destroy']);
    // Route::resource('posts', PostController::class)->except(['index', 'create', 'store', 'update', 'destroy']);
    
    Route::get('/articles', 'App\Http\Controllers\PostController@showallpost')->name('articles');
    Route::get('/articles/{id}', [PostController::class, 'show1'])->name('articles.read');
    
    Route::get('/joinevents', 'App\Http\Controllers\EventController@showcase')->name('joinevents');
    Route::get('/joinevents/show/{id}', 'App\Http\Controllers\EventController@show1')->name('joinevents.show');
    Route::get('/joinevents/join/{id}', [EventTransactionController::class, 'register'])->name('events.register');
    Route::get('/joinevents/thankyou', [EventTransactionController::class, 'processRegister'])->name('events.thankyou');
    Route::get('/joinevents/history', [EventTransactionController::class, 'history'])->name('events.history');
    
});

//for contributor
Route::group(['middleware' => ['auth', 'role:contributor']], function() {
    Route::resource('posts', PostController::class);
    Route::resource('events', EventController::Class);
});

//for admin
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::resource('posts', PostController::class);
    Route::resource('events', EventController::Class);
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::get('/contributors', [DashboardController::class, 'contributors'])->name('contributors');
    Route::get('/admins', [DashboardController::class, 'admins'])->name('admins');
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
});

//for user
Route::group(['middleware' => ['auth', 'role:user']], function() {
    // Route::resource('events', EventController::Class)->only(['show']);
    // Route::resource('posts', PostController::class)->only(['show']);
    Route::resource('events', EventController::Class)->except(['index', 'create', 'store', 'update', 'destroy']);
    Route::resource('posts', PostController::class)->except(['index', 'create', 'store', 'update', 'destroy']);
});

//upload file
// use App\Http\Controllers\CloudinaryController;
// Route::get('/upload', [CloudinaryController::class, 'showUploadForm']);
// Route::post('/upload', [CloudinaryController::class, 'storeUploads']);

//for admin and contributor
Route::group(['middleware' => ['auth', 'role:admin|contributor']], function() {
    Route::put('/editposter', [EventController::class, 'editposter'])->name('events.editposter');
    Route::get('/orders', [EventTransactionController::class, 'orders'])->name('orders');
    Route::get('/transactions', [EventTransactionController::class, 'transactionList'])->name('transactions');
    Route::get('/orders/confirm/{id}', [EventTransactionController::class, 'confirm'])->name('orders.confirm');
    Route::resource('events', EventController::Class);
    Route::resource('posts', PostController::class);
});

Route::get('/cekrole', [DashboardController::class, 'cekrole']);
Route::get('join2contribute', [UserController::class, 'contribute']);


require __DIR__.'/auth.php';
