<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function visits()
    // {
    // 	return $this->hasMany(Visit::class);
    // }

    // public function analyzes()
    // {
    // 	return $this->hasMany(Analyze::class);
    // }
    // public function reviews()
    // {
    // 	return 
    // }
}
