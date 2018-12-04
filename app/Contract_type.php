<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Contract_type extends Model
{

	 public function contract(){
    return $this->hasMany(Contract::class);
   }

    protected $fillable = [
    	'id','contract_type_name','created_at','updated_at'
    ];
}
