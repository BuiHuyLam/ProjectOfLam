<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
    	'cus_id','amount','status','full_name','address','email','phone','note','receiver_name','receiver_phone','receiver_add'

    ];
    public function details()
    {
    	return $this->hasMany('App\Models\OrdeDetail','order_id','id');
    }
}
