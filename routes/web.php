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
// */
// Route::get('/', function () {
//     return view('index');
// });

//GMaps
Route::get('/', 'HomeController@gmaps');

Route::get('sample', function () {
    return view('sample');
});

Route::get('/users/serverSide', [
    'as'   => 'users.serverSide',
    'uses' => function () {
        $users = App\User::select(['id', 'name', 'employee_id', 'position', 'email', 'contact_num', 'created_at']);

        return Datatables::of($users)->make();
    }
]);

Route::get('/userProfile', function () {
    return view('userProfile');
});

Route::get('statistics', function() {
    return view('statistics');
});

Route::get('/pusher', function(){
    event(new App\Events\HydroNotifEvent('Hi there'));
    return "Event created";
});

// Group of ROUTES w Permissions
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    // User CRUD Module
	Route::get('userCRUD', [
		'uses' => 'UserCRUDController@index',
		'as' => 'userCRUD.index',
		'middleware' => 'roles',
		'roles' => ['Admin', 'Head']
	]);

    Route::get('/userCRUD/create', [
        'uses' => 'UserCRUDController@create',
        'as' => 'userCRUD.create',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('/userCRUD/store/', [
        'uses' => 'UserCRUDController@store',
        'as' => 'userCRUD.store',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('/userCRUD/{id}/', [
        'uses' => 'UserCRUDController@show',
        'as' => 'userCRUD.show',
        'middleware' => 'roles',
        'roles' => ['Admin', 'Head']
    ]);

    Route::get('userCRUD/{id}/edit', [
        'uses' => 'UserCRUDController@edit',
        'as' => 'userCRUD.edit',
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
    
    // Maintenance Report Module
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

    /* NOTIFS ROUTES*/
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

    /* User Activity */
    Route::resource('user_activity','UserActivityController',
    [
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    /* Calendar */
    Route::resource('calendar','CalendarController',
    [
        'middleware' => 'roles',
        'roles' => ['Admin', 'Head', 'User']
    ]);

    Route::get('confirmSchedule/{id}', 'CalendarController@confirmSched');

});
