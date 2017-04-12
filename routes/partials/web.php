<?php

Route::get('/', 'WebController@home')->name('home');
Route::get('/articulo/{slug}', 'WebController@post')->name('post');
Route::get('/autor/{slug}', 'WebController@author')->name('author');
