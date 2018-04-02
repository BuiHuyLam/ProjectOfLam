<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected  $table = 'customer';

    protected $fillable = [
    	'username','password','full_name','email','phone','address','status'
    ];
}
