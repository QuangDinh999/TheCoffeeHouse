<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function payment() {
        return $this->belongsTo(Payment::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
