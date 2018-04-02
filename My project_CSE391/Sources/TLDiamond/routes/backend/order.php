<?php 

Route::get('order',[
	'uses' => 'OrderController@index',
	'as' => 'backend.order'
]);

Route::get('order-detail/{id}',[
	'uses' => 'OrderController@detail',
	'as' => 'backend.order-detail'
]);

Route::post('order-detail/{id}',[
	'uses' => 'OrderController@update',
	'as' => 'backend.order-detail'
]); 