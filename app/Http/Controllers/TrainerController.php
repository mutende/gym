<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;


class TrainerController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $trainers = Trainer::all();
        return view('trainer')->withTrainers($trainers);
    }



    public function store(Request $request)
    {

        $this->validate($request,[
            'name' =>'required|string|min:3|max:20'
        ]);

        $trainer  = new Trainer();
        $trainer->name = $request->name;

        $trainer->save();

        return redirect()->back();
    }



    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' =>'required|string|min:3|max:20'
        ]);
        $trainer = Trainer::find($id);
        $trainer->name = $request->name;
        $trainer->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $trainer = Trainer::find($id);
        $trainer ->delete();
        return redirect()->back();
    }
}
