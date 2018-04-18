<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function dining_table(){
    	return $this->belongsTo('App\Dining_table', 'table_id');
    }
    public function receipts(){
    	return $this->hasMany('App\Receipt', 'receipts_id');
    }
}
