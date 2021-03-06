<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }

    public function asks()
    {
        return $this->hasMany('App\Ask');
    }

    public function role()
    {
        return $this->hasOne('App\Role');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function adminwrites()
    {
        return $this->hasMany('App\AdminPost');
    }
}
