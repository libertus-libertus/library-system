<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.publisher');
    }

    // API
    public function api()
    {
        $publishers = Publisher::all();
        $datatables = datatables()->of($publishers)->addIndexColumn();

        return $datatables->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $publisher = new Publisher;
        $publisher->name = $request->name;
        $publisher->email = $request->email;
        $publisher->phone_number = $request->phone_number;
        $publisher->address = $request->address;

        $publisher->save();
        return redirect('publisher');
    }

    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $publisher->update($request->all());
        return redirect('publisher');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect('publisher');
    }
}
