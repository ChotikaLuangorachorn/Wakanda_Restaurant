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

}
