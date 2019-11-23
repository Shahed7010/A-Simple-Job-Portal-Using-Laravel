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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('company/home', 'CompanyController@index')->name('company.home');


Route::get('company/login','Company\LoginController@showLoginForm')->name('company.login');
Route::POST('company/login','Company\LoginController@login');
Route::GET('company-password/confirm','Company\ConfirmPasswordController@showConfirmForm')->name('company.password.confirm');
Route::POST('company-password/confirm','Company\ConfirmPasswordController@confirm');
Route::POST('company-password/email','Company\ForgotPasswordController@sendResetLinkEmail')->name('company.password.email');
Route::GET('company-password/reset','Company\ForgotPasswordController@showLinkRequestForm')->name('company.password.request');
Route::POST('company-password/reset','Company\ResetPasswordController@reset')->name('company.password.update');

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




