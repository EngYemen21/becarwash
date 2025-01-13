<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageService extends Model
{
    //
    protected $table='package_service';
    protected $fillable = ['is_included','service_id','package_id'];
}
