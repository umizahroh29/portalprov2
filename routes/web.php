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
    return redirect()->route('login');
});

Auth::routes();

Route::post('users/check-nim', 'UserController@checkNim')->name('user.check.nim');
Route::post('users/update-password', 'UserController@updatePassword')->name('user.update.password');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('practicums', 'PracticumController')->except(['show']);

    Route::resource('module_assessments', 'ModuleAssessmentController')->except(['show']);


    //input nilai
    Route::get('/inputnilai', 'GradeController@index');
    Route::post('/submit-nilai', 'GradeController@store');
    Route::get('/list-nilai', 'GradeController@view');
});
