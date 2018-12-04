<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Project_type extends Model
{
	public function project(){
    	return $this->hasMany(Project::class);
    }

  protected $fillable = [
    	'id','project_type_name','created_at','updated_at'
    ];
}
