<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'address', 'latitude', 'longitude', 'user_id'
    ];
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
