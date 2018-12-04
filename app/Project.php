<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function project_type(){
    return $this->belongsTo(Project_type::class);
   }

   public function timesheet(){
    return $this->hasMany(Timesheet::class);
   }
     public function expense(){
    return $this->hasMany(Expense::class);
   }

   ////relation between expense,emp,project ??///////////

    protected $fillable = [
    	'project_code',
    	'project_name',
    	'project_type_id',
    	'donar_name',
    	'start_date',
    	'end_date',
    	'project_cost',
    	'currency',
    	'created_at',
    	'updated_at'
    ];

    protected $primaryKey = ('project_code');
    public $incrementing = false;
}
