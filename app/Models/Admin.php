<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    protected $fillable = ['email', 'admin_name', 'password'];
    public $timestamps = false;
    protected $table = 'admins';

    public function getIncome() {
        $invoice = DB::table('invoices')
            ->join('detailed_invoices', 'detailed_invoices.invoice_id', '=', 'invoices.id')
            ->select('price')
            ->where('invoice_status', 3)
            ->orWhere('invoice_status', 2)
            ->whereYear('invoice_date', date('Y'))
            ->whereMonth('invoice_date', date('n'))->get();
         return $invoice;
    }


}
