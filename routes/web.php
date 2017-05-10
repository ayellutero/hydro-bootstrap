<?php

// Authentication
Route::auth();

// Dashboard
Route::get('/', 'HomeController@index');

// Group of ROUTES w Permissions
Route::group(['middleware' => ['web']], function () {
    /*
     * User CRUD Module
     */
	Route::get('userCRUD', [
		'uses' => 'UserCRUDController@index',
		'as' => 'userCRUD.index',
		'middleware' => 'roles',
		'roles' => ['Admin', 'Head']
	]);

    Route::post('/userCRUD/store/', [
        'uses' => 'UserCRUDController@store',
        'as' => 'userCRUD.store',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('/userCRUD/{id}/update/', [
        'uses' => 'UserCRUDController@update',
        'as' => 'userCRUD.update',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::delete('/userCRUD/{id}/destroy', [
        'uses' => 'UserCRUDController@destroy',
        'as' => 'userCRUD.destroy',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
    
    /* 
     * Maintenance Report Module 
     */
    Route::get('/viewMyMaintenanceReports', [
        'uses'=> 'MaintenanceController@myRepsView',
        'as' => 'viewMyMaintenanceReports',
        'middleware' => 'roles',
        'roles' => ['Head', 'User', 'Admin']
    ]);

    Route::get('/viewMaintenanceReports', [
        'uses'=> 'MaintenanceController@allRepsView',
        'as' => 'viewMaintenanceReports',
        'middleware' => 'roles',
        'roles' => ['Head', 'User', 'Admin']
    ]);

    Route::get('/addMaintenanceReport', [
        'uses'=> 'MaintenanceController@addRepView',
        'as' => 'addMaintenanceReport',
        'middleware' => 'roles',
        'roles' => ['Head', 'User', 'Admin']
    ]);

    Route::resource('reports','ReportController',
    [
        'middleware' => 'roles',
        'roles' => ['User', 'Head']
    ]);

    Route::get('success', function(){
        return view('Reports/success');
    });

    // NOTIFS ROUTES
    Route::resource('notifications','NotificationController');

    Route::get('myNotifications', [
        'uses'=> 'NotificationController@index',
        'as' => 'myNotifications',
        'middleware' => 'roles',
        'roles' => ['Head', 'Admin', 'User']
    ]);

    Route::get('viewPendingReports', [
        'uses'=> 'ReportController@show_pending',
        'as' => 'viewPendingReports',
        'middleware' => 'roles',
        'roles' => ['Head', 'Admin']
    ]);

    // User Activity 
    Route::resource('user_activity','UserActivityController',
    [
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    // Calendar 
    Route::resource('calendar','CalendarController',
    [
        'middleware' => 'roles',
        'roles' => ['Admin', 'Head', 'User']
    ]);

    Route::get('confirmSchedule/{id}', 'CalendarController@confirmSched');

    Route::get('calendarEvents', function(){
        return view('layouts.calendarEvents');
    });
    
    // User Profile
    Route::get('/userProfile', function () {
        return view('userProfile');
    });
});
