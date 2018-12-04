<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
     public function employee(){
    	return $this->hasMany(Employee::class);
    }

     protected $fillable = [
    	'id','province_name','created_at','updated_at'
    ];
}
