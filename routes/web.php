<?php

Route::group(['namespace'=>'Visitor'], function() {
	Route::get('/','VisitorController@index');
	Route::get('/products','VisitorController@products');
	Route::get('/details','VisitorController@details');
	Route::get('/checkout','VisitorController@checkout');
});
