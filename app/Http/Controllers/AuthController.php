<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('auth.create');
    }

    
    public function store(AuthRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if( Auth::attempt($credentials, $remember) ){
            return redirect()->intended('/');
        }else{
            return redirect()->back()->with('error', 'Invalid credential');
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
