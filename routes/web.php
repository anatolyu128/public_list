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

Route::get("/", "PostController@index");
Route::get("create-post", "PostController@create");
Route::post('upload-post', "PostController@uploadPost");
Route::get("delete/{id}", "PostController@delete");

Route::get("/reg", "UserController@registrationForm");
Route::get("/login", "UserController@login");

Route::post("/confirm-registration", "UserController@validateNewUser");
Route::post("/confirm-auth", "UserController@confirmAuth");
