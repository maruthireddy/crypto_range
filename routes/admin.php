<?php

Route::post('/admin/login','Admin\AdminController@login');

Route::get('/admin/dashboard','Admin\AdminController@dashboard');

Route::get('admin/investmentLogs','Admin\AdminController@investmentLogs');

Route::get('admin/withdrawLogs','Admin\AdminController@withdrawLogs');

Route::get('admin/dailyTransactionLogs','Admin\AdminController@dailyTransactionLogs');

Route::get('admin/userLogs','Admin\AdminController@userLogs');

Route::get('/admin/referralLogs','Admin\AdminController@referralLogs');

Route::get('/admin/transctions','Admin\DaliyTransactionsController@dailyTransaction');

Route::get('/admin','Admin\AdminController@index');

Route::get('/admin/profit','Admin\DaliyTransactionsController@profit');