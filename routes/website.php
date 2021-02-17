<?php

// Frontend routes
use App\Package;
use Illuminate\Support\Facades\Input;
//login logout website user
Route::post('/login', 'Auth\LoginController@login');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/users/logout', 'Auth\LoginController@userlogout')->name('user.logout');
//user profile
Route::post('update/{id}', 'Frontend\PagesController@update')->name('update.dashboard');
Route::get('/userprofile', 'Frontend\PagesController@userprofile')->name('userprofile')->middleware('verified');
//pages routes
Auth::routes(['verify' => true]);
Route::get('/','Frontend\PagesController@index')->name('openingindex');
Route::get('/About','Frontend\PagesController@about')->name('about');
Route::get('/Contact','Frontend\PagesController@Contact')->name('contact');
Route::get('/yoga-nepal','Frontend\PagesController@YogaNepal')->name('yogaNepal');
Route::get('/private-class','Frontend\PagesController@PrivateClass')->name('private');
Route::get('/class-schedule','Frontend\PagesController@classSchedule')->name('class-schedule');
Route::get('/class-list','Frontend\PagesController@classlist')->name('classlist');
Route::get('/trainer','Frontend\PagesController@trainer')->name('trainer');
Route::get('/yoga-description/{id}','Frontend\PagesController@yogadescription')->name('yogadescription');
Route::get('/class','Frontend\PagesController@singleclass');
Route::get('/packages/{id}', 'Frontend\PagesController@singlePackage')->name('single.package');
Route::get('/gallery','Frontend\PagesController@gallery')->name('gallery');
Route::get('/packages','Frontend\PagesController@packages')->name('packages');

Route::get('/privacy','frontend\PagesController@privacy')->name('privacy');
Route::get('/booking/{id?}', 'Frontend\BookingController@create')->name('booking')->middleware('auth')->middleware('verified');
Route::resource('booking', 'Frontend\BookingController');
Route::get('/auth/redirect/{provider}', 'Frontend\SocialAuthGoogleController@redirect')->name('social');
Route::get('/callback/{provider}', 'Frontend\SocialAuthGoogleController@callback');
Route::get('/auth/redirect/{provider}', 'Frontend\SocialAuthFacebookController@redirect')->name('social');
Route::get('/callback/{provider}', 'Frontend\SocialAuthFacebookController@callback');

Route::resource('newsletter','NewsLetterController');
//Route::post('/newsletter', 'NewsletterController@store')->name('newsletter.store');

Route::any( '/search-packages','Frontend\PagesController@packageSearch');

Route::get('/register/activate/{token}', 'Auth\RegisterController@activate');


Route::get('/userPasswordReset', 'Frontend\PasswordResetController@showResetForm')->name('passwordreset');
Route::post('/userPasswordReset', 'Frontend\PasswordResetController@Resetresponse')->name('showresponse');

Route::get('/userconfirmPasswordRequest/{token}', 'Frontend\PasswordResetController@showconfirmResetForm')->name('confirmpasswordrequest');
Route::post('/userconfirmPasswordReset', 'Frontend\PasswordResetController@resetPassword')->name('confirmpasswordsuccess');



