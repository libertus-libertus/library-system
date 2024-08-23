<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.member');
    }

    // API
    public function api()
    {
        $members = Member::all();
        $datatables = datatables()->of($members)->addIndexColumn();

        return $datatables->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->phone_number = $request->phone_number;
        $member->address = $request->address;

        $member->save();
        return redirect('member');
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $member->update($request->all());
        return redirect('member');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect('member');
    }
}
