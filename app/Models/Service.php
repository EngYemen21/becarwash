<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    // protected $fillable=['description','amount' ,'type_service' ,'user_id'];

    protected $fillable = ['name'];

    public function packages()
    {
        return $this->belongsToMany(Package::class)->withPivot('is_included');
    }
    public function user(){
        return $this->belongsTo(User::class ,'user_id');
    }
  
}
