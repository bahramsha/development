<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Leave_request extends Model
{
    protected $fillable = [
    	'emp_id',
    	'request_date',
    	'date_start',
    	'date_end',
    	'reason',
    	'approve',
    	'created_at',
    	'updated_at'
    ];


    public function employee(){
    return $this->belongsTo(Employee::class,'emp_id');
   } 
}
