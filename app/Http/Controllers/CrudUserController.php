<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{
    public function userRegister(Request $request)
    {
        $dataValidated = $request->validate([
            'name' => ['required', 'min:3', 'max:12', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', Password::defaults()]
        ]);

        $user = User::create([
            'name' => $dataValidated['name'],
            'email' => $dataValidated['email'],
            'password' => bcrypt($dataValidated['password']),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function userLogin(Request $request)
    {
        $credentails = $request->validate([
            'logName' => ['required', 'string'], 
            'logPassword' => 'required'
        ]);

        if (Auth::attempt([
            'name' => $credentails['logName'], 
            'password' => $credentails['logPassword']
        ])) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'logName' => 'Data input are incorrect.',
        ])->onlyInput('logName');
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
