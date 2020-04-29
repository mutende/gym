<?php

namespace App\Http\Controllers\Auth;

use App\ClassSession;
use App\Membership;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $memberships = Membership::all();
        $sessions = ClassSession::all();
        return view('auth.register', compact('memberships','sessions'));
    }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'membership' => ['required'],
            'ss' => ['required']
        ]);
    }


    protected function create(array $data)
    {


        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'membership_id' => $data['membership'],
            'password' => Hash::make($data['password']),
        ]);

        $cls = ClassSession::find($data['ss']);
        $user->classsessions()->attach($cls);

        return $user;
    }

    public function register(Request $request)
    {
        
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect()->route('home');
    }


    protected function guard()
    {
        return Auth::guard();
    }


}
