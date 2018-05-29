<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function bookmarks()
    {
    	return $this->hasMany('App\Bookmark');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
