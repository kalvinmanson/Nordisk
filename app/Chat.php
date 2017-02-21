<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['user_id', 'user_on', 'name'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function useron()
	{
	    return $this->belongsTo('App\User', 'user_on');
	}
}
