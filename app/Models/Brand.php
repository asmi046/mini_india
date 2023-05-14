<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    public $fillable = [
        'img',
        'slug',
        'title',
        'description',
        'seo_title',
        'seo_description',
    ];

    protected $allowedSorts = [
        'title'
    ];

    protected $allowedFilters = [
        'title'
    ];

    public function setSlugAttribute($value)
    {
        if (empty($value))
            $this->attributes['slug'] =  Str::slug($this->title);
        else
            $this->attributes['slug'] =  $value;
    }
}
