<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable=['status','appointment_id'];
    protected $table='tasks';
    public function appointment(){
        return $this->belongsTo(Appointment::class);

    }
}
