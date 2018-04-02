<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class statuspro extends Model
{
    protected  $table = 'statuspro';

    protected $fillable = [
    	'name_pro','id_status'
    ];
}
