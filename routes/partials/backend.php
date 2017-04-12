<?php

Route::get('/panel-administrativo', 'Backend\DashboardController@index')->name('dashboard');
Route::resource('posts', 'Backend\PostController');
Route::get('/editar-perfil', 'Backend\UserController@edit')->name('profile');
Route::put('/editar-perfil', 'Backend\UserController@update')->name('updateProfile');
Route::get('/twitter/{id}', 'Backend\TwitterController@hideTweet')->name('twitter');