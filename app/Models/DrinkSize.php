<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkSize extends Model
{
    protected $fillable = ['price_each_size', 'size_id', 'drink_id'];
    public $timestamps = false;
    use HasFactory;
    public function drink() {
        return $this->belongsTo(Drink::class);
    }
    public function size() {
        return $this->belongsTo(Size::class);
    }



}
