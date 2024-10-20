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

Route::middleware('auth:api')->get('/user', 
	function (Request $request) {
    return $request->user();
});

Route::get('login', 'ApiController@login');
Route::get('test', 'ApiController@dbcheck');
Route::get('task', 'ApiController@techTasks');
Route::get('taskdesc', 'ApiController@techTasksDesc');
Route::get('managerassigntasks', 'ApiController@managerassign');
Route::get('client', 'ApiController@bringclients');
Route::get('clientotech', 'ApiController@bringclienttotech');
Route::get('clientone', 'ApiController@bringclient');
Route::get('assigntask', 'ApiController@asigntaskstotechnician');
Route::get('jobs', 'ApiController@bringjobs');
Route::get('jobsfortech', 'ApiController@bringjobsTech');
Route::get('techniciansall', 'ApiController@bringfreetechnicians');
Route::get('techniciansgetpendingtaskscount', 'ApiController@getpendingcountfortechnician');
Route::get('techniciansgetassignedtasks', 'ApiController@getassignedtasksfortechnician');
Route::get('clientrequest', 'ApiController@clientissuerequest');
Route::get('sendcoordinates', 'ApiController@sendcoordinates');
Route::get('gettechdata', 'ApiController@gettechdata');
Route::get('pendingjobstomanager', 'ApiController@pendingjobstomanager');
Route::get('indivdpendingjobstomanager', 'ApiController@indivdpendingjobstomanager');
Route::get('managerviewstaff', 'ApiController@managerviewstaff');


Route::get('salesaddclients', 'ApiController@salesaddclients');
Route::get('getclienttosales', 'ApiController@salesgetclient');
Route::get('getclientlist', 'ApiController@bringclientstosales');
Route::get('clientrequest', 'ApiController@clientissuerequest');
Route::get('uploadfindings', 'ApiController@uploadfindings');
Route::get('changeaccount', 'ApiController@changeaccount');
Route::get('changepassword', 'ApiController@changepassword');

Route::get('userlogin', 'ApiController@userlogin');
// Route::post('loggedusers', 'ApiController@getUsers');
Route::options('loggedusers', 'ApiController@getUsers');
Route::post('loggedusers', array('middleware' => 'cors', 'uses' => 'ApiController@getUsers'));