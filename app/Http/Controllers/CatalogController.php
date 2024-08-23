<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.catalog');
    }

    // API
    public function api()
    {
        $catalogs = Catalog::all();
        $datatables = datatables()->of($catalogs)->addIndexColumn();

        return $datatables->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $catalog = new Catalog;

        $catalog->name = $request->name;
        $catalog->save();

        return redirect('catalog');
    }

    public function update(Request $request, Catalog $catalog)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $catalog->update($request->all());

        return redirect('catalog');
    }

    public function destroy(Catalog $catalog)
    {
        $catalog->delete();

        return redirect('catalog');
    }
}
