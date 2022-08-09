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
        $role_model = new Role();
        $users_permissions = $role_model->users_permissions($current_user->id);
        $unique_users_permissions = [];
        foreach ($users_permissions as $one_permission) {
          // This determines if the permission is already recognized
          $is_unique = true;
          foreach ($unique_users_permissions as $one_unique) {
            if ($one_permission[1] == $one_unique[1]) {
              $is_unique = false;
            };
          };
          if ($is_unique) {
            $unique_users_permissions[] = $one_permission;
          };
        };
        // NOTES: This array should match the array in Http/Middleware/AdminAccess.php
        $titles_for_access = [
          "Priest",
          "Deacon",
          "Lay Minister",
          "Choir Member",
          "Web Administrator"
        ];
        foreach($user_roles as $one_role) {
          foreach($titles_for_access as $one_title) {
            if ($one_title == $one_role->title) {
              $is_admin = true;
            };
          };
        };

        return view('home',[
          'current_user' => $current_user,
          'user_roles' => $user_roles,
          'users_permissions' => $unique_users_permissions,
          // 'users_permissions' => $users_permissions,
          'is_admin' => $is_admin
        ]);
    }
}
