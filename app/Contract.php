<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
     	'emp_id',
     	'start_date',
     	'end_date',
     	'contract_type_name',
     	'position',
     	'gross_salary',
     	'currency',
		'created_at',
		'updated_at'
    ];

       public function employee(){

    return $this->belongsTo(Employee::class,'emp_id');
   } 

     public function contract_type(){

    return $this->belongsTo(Contract_type::class,'id');
   } 
}
