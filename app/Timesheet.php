<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $fillable = [
    	'project_code',
    	'emp_id',
    	'task',
    	'timesheet_date',
    	'created_at',
    	'updated_at'
    ];

      public function employee(){
    return $this->belongsTo(Employee::class,'emp_id');
   } 

   public function project(){
    return $this->belongsTo(Project::class);
   }
}
