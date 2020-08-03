<?php
/*
 * Web Routes module
 */

use \Illuminate\Support\Facades\Route;

$controllersModuleNamespace = getModuleNamespace(__DIR__) . '\Controllers';

Route::namespace($controllersModuleNamespace)->
prefix(getModuleName(__DIR__,true))->middleware(['module.auth','module.role_check'])->group(function () {
//prefix(getModuleName(__DIR__,true))->group(function () {

    //main page
    Route::get('/', 'BaseController@index');
    Route::post('/viewrates', 'BaseController@viewRates');

    //Rate by id
    Route::get('/viewrate/{id}', 'BaseController@viewRateId');

    //Update rate
    Route::post('/updaterate', 'BaseController@updateRateId');

    // Accept all rates and load them to a2billing database
    Route::get('/accsept', 'BaseController@accept');


});
