<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AccessRequestMail;
use App\Models\Character;
use App\Models\Requests;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create($token)
    {
        $request = Requests::all()->where('token', $token)->first();
        $chars = Character::all();
        if ($request)
            return view('auth.register')->with([
                'request' => $request,
                'chars' => $chars
            ]);
        else
            return redirect()->route('request.index')->with('error', 'An error has occurred!<br>Please remake a request!<br><br>If this error repeats contact management!');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  Request  $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'nameSearch' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'char_id' => $request->nameSearch,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        toastr()->success('Successfully Registered!<br>Please let a superior know so you can gain access to the MDT');

        return redirect(RouteServiceProvider::REGISTER);
    }
}
