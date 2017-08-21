<?php

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
    return view('home');
})->middleware('login');

Route::post('login', 'Home@loginUser');

// Route::get('/setSess', function(){
// 	Session::put('username','elhaq');
// 	print_r(Session::get('username'));
// });

// Route::get('/sess', function(){
// 	print_r(Session::get('username'));
// });

// Route::get('/remSess', function(){
// 	Session::flush();
// });

Route::get('loginform', function () {
    return view('login');
});

Route::get('logout', 'Home@logout');

Route::get('user','Home@dataUser')->middleware('login');
Route::get('delete/{id}','Home@deleteUser');
Route::get('update/{id}','Home@getUser');

Route::post('save_user', 'Home@saveUser');
Route::post('updateData','Home@updateData');