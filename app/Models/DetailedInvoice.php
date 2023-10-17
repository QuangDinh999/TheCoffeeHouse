<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function store() {
        if (session()->has('invoice')){
            $admin_id = DB::table('admins')->where('email', session('admin.email'))->select('id')->get();
            DB::table('invoices')->insert([
                'invoice_date' => $this->date,
                'invoice_status' => 3,
                'invoice_type' => 1,
                'customer_name' => $this->name,
                'address' => $this->address,
                'customer_id' => 12,
                'admin_id' => $admin_id[0]->id,
                'payment_id' => $this->payment
            ]);

            $invoice_id = DB::table('invoices')->where('customer_id', 12)->max('id');
            $invoice = session('invoice');
            foreach ($invoice as $id => $quantity){
                $price = DB::table('drink_sizes')->select('price_each_size')->where('id', $id)->get();

                $total_price = $price[0]->price_each_size*$quantity;
                DB::table('detailed_invoices')->insert([
                    'drinksize_id' => $id,
                    'invoice_id' => $invoice_id,
                    'quantity' => $quantity,
                    'price' => $total_price
                ]);
            }
            Session::forget('invoice');
            return 1;
        }else{
            return 2;
        }
    }

    public function drinkcart() {
        $drinkcart = DB::table('drink_sizes')
            ->join('drinks', 'drink_sizes.drink_id', "=", "drinks.id")
            ->join('sizes', 'drink_sizes.size_id', "=", "sizes.id")
            ->where('drink_sizes.id', $this->id)->get();
        return $drinkcart;
    }
}
