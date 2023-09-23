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
}
