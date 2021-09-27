<?php

//Quando você acessar o diretório "/", você vai chamar o método "homepage" da classe "Controller"
Route::get('/', ['uses' => 'Controller@homepage']);
Route::get('/cadastro', ['uses' => 'Controller@cadastrar']);

/**
* routes to user auth
*===============================================================================
*/
Route::get('/', ['uses' => 'Controller@fazerLogin']);
Route::get('/login', ['uses' => 'Controller@fazerLogin']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);
Route::get('/logout', ['as' => 'user.logout', 'uses' => 'DashboardController@logout']);

Route::get('user/moviment', ['as' => 'moviment.index', 'uses' => 'MovimentsController@index']);
Route::get('moviment', ['as' => 'moviment.application', 'uses' => 'MovimentsController@application']);
Route::post('moviment', ['as' => 'moviment.application.store', 'uses' => 'MovimentsController@storeApplication']);
Route::get('getback', ['as' => 'moviment.getback', 'uses' => 'MovimentsController@getback']);
Route::post('getback', ['as' => 'moviment.getback.store', 'uses' => 'MovimentsController@storeGetback']);
Route::get('moviment/all', ['as' => 'moviment.all', 'uses' => 'MovimentsController@all']);

//Route::get('user', ['as' => 'user.index', 'uses' => 'UsersController@index']);
//crud
Route::resource('user', 'UsersController');
Route::resource('institution', 'InstitutionsController');
Route::resource('group', 'GroupsController');
Route::resource('institution.product', 'ProductsController');

Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);

/*
Route::get('/', function () {
    return view('welcome');
});
*/
