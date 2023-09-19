<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Drink extends Model
{
    protected $fillable = ['drink_name', 'image', 'description', 'category_id'];
    public $timestamps;
    use HasFactory;
    public function Category() {
        return $this->belongsTo(Category::class);
    }
    public function drinksize() {
        return $this->hasMany(DrinkSize::class);
    }

    public function store() {
        DB::table('drinks')->insert([
            'drink_name' => $this->drink,
            'image' => $this->image,
            'description' => $this->description,
            'category_id' => $this->category_id
        ]);
    }
}
