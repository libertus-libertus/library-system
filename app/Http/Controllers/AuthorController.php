<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authors = Author::all();
        return view('admin.author', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $author = new Author;

        $author->name = $request->name;
        $author->email = $request->email;
        $author->phone_number = $request->phone_number;
        $author->address = $request->address;
        $author->save();

        return redirect('author');
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $author->update($request->all());

        return redirect('author');
    }

    public function destroy(Author $author)
    {
        $author->delete();
    }
}
