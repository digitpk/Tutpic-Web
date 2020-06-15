<?php
//auth()->login(\App\User::first());


Route::namespace('Home')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('login2', 'HomeController@login');
    Route::get('service', 'HomeController@service');
    Route::get('how-its-works', 'HomeController@work');
    Route::get('about', 'HomeController@about');
    Route::get('contact', 'HomeController@contact');
});

Route::namespace('Auth')->group(function () {
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@store');
    Route::get('logout', 'LoginController@destroy');
    Route::get('register', 'RegisterController@index');
    Route::get('register-teacher', 'RegisterController@teacherCreate');
    Route::post('register', 'RegisterController@store');
    Route::post('register-teacher', 'RegisterController@storeTeacher');

});

Route::namespace('Admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', 'DashboardController@index');
//        Route::resource('gallery-categories', 'GalleryCategoryController');
    });
});

Route::namespace('User')->group(function () {

    Route::namespace('Student')
        ->middleware('auth')
        ->group(function () {
//        Route::resource('profile', 'ProfileController');
//        Route::resource('question', 'QuestionController');
        });

});
Route::middleware('auth')->group(function () {
    Route::get('account', 'AccountController@index');
    Route::resource('chat', 'ChatController');
    Route::post('chat-file/{id}', 'ChatController@update');
    Route::get('chat-closed/{id}', 'ChatController@closed');
});

Route::get('clear-cache', function () {
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    return back();
});

Route::get('queue-listen', function () {
    \Artisan::call('queue:listen');
});


