<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return "Hello from Laravel";
});

Route::redirect('/', '/welcome');

Route::view('/greeting', 'welcome');

// required param
// Route::get('/user/{name}', function ($name) {
//     return "Hello ". $name;
// });

//optional param
Route::get('/user/{name?}', function ($name = null) {
    if (is_null($name)) {
        return "Hello there ...";
    } else {
        return "Hello ". $name;
    }
})->name('user');

Route::prefix('student')
    ->name('student.')
    ->group(function() {
        Route::get('/test', function() {
            return "Hello student";
        })->name('test'); // route('student.test')
        Route::get('/test2', function() {
            return "Hello student 2";
        });
    });