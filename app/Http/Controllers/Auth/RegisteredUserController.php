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
use Illuminate\Support\Facades\Storage;

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
            'restaurant_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'vat' => ['required', 'regex:/^[0-9]{11}$/'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:512'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'types' => ['required', 'array', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'restaurant_name.required' => 'Il nome del ristorante è obbligatorio.',
            'address.required' => 'L\'indirizzo del ristorante è obbligatorio.',
            'vat.required' => 'Il campo P.Iva è obbligatorio.',
            'vat.regex' => 'La P.Iva deve essere composta da 11 cifre numeriche.',
            'description.required' => 'La descrizione del ristorante è obbligatoria.',
            'image.image' => 'Il file caricato deve essere un\'immagine valida.',
            'image.max' => 'Il file immagine non può superare 512 KB.',
            'name.required' => 'Il nome è obbligatorio.',
            'name.string' => 'Il nome è una stringa.',
            'types.required' => 'Seleziona almeno un tipo di cucina.',
            'types.min' => 'Seleziona almeno un tipo di cucina.',
            'surname.required' => 'Il cognome è obbligatorio.',
            'email.required' => 'L\'indirizzo email è obbligatorio.',
            'email.email' => 'L\'indirizzo email deve essere valido.',
            'email.max' => 'L\'indirizzo email non può superare 255 caratteri.',
            'email.unique' => 'L\'indirizzo email è già stato utilizzato.',
            'password.required' => 'La password è obbligatoria.',
            'password.confirmed' => 'Le password non corrispondono.',
            'password.min' => 'La password deve contenere almeno :min caratteri.',
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

        // $image_path = Storage::put('uploads/restaurant_id ' . $restaurant->id, $restaurant['image']);
        // $restaurant->image = $image_path;
        $user->restaurant()->save($restaurant);

        $restaurant->types()->attach($request->types);

        if ($request->hasFile('image')) {
            $restaurantIdString = strval($restaurant->id);
            $image_path = $request->file('image')->store('uploads/restaurant_id_' . $restaurantIdString);
            $restaurantDetail = $restaurant;
            $restaurantDetail->image = $image_path;
            $restaurantDetail->save();
        }

        event(new Registered($user));

        Auth::login($user);


        return redirect()->route('admin.restaurant');

    }
}