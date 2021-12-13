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
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers\PD', 'name' => 'pd.'], function () {

});

Route::group(['namespace' => 'App\Http\Controllers\EMS', 'name' => 'ems.'], function () {

});

Route::group(['namespace' => 'App\Http\Controllers\DOJ', 'name' => 'doj.'], function () {

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
