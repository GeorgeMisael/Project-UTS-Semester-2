<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::query()->get();

        return view('category.index', [

            'categories' => $categories,
        ]);
    }

    public function create(){

        $categories = Category::all();

        return view('category.create', [

            'categories' => $categories,
        ]);
    }

    public function store(Request $request){

        Category::create($request->only('name'));

        return redirect('/category');
    }

    public function edit($id){
        $category = Category::findOrfail($id);

        return view('category.edit', [
            'category' => $category,
        ]);
    }
    
    public function update(Request $request, $id) {
        $categories = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Update data pengguna
        $categories->name = $request->name;
    
    
        $categories->id = $request->id;
        $categories->save();
    
        return redirect('/category')->with('success', 'User updated successfully.');
    }

    public function destroy($id){
        $categories = Category::findOrfail($id);

        // Hapus category
        $categories->delete();

        return redirect('/category');
    }
}
