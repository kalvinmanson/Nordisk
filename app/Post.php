<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'name', 'picture'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
