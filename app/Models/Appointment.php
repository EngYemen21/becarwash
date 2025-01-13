<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table='appointments';
    protected $fillable = ['user_id' ,'status','location_id', 'car_id' ,'package_id', 'appointment_date', 'appointment_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }
    
    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
