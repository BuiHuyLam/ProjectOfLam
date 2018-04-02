<?php 

Route::get('/',[
	'uses' => 'HomeController@index',
	'as' => 'backend.index'
]);


 ?>