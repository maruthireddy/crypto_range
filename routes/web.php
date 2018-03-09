<?php

require_once('admin.php');

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

Route::get('/','CryptoRangeController@index');

Route::get('/signin','CryptoRangeController@signin');
// Route::get('/referral_signup','CryptoRangeController@signupReferral');

Route::get('/signup','CryptoRangeController@signup');
Route::get('/services','CryptoRangeController@services');
Route::get('/plans','CryptoRangeController@plans');
Route::get('/blog','CryptoRangeController@blog');
Route::get('/mail','CryptoRangeController@mail');
Route::post('/register','BusinessLogicController@register');
Route::post('/login','BusinessLogicController@login');
Route::get('/crypto_range/dashboard','DashboardController@dashboard');
Route::get('/crypto_range/wallet','WalletController@wallet');

Route::post('/crypto_range/estimate_btc_value','DashboardController@estimateBTCValue');
Route::post('/crypto_range/invest','DashboardController@invest');

Route::post('/crypto_range/withdraw','WithdrawController@withdraw');
Route::get('/crypto_range/trading','TradingController@trading');
Route::get('/crypto_range/affiliate','AffiliateController@affiliate');
Route::get('/crypto_range/trading_history','TradingHistoryController@tradingHistory');
Route::get('/crypto_range/update_wallet','WalletController@updateWallet');
Route::get('/crypto_range/support','SupportController@insert');

Route::get('/crypto_range/wallet_withdraw','WithdrawController@walletWithdraw');

Route::get('/crypto_range/dashboard_wallet','DashboardController@dashboardWallet');

Route::get('/forgot_password','BusinessLogicController@forgotPassword');

Route::post('/sendLink','BusinessLogicController@sendLink');

Route::get('/reset_password/{key}','BusinessLogicController@resetPassword');

Route::get('/logout','BusinessLogicController@logout');

Route::get('/email_verification/{key}','BusinessLogicController@emailVerification');

Route::get('/crypto_range/settings','PasswordResetController@settings');

Route::post('/reset_user_password','BusinessLogicController@resetUserPassword');

