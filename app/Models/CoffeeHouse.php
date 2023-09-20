<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CoffeeHouse extends Model
{
    use HasFactory;
    public function index() {
        $drink = DB::table('drinks')
        ->join('drink_sizes', 'drinks.id', "=", "drink_sizes.drink_id")
            ->where('size_id','=', 1)->orwhere('size_id', '=', 5)->limit('8')->get();
        return $drink;
    }

    public function drinklist() {
        $drink = DB::table('drinks')
            ->join('drink_sizes', 'drinks.id', "=", "drink_sizes.drink_id")
            ->where('size_id','=', 1)->orwhere('size_id', '=', 5)->get();
        return $drink;
    }

    public function search() {
        $searh =  DB::table('drinks')
            ->join('drink_sizes', 'drinks.id', "=", "drink_sizes.drink_id")
            ->Where('drink_name', 'LIKE', '%'.$this->search.'%')
            ->Where('size_id','=', 1)->get();
        return $searh;
    }
}
