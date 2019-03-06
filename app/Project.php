<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
    	'user_id', 'title', 'content',
    ];

    public function tasks()
    {
    	return $this->hasMany('App\Task');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
