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

    public function cart(Request $request) {
        $obj = new \App\Models\CoffeeHouse();
        $id = $request->id;

        $category= $obj->category();

        return view('User.cart', [
            'categories' => $category
        ]);

    }
}
