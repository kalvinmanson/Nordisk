<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['user_id', 'name', 'picture', 'startdate', 'enddate', 'content', 'rank'];
    protected $dates = ['startdate', 'enddate'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
