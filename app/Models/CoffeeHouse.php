<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CoffeeHouse extends Model
{
    use HasFactory;
    public function index() {
        $drink = DB::table('drinks')->limit(8)->get();
        return $drink;
    }
}
