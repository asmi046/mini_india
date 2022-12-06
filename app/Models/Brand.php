<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;

class Brand extends Model
{
    use HasFactory;
    use AsSource;

    public $fillable = [
        'img',
        'slug',
        'title',
        'description'
    ];
}
