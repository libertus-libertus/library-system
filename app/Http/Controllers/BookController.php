<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();
        return view('admin.book', compact('publishers', 'authors', 'catalogs'));
    }

    // API
    public function api()
    {
        $books = Book::all();

        return json_encode($books);
    }

    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'year' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        $book = new Book;
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->year = $request->year;
        $book->publisher_id = $request->publisher_id;
        $book->author_id = $request->author_id;
        $book->catalog_id = $request->catalog_id;
        $book->qty = $request->qty;
        $book->price = $request->price;

        $book->save();
        return redirect('book');
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'year' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        $book->update($request->all());
        return redirect('book');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('book');
    }
}
