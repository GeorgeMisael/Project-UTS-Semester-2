<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(){
        
        return view('register.index');
    }

    public function registerStore(Request $request )
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5','max:255'],
        ]);
     
        $validated['password'] = Hash::make($validated['password']);

        // $request->session()->flash('status', 'Tugas berhasil!');

        session()->flash('success', 'Registrasi berhasil!');

        User::create($validated);

        return redirect('/')->with('success', 'Registrasi berhasil');
    }

    public function __invoke()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
    
            // Redirect ke dashboard
            return redirect('dashboard');
        }
    
        return back()->with([
            'gagal' => 'Email atau password anda salah',
        ]);
    }

    public function logout(){

        Auth::logout();

        return redirect('/');

    }

}
