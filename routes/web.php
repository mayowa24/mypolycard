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

Route::get('/slogin', function(){
    return view('login');
});

// Route::get('/admin', function(){
//     return view('admin.homeadmin');
// });

Route::get('/users', 'AdminController@index')->name('users');
Route::get('/newadmin', 'AdminController@newadmin')->name('newadmin');
Route::post('/store', 'AdminController@store')->name('store');
// Route::get('/users/{id}/show', 'AdminController@show')->name('users.show');
Route::post('/update/{id}', 'AdminController@update')->name('update');
// Route::get('/users/show/{id}', 'AdminController@destroy');
// Route::post('/admin/show/update/{id}', 'AdminController@update');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/show/{id}', 'HomeController@show');
Route::post('/admin/show/update/{id}', 'HomeController@update');
Route::get('/verify', 'HomeController@verify')->name('verify');


Route::post('/shome', 'StudentController@doLogin');
Route::post('/update/{id}', 'StudentController@update');
Auth::routes();

Route::Post('/login/custom',[
    'uses'=>'LoginController@login',
    'as'=>'login.custom'
]);

Route::get('/admin','SubAdminController@index')->name('admin');
Route::get('/subadmin/show/{id}', 'SubAdminController@show');
Route::post('/subadmin/show/update/{id}', 'SubAdminController@update');
// Route::get('/subverify', 'SubAdminController@verify')->name('subverify');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home/show/{id}', 'HomeController@show');
// Route::post('/home/show/update/{id}', 'HomeController@update');
