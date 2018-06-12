<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/accesslog', function(){
    $content = Storage::get("access.log");
    $arr = preg_split("/((\r?\n)|(\r\n?))/", $content);
    return view("log")->with("log", $arr);
})->middleware('role:admin');

Route::resource('todos','TodoController');
Route::resource('appointments','AppointmentController');