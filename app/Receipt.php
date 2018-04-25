<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function dining_table(){
    	return $this->belongsTo('App\Dining_table', 'table_id');
    }
    public function orders(){
    	return $this->hasMany('App\Order', 'receipt_id');
    }
}
