<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
    	'first_name','last_name','phone','email',
    	'gender','date_of_birth','image','department_id',
    	'province_id','district','location',
    	'created_at','updated_at'
    ];

    public function department(){
    return $this->belongsTo(Department::class);
   }  

    public function province(){
    return $this->belongsTo(Province::class);
   }


   public function attendance(){
    return $this->hasMany(Attendance::class);
   }

    public function contract(){
    return $this->hasMany(Contract::class);
   }

   public function expense(){
    return $this->hasOne(Expense::class);
   }

   public function leave_request(){
    return $this->hasMany(Leave_Request::class);
   }

    public function resign(){
    return $this->hasMany(Resign::class);
   }
    public function project(){
    return $this->hasMany(Project::class);
   }

    public function research(){
    return $this->hasMany(Research::class);
   }

    public function timesheet(){
    return $this->hasMany(Timsheet::class);
   }

    public function user(){
    return $this->hasOne(User::class);
   }     

    
}
