<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected  $table = 'products';

    protected $fillable = [
    	'name','images','images_hover1','images_hover2','images_hover3','images_hover4','cat_id','content','price','price_sale','status','slug'
    ];
}
