<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'HomeController@index');

Route::get('/personal', 'PersonalController@index');
Route::post('/personal/save', 'PersonalController@save');

Route::get('/position', 'PositionController@index');
Route::post('/position/save', 'PositionController@save');

Route::get('/ajaxSearchPosition', 'PositionController@search');
Route::get('/search-person', 'HomeController@search');
Route::get('/ajaxSearchWorkLocation', 'PositionController@searchWorkLocation');

Route::get('/setup/change-year', 'SetupController@changeYear');

// Report
Route::get('/report/person', 'ReportController@person');
Route::get('/report/person2', 'ReportController@person2');
Route::get('/report/position', 'ReportController@position');
Route::get('/report/location', 'ReportController@workLocation');
Route::get('/report/resgiter-status', 'ReportController@registerStatus');

// Report position
Route::get('/report-position', 'ReportPositionController@index');
Route::get('/report-position/lists', 'ReportPositionController@showDetail');
Route::get('/report-position-summary', 'ReportPositionController@summary');

// Import
Route::get('/import', 'ImportController@index');
Route::post('/import/upload', 'ImportController@import');
Route::get('/import/view', 'ImportController@view');

// Home Registration
Route::get('/house-registration/add', 'HouseRegistrationController@add');
Route::get('/house-registration/add/search', 'HouseRegistrationController@searchForAdd');
Route::get('/house-registration/edit', 'HouseRegistrationController@edit');
Route::get('/house-registration/save', 'HouseRegistrationController@save');
Route::get('/house-registration/search', 'HouseRegistrationController@searchBy');
Route::get('/house-registration/rtc', 'HouseRegistrationController@rtc');
Route::get('/house-registration/move', 'HouseRegistrationController@move');
Route::get('/ajaxGetAumphoe', 'HouseRegistrationController@getAumphoe');
Route::get('/ajaxGetTambon', 'HouseRegistrationController@getTambon');
Route::get('/ajaxGetAddress', 'HouseRegistrationController@getAddress');

Route::get('/house-registration/move-rtc', 'HouseRegistrationController@moveRtc');

// Move in
Route::get('/house-registration/movein-rtc', 'HouseRegistrationController@moveInRtc');
Route::get('/house-registration/movein-rtc-save', 'HouseRegistrationController@saveMove');

// Move out
Route::get('/house-registration/moveout-rtc', 'HouseRegistrationController@moveOutRtc');

