<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
    	'emp_id',
    	'projcect_code',
    	'item_name',
    	'expense_date',
    	'qty',
    	'price',
    	'description',
      'currency',
    	'created_at',
    	'updated_at'
    ];

       public function employee(){
    return $this->belongsTo(Employee::class,'emp_id');
   } 

      public function project(){
    return $this->belongsTo(Project::class);
   } 

   protected $primaryKey = ['emp_id','projcect_code'];
    public $incrementing = false;
}
