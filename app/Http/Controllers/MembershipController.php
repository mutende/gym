<?php

namespace App\Http\Controllers;

use App\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller

{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $memberships = Membership::all();
        return view('membership')->withMemberships($memberships);
    }



    public function store(Request $request)
    {



        $this->validate($request,[
            'membership' =>'required|string|min:3|max:20'
        ]);

        $memberships  = new Membership();
        $memberships->membership = $request->membership;

        $memberships->save();

        return redirect()->route('memberships.index');
    }



    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'membership' =>'required|string|min:3|max:20'
        ]);
        $membership = Membership::find($id);
        $membership->membership = $request->membership;
        $membership->save();
        return redirect()->route('memberships.index');
    }

    public function destroy($id)
    {
        $membership = Membership::find($id);
        $membership ->delete();
        return redirect()->route('memberships.index');
    }
}
