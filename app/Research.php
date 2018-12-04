<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
     protected $fillable = [
    	'emp_id',
    	'rpt_dari',
    	'rpt_pashto',
    	'rpt_english',
    	'researche_date',
    	'created_at',
    	'updated_at'
    ];

  public function employee(){
    return $this->belongsTo(Employee::class);
   } 
}
