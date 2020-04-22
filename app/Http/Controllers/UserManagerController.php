<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserManagerController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('clients')->withUsers($users);
    }




    public function store(Request $request)
    {

        $this->validate($request,[
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $password = Hash::make('test@123');
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $password;

        $user->save();
        return redirect()->back();



    }




    public function update(Request $request, $id)
    {




        $this->validate($request,[
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['sometimes', 'string', 'email', 'min:6','max:255']
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