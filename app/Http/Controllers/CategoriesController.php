<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('pages.categories.index', [
            'filters' => Request::all('search', 'role', 'trashed'),
            'categories' => (new Category())
                ->orderByName()
                ->filter(Request::only('search', 'role', 'trashed'))
                ->get()
                ->transform(fn ($category) => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'type' => $category->type
                ]),
        ]);
    }

    public function create()
    {

        // return Inertia::render('Categories/Create');
        return view('pages.categories.create');
    }

    public function store()
    {
        Request::validate([
            'name' => ['required', 'max:50'],
            'type' => ['required']
        ]);

        Category::create([
            'name' => Request::get('name'),
            'type' => Request::get('type')
        ]);

        return Redirect::route('categories')->with('success', 'Category created.');
    }

    public function edit($category)
    {
        $category = Category::findOrFail($category);
        // return Inertia::render('Categories/Edit', [
        return view('pages.categories.edit', [
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'type' => $category->type
            ],
        ]);
    }

    public function update($category)
    {
        $category = Category::findOrFail($category);
        Request::validate([
            'name' => ['required', 'max:50'],
            'type' => ['required', 'string']
        ]);

        $category->update(Request::only('name', 'type'));

        // return Redirect::back()->with('success', 'Category updated.');
        return Redirect::route('categories')->with('success', 'Category updated.');
    }

    public function destroy($category)
    {
        $category = Category::findOrFail($category);
        $category->delete();

        return Redirect::back()->with('success', 'Category deleted.');
    }

    public function restore($category)
    {
        $category = Category::findOrFail($category);
        $category->restore();

        return Redirect::back()->with('success', 'Category restored.');
    }
}
