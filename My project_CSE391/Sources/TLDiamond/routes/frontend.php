<?php
Route::get('/',[
	'uses' => 'FrontendController@index',
	'as' => 'home'
]);

Route::get('san-pham/{slug}',[
	'uses' => 'FrontendController@product',
	'as' => 'san-pham'
]);

Route::get('danh-muc/{id}',[
	'uses' => 'FrontendController@category',
	'as' => 'danh-muc'
]);
 
Route::get('danh-muc-chinh/{id}',[
	'uses' => 'FrontendController@categoryParent',
	'as' => 'danh-muc-chinh'
]);



Route::get('gioi-thieu',[
	'uses' => 'FrontendController@about',
	'as' => 'gioi-thieu'
]);

Route::get('lien-he',[
	'uses' => 'FrontendController@contact',
	'as' => 'lien-he'
]);

Route::post('lien-he',[
	'uses' => 'FrontendController@postContact',
	'as' => 'lien-he'
]);

Route::get('khuyen-mai',[
	'uses' => 'FrontendController@sale',
	'as' => 'khuyen-mai'
]);

Route::get('add-cart/{id}',[
	'uses'=> 'FrontendController@add_cart',
	'as' => 'add-cart'
]);

Route::get('add-cart-quick/{id}',[
	'uses'=> 'FrontendController@add_cart_quick',
	'as' => 'add-cart-quick'
]);

Route::get('view-cart',[
	'uses'=> 'FrontendController@view_cart',
	'as' => 'view-cart'
]);

Route::get('remove/{id}',[
	'uses'=> 'FrontendController@remove',
	'as' => 'remove'
]);
Route::get('clear',[
	'uses'=> 'FrontendController@clear',
	'as' => 'clear'
]);
Route::get('update/{id?}/{quantity?}',[
	'uses'=> 'FrontendController@update',
	'as' => 'update'
]);

// order
Route::get('order',[
	'uses'=> 'FrontendController@order',
	'as' => 'order'
]);
Route::post('order',[
	'uses'=> 'FrontendController@post_order',
	'as' => 'order'
]);

Route::get('history-order',[
	'uses'=> 'FrontendController@history_order',
	'as' => 'history-order'
]);

Route::get('history-delete/{id}',[
	'uses'=> 'FrontendController@history_delete',
	'as' => 'history-delete'
]);
// Login
Route::get('home-login',[
	'uses' => 'FrontendController@login',
	'as' => 'home-login'
]);

Route::post('home-login',[
	'uses' => 'FrontendController@post_login',
	'as' => 'home-login'
]);

Route::get('home-logout',[
	'uses' => 'FrontendController@logout',
	'as' => 'home-logout'
]);
// Đăg ký

Route::get('registrater',[
	'uses' => 'FrontendController@registrater',
	'as' => 'registrater'
]);
 Route::post('registrater',[
	'uses' => 'FrontendController@post_registrater',
	'as' => 'registrater'
]);

Route::get('error',[
	'uses' => 'FrontendController@error',
	'as' => 'error'
]);

 Route::get('seach-pro',[
	'uses' => 'FrontendController@search_pro',
	'as' => 'seach-pro'
]);
 ?> 