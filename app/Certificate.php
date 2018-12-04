<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
    	'cso_name',
    	'address',
    	'website',
    	'email',
    	'document',
    	'created_at',
    	'updated_at'
    ];
}
