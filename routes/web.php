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
    return view('welcome');
});
Route::get('/login', function(){
	return view('auth.login');

});

Route::get('/register', function(){
	return view('auth.register');

});

Route::get('/about', function(){
	return view('about');

});

Route::get('/user-login',function(){
		return view('auth.login');
});



Route::post('setlang','SettingsController@locale');
Route::get('setlanguage','SettingsController@setlanguage');



Route::get('/viewvideo/{id}','SettingsController@viewvideo');
Route::get('/sendemail','ChatsController@sendemail');
Route::get('/uploadcsvrecipients','ChatsController@uploadcsvrecipients');

Route::get('/courses/{id}','ChatsController@courses');

Route::get('/addschedule/{id}','SettingsController@addschedule');
Route::post('/createschedule','SettingsController@createschedule');
Route::get('/deleteschedule/{id}','SettingsController@deleteschedule');
Route::post('/groupchat','SettingsController@groupchat');


Auth::routes();
Route::get('/resetpassadmin', 'SettingsController@resetpassadmin');
Route::post('/resetpass','SettingsController@resetpassword');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/goback','inventoryController@goback')->name('goback');

Route::get('/blank', 'SettingsController@index');
Route::get('/resetpassadmin', 'SettingsController@resetpassadmin');
Route::post('/resetpass','SettingsController@resetpassword');
Route::post('/exportdata','HomeController@exportdata');
// Route::post('exportdata', [HomeController::class, 'exportdata'])->name('exportdata');

Route::get('addfaculties','HomeController@addfaculties');
Route::post('createfaculty','HomeController@createfaculty');
Route::get('addcourse','HomeController@addcourse');
Route::post('createcourse','HomeController@createcourse');
Route::get('/viewcoursescert','HomeController@availablecoursescert');
Route::get('/viewcoursesdip','HomeController@availablecoursesdip');
Route::get('/viewcoursespost','HomeController@availablecoursespost');
Route::get('/coursesgrid','HomeController@coursesgrid');
Route::get('/facultycourses/{id}','HomeController@facultycourses');
Route::get('/videocourses','HomeController@videocourses');
Route::get('/courseprofile/{id}','HomeController@courseprofile');
Route::post('/addunits','HomeController@units');
Route::get('/viewunits/{id}','HomeController@viewunits');
Route::get('/studentunits','HomeController@studentunits');
Route::get('/viewassignments','HomeController@viewassignments');
Route::get('/viewsubmissions','HomeController@viewsubmissions');
Route::get('/assdet/{id}','HomeController@assdet');
Route::get('/submitassignment/{id}','HomeController@submitassignments');
Route::post('/updatesubmission','HomeController@updatesubmission');
Route::post('/createassignment','HomeController@createassignment');
Route::post('/grading','HomeController@grading');
Route::post('/editgrade','HomeController@editgrade');
Route::get('/unittopics','HomeController@unittopics');
Route::get('/unitprofile/{id}','HomeController@unitprofile');
Route::get('/studentassignments','HomeController@studentassignments');
Route::get('/submittedassignments','HomeController@submittedassignments');
Route::get('/notesnavigation','HomeController@notesnavigation');
Route::get('/studentnotes','HomeController@studentnotes');
Route::get('/assignmentsnavigation','HomeController@assignmentsnavigation');
Route::post('/createtopics/{id}','HomeController@createtopics');
Route::post('/uploadnotes/{id}','HomeController@uploadnotes');
Route::post('/uploadassignment/{id}','HomeController@uploadassignment');
Route::get('/articles','HomeController@createarticle');
Route::post('/postarticle','HomeController@postarticle');
Route::get('/viewarticles','HomeController@viewarticles');
Route::get('/articledetails/{id}','HomeController@articledetails');
Route::get('/removearticle/{id}','HomeController@removearticle');
Route::get('downloadstatus/{id}','HomeController@downloadstatus');
Route::get('deletecourse/{id}','HomeController@deletecourse');
Route::get('editcourse/{id}','HomeController@editcourse');
Route::post('updatecourse','HomeController@updatecourse');

Route::post('/like/{id}','HomeController@likearticle');
Route::post('/comment','HomeController@addcomment');
Route::get('news','SettingsController@news');

// modules
Route::post('/uploadmodules','HomeController@createmodules');


//usersroutes
Route::get('adduser','HomeController@adduser');
Route::get('addstudent','HomeController@addstudent');
Route::post('createstudent','HomeController@createstudent');
Route::post('createuser','HomeController@createuser');
Route::get('/managelec','HomeController@managelec');
Route::get('/addadmin','HomeController@addadmin');
Route::post('/createadmin','HomeController@createadmin');
Route::get('/manageadmin','HomeController@manageadmin');
Route::get('/manageusers','HomeController@manageusers')->name('manageusers');
Route::get('/ajax.manageusers','HomeController@ajaxManageUsers')->name('ajax.manageusers');

// Route::get('/ajax/manageusers', [HomeController::class, 'ajaxManageUsers'])->name('ajax.manageusers');
Route::get('/graduatestudents','HomeController@graduatestudents');
Route::get('/updateprofile/{id}','HomeController@updateprofile');
Route::get('/deletestudent/{id}','HomeController@deletestudent');
Route::post('/changeavatar/{id}','dashboardController@changeavatar');
Route::get('/edituser/{id}','HomeController@edituser');
Route::post('/updatestudent','HomeController@updatestudent');
Route::get('/suspendstudent/{id}','HomeController@suspendstudent');
Route::get('/graduatestudent/{id}','HomeController@graduatestudent');
Route::get('/uploaddocuments/{id}','HomeController@uploaddocuments');
Route::post('/posttrascripts/{id}','HomeController@posttrascripts');
Route::get('deletedocument/{id}','HomeController@deletedocument');
Route::get('/viewresults/{id}','HomeController@viewresults');



