<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Resign extends Model
{

	  public function employee(){
    return $this->belongsTo(Employee::class,'emp_id');
   } 
   protected $fillable = [
    	'id','emp_id','resign_date','reason','created_at','updated_at'
    ];
}
