<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){

      $menus = Menu::all();

      return view('menu.index', compact('menus'));

    }

    public function tambah(){
      $menus = Menu::all();

      return view('menu.tambah', compact('menus'));
    }

    public function simpan(Request $request){
      
      $menus = new Menu();
      $menus->judul = $request->judul;
      $menus->link = $request->link;
      $menus->save();

      return redirect()->route('menu.index');
    }

    public function edit($id){

      $menu = Menu::find($id);

      return view('menu.edit', compact('menu'));
  }

    public function update(Request $request, $id){

      $menu = Menu::find($id);
      $menu->judul = $request->judul;
      $menu->link = $request->link;
      $menu->update();

      return redirect()->route('menu.index');
    }

    public function destroy($id){

      $menu = Menu::findOrfail($id);
  
      // Hapus user
      $menu->delete();
  
      return redirect('/menu');
    }
    
}
