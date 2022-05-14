<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['orderId', 'user_id', 'product_service_id', 'customer_id', 'type', 'unit', 'amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_service_id')->where('type', 'product');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'product_service_id')->where('type', 'service');
    }
}
