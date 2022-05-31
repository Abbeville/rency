<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function index()
    {
        // return Inertia::render('Customers/Index', [
        return view('pages.customers.index', [
            'filters' => Request::all('search', 'role', 'trashed'),
            'customers' => (new Customer)
                ->orderByName()
                ->filter(Request::only('search', 'role', 'trashed'))
                ->get()
                ->transform(fn ($customer) => [
                    'id' => $customer->id,
                    'fullname' => $customer->fullname,
                    'email' => $customer->email,
                    'phone' => $customer->phone,
                    'sex' => $customer->sex
                ]),
        ]);
    }

    public function create()
    {
        // return Inertia::render('Customers/Create');
        return view('pages.customers.create');
    }

    public function store()
    {
        Request::validate([
            'fullname' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
            'phone' => ['required', Rule::unique('customers')],
            'sex' => ['required']
        ]);

        Customer::create([
            'fullname' => Request::get('fullname'),
            'email' => Request::get('email'),
            'phone' => Request::get('phone'),
            'sex' => Request::get('sex')
        ]);

        return Redirect::route('customers')->with('success', 'Customer created.');
    }

    public function edit(Customer $customer)
    {
        // return Inertia::render('Customers/Edit', [
        return view('pages.customers.edit', [
            'customer' => [
                'id' => $customer->id,
                'fullname' => $customer->fullname,
                'email' => $customer->email,
                'phone' => $customer->phone,
                'sex' => $customer->sex
            ],
        ]);
    }

    public function update(Customer $customer)
    {
        // Request::validate([
        //     'fullame' => ['required', 'max:50'],
        //     'email' => ['required', 'max:50', 'email'],
        //     'phone' => ['required', 'max:50',  Rule::unique('customers')->ignore($customer->id)],
        //     'sex' => ['required']
        // ]);

        // dd(Request::all());

        $customer->update(Request::only('fullname', 'email', 'phone', 'sex'));

        // return Redirect::back()->with('success', 'Customer updated.');
        return Redirect::route('customers')->with('success', 'Customer updated.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return Redirect::back()->with('success', 'Customer deleted.');
    }

    public function restore(Customer $customer)
    {
        $customer->restore();

        return Redirect::back()->with('success', 'Customer restored.');
    }
}
