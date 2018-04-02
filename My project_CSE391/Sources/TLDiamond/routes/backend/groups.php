<?php 
Route::get('groups',[
	'uses' => 'GroupController@index',
	'as' => 'backend.groups'
]);
Route::get('groups-create',[
	'uses' => 'GroupController@create',
	'as' => 'backend.groups-create'
]);
Route::post('groups-create',[
	'uses' =>'GroupController@store',
	'as' => 'backend.groups-create'
]);
 ?>