<?php 
Route::get('user/{groups}',[
	'uses' => 'UserController@index',
	'as' => 'backend.user'
]);

Route::get('user-create',[
	'uses' => 'UserController@create',
	'as' => 'backend.user-create'
]);
Route::post('user-create',[
	'uses' =>'UserController@store',
	'as' => 'backend.user-create'
]);

Route::get('user-delete/{id}',[
	'uses' => 'UserController@destroy',
	'as' => 'backend.user-delete'
]);
//Route::get('user','UserController@add')->name('backend.user') Giống trên

 ?>