<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function replies()
    {
    	return $this->hasMany('App\Reply');
    }
}
