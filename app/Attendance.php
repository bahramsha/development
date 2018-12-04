<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
 		'emp_id',
 		'start_time',
 		'end_time',
 		'date',
    	'created_at',
    	'updated_at'
    ];


     public function employee(){
    return $this->belongsTo(Employee::class,'emp_id');
   }

     //protected $primaryKey = ['date_year','date_month','date_day'];
    //public $incrementing = false; 
}
