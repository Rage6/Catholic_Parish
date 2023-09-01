<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

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
        // $titles_for_access = [
        //   "Priest",
        //   "Deacon",
        //   "Lay Minister",
        //   "Choir Member",
        //   "Web Administrator"
        // ];
        $titles_for_access = explode(",",env('ADMIN_ACCESS'));
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

    public function changePassword()
    {
        return view('change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }
        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }

    public function changeProfile()
    {
        $current_user = Auth::user();
        return view('change-profile', [
          'current_user' => $current_user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'suffix_name' => 'nullable',
            'title' => 'nullable',
            'email' => 'required|email',
            'publicEmail' => 'nullable|email'
        ]);
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->suffix_name = $request->suffix_name;
        $user->title = $request->title;
        $user->email = $request->email;
        $user->public_email = $request->publicEmail;
        $user->save();
        return back()->with("status", "Profile changed successfully!");
    }

    public function delete_user_form() {
      return view('delete-account');
    }

    public function delete_user_action() {
      $this_user = Auth::user();
      $this_user->delete();
      return redirect()->route('cemetery.index');
    }

}
