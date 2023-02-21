<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Country;
use App\Notifications\NewUser;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function showRegistrationForm()
    {
        $countries = Country::get(["name", "id"]);
        return view('auth.register', compact('countries'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_type' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'qualification' => ['required', 'string', 'max:255'],
            'affiliation' => ['required', 'string', 'max:255'],
            'academic' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['firstname'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'suffix' => $data['suffix'],
            'qualification' => $data['qualification'],
            'affiliation' => $data['affiliation'],
            'academic' => $data['academic'],
            'department' => $data['department'],
            'country' => $data['country'],
            'idno' => $data['idno'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'user_type' => $data['user_type'],
            'approved_at' => $data['user_type'] == 'W' ? now() : NULL,
        ]);
        
        $admin = User::where('admin', 1)->first();
        if ($admin) {
            
            try{ 
                $admin->notify(new NewUser($user));
            }catch(\Exception $ex) {
                \Log::debug($ex->getMessage());
                \Log::debug($ex->getTraceAsString());
            }
        }
        
        
        
       return $user;
    }
}
