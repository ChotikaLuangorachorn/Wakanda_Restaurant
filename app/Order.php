<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function menus(){
    	return $this->belongsTo('App\Menu', 'menu_id');
    }
    public function receipt(){
    	return $this->belongsTo('App\Receipt', 'receipt_id');
    }
    public function orders(){
    	return $this->hasMany('App\Order', 'order_id');
    }
}
