<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function analyzes()
    {
    	return $this->hasMany(Analyze::class);
    }
}
