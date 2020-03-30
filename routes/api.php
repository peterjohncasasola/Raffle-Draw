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

//Route::get('members', 'MembersController@index');
// Route::get('members/{id}', 'MembersController@show');
// Route::post('members', 'MembersController@store');
// Route::put('members/{article}', 'MembersController@update');
// Route::delete('members/{article}', 'MembersController@delete');
