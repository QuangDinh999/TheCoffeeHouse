<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailedInvoice extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function index() {
        $detail_invoice = DB::table('drink_sizes')
                        ->join('drinks', 'drinks.id', "=", "drink_sizes.drink_id")
                        ->join('detailed_invoices', 'detailed_invoices.drinksize_id', "=", "drink_sizes.id")
                        ->join('sizes', 'sizes.id', "=", "drink_sizes.size_id")
                        ->where('detailed_invoices.invoice_id', $this->id)->get();
        return $detail_invoice;
    }
}
