<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'sku',
        'title',
        'description',
        'price',
        'old_price',
        'seo_title',
        'seo_description'
    ];
}
