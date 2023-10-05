<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CoffeeHouse extends Model
{
    use HasFactory;
    public function index() {
        $drink = DB::table('drinks')
        ->join('drink_sizes', 'drinks.id', "=", "drink_sizes.drink_id")
            ->where('size_id','=', 1)->limit(8)->get();
        return $drink;
    }

    public function drinklist() {
        $drink = DB::table('drinks')
            ->join('drink_sizes', 'drinks.id', "=", "drink_sizes.drink_id")
            ->where('size_id','=', 1)->get();
        return $drink;
    }

    public function search() {
        $searh =  DB::table('drinks')
            ->join('drink_sizes', 'drinks.id', "=", "drink_sizes.drink_id")
            ->Where('drink_name', 'LIKE', '%'.$this->search.'%')
            ->Where('size_id','=', 1)->get();
        return $searh;
    }

    public function category() {
        $category = DB::table('categories')->get();
        return $category;
    }

    public function categories_list() {
        $category = DB::table('drinks')
            ->join('drink_sizes', 'drinks.id', "=", "drink_sizes.drink_id")
            ->where('category_id', $this->id)->Where('size_id','=', 1)->get();
        return $category;
    }

    public function product_detail() {
        $drink = DB::table('drinks')
                ->where('id', $this->id)->get();
        $price = DB::table('drink_sizes')->where('drink_id', $this->id)
                    ->Where('size_id','=', 1)->get();
        $drinksize = DB::table('sizes')
            ->join('drink_sizes', 'sizes.id', "=", "drink_sizes.size_id")
            ->where('drink_id', $this->id)->get();
        $array = [];
        $array['drinks'] = $drink;
        $array['price'] = $price;
        $array['drinksizes'] = $drinksize;
        return $array;
    }

    public function drinkcart() {
        $drinkcart = DB::table('drink_sizes')
                ->join('drinks', 'drink_sizes.drink_id', "=", "drinks.id")
                ->join('sizes', 'drink_sizes.size_id', "=", "sizes.id")
                ->where('drink_sizes.id', $this->id)->get();
        return $drinkcart;
    }

    public function ID_checkout() {
        $email = session('customer.email');
        $customer_id = DB::table('customers')
                    ->where('email', $email)
                    ->select('cus_name', 'phone', 'address','id')->get();
        return $customer_id;
    }

    public function order() {
        DB::table('invoices')->insert([
            'invoice_date' => $this->date,
            'invoice_status' => 0,
            'invoice_type' => 0,
            'invoice_note' => $this->note,
            'customer_name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'customer_id' => $this->customer_id,
            'admin_id' => 4,
            'payment_id' => $this->payment
        ]);

        $invoice_id = DB::table('invoices')->where('customer_id', $this->customer_id)->max('id');
        $cart = session('cart');
        foreach ($cart as $id => $quantity){
            $price = DB::table('drink_sizes')->select('price_each_size')->where('id', $id)->get();

            $total_price = $price[0]->price_each_size*$quantity;
            DB::table('detailed_invoices')->insert([
                'drinksize_id' => $id,
                'invoice_id' => $invoice_id,
                'quantity' => $quantity,
                'price' => $total_price
            ]);
        }
        Session::forget('cart');
    }
}
