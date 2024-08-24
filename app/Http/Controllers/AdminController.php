<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home() {
        $total_anggota = Member::count();
        $total_buku = Book::count();
        $total_peminjam = Transaction::whereMonth('date_start', date('m'))->count();
        $total_penerbit = Publisher::count();

        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as Total"))->groupBy('publisher_id')->orderBy('publisher_id', 'asc')->pluck('total');
        $data_donut = Publisher::orderBy('publishers.id', 'asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('name')->pluck('name');

        $label_bar = ['Peminjaman'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = 'rgba(60, 141, 188, 0.9)';
            $data_month = [];

            foreach (range(1,12) as $month) {
                $data_month[] = Transaction::selec(DB::raw("COUNT(*) as Total"))->whereMonth('date_start', $month)->first()->total;
            }

            $data_bar[$key]['data'] = $data_month;
        }

        return view('home', compact('total_anggota', 'total_buku', 'total_penerbit', 'total_peminjaman'));
    }


}
