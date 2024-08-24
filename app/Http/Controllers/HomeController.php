<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total_anggota = Member::count();
        $total_buku = Book::count();
        $total_penerbit = Publisher::count();
        $total_pengarang = Author::count();

        return view('home', compact('total_anggota', 'total_buku', 'total_penerbit', 'total_pengarang'));
    }
}
