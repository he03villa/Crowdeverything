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

Auth::routes();

Route::get('/','ProyectoController@index')->name('index');

Route::get('/proyec/{proyecto}','ProyectoController@show')->name('proyec.show');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/register/create','UserController@create')->name('user.create');

Route::middleware(['auth'])->group(function(){
    //Usuario
    Route::get('/user/{user}/perfil','UserController@perfil')->name('user.perfil')
        ->middleware('permission:user.perfil');

    Route::get('/user/{user}/edit','UserController@edit')->name('user.edit')
        ->middleware('permission:user.edit');

    Route::put('/user/{user}','UserController@update')->name('user.update')
        ->middleware('permission:user.update');

    //Innovador
    Route::get('/inno/index','InnovadorController@index')->name('inno.index')
        ->middleware('permission:inno.index');

    Route::get('/inno/{proyecto}','InnovadorController@show')->name('inno.show')
        ->middleware('permission:inno.show');

    Route::get('/inno/{proyecto}/edit','InnovadorController@edit')->name('inno.edit')
        ->middleware('permission:inno.edit');
    
    Route::put('/inno/{proyecto}','InnovadorController@update')->name('inno.update')
        ->middleware('permission:inno.update');

    Route::get('/inno/create','InnovadorController@create')->name('inno.create')
        ->middleware('permission:inno.create');

    Route::post('/inno/store','InnovadorController@store')->name('inno.store')
        ->middleware('permission:inno.store');

    Route::post('/recur/store','RecursoController@store')->name('recur.store')
        ->middleware('permission:recur.store');

    //Patrocibador
    Route::post('/pat/store','ProyectoController@store')->name('pat.store')
        ->middleware('permission:pat.store');

    //Evaluador
    Route::get('/eva/index','EvaluadorController@index')->name('eva.index')
        ->middleware('permission:eva.index');
    
    Route::get('/eva/{proyecto}','EvaluadorController@show')->name('eva.show')
        ->middleware('permission:eva.show');
    
    Route::put('/eva/{proyecto}','EvaluadorController@show')->name('eva.update')
        ->middleware('permission:eva.update');

    //Administrador
    Route::get('/admin/index','AdministradorController@index')->name('admin.index')
        ->middleware('permission:admin.index');
    
    Route::get('/admin/create','AdministradorController@create')->name('admin.create')
        ->middleware('permission:admin.create');

    Route::post('/admin/store','AdministradorController@store')->name('admin.store')
        ->middleware('permission:admin.store');

    Route::put('/admin/{user}','AdministradorController@update')->name('admin.update')
        ->middleware('permission:admin.update');
});