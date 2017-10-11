<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     protected $fillable = [
        'name', 'duration', 'description',
    ];

    public function lectures()
    {
    	return $this->hasMany('App\Lecture');
    }
}
