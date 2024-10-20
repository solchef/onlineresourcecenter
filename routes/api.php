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

Route::post('login', 'ApiController@login');
Route::get('test', 'ApiController@dbcheck');
Route::get('task', 'ApiController@techTasks');
Route::get('taskdesc', 'ApiController@techTasksDesc');


Route::get('salesaddtasks', 'ApiController@salesaddtasks');
Route::get('clientrequest', 'ApiController@clientissuerequest');
Route::get('userlogin', 'ApiController@userlogin');
// Route::post('loggedusers', 'ApiController@getUsers');
Route::options('loggedusers', 'ApiController@getUsers');
Route::post('loggedusers', array('middleware' => 'cors', 'uses' => 'ApiController@getUsers'));