//video lectures

Route::get('/videolecture','SettingsController@videolecture');
Route::get('/createvideolecture','dashboardController@videos');
Route::post('uploadvideos','dashboardController@uploadvideos');
Route::get('/viewvideos','dashboardController@viewvideos');


//user chatting and messaging routes
Route::get('/incomingchats','dashboardController@incomingchats');
Route::post('/outgoingchats','dashboardController@outgoingchat');

//campuses registration
Route::get('/regcampus','dashboardController@regcampus');
Route::post('/postcampus','dashboardController@postcampus');

// chatting

// Route::get('/chats', 'ChatsController@index');
// Route::get('/messages', 'ChatsController@fetchMessages');
// Route::post('/messages', 'ChatsController@sendMessage');

Route::get('/chats', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messagespost', 'ChatsController@sendMessage');
// Route::get('messages', 'ChatsController@fetchMessages');
// Route::post('messages', 'ChatsController@sendMessage');

//references
Route::get('libraryreference','dashboardController@libraryreference');
Route::post('/createreference','dashboardController@createreference');
Route::get('/viewreferences','dashboardController@viewreferences');
Route::get('/deletereference/{id}','dashboardController@deletereference');

//pastpapers
Route::get('/pastpaper','dashboardController@pastpapers');
Route::post('/uploadpapers','dashboardController@uploadpapers');
Route::get('/viewpapers','dashboardController@viewpapers');

//financials
route::get('/feestructure','dashboardController@feestructure');
Route::get('/generatefeestructure/{id}','dashboardController@generatefeestructure');
Route::post('/additems','dashboardController@additems');
Route::post('/generatestructure','dashboardController@generatestructure');
Route::get('/viewstructure','dashboardController@viewstructure');
Route::get('/studentfees','HomeController@studentfees');
Route::get('/receivefees/{id}','dashboardController@receivefees');
Route::post('/enterfee/{id}','dashboardController@enterfee');
Route::get('studentstatement/{id}','dashboardController@studentstatement');
Route::get('viewpayments','dashboardController@viewpayments');
Route::get('viewbalances','dashboardController@viewbalances');
Route::get('studentstatements','HomeController@studentstatements');

//reports
Route::get('/campuspayments','dashboardController@campuspayments');
Route::get('/facultypayments','dashboardController@facultypayments');
Route::get('/coursepayments','dashboardController@coursepayments');


// sms RoutesAfricanstalking apis
Route::get('/messaging','SettingsController@index_sms');
Route::post('/addnumber','SettingsController@addnumbers');
Route::get('/addnumber','SettingsController@addnumbers');
Route::post('/sendbulk','SettingsController@sendbulk');
Route::get('/outbox','SettingsController@outbox');

//user chat forums
Route::get('/chatview','SettingsController@chatview');
Route::get('/messagestrans','SettingsController@messagestrans');
Route::get('/createchat','SettingsController@createchat');

// *************************************************************
//major final changes  NB: to be updated*****************
Route::get('editcampus/{id}','dashboardController@editcampus');
Route::post('/updatecampus/{id}','dashboardController@updatecampus');
Route::get('/deletecampus/{id}','dashboardController@deletecampus');

Route::get('editfaculty/{id}','HomeController@editfaculty');
Route::post('/updatefaculty/{id}','HomeController@updatefaculty');
Route::get('/deletefaculty/{id}','HomeController@deletefaculty');

Route::get('deletemodule/{id}','HomeController@deletemodule');
Route::get('/getcourses','dashboardController@getcourses');
Route::get('getlist','HomeController@getlist');

Route::get('/deletenotes/{id}','HomeController@deletenotes');
Route::get('/deleteass/{id}','HomeController@deleteass');

Route::get('/support','HomeController@raiseticket');
Route::post('/raiseticket','HomeController@postticket');
Route::get('/viewtickets','HomeController@viewtickets');
Route::get('/replyticket/{id}','HomeController@replyticket');
Route::post('/postreply','HomeController@postreply');
Route::get('/viewreply/{id}','HomeController@viewreply');
Route::get('/viewhistory/{id}','HomeController@viewhistory');

Route::get('/activateaccount/{id}','HomeController@activateaccount');
Route::get('/deactivateaccount/{id}','HomeController@deactivateaccount');

Route::post('updatestudentpass/{id}','SettingsController@updatestudentpass');
Route::get('nots','HomeController@getnot');

Route::get('/adminnotifications','HomeController@adminnotifications');
Route::post('/createnotification','HomeController@createnotification');
Route::get('/deletenotification/{id}','HomeController@deletenotification');



//sper admin roles

Route::get('/admissionsapproval','HomeController@admissionsapprovals');
Route::get('/approvestudent/{id}','HomeController@approvestudent');
Route::get('/deactivatedstudents','HomeController@deactivatedstudents');
Route::get('/paymentsapproval','HomeController@paymentsapproval');
Route::get('/approvepayment/{id}','HomeController@approvepayment');
Route::get('/deletepayment/{id}','HomeController@deletepayment');












        
