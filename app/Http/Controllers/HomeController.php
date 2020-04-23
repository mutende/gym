<?php

namespace App\Http\Controllers;

use App\ClassSession;
use App\Membership;
use App\Trainer;
use App\User;
use App\Weekday;
use DateTime;
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
        $members = Membership::all();
        $trainers = Trainer::all();
        $users = User::all()->count();
        $weekdays = Weekday::all();


        $sessions = ClassSession::all();
        return view('dashboard',compact('sessions','cls','members','trainers','users','weekdays'));
    }

    public function store(Request $request)
    {



        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'duration' => ['required'],
            'trainer' => ['required'],
            'day' =>['required'],
            'starttime' =>['required'],

        ]);

        $periodToAdd = '+'.$request->duration.' hour';
        $start = new DateTime($request->starttime);
        $start->modify($periodToAdd);
        $stop_obj = $start->format('H:i');

        $starttime_obj = new DateTime($request->starttime);
        $start_timeformat = $starttime_obj->format('H:i');



        $cls = new ClassSession();
        $cls->name = $request->name;
        $cls->description = $request->description;
        $cls->duration = (int)$request->duration;
        $cls->trainer_id = $request->trainer;
        $cls->day_id =$request->day;
        $cls->start_time = $start_timeformat;
        $cls->stop_time = $stop_obj;


        $cls->save();



        return redirect()->back();

    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'duration' => ['required'],
            'trainer' => ['required'],
            'day' =>['required'],
            'starttime' =>['sometimes'],

        ]);


        $cls = ClassSession::findorFail($id);
        $cls->name = $request->name;
        $cls->description = $request->description;
        $cls->trainer_id = $request->trainer;
        $cls->day_id =$request->day;

        if($request->starttime != null or strlen($request->starttime) > 0){

            $periodToAdd = '+'.$request->duration.' hour';
            $start = new DateTime($request->starttime);
            $start->modify($periodToAdd);
            $stop_obj = $start->format('H:i');

            $starttime_obj = new DateTime($request->starttime);
            $start_timeformat = $starttime_obj->format('H:i');

            $cls->start_time = $start_timeformat;
            $cls->stop_time = $stop_obj;
            $cls->duration = (int)$request->duration;
        }


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
