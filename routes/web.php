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
    return redirect('login');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@store')->name('home.store');
Route::put('/home/{id}', 'HomeController@update')->name('home.update');
Route::delete('/home/{id}', 'HomeController@destroy')->name('home.destroy');

Auth::routes();

Route::resource('trainer', 'TrainerController',[ 'except' => ['edit','show','create']]);

Route::get('/membership', 'MembershipController@index')->name('memberships.index');
Route::post('/membership', 'MembershipController@store')->name('memberships.store');
Route::put('/membership/{id}', 'MembershipController@update')->name('memberships.update');
Route::delete('/membership/{id}', 'MembershipController@destroy')->name('memberships.destroy');

Route::resource('client', 'UserManagerController',[ 'except' => ['edit','show','create']]);

