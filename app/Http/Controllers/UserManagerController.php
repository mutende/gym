<?php

namespace App\Http\Controllers;

use App\User;
use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserManagerController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {

        $memberships = Membership::all();
        $users = User::all();
        return view('clients', compact('memberships','users'));
    }




    public function store(Request $request)
    {

        $this->validate($request,[
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'membership' => ['required']
        ]);

        $password = Hash::make('test@123');
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $password;
        $user->membership_id = $request->membership;

        $user->save();
        return redirect()->back();



    }




    public function update(Request $request, $id)
    {




        $this->validate($request,[
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['sometimes', 'string', 'email', 'min:6','max:255'],
            'membership' => ['required']
        ]);


        $user = User::findorFail($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if(strlen($request->password) < 6){
            $pass = Hash::make($request->password);
            $user->password = $pass;
        }
        $user->membership_id = $request->membership;

        $user->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return redirect()->back();
    }
}
