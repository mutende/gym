<?php

namespace App\Http\Controllers;

use App\ClassSession;
use App\Membership;
use App\Trainer;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cls = ClassSession::all()->count();
        $members = Membership::all()->count();
        $trainers = Trainer::all()->count();
        $users = User::all()->count();
      

        $sessions = ClassSession::all();
        return view('home',compact('sessions','cls','members','trainers','users','memberships'));
    }

    public function store(Request $request)
    {


        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'duration' => ['required'],
            
        ]);


        $cls = new ClassSession();
        $cls->name = $request->name;
        $cls->description = $request->description;
        $cls->duration = (int)$request->duration;
       

        $cls->save();

        return redirect()->back();

    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'duration' => ['required'],
        ]);


        $cls = ClassSession::findorFail($id);
        $cls->name = $request->name;
        $cls->description = $request->description;
        $cls->duration = (int)$request->duration;

        $cls->save();

        return redirect()->back();

    }

    public function destroy($id)
    {
        $cls = ClassSession::findorFail($id);
        $cls->delete();
        return redirect()->back();
    }

}
