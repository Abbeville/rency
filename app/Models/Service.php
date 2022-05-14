<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'price'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_service_id')->where('type', 'service');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
