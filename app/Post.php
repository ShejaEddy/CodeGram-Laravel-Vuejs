<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	Protected $guarded = [];
	
    Public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
