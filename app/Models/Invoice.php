<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['invoice_date', 'invoice_status', 'invoice_type', 'customer_name', 'address', 'customer_id', 'admin_id', 'payment_id'];
    public function payment() {
        return $this->belongsTo(Payment::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
