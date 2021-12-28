<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('request', 'RequestsController@index')->name('request.index');
    Route::get('send', 'RequestsController@requestAccess')->name('request.send');
    Route::get('goto', 'HomeController@goTo')->name('goto');
});

Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::resource('admin', 'AdminController');
});

Route::group(['namespace' => 'App\Http\Controllers\PD'], function () {
    Route::resource('pd', 'PDController');
});

Route::group(['namespace' => 'App\Http\Controllers\EMS'], function () {
    Route::resource('ems', 'EMSController');
});

Route::group(['namespace' => 'App\Http\Controllers\DOJ'], function () {
    Route::resource('doj', 'DOJController');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::resource('permissions', 'PermissionsController');

    Route::resource('roles', 'RolesController');

    Route::resource('users', 'UsersController');

    Route::get('requests', 'RequestsController@index')->name('requests.index');
    Route::get('requests/accept/{id}', 'RequestsController@accept')->name('requests.accept');
    Route::get('requests/reject/{id}', 'RequestsController@reject')->name('requests.reject');
    Route::get('requests/destroy/{id}', 'RequestsController@destroy')->name('requests.destroy');
});

require __DIR__.'/auth.php';
