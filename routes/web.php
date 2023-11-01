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

Route::get('/logout', function () {
	Session::flush();
    return Redirect::to('/login');

});

Route::get('dashboard', function () {
    return view('pages/dashboard');
})->name('dashboard');


Auth::routes();

Route::get('/home',function(){
	return view('pages/dashboard');
});
//for location
Route::get('location/create','LocationController@create')->name('location/create');
Route::post('location/store','LocationController@store');
Route::get('location/list','LocationController@index')->name('location/list');
Route::post('location/update/{id}','LocationController@update');
Route::get('location/edit/{id}','LocationController@edit');
Route::get('location/delete/{id}','LocationController@destroy');



Route::get('priority/create','PriorityController@create')->name('priority/create');
Route::post('priority/store','PriorityController@store');
Route::get('priority/list','PriorityController@index')->name('priority/list');
Route::post('priority/update/{id}','PriorityController@update');
Route::get('priority/edit/{id}','PriorityController@edit');
Route::get('priority/delete/{id}','PriorityController@destroy');



Route::get('category/create','CategoryController@create')->name('category/create');
Route::post('category/store','CategoryController@store');
Route::get('category/list','CategoryController@index')->name('category/list');
Route::post('category/update/{id}','CategoryController@update');
Route::get('category/edit/{id}','CategoryController@edit');
Route::get('category/delete/{id}','CategoryController@destroy');


//for nationality
Route::get('nationality/create','NationalityController@create')->name('nationality/create');
Route::post('nationality/store','NationalityController@store');
Route::get('nationality/list','NationalityController@index')->name('nationality/list');
Route::post('nationality/update/{id}','NationalityController@update');
Route::get('nationality/edit/{id}','NationalityController@edit');
Route::get('nationality/delete/{id}','NationalityController@destroy');


//for case
Route::get('case/create','CasesController@create')->name('case/create');
Route::post('case/store','CasesController@store');
Route::get('case/list','CasesController@index')->name('case/list');
Route::get('case/archive','CasesController@indexArchive')->name('archive/list');
Route::post('case/update/{id}','CasesController@update');
Route::get('case/edit/{id}','CasesController@edit');
Route::get('case/delete/{id}','CasesController@destroy');




//for case
Route::get('user/create','UserController@create')->name('user/create');
Route::post('user/store','UserController@store');
Route::get('user/list','UserController@index')->name('user/list');
Route::post('user/update/{id}','UserController@update');
Route::get('user/edit/{id}','UserController@edit');
Route::get('user/delete/{id}','UserController@destroy');



Route::get('priority/get/category/{id}', 'CasesController@getCategory');