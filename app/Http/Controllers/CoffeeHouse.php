<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class CoffeeHouse extends Controller
{
    public function index() {
        $obj = new \App\Models\CoffeeHouse();
        $drink = $obj->index();
        return view('User.index', [
            'drinks' => $drink
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
}
