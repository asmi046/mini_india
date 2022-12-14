<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'email',
        'phone',
        'adress',
        'comment',
        'session_id',
        'user_id',
    ];

    public function orderProducts() {
        return $this->belongsToMany(Product::class);
    }
}
