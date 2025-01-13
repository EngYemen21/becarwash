<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table='payments';
    protected $fillable = ['amount' , 'package_id','appointment_id','currency', 'method' ,  'invoice_id',
    'invoice_pdf_url','status','transaction_id' ,'transactions_data'];
    protected $casts = [
        'transactions_data' => 'json',
    ];
    public function package(){
        return $this->belongsTo(Package::class);

    }
      public function appointment(){
        return $this->belongsTo(Appointment::class);

    }
    public function getTotalPaidAttripute() {
        return $this->payments->sum('amount');

    }



}
