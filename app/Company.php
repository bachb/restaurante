<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Accessors
    public function getUrlAttribute()
    {
    	if(substr($this->logo, 0, 4) === "http") {
    		return $this->logo;
    	}
    	return '/images/company/' . $this->logo;
    }

}
