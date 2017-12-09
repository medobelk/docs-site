<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
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

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function analyzes()
    {
        return $this->hasMany(Analyze::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
