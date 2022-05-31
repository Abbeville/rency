<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
// use Inertia\Inertia;

class UsersController extends Controller
{
    public function index()
    {
        // return Inertia::render('Users/Index', [
        return view('pages.users.index', [
            'filters' => Request::all('search', 'role', 'trashed'),
            'users' => Auth::user()
                ->orderByName()
                ->filter(Request::only('search', 'role', 'trashed'))
                ->get()
                ->transform(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'owner' => $user->owner,
                    'photo' => $user->photo_path ? URL::route('image', ['path' => $user->photo_path, 'w' => 40, 'h' => 40, 'fit' => 'crop']) : null,
                    'deleted_at' => $user->deleted_at,
                ]),
        ]);
    }

    public function create()
    {
        // return Inertia::render('Users/Create');
        return view('pages.users.create');
    }

    public function store()
    {
        
        Request::validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')],
            'password' => ['required', 'confirmed'],
            'role' => ['required', 'boolean'],
            'photo' => ['nullable', 'image'],
            'phone' => ['nullable']
        ]);
        
        // dd(Request::all());

        User::create([
            'first_name' => Request::get('first_name'),
            'last_name' => Request::get('last_name'),
            'email' => Request::get('email'),
            'phone' => Request::get('phone'),
            'username' => Request::get('username'),
            'password' => bcrypt(Request::get('password')),
            'owner' => Request::get('role'),
            'photo_path' => Request::file('photo') ? Request::file('photo')->store('users') : null,
            'created_by' => Auth::id()
        ]);

        return Redirect::route('users')->with('success', 'User created.');
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);
        // return Inertia::render('Users/Edit', [
        return view('pages.users.edit', [
            'user' => [
                'id' => $user->id,
                'name' => "{$user->first_name} {$user->last_name}",
                'username' => $user->username,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'owner' => $user->owner,
                'photo' => $user->photo_path ? URL::route('image', ['path' => $user->photo_path, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
                'deleted_at' => $user->deleted_at,
            ],
        ]);
    }

    public function update($user)
    {
        $user = User::findOrFail($user);
        // if (App::environment('demo') && $user->isDemoUser()) {
        //     return Redirect::back()->with('error', 'Updating the demo user is not allowed.');
        // }
        // dd(Request::all());
        Request::validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'confirmed'],
            'owner' => ['required', 'boolean'],
            'phone' => ['nullable', 'boolean'],
            'photo' => ['nullable'],
            'username' => ['required']
        ]);
        // dd(Request::all());
        $user->update(Request::only('first_name', 'last_name', 'email', 'owner', 'phone', 'username'));

        if (Request::file('photo')) {
            $user->update(['photo_path' => Request::file('photo')->store('users')]);
        }

        if (Request::get('password')) {
            $user->update(['password' => bcrypt(Request::get('password'))]);
        }

        return Redirect::back()->with('success', 'User updated.');
    }

    public function destroy($user)
    {
        $user = User::findOrFail($user);
        // if (App::environment('demo') && $user->isDemoUser()) {
        //     return Redirect::back()->with('error', 'Deleting the demo user is not allowed.');
        // }

        $user->delete();

        return Redirect::back()->with('success', 'User deleted.');
    }

    public function restore($user)
    {
        $user = User::findOrFail($user);
        $user->restore();

        return Redirect::back()->with('success', 'User restored.');
    }
}
