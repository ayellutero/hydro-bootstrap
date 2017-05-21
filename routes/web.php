<?php

// Authentication
Route::auth();

// Dashboard
Route::get('/', 'HomeController@index');

Route::get('sample', function(){
    return view('sampleReport');
});

// Group of ROUTES w Permissions
Route::group(['middleware' => ['web', 'roles']], function () {
    /*
     * User CRUD Module
     */
	Route::get('userCRUD', [
		'uses' => 'UserCRUDController@index',
		'as' => 'userCRUD.index',
		'roles' => ['Admin', 'Head']
	]);

    Route::post('/userCRUD/store/', [
        'uses' => 'UserCRUDController@store',
        'as' => 'userCRUD.store',
        'roles' => ['Admin']
    ]);

    Route::post('/userCRUD/{id}/update/', [
        'uses' => 'UserCRUDController@update',
        'as' => 'userCRUD.update',
        'roles' => ['Admin', 'User'] // included User for profile editing purposes
    ]);

    Route::delete('/userCRUD/{id}/destroy', [
        'uses' => 'UserCRUDController@destroy',
        'as' => 'userCRUD.destroy',
        'roles' => ['Admin']
    ]);
    
    /* 
     * Maintenance Report Module 
     */
    Route::get('/viewMyMaintenanceReports', [
        'uses'=> 'MaintenanceController@myRepsView',
        'as' => 'viewMyMaintenanceReports',
        'roles' => ['Head', 'User', 'Admin']
    ]);

    Route::get('/viewMaintenanceReports', [
        'uses'=> 'MaintenanceController@allRepsView',
        'as' => 'viewMaintenanceReports',
        'roles' => ['Head', 'User', 'Admin']
    ]);

    Route::get('/addMaintenanceReport', [
        'uses'=> 'MaintenanceController@addRepView',
        'as' => 'addMaintenanceReport',
        'roles' => ['Head', 'User', 'Admin']
    ]);

    Route::get('maintenanceHistory', [
        'uses'=> 'MaintenanceController@stationsView',
        'as' => 'maintenanceHistory',
        'middleware' => 'roles',
        'roles' => ['Head', 'User', 'Admin']
    ]);

    Route::get('station-{id}-maintenance-history', 'MaintenanceController@viewStationHistory');
    Route::get('station-{id}-statistics', 'StatController@retSenStat');

    Route::resource('reports','ReportController',
    [
        'roles' => ['User', 'Head']
    ]);

    Route::get('success', function(){
        return view('Reports/success');
    });

    // NOTIFS ROUTES
    Route::get('viewPendingReports', [
        'uses'=> 'ReportController@show_pending',
        'as' => 'viewPendingReports',
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
        'roles' => ['Admin', 'Head', 'User']
    ]);

    Route::get('mySchedules-{id}', 'CalendarController@showUnconfirmed');
    
    Route::get('confirmSchedule/{id}', 'CalendarController@confirmSched');

    Route::get('confirmSchedule/{id}userID={userID}', [
		'uses' => 'CalendarController@update',
		'as' => 'calendar.confirmMySched',
        'roles' => ['Admin', 'User']
	]);
    
    Route::get('calendarEvents', function(){
        return view('layouts.calendarEvents');
    });
    
    // User Profile
    Route::get('/userProfile', function () {
        return view('userProfile');
    });

    /* Device Management */
    Route::get('stationManagement', [
		'uses' => 'StationController@index',
		'as' => 'stationManagement.index',
        'roles' => ['Admin']
	]);

    Route::post('/station/store', [
        'uses' => 'StationController@store',
        'as' => 'stationManagement.store',
        'roles' => ['Admin']
    ]);
    
    Route::post('/station/{id}/update', [
        'uses' => 'StationController@update',
        'as' => 'stationManagement.update',
        'roles' => ['Admin']
    ]);

    Route::delete('/station/{id}/destroy', [
        'uses' => 'StationController@destroy',
        'as' => 'stationManagement.destroy',
        'roles' => ['Admin']
    ]);

    // Parts Management
    Route::get('parts', [
		'uses' => 'PartController@index',
		'as' => 'partManagement.index',
        'roles' => ['Admin', 'Head', 'User']
	]); 

    Route::post('/part/store/', [
        'uses' => 'PartController@store',
        'as' => 'partManagement.store',
        'roles' => ['Admin', 'Head', 'User']
    ]);

    Route::post('/part/{id}/update/', [
        'uses' => 'PartController@update',
        'as' => 'partManagement.update',
        'roles' => ['Admin', 'Head', 'User']
    ]);

    Route::delete('/part/{id}/destroy', [
        'uses' => 'PartController@destroy',
        'as' => 'partManagement.destroy',
        'roles' => ['Admin']
    ]);

    // Status Management
    Route::get('status', [
		'uses' => 'StatusController@index',
		'as' => 'statusManagement.index',
        'roles' => ['Admin', 'Head', 'User']
	]); 

    Route::post('/status/store/', [
        'uses' => 'StatusController@store',
        'as' => 'statusManagement.store',
        'roles' => ['Admin', 'Head', 'User']
    ]);

    Route::post('/status/{id}/update/', [
        'uses' => 'StatusController@update',
        'as' => 'statusManagement.update',
        'roles' => ['Admin', 'Head', 'User']
    ]);

    Route::delete('/status/{id}/destroy', [
        'uses' => 'StatusController@destroy',
        'as' => 'statusManagement.destroy',
        'roles' => ['Admin']
    ]);

    // Types Management
    Route::get('type', [
		'uses' => 'TypeController@index',
		'as' => 'typeManagement.index',
        'roles' => ['Admin', 'Head', 'User']
	]); 

    Route::post('/type/store/', [
        'uses' => 'TypeController@store',
        'as' => 'typeManagement.store',
        'roles' => ['Admin', 'Head', 'User']
    ]);

    Route::post('/type/{id}/update/', [
        'uses' => 'TypeController@update',
        'as' => 'typeManagement.update',
        'roles' => ['Admin', 'Head', 'User']
    ]);

    Route::delete('/type/{id}/destroy', [
        'uses' => 'TypeController@destroy',
        'as' => 'typeManagement.destroy',
        'roles' => ['Admin']
    ]);

    // Works Management
    Route::post('/work/store/', [
        'uses' => 'WorkController@store',
        'as' => 'workManagement.store',
        'roles' => ['Admin']
    ]);

    Route::post('/work/{id}/update/', [
        'uses' => 'WorkController@update',
        'as' => 'workManagement.update',
        'roles' => ['Admin']
    ]);

    Route::delete('/work/{id}/destroy', [
        'uses' => 'WorkController@destroy',
        'as' => 'workManagement.destroy',
        'roles' => ['Admin']
    ]);

    // Sims Management
    Route::post('/sim/store/', [
        'uses' => 'SimController@store',
        'as' => 'simManagement.store',
        'roles' => ['Admin']
    ]);

    Route::post('/sim/{id}/update/', [
        'uses' => 'SimController@update',
        'as' => 'simManagement.update',
        'roles' => ['Admin']
    ]);

    Route::delete('/sim/{id}/destroy', [
        'uses' => 'SimController@destroy',
        'as' => 'simManagement.destroy',
        'roles' => ['Admin']
    ]);

});
