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

use App\Company;

Route::get('/', function () {
    $posts = \App\Post::all();
    return view('welcome',compact('posts'));
});

Auth::routes();




Route::group(['middleware'=>['user']],function () {
    Route::resource('/user', 'UserController');
    Route::get('/home', 'HomeController@index')->name('home');
});


Route::group(['middleware'=>['admin']],function (){

    Route::get('company/home', 'CompanyController@index')->name('company.home');

    Route::resource('company/post', 'PostController');



});

Route::get('company/login','Company\LoginController@showLoginForm')->name('company.login');
Route::POST('company/login','Company\LoginController@login');
Route::GET('company-password/confirm','Auth\ConfirmPasswordController@showConfirmForm')->name('company.password.confirm');
Route::POST('company-password/confirm','Auth\ConfirmPasswordController@confirm');
Route::POST('company-password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('company.password.email');
Route::GET('company-password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('company.password.request');
Route::POST('company-password/reset','Auth\ResetPasswordController@reset')->name('company.password.update');
Route::GET('company/register','Company\RegisterController@showRegistrationForm')->name('company.register');
Route::POST('company/register','Company\RegisterController@register');
































////Route::get('company', 'CompanyController@showLoginForm')->name('company.login');
//Route::post('company', 'CompanyController@login');
//Route::post('company-password/email', 'Company\ForgotPasswordController@sendResetLinkEmail')->name('company.password.email');
//Route::post('company-password/reset', 'Company\ForgotPasswordController@showLinkRequestForm')->name('company.password.request');
//Route::post('company-password/reset', 'Company\ResetPasswordController@reset');
//Route::post('company-password/reset/{token}', 'Company\ResetPasswordController@showResetForm')->name('company.password.reset');






//Rout::post('logout', 'Auth\LoginController@logout')->name('logout');
//
//// Registration Routes...
//Rout::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Rout::post('register', 'Auth\RegisterController@register');
//
//// Password Reset Routes...




