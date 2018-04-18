<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Working_log extends Model
{
    public function order(){
    	return $this->belongsTo('App\Receipt', 'order_id');
    }
    public function user(){
    	return $this->belongsTo('App\Receipt', 'user_id');
    }
}
