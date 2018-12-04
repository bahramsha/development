<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

	 public function employee(){
   	return $this->hasMany(Employee::class);
   }


    protected $fillable = [
    	'id','name','created_at','updated_at'
    ];
}
