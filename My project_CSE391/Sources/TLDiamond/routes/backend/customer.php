<?php 
Route::get('customer',[
	'uses' => 'CustomerController@index',
	'as' => 'backend.customer'
]);
Route::get('customer-create',[
	'uses' => 'CustomerController@create',
	'as' => 'backend.customer-create'
]);
Route::post('customer-create',[
	'uses' =>'CustomerController@store',
	'as' => 'backend.customer-create'
]);
 ?>