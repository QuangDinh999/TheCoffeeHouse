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
}
