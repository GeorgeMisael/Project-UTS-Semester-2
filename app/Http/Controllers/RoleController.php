<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  public function index(){
        
    $roles = JenisUser::query()->get();
    $users = JenisUser::query()->get();

    return view('user.create_role', [
      'roles' => $roles,
      'users' => $users,
    ]); 
}

  public function create(){
    $roles = JenisUser::query()->get();

    return view('user.create_role', [

      'roles' => $roles,

    ]);
  }

  public function store(Request $request){

    JenisUser::create($request->only('jenis_user'));

    return redirect('/roles');
  }

  public function edit($id){
    $roles = JenisUser::findOrFail($id);
  
    return view('user.role_edit', [
        'roles' => $roles,
    ]);
  }

  public function update(Request $request, $id) {
    $roles = JenisUser::findOrFail($id);

    // Update data pengguna
    $roles->jenis_user = $request->jenis_user;

    $roles->save();

    return redirect('/roles');
  }

  public function destroy($id){

    $roles = JenisUser::findOrfail($id);

    // Hapus user
    $roles->delete();

    return redirect('/roles');
  }

}
