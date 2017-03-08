<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' => 'Backend'], function(){//'prefix' =>'admin'
  Route::any('/login','Login@login');
  // Route::post('/loginstore','Login@loginstore');
  // Route::post('/passpost','Login@passpost');
  Route::group(['middleware' => 'adminauth'],function(){
  Route::get('/dashboard','Dashboard@dashboard');
  Route::get('/logout','Login@logout');
  Route::any('/passwordchange','Dashboard@adminpwdchange');
  // Route::post('/passwordchangestore','Dashboard@adminpwdstore');
  });

});
