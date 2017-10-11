<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = ['name', 'hasHomework', 'start_date', 'end_date', 'course_id'];

    public function course()
    {
    	return $this->belongsTo('App\Course');
    }
}
