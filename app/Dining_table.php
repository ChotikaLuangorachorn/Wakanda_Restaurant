<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dining_table extends Model
{
    public function receipts(){
    	return $this->hasMany('App\Receipt', 'table_id');
    }
}
