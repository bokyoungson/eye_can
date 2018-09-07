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

// rest api
Route::post('/rest_api/map_api', 'RestApiController@mapApi');
Route::get('/rest_api/map_api', 'RestApiController@mapApi');
Route::post('/rest_api/sos_api', 'RestApiController@sosApi');
Route::get('/rest_api/sos_api', 'RestApiController@sosApi');

Route::post('/rest_api/map_api2', 'RestApiController@mapApi2');
Route::get('/rest_api/map_api2', 'RestApiController@mapApi2');

Route::resource('/test', 'TestController');

// web site

Route::resource('/test', 'TestController');

Route::resource('/', 'signInController');

Route::resource('/signUp', 'signUpController');

Route::resource('/eyecan', 'mainPageController');

Route::resource('/device', 'devicePageController');

Route::resource('/destination', 'destinationPageController');

Route::resource('/information', 'informationPageController');

Route::resource('/setting1', 'settingDestinationPage1Controller');

Route::resource('/setting2', 'settingDestinationPage2Controller');

Route::resource('/setting3', 'settingDestinationPage3Controller');

Route::resource('/confirm', 'confirmPageController');

Route::resource('/change1', 'changeDestinationPage1Controller');

Route::resource('/change2', 'changeDestinationPage2Controller');

Route::resource('/change3', 'changeDestinationPage3Controller');

Route::resource('/confirm1', 'confirmPage1Controller');

Route::resource('/confirm2', 'confirmPage2Controller');

Route::resource('/confirm3', 'confirmPage3Controller');