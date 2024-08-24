<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $books = Book::where('id', 30)->first();

        // $dataTransactions = Transaction::select('members.id', 'members.name')
        //         ->leftJoin('members','members.id','=','transactions.member_id')
        //         ->where('transactions.member_id', NULL)
        //         ->get();

        // return $books;
        return view('home');
    }
}
