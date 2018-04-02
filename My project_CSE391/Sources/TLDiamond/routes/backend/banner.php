<?php 

Route::get('banner',[
	'uses' => 'BannerController@index',
	'as' => 'backend.banner'
]);

Route::get('banner-create',[
	'uses' => 'BannerController@create',
	'as' => 'backend.banner-create'
]);

Route::post('banner-create',[
	'uses' => 'BannerController@store',
	'as' => 'backend.banner-create'
]);

 ?>