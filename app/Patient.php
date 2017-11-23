<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function analyzes()
    {
    	return $this->hasMany(Analyze::class);
    }

    public function visits()
    {
    	return $this->hasMany(Visit::class);
    }

    // public function reviews()
    // {
    // 	return 
    // }
}
