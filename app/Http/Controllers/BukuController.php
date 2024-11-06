<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        
        $books = Book::with('category')->get(); // Memuat kategori terkait setiap buku

        return view('book.index', [
            'books' => $books,
        ]);

    }

    public function create(){

        $books = Book::all();
        $categories = Category::query()->get();
        return view('book.create', [

            'books' => $books,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'code' => 'required|string|max:20',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'idkategori' => 'required|exists:categories,id',
        ]);
        // dd($check);
        Book::insert([
            'code' => $request->input('code'),
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'idkategori' => $request->input('idkategori'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/book');
    }

    public function edit($id){
        $book = Book::findOrfail($id);
        $categories = Category::query()->get();

        return view('book.edit', [
            'book' => $book,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update data pengguna
        $book->name = $request->name;
    
        $book->id = $request->id;
        $book->save();
        return redirect('/book')->with('success', 'User updated successfully.');
    }

    public function destroy($id){
        $book = Book::findOrfail($id);

        // Hapus category
        $book->delete();

        return redirect('/book');
    }
}
