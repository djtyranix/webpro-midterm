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
})->name('welcome');

Auth::routes();

// route for homepage view
Route::get('/home', 'HomeController@index')
    ->name('home');


// search
Route::get('/home/search', 'HomeController@search')
    ->name('search');


// submit question 
Route::post('ask', 'InsertController@ask')
    ->name('ask');


// route to submit reply to correspond question
Route::post('/reply', 'InsertController@reply')
    ->name('reply');


//  view detail thread
Route::get('/thread/{id}', 'DetailThreadController@thread')
    ->name('thread');


//  view user all question
Route::get('/userquestion', 'DetailThreadController@myquestion')
    ->name('userquestion');


//  view user all answer
Route::get('/useranswer', 'DetailThreadController@myanswer')
    ->name('useranswer');

// edit user's question
Route::get('/{id}/edit_thread','EditController@edit_thread')
    ->name('edit_thread');

// update user's question
Route::put('/update_thread','EditController@update_thread')
    ->name('update_thread');

// delete user's question
Route::get('/{id}/delete_thread','DeleteController@delete_thread') 
    ->name('delete_thread');

// edit user's reply
Route::get('/{id}/{answer_id}/edit_reply','EditController@edit_reply')
->name('edit_reply');

// update user's reply
Route::put('/update_reply','EditController@update_reply')
->name('update_reply');

// delete user's reply
Route::get('/{id}/{answer_id}/delete_reply','DeleteController@delete_reply') 
->name('delete_reply');

// My Profile
Route::get('/profile', 'myProfileController@myProfile')
->name('myprofile');

// Change Password
Route::get('/changepassword', 'ChangePasswordController@index')->name('changepassword');
Route::post('/change_password', 'ChangePasswordController@store')->name('change.password');