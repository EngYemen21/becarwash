<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;
    protected $fillable=['user_id','car_type','car_plate','car_color' , 'car_model'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
