<?php
//referrence https://laravel.com/docs/5.4/eloquent#eloquent-model-conventions
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLectureHomework extends Model
{
    protected $fillable = [
    			'user_id',
    			'lecture_id',
    			'homework_path'
    		];

    public $incrementing 	= false;

    protected $primaryKey 	= ['user_id', 'lecture_id'];

    protected $table 		= 'users_lectures_homework'; 

    public function user() 
    {
    	return $this->belongsTo('App\User');
    } 

}

