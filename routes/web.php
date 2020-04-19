<?php
//auth()->login(\App\User::first());

Route::namespace('Home')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('about', 'HomeController@about');
    Route::get('menu', 'HomeController@menu');
    Route::get('reservation', 'HomeController@reservation');
    Route::get('catering', 'HomeController@catering');
    Route::get('gallery', 'HomeController@gallery');
    Route::get('contact', 'HomeController@about');
});

Route::namespace('Auth')->group(function () {

    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@store');
    Route::get('logout', 'LoginController@destroy');

    Route::get('register', 'RegisterController@index');
    Route::post('register', 'RegisterController@store');

});

Route::namespace('Admin')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', 'DashboardController@index');
        Route::resource('gallery-categories', 'GalleryCategoryController');
        Route::resource('gallery-images', 'GalleryImageController');
        Route::resource('services', 'ServicesController');
        Route::resource('blogs', 'BlogController');
        Route::resource('slider-image', 'SliderController');
        Route::resource('certifications', 'CertificationController');
        Route::resource('brands', 'BrandController');
        Route::resource('testimonials', 'TestimonialController');
        Route::resource('info', 'CompanyInfoController');
        Route::get('contacts', 'ContactController@index');
    });
});

Route::get('clear-cache', function () {
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    return back();
});


