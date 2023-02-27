<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\HomeController;

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

/**
 * Home view
 * Renders all posts via View/Components/Home/Posts 
 * Return view
 */
Route::controller(HomeController::class)->group(function() {
    Route::get('/','index')->name('home');
});

/**
 * Authentication endpoint routes @Group
 * 
 */
Route::controller(AuthController::class)->prefix('auth')->group(function() {
    //Show Login form
    Route::get('/login', 'login')->name('login')->middleware('guest');
    //Authenticate user
    Route::get('/authenticate', 'authenticate')->name('authenticate')->middleware('guest');
    // Logout user
    Route::get('/logout','logout')->name('logout')->middleware('auth');
    // Show register create user form
    Route::get('/register','register')->name('register')->middleware('guest');
});

//USERS
Route::controller(UserController::class)->prefix('user')->name('user.')->group(function() {
    // Store new user
    Route::post('/store', 'store')->name('store')->middleware('guest');
    //Show selected user profile
    Route::get('/profile','show')->name('profile');
    // Show edit profile form
    // Route::get('/profile/{user}','edit')->name('profile')->middleware('auth');
    
    //List posts by user 
    Route::get('/user/{user}/posts','listPosts');
    // Update user data
    Route::put('/user/{user}/update','update')->name('updateUser')->middleware('auth');
    // Destroy user
    Route::delete('user/{user}/delete','destroy')->name('deleteUser')->middleware('auth');
});




//FRIENDS
Route::controller(FriendController::class)->prefix('friend')->name('friend.')->middleware('auth')->group(function() {
    //Send friend request
    Route::get('user/{user}/request','sendFriendRequest')->name('sendRequest');
    //reject friend request
    Route::get('user/{user}/reject','rejectFriendRequest')->name('rejectRequest');
    //Accept friend request
    Route::get('user/{user}/accept','acceptFriendRequest')->name('acceptRequest');
    //Accept friend request
    Route::get('user/{user}/unfriend','unFriendUser')->name('unfriend');
    //Cancel friend request
    Route::get('user/{user}/cancel-request', 'cancelRequest')->name('cancelRequest');
});

//POSTS
Route::controller(PostController::class)->prefix('post')->name('post.')->middleware('auth')->group(function() {
    // Show create new post form
    Route::get('/create', 'create')->name('create');
    // Store new post
    Route::post('/store','store')->name('store');
    // Delete Post
    Route::delete('/{post}/delete', 'destroy')->name('delete');
    // Show post list by selected user id
    Route::get('/{user}/posts', 'listPosts')->name('list');
    // Show Edit post form
    Route::get('/{post}/edit','edit')->name('edit');
    //Update post
    Route::put('{post}/update','update')->name('update');
});

//Common routes:
//index - show all listings
//show - show single listing
//create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - update listing
//destroy - delete listing