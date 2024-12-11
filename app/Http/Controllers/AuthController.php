<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('AuthLogin.index');
    }

    public function registar()
    {
        return view('AuthLogin.registar');
    }

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
           ]);
    
           if($validation->fails()){
            return back()->with(['erro' => 'error ao tentar fazer login']);
           }
    
           $credentials = $request->only('email', 'password');
    
           if (Auth::attempt($credentials, $request->filled('remember'))) {
               $request->session()->regenerate();
        
               return redirect()->intended('/menu');
           }
    
           return back()->with(['erro' => 'error ao tentar fazer login']);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeRegister(Request $request)
    {
        try {
             $user = new User();

             $user->name = $request->name;
             $user->email = $request->email;
             $user->password =  Hash::make($request->password);

             $user->save();

             $client  = new Cliente();

             $client->name = $request->name;
             $client->user_id = $user->id;

             $client->save();

             return view('AuthLogin.index');
        } catch (\Throwable $th) {
            
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
