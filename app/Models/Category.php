<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Illuminate\Support\Str;

use Orchid\Filters\Filterable;

class Category extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    public $fillable = [
        'parent',
        'title',
        'slug',
        'description',
        'img',
        'seo_title',
        'seo_description',
    ];

    protected $allowedSorts = [
        'id',
        'title'
    ];

    protected $allowedFilters = [
        'id',
        'title'
    ];

    public function setSlugAttribute($value)
    {
        if (empty($value))
            $this->attributes['slug'] =  Str::slug($this->title);
        else
            $this->attributes['slug'] =  $value;
    }

    public function category_tovars() {
        return $this->belongsToMany(Product::class);
    }
}
