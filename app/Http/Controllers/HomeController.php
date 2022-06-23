<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $current_user = Auth::user();
        $user_roles = User::find($current_user->id)->all_user_roles;
        $is_admin = false;
        foreach ($user_roles as $one_role) {
          if ($one_role->title == "Web Administrator") {
            $is_admin = true;
          };
        };
        $role_model = new Role();
        $users_permissions = $role_model->users_permissions($current_user->id);

        return view('home',[
          'current_user' => $current_user,
          'user_roles' => $user_roles,
          'users_permissions' => $users_permissions,
          'is_admin' => $is_admin
        ]);
    }
}
