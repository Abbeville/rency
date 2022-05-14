<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index()
    {
        return Inertia::render('Products/Index', [
            'filters' => Request::all('search', 'role', 'trashed'),
            'products' => Product::with('category')
                ->orderByName()
                ->filter(Request::only('search', 'role', 'trashed'))
                ->get()
                ->transform(fn ($product) => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'inStock' => $product->stock
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store()
    {
        Request::validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'integer'],
            'category_id' => ['required']
        ]);

        Product::create([
            'name' => Request::get('name'),
            'price' => Request::get('price'),
            'category_id' => Request::get('category_id')
        ]);

        return Redirect::route('products')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'customer' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'stock' => $product->stock
            ],
        ]);
    }

    public function update(Product $product)
    {
        Request::validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'integer'],
            'stock' => ['nullable']
        ]);

        $product->update(Request::only('name', 'price', 'stock'));

        return Redirect::back()->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::back()->with('success', 'Product deleted.');
    }

    public function restore(Product $product)
    {
        $product->restore();

        return Redirect::back()->with('success', 'Product restored.');
    }
}
