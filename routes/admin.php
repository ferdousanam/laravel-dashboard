<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Controllers should be inside BackEndCon folder to use this route file
|
*/

Route::group(['middleware' => 'auth:admin'], function () {
    // Super User Routes
    Route::group(['middleware' => ['CheckSuperUser']], function () {
        Route::resource('menu', 'MenuController');
        Route::resource('user', 'UsersController');
        Route::resource('user-type', 'UserTypesController');
        Route::resource('user-priority-level', 'UserPriorityLevelController');
        Route::resource('project-details', 'ProjectDetailsController');
    });

    // User Routes only auth permission
    Route::group(['middleware' => ['auth']], function () {
        // Avatar Changing Routes
        Route::get('profile/change-avatar', 'ProfileController@editAvatar')->name('edit-avatar');
        Route::post('profile/change-avatar', 'ProfileController@updateAvatar')->name('update-avatar');
        // Change Password Routes
        Route::get('profile/change-password', 'ProfileController@editPassword')->name('edit-password');
        Route::post('profile/change-password', 'ProfileController@updatePassword')->name('update-password');
        // Profile Routes
        Route::resource('profile', 'ProfileController');
    });

    // User Routes with different permission
    Route::group(['middleware' => ['checkPermission']], function () {
        Route::resource('dashboard', 'DashboardController');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Admin Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});
