<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analyze extends Model
{
    public function visit()
    {
    	return $this->belongsTo(Visit::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
