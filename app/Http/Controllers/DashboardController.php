<?php

namespace App\Http\Controllers;

// use Inertia\Inertia;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // return Inertia::render('Dashboard/Index');
        return view('pages.dashboard', [

            'total_sales' => Order::totalSales(),
            'total_costs' => Order::totalPatronage(),
            'product_sold' => count((new Product())->orders),
        ]); 
    }
}
