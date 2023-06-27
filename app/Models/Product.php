<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const ID = 'id';
    const NAME = 'name';
    const CALORIES = 'calories';
    const PROTEINS = 'proteins';
    const CARBS = 'carbs';
    const LIPIDS = 'lipids';

    protected $fillable = [
        Product::NAME,
        Product::CALORIES,
        Product::PROTEINS,
        Product::CARBS,
        Product::LIPIDS,
    ];

    use HasFactory;
}
