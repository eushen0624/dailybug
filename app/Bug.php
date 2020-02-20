<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
  	public function category(){
  		return $this->belongsTo("\App\Category");
  	}

  	public function status(){
  		return $this->belongsTo('\App\Status');
  	}

  	public function user(){
  		return $this->belongsTo('\App\User');
  	}
}
