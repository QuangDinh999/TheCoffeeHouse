<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    public $timestamps = false;
    protected $fillable = ['cus_name', 'email', 'password', 'phone', 'address'];
    protected $table = 'customers';

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
}
