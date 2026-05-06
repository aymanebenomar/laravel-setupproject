<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	// Columns that allow us to Add and Update and they are Modifiable
	protected $fillable = [
		'title',
		'body',
		'published', 
		'user_id',
	];


	// Cast these Colomns to PHP Types
	protected $casts = [
		'published' => 'boolean'
	];

	public function users()
	{
		return $this->belongsTo(User::class);
	}

}
