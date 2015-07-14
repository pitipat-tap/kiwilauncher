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

Route::get("/", "WebController@index");
Route::get("skills-and-process", array("as" => "skills", "uses" => "WebController@skills"));
Route::get("works", array("as" => "works", "uses" => "WebController@works"));
Route::get("blog", array("as" => "blog", "uses" => "WebController@blog"));
Route::get("contact-us", array("as" => "contact", "uses" => "WebController@contact"));

