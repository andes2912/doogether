<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(
  [
    'middleware' => 'api',
    'prefix' => 'auth'

  ], function ($router) {
    Route::post('/login', 'API\UserController@login');
    Route::post('/register', 'API\UserController@register');
    Route::post('/logout', 'API\UserController@logout');
    Route::post('/refresh', 'API\UserController@refresh');
    Route::get('/profile', 'API\UserController@userProfile');
});

Route::group(
  [
    'middleware'  => 'auth:api',
    'prefix'      => 'session'

  ], function () {
    Route::get('','API\SessionController@list'); // List Session
    Route::get('/{id}','API\SessionController@view'); // Detail Session
    Route::post('','API\SessionController@create'); // Store Session
    Route::put('/{id}','API\SessionController@update'); // Update Session
    Route::delete('/{id}','API\SessionController@delete'); // Delete Session
  }
);

Route::any('{any}', function(){
    return response()->json([
    	'status' => 'error',
      'message' => 'Resource not found'], 404);
})->where('any', '.*');
