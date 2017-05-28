<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

	public function comments()
	{
		return $this->belongsTo('App\User');
	}
}