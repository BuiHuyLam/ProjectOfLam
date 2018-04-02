<?php 
Route::get('products',[
	'uses' => 'ProductController@index',
	'as' => 'backend.products'
]);

Route::get('products-edit/{id}',[
	'uses' => 'ProductController@edit',
	'as' => 'backend.products-edit'
]);

Route::post('products-edit/{id}',[
	'uses' => 'ProductController@update',
	'as' => 'backend.products-edit'
]);

Route::get('products-create',[
	'uses' => 'ProductController@create',
	'as' => 'backend.products-create'
]);
Route::post('products-create',[
	'uses' =>'ProductController@store',
	'as' => 'backend.products-create'
]);

Route::get('products-delete/{id}',[
	'uses' => 'ProductController@delete',
	'as' => 'backend.products-delete'
]);
 ?>