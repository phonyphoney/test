<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Employee;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Register;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    public function show()
    {
        return $this->showRegistrationForm();
    }

    public function register(Register $request)
    {   
        
         event(new Registered($user = $this->create($request->all())));

         $this->guard()->login($user);

         return $this->registered($request, $user)
                         ?: redirect($this->redirectPath());
    }

    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'age' => $data['age'],
            'dob' => $data['dob'],
            'address' => $data['address'],
        ]);

        Session::put("role",$data['role']);
        $role =  $data['role']==1 ? "a":"na";
        
        
        $employee_id = Employee::create([
            'name' => $data["name"],
            'age' => $data["age"],
            'birth_year' => $data["dob"],
            'fk_user_id' => $user->id,
            'role' => $role
        ]);

        return $user;
    }
}
