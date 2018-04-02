<?php 

Route::get('contact',[
	'uses' => 'ContactController@index',
	'as' => 'backend.contact'
]);

 ?>