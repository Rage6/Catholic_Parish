<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

use App\Models\Role;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'suffix_name' => ['string', 'max:255', 'nullable'],
            'title' => ['string', 'max:100', 'nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $guest_id = null;
        $all_roles = Role::all();
        foreach ($all_roles as $one_role) {
          if ($one_role->title == 'Guest') {
            $guest_id = $one_role->id;
          };
        };
        $new_user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'suffix_name' => $data['suffix_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'title' => $data['title']
        ]);
        $new_user->save();
        $user_id = $new_user->id;
        // The below SQL injection makes the new user a 'Guest' by default
        DB::insert('insert into role_user (role_id,user_id) values (?,?)',[$guest_id,$user_id]);
        return $new_user;
    }
}
