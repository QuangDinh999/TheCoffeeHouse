<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['payment_name'];

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
}
