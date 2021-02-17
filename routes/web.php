<?php

Route::group(['prefix' => 'yogakarnalipanel'], function () {

    //login and logout
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //password reset
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::get('/dashboard', 'Backend\DashboardController@index')->name('admin.dashboard');


  
    //Backend routes
    
    //Auth::routes();

    Route::resource('/package', 'Backend\PackageController');
    Route::get('/packagedelete', 'Backend\PackageController@destroy')->name('package.delete');
    Route::resource('/homeslider', 'Backend\HomesliderController');
    Route::resource('/galleries', 'Backend\GalleryController');
    Route::resource('/enquiry', 'Backend\EnquiryController');
    Route::resource('/bookingdetail', 'Backend\BookingdetailController');
    Route::get('/instructor', 'Backend\InstructorController@index')->name('instructor');
    Route::post('/store', 'Backend\InstructorController@store')->name('store');
    Route::post('/update', 'Backend\InstructorController@update')->name('update');
    Route::get('/delete', 'Backend\InstructorController@delete')->name('delete');
    Route::get('/class-schedule', 'Backend\YogaClassController@list')->name('class-schedule');
    Route::post('/classstore', 'Backend\YogaClassController@classstore')->name('classstore');
    Route::post('/classupdate', 'Backend\YogaClassController@classupdate')->name('classupdate');
    Route::get('/classdelete', 'Backend\YogaClassController@classdelete')->name('classdelete');
    Route::get('/yogatype', 'Backend\YogaTypeController@yogatype')->name('yogatype');
    Route::post('/typestore', 'Backend\YogaTypeController@typestore')->name('typestore');
    Route::post('/typeupdate', 'Backend\YogaTypeController@typeupdate')->name('typeupdate');
    Route::get('/typedelete', 'Backend\YogaTypeController@typedelete')->name('typedelete');


   Route::get('/home', 'Backend\HomeController@index')->name('home')->middleware('verified');
   Route::get('/userlist', 'backend\UserlistController@index')->name('userlist');


});
require "website.php";









 