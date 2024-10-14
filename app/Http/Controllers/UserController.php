<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JenisUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::query()->get();
        $roles = JenisUser::query()->latest()->get();

        return view('user.index', [

            'users' => $users,
            'roles' => $roles,

        ]); 
    }

    public function create(){

        $roles = JenisUser::all();

        return view('user.create_user', [
            'roles' => $roles,
        ]); 
    }
    

    public function store(Request $request){

        User::create($request->only('name','username', 'email', 'password', 'id_jenis_user'));

        return redirect('/user', [
        ]);
    }

    public function destroy($id){

        $users = User::findOrfail($id);

        // Hapus user
        $users->delete();

        return redirect('/user');
    }

    public function edit($id){
        $users = User::findOrfail($id);
        $roles = JenisUser::all();

        return view('user.edit', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
    
        // Validasi data sebelum memperbarui
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'id_jenis_user' => 'required|exists:jenis_users,id',
        ]);
    
        // Update data pengguna
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
    
        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->id_jenis_user = $request->id_jenis_user;
        $user->save();
    
        return redirect('/user')->with('success', 'User updated successfully.');
    }

    public function reset($id) {
        $user = User::findOrFail($id);
        
        // Atur ulang password ke nilai default atau generate password baru
        $user->password = Hash::make('12345'); // Ganti 'default_password' dengan yang diinginkan
        $user->save();
    
        return redirect('/user');
    }
    
}
