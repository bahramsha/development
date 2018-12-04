<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class user_level extends Model
{
     protected $fillable = [
    	'role',
    	'created_at',
    	'updated_at'
    ];

     public function user_level(){
    return $this->belongsTo(User::class);
   } 

}
