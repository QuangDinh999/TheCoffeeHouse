<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drink;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CoffeeHouse extends Controller
{
    public function index() {
        $obj = new \App\Models\CoffeeHouse();
        $drink = $obj->index();
        $category= $obj->category();
        return view('User.index', [
            'drinks' => $drink,
            'categories' => $category
        ]);
    }
    public function drinklist() {
        $obj = new \App\Models\CoffeeHouse();
        $drink = $obj->drinklist();
        $category= $obj->category();
        return view('user.product-list', [
            'drinks' => $drink,
            'categories' => $category
        ]);
    }

    public function search( Request $request) {
        $obj = new \App\Models\CoffeeHouse();
        $obj->search = $request->search_word;
        $search = $obj->search();
        return view('user.search', [
            'searching' => $search
        ]);
    }

    public function category(Request $request){
        $obj = new \App\Models\CoffeeHouse();
        $obj->id = $request->id;
        $category= $obj->categories_list();
        $cate = $obj->category();
        return view('User.categories-list', [
            'category' => $category,
            'categories' => $cate
        ]);
    }

    public function product_detail(Request $request) {
        $obj = new \App\Models\CoffeeHouse();
        $obj->id = $request->id;
        $cate = $obj->category();
        $array = $obj->product_detail();
        return view('User.product-detail', [
            'drinks' => $array['drinks'],
            'price' => $array['price'],
            'drinksizes' => $array['drinksizes'],
            'categories' => $cate
        ]);
    }

    public function add_cart(Request $request) {
        $id = $request->id;
        if(session()->has('cart')){
            $cart = session('cart');
            if(isset($cart[$id])){
                $cart[$id]++;
            }else{
                $cart[$id] = 1;
            }
            session(['cart' => $cart]);
        }else{
            $cart = [];
            $cart[$id] = 1;
            session(['cart' => $cart]);
        }
        return Redirect::route('cart');
    }

    public function cart() {
        $obj = new \App\Models\CoffeeHouse();
        $cart = session('cart');
        $drinks = array();
        $category= $obj->category();
        if (empty(session('cart'))){
            $cart = [];
            session(['cart' => $cart]);
        }else{
            foreach ($cart as $id => $quantity){
                $obj->id = $id;
                $drinkcart = $obj->drinkcart();
                $pricetotal = 0;
                $shipping = 30000;
                foreach ($drinkcart as $drink){
                    $drinks[$id]['drink_name'] = $drink->drink_name;
                    $drinks[$id]['image'] = $drink->image;
                    $drinks[$id]['price'] = $drink->price_each_size;
                    $drinks[$id]['size'] = $drink->size;
                    $drinks[$id]['quantity'] = $quantity;
                    $drinks[$id]['price_subtotal'] = $quantity*$drink->price_each_size;
                    $drinks[$id]['price_total'] = $pricetotal += $drinks[$id]['price_subtotal'];
                }
            }
        }

        return view('User.cart', [
            'categories' => $category,
            'drinks' => $drinks,

        ]);
    }

    public function delete_one(Request $request) {
        $id = $request->id;
        session()->forget('cart.'.$id);
        return Redirect::route('cart');
    }

    public function delete_all() {
        session()->forget('cart');
        $cart = array();
        session(['cart' => $cart]);
        return Redirect::route('cart');
    }
    public function update_cart(Request $request) {
        $item = $request->quantity;
//        dd($item);
        foreach ($item as $id =>$quantity) {
            if($quantity <= 0){

            }else{
                $cart = session('cart');
                $cart[$id] = $quantity;
                session(['cart' => $cart]);
            }
        }
        return Redirect::route('cart');
    }

    public function checkout(Request $request) {
        $obj = new \App\Models\CoffeeHouse();
        $customers = $obj->ID_checkout();
        $category= $obj->category();
        $payment = Payment::all();
        $cart = session('cart');
        $drinks = array();
        foreach ($cart as $drink_id => $quantity){
            $obj->id = $drink_id;
            $drinkcart = $obj->drinkcart();
            $pricetotal = 0;
            $shipping = 30000;
            foreach ($drinkcart as $drink){
                $drinks[$drink_id]['drink_name'] = $drink->drink_name;
                $drinks[$drink_id]['price'] = $drink->price_each_size;
                $drinks[$drink_id]['size'] = $drink->size;
                $drinks[$drink_id]['quantity'] = $quantity;
                $drinks[$drink_id]['price_subtotal'] = $quantity*$drink->price_each_size;
                $drinks[$drink_id]['price_total'] = $pricetotal += $drinks[$drink_id]['price_subtotal'];
            }
        }
        return view('User.checkout', [
            'categories' => $category,
            'payments' => $payment,
            'drinks' => $drinks,
            'customers' => $customers
        ]);
    }

    public function order(Request $request){
        $obj = new \App\Models\CoffeeHouse();
        $obj->payment = $request->payment;
        $obj->name = $request->cus_name;
        $obj->phone = $request->phone;
        $obj->address = $request->address;
        $obj->note = $request->note;
        $obj->customer_id = $request->customer_id;
        $obj->date = date('Y-m-d');
        $obj->order();
        return Redirect::route('CoffeeHouse');
    }

    public function my_account(){
        $obj = new \App\Models\CoffeeHouse();
        $category= $obj->category();
        $order_history = $obj->order_history();
        return view('User.my-account', [
            'categories' => $category,
            'order_history' => $order_history
        ]);
    }
}
