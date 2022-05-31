<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class ProductsController extends Controller
{
    public function index()
    {
        return view('pages.products.index', [
            'filters' => Request::all('search', 'role', 'trashed'),
            'products' => Product::with('category')
                ->orderByName()
                ->filter(Request::only('search', 'role', 'trashed'))
                ->get()
                ->transform(fn ($product) => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'code' => $product->code,
                    'image' => $product->image ? URL::route('image', ['path' => $product->image, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
                    'category' => $product->category->name,
                    'price' => $product->price,
                    'inStock' => $product->stock,
                    'description' => $product->description
                ]),
        ]);
    }

    public function create()
    {

        // return Inertia::render('Products/Create');
        return view('pages.products.create', [
            'categories' => Category::where('type', 'product')->get()
        ]);
    }

    public function store()
    {
        Request::validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'stock' => ['integer']
        ]);

        Product::create([
            'name' => Request::get('name'),
            'code' => Request::get('code'),
            'stock' => Request::get('stock'),
            'price' => Request::get('price'),
            'description' => Request::get('description'),
            'category_id' => Request::get('category_id'),
            'image' => Request::file('image') ? Request::file('image')->store('products') : null,
        ]);

        return Redirect::route('products')->with('success', 'Product created.');
    }

    public function edit($product)
    {
        $product = Product::findOrFail($product);
        // return Inertia::render('Products/Edit', [
        return view('pages.products.edit', [
            'categories' => Category::where('type', 'product')->get(),
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'stock' => $product->stock,
                'code' => $product->code,
                'description' => $product->description,
                'category_id' => $product->category_id,
                'image' => $product->image ? URL::route('image', ['path' => $product->image, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
            ],
        ]);
    }

    public function update($product)
    {
        $product = Product::findOrFail($product);
        Request::validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'integer'],
            'stock' => ['nullable']
        ]);

        $product->update(Request::only('name', 'price', 'stock','description','code','category_id'));
        if (Request::file('image')) {
            $product->update(['image' => Request::file('image')->store('products')]);
        }

        // return Redirect::back()->with('success', 'Product updated.');
        return Redirect::route('products')->with('success', 'Product updated.');
    }

    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();

        return Redirect::back()->with('success', 'Product deleted.');
    }

    public function restore($product)
    {
        $product = Product::findOrFail($product);
        $product->restore();

        return Redirect::back()->with('success', 'Product restored.');
    }
}
