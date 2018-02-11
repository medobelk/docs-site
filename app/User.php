<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MailResetPasswordToken;

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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function anonimrequests()
    {
        return $this->hasMany(AnonimRequest::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
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

    public function data($id)
    {   
        return new UserData($this->where('id', $id));
    }
}
