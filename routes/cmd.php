<?php
/*
|--------------------------------------------------------------------------
| Artisan Commands
|--------------------------------------------------------------------------
|
| Here is where you can artisan commands from the route url
|
|
|
*/

//Clear Cache facade value:
Route::get('reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('key:generate');
    Artisan::call('config:cache');
    return '<center><h1>System Rebooted!</h1></center>';
});

Route::get('composer/dump-autoload', function () {
    Artisan::call('composer:dump-autoload');
    return '<center><h1>Composer Dump Autoload has been executed!</h1></center>';
});

Route::get('composer/install', function () {
    Artisan::call('composer:install');
    return '<center><h1>Composer Install has been executed!</h1></center>';
});
