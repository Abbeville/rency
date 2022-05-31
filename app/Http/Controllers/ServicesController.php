<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class ServicesController extends Controller
{
    public function index()
    {
        return view('pages.services.index', [
            'filters' => Request::all('search', 'role', 'trashed'),
            'services' => Service::with('category')
                ->orderByName()
                ->filter(Request::only('search', 'role', 'trashed'))
                ->get()
                ->transform(fn ($service) => [
                    'id' => $service->id,
                    'name' => $service->name,
                    'code' => $service->code,
                    'image' => $service->image ? URL::route('image', ['path' => $service->image, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
                    'category' => $service->category->name,
                    'price' => $service->price,
                    'inStock' => $service->stock,
                    'description' => $service->description
                ]),
        ]);
    }

    public function create()
    {

        // return Inertia::render('Services/Create');
        return view('pages.services.create', [
            'categories' => Category::where('type', 'service')->get()
        ]);
    }

    public function store()
    {
        Request::validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'integer'],
            'category_id' => ['required', 'integer']
        ]);

        Service::create([
            'name' => Request::get('name'),
            'code' => Request::get('code'),
            'price' => Request::get('price'),
            'description' => Request::get('description'),
            'category_id' => Request::get('category_id'),
            'image' => Request::file('image') ? Request::file('image')->store('services') : null,
        ]);

        return Redirect::route('services')->with('success', 'Service created.');
    }

    public function edit($service)
    {
        $service = Service::findOrFail($service);
        // return Inertia::render('Services/Edit', [
        return view('pages.services.edit', [
            'categories' => Category::where('type', 'service')->get(),
            'service' => [
                'id' => $service->id,
                'name' => $service->name,
                'price' => $service->price,
                'code' => $service->code,
                'description' => $service->description,
                'category_id' => $service->category_id,
                'image' => $service->image ? URL::route('image', ['path' => $service->image, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
            ],
        ]);
    }

    public function update($service)
    {
        $service = Service::findOrFail($service);
        Request::validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'integer']
        ]);

        $service->update(Request::only('name', 'price','description','code','category_id'));
        if (Request::file('image')) {
            $service->update(['image' => Request::file('image')->store('services')]);
        }

        // return Redirect::back()->with('success', 'Service updated.');
        return Redirect::route('services')->with('success', 'Service updated.');
    }

    public function destroy($service)
    {
        $service = Service::findOrFail($service);
        $service->delete();

        return Redirect::back()->with('success', 'Service deleted.');
    }

    public function restore($service)
    {
        $service = Service::findOrFail($service);
        $service->restore();

        return Redirect::back()->with('success', 'Service restored.');
    }
}
