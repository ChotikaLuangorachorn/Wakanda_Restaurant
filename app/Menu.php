<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function category(){
    	return $this->belongsTo('App\Category', 'category_id');
    }
    public function orders(){
    	return $this->hasMany('App\Order', 'menu_id');
    }
}
