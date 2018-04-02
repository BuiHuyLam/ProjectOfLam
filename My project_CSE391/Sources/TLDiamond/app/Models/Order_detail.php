<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
     protected  $table = 'order_detail';

    public $timestamps = false;

    protected $fillable = [
    	'order_id','pro_id','quantity','price'
    ];

    public function pro(){
    	return $this->hasOne('\App\Models\Product','id','pro_id');
    }
}
