<?php 

Route::get('category',[
	'uses' => 'CategoryController@index',
	'as' => 'backend.category'
]);
Route::get('category-create',[
	'uses' => 'CategoryController@create',
	'as' => 'backend.category-create'
]);
Route::post('category-create',[
	'uses' =>'CategoryController@store',
	'as' => 'backend.category-create'
]);
Route::get('category-delete/{id}',[
	'uses' => 'CategoryController@delete',
	'as' => 'backend.category-delete'
]);
 ?> 