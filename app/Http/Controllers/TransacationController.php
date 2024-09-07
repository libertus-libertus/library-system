<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransacationController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->role('petugas')) {
            $status = $request->get('status');

            $transactions = Transaction::with(['member', 'transactionDetails.book'])
                ->when($status, function ($query, $status) {
                    return $query->where('status', $status);
                })
                ->get();

            return view('admin.transaction.index', compact('transactions'));
        } else {
            return abort(403);
        }
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::all();
        $transactions = Transaction::with('member')->get();
        $transactionDetails = TransactionDetail::with('book')->get();
        return view('admin.transaction.create', compact('members', 'books', 'transactions', 'transactionDetails'));
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'status' => 'not_returned',
        ]);

        foreach ($request->book_id as $key => $book_id) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'book_id' => $book_id,
                'qty' => $request->qty[$key],
                'total' => $request->total[$key],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit($id)
    {
        // Ambil data transaksi beserta data member yang berelasi
        $transaction = Transaction::with('member')->findOrFail($id);

        // Ambil data transaksi beserta buku-buku yang dipinjam
        $transactions = Transaction::with('books');

        // Ambil semua buku untuk ditampilkan dalam select multiple
        $books = Book::all();

        // Ambil semua anggota dari tabel members
        $members = Member::all();

        return view('admin.transaction.edit', compact('transaction', 'transactions', 'members', 'books'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update([
            'member_id' => $request->member_id,
            'date_end' => $request->date_end,
            'status' => $request->status,
        ]);

        $transaction->details()->delete(); // Hapus detail lama
        foreach ($request->book_id as $key => $book_id) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'book_id' => $book_id,
                'qty' => $request->qty[$key],
                'total' => $request->total[$key],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
