<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drink;
use Illuminate\Http\Request;

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
        return view('user.product-list', [
            'drinks' => $drink
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
        $obj = new \App\Models\CoffeeHouse();
        $category= $obj->category();
        $drinks = array();
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

        foreach ($cart as $id => $quantity){
            $obj->id = $id;
            $drinkcart = $obj->drinkcart();
            foreach ($drinkcart as $drink){
                $drinks[$id]['drink_name'] = $drink->drink_name;
                $drinks[$id]['image'] = $drink->image;
                $drinks[$id]['price'] = $drink->price_each_size;
                $drinks[$id]['size'] = $drink->size;
                $drinks[$id]['quantity'] = $quantity;
            }
        }
        return view('User.cart', [
            'categories' => $category,
            'drinks' => $drinks
        ]);
    }

//    public function cart() {
//        $cart = session('cart');
//        $drinks = array();
//        $obj = new \App\Models\CoffeeHouse();
//        foreach ($cart as $id => $quantity){
//            $obj->id = $id;
//            $drinkcart = $obj->drinkcart();
//            foreach ($drinkcart as $drink){
//                $drinks[$id]['drink_name'] = $drink->drink_name;
//                $drinks[$id]['image'] = $drink->image;
//                $drinks[$id]['price'] = $drink->price_each_size;
//                $drinks[$id]['quantity'] = $quantity;
//            }
//        }
//        return view('User.cart', [
//            $drinks
//        ]);
//    }
}
