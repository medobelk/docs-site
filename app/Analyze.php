<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analyze extends Model
{
    public function patient()
    {
    	return $this->belongsTo(Patient::class);
    }
}
