<?php
//auth()->login(\App\User::first());


Route::namespace('Home')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('login2', 'HomeController@login');
    Route::get('service', 'HomeController@service');
    Route::get('how-its-works', 'HomeController@work');
    Route::get('blogs-details/{id}', 'HomeController@blog');
    Route::get('about', 'HomeController@about');
    Route::get('contact', 'HomeController@contact');
});



Route::namespace('Admin')->middleware(['auth','admin'])->group( function () {

    Route::get('dashboard', 'DashboardController@index');
    Route::get('users', 'DashboardController@userInfo');
    Route::get('payments', 'DashboardController@userPayment');
    Route::get('withdraws', 'DashboardController@teacherWithdraw');
    Route::resource('pricing-plan', 'PricingPlanController');
    Route::resource('blogs', 'BlogController');
    Route::get('login2', 'HomeController@login');

});

Route::namespace('Auth')->group(function () {
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@store');

    Route::post('verify-email', 'LoginController@verifyMail');
    Route::get('reset-password-auth','LoginController@checkUser');
    Route::post('reset-password', 'LoginController@resetPassword');
    Route::get('logout', 'LoginController@destroy');
    Route::get('register', 'RegisterController@index');
    Route::get('register-teacher', 'RegisterController@teacherCreate');
    Route::post('register', 'RegisterController@store');
    Route::get('active', 'RegisterController@active');
    Route::post('register-teacher', 'RegisterController@storeTeacher');
    Route::get('login/facebook', 'LoginController@redirectToProvider1');
    Route::get('plan/{id}', 'PricingPlanController@getPlan');

    Route::get('/login/facebook/callback', 'LoginController@handleProviderCallback1');
    Route::get('login/google', 'LoginController@redirectToProvider2');
    Route::get('login/google/callback', 'LoginController@handleProviderCallback2');

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
Route::middleware(['auth'])->group(function () {
    Route::get('account', 'AccountController@index');
    Route::resource('chat', 'ChatController');
    Route::resource('review', 'ReviewController');
    Route::resource('payment', 'PaymentController');
    Route::resource('withdraw', 'WithdrawController');
    Route::post('chat-file/{id}', 'ChatController@update');
    Route::get('chat-closed/{id}', 'ChatController@closed');
});

Route::get('clear-cache', function () {
    \Artisan::call('optimize:clear');
    return back();
});

Route::get('queue-listen', function () {
    \Artisan::call('queue:listen');
});


