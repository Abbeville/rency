<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        return view('pages.orders.index', [
            'filters' => Request::all('search', 'role', 'trashed'),
            'orders' => (new Order)
                ->filter(Request::only('search', 'role', 'trashed'))
                ->get()
                ->transform(fn ($order) => [
                    'id' => $order->id,
                    'date' => $order->created_at != null ? $order->created_at->format('Y m d') : null,
                    // 'item_purchased' => $order->type == 'product' ? $order->product->name : $order->service->name,
                    'item_purchased' => '$order->product->name',
                    'customer' => $order->customer()->exists() ? $order->customer->name : null,
                    'quantity' => $order->unit,
                    'total' => $order->amount
                ]),
        ]);
    }

    public function create()
    {

        // return Inertia::render('Products/Create');
        return view('pages.orders.create', [
            'categories' => Category::all(),
            'products' => Product::all(),
            'service' => Service::all(),
            'customers' => Customer::all()
        ]);
    }

    public function store()
    {
        Request::validate([
            'customer_id' => ['required', 'integer'],
            'product_service_id' => ['required', 'integer'],
            'type' => ['required', 'string'],
            'quantity' => ['integer'],
            'order_id' => ['required']
        ]);
        $product_service_id = Request::get('product_service_id');
        $product = Request::get('type') == 'product' ? Product::findOrFail($product_service_id) : Service::findOrFail($product_service_id);
        $quantity = Request::get('quantity');

        Order::create([
            'customer_id' => Request::get('customer_id'),
            'product_service_id' => Request::get('product_service_id'),
            'type' => Request::get('type'),
            'unit' => Request::get('quantity'),
            'amount' => $product->price * $quantity,
            'user_id' => Auth::id(),
            'orderId' => Request::get('order_id')
        ]);

        return Redirect::route('orders')->with('success', 'Order created.');
    }
}
