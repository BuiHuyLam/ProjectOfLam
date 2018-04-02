<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
  	protected  $table = 'contact';

    protected $fillable = [
    	'name','email','phone','content'
    ];
}
