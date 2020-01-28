<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/company', 'CompanyController');
Route::post('/company/update/{id}', 'CompanyController@update');
Route::delete('/company/delete/{id}', 'CompanyController@destroy');

Route::resource('/contact', 'ContactController');
Route::post('/contact/update/{id}', 'ContactController@update');
Route::delete('/contact/delete/{id}', 'ContactController@destroy');
