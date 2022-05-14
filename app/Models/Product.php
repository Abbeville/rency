<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'price', 'stock'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_service_id')->where('type', 'product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
