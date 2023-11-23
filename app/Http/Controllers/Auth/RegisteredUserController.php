<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Type;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register')->with('types', Type::all());
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $types = Type::all();
        $request->validate([
            // 'restaurant_name' => ['required', 'string', 'max:255'],
            // 'address' => ['required', 'string', 'max:255'],
            // 'vat' => ['required', 'string', 'max:255'],
            // 'description' => ['required', 'text'],
            // 'image' => ['nullable', 'string', 'max:512'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $restaurant = new Restaurant([
            'restaurant_name' => $request->restaurant_name,
            'address' => $request->address,
            'vat' => $request->vat,
            'description' => $request->description,
            'image' => $request->image,
        ]);


        $user->restaurant()->save($restaurant);

        $restaurant->types()->attach($request->types);



        event(new Registered($user));

        Auth::login($user);


        return redirect(RouteServiceProvider::HOME);
    }
}