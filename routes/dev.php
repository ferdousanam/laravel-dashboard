<?php
/*
|--------------------------------------------------------------------------
| Developers Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dev routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Controllers should be inside DevCon folder to use this route file
|
*/

// Developer Routes
Route::group(['middleware' => ['auth:admin', 'CheckSuperUser']], function () {
    Route::get('dev-mode/{switch}', 'DevOptionController@devOptions')->name('dev-mode');
    Route::resource('project-details', 'ProjectDetailsController');
    Route::resource('main-menu', 'MenuController');
    Route::resource('sub-menu', 'SubMenuController');
});
