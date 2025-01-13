<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $fillable = ['name', 'price'];

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('is_included');
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);

    }
}
