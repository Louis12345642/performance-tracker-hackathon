<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', Rules\Password::defaults()],
        // ]);


           //make an avater base on the email of the user
           $hash = md5($request->email);
           $avatar_url = "https://robohash.org/{$hash}";

            $user = User::create([
            'firstName' => $request->firstName,
            'lastName'=>$request->lastName,
            'rollNumber'=> $request->rollNumber,
            'phone'=>$request->phone,
            'email' => $request->email,
            'avater'=>$avatar_url,
            'password' => Hash::make($request->string('password')),
        ]);

        event(new Registered($user));




        Auth::login($user);
        $user = User::with('roles')->where('email', $request->email)->first();
        return $user;
    }

}
