<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Role;
use App\Models\Deceased;

use App\Http\Controllers\stdClass;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
      $current_user = Auth::user();
      $user_roles = User::find($current_user->id)->all_user_roles;
      $role_model = new Role();
      $users_permissions = $role_model->users_permissions($current_user->id);

      $all_permission_data = [];

      for ($num = 0; $num < count($users_permissions); $num++) {
        $permission_data = new \stdClass;
        $permission_data->label_name = $users_permissions[$num][0];
        $permission_data->data = $users_permissions[$num];
        $unique_permission = true;
        for ($unique_num = 0; $unique_num < count($all_permission_data); $unique_num++) {
          if ($users_permissions[$num][0] == $all_permission_data[$unique_num]->label_name) {
            $unique_permission = false;
          };
        };
        if ($unique_permission) {
          $all_permission_data[] = $permission_data;
        };
      };

      return view('administrator.index',[
        'current_user' => $current_user,
        'user_roles' => $user_roles,
        'all_permission_data' => $all_permission_data
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_deceased()
    {
        return view('administrator.new_deceased');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a new deceased member in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_deceased(Request $request)
    {
      $current_user = Auth::user();
      $user_roles = User::find($current_user->id)->all_user_roles;
      $role_model = new Role();
      $users_permissions = $role_model->users_permissions($current_user->id);

      $input = request()->validate([
        'first_name' => 'required',
        'middle_name' => 'nullable',
        'last_name' => 'required',
        'maiden_name' => 'nullable',
        'suffix_name' => 'nullable',
        'date_of_birth' => 'required',
        'date_of_death' => 'required',
        'on_tombstone' => 'nullable',
        'spouse' => 'nullable',
        'children' => 'nullable',
        'is_purchased' => 'required',
        'is_deceased' => 'required'
      ]);

      Deceased::create($input);

      return redirect()->route('admin.index',[
        'current_user' => $current_user,
        'user_roles' => $user_roles,
        'users_permissions' => $users_permissions
      ]);
    }

    public function store_empty_deceased(Request $request)
    {
      $current_user = Auth::user();
      $user_roles = User::find($current_user->id)->all_user_roles;
      $role_model = new Role();
      $users_permissions = $role_model->users_permissions($current_user->id);

      $input = request()->validate([]);

      Deceased::create($input);

      return redirect()->route('admin.index',[
        'current_user' => $current_user,
        'user_roles' => $user_roles,
        'users_permissions' => $users_permissions
      ]);
    }

    public function assign_roles($id, Request $request)
    {
      $all_roles = Role::all();
      $all_user_roles = User::find($id)->all_user_roles;

      foreach ($all_roles as $init_role) {
        $request_name = "role_".$init_role->id;

        $request_value = $request->$request_name;
        $request_boolean = intval($request_value);
        User::find($id)->all_user_roles()->detach($init_role->id);
        if ($request_boolean == 1) {
          User::find($id)->all_user_roles()->attach($init_role->id);
        };
      };

      return redirect()->route('admin.assign',[
        'id' => $id,
        'all_roles' => $all_roles,
        'all_user_roles' => $all_user_roles
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified deceased.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_deceased($id)
    {
        $this_deceased = Deceased::find($id);
        return view('administrator.show_deceased',[
          'deceased' => $this_deceased
        ]);
    }

    public function all_members() {
      $all_users = User::all();

      $current_user = Auth::user();
      $user_roles = User::find($current_user->id)->all_user_roles;
      $role_model = new Role();
      $users_permissions = $role_model->users_permissions($current_user->id);

      $can_assign = false;
      for ($num = 0; $num < count($users_permissions); $num++) {
        if ($users_permissions[$num][0] == "Assign Roles") {
          $can_assign = true;
        };
      };
      return view('administrator.all_members',[
        'all_members' => $all_users,
        'can_assign' => $can_assign
      ]);
    }

    public function member_roles($member_id)
    {
      $member = User::find($member_id);
      $all_roles = Role::all();
      $all_user_roles = User::find($member_id)->all_user_roles;
      return view('administrator.member_roles')
        ->with('member', $member)
        ->with('all_roles', $all_roles)
        ->with('all_user_roles', $all_user_roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function update_deceased_all() {
      $current_user = Auth::user();
      $user_roles = User::find($current_user->id)->all_user_roles;
      $role_model = new Role();
      $users_permissions = $role_model->users_permissions($current_user->id);
      $all_deceased = Deceased::all();

      $all_permission_data = [];

      for ($num = 0; $num < count($users_permissions); $num++) {
        $permission_data = new \stdClass;
        $permission_data->label_name = $users_permissions[$num][0];
        $permission_data->data = $users_permissions[$num];
        $all_permission_data[] = $permission_data;
      };

      return view('administrator.all_update_deceased',[
        'current_user' => $current_user,
        'user_roles' => $user_roles,
        'users_permissions' => $users_permissions,
        'all_permission_data' => $all_permission_data,
        'all_deceased' => $all_deceased
      ]);
    }

    public function update_deceased_form($id) {
      $this_deceased = Deceased::find($id);
      return view('administrator.update_deceased',[
        'deceased' => $this_deceased
      ]);
    }

    /**
     * Update the specified resource in a deceased member's data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_deceased_action(Request $request, $id)
    {
      $current_user = Auth::user();
      $user_roles = User::find($current_user->id)->all_user_roles;
      $role_model = new Role();
      $users_permissions = $role_model->users_permissions($current_user->id);

      $request->validate([
        'first_name' => 'required',
        'middle_name' => 'nullable',
        'last_name' => 'required',
        'maiden_name' => 'nullable',
        'suffix_name' => 'nullable',
        'date_of_birth' => 'required',
        'date_of_death' => 'required',
        'on_tombstone' => 'nullable',
        'spouse' => 'nullable',
        'children' => 'nullable',
        'is_purchased' => 'required',
        'is_deceased' => 'required'
      ]);

      $deceased = Deceased::find($id);
      $deceased->first_name = $request->first_name;
      $deceased->middle_name = $request->middle_name;
      $deceased->last_name = $request->last_name;
      $deceased->maiden_name = $request->maiden_name;
      $deceased->suffix_name = $request->suffix_name;
      $deceased->date_of_birth = $request->date_of_birth;
      $deceased->date_of_death = $request->date_of_death;
      $deceased->on_tombstone = $request->on_tombstone;
      $deceased->spouse = $request->spouse;
      $deceased->children = $request->children;
      $deceased->is_purchased = $request->is_purchased;
      $deceased->is_deceased = $request->is_deceased;
      $deceased->save();

      return redirect()->route('cemetery.allupdates',[
        'current_user' => $current_user,
        'user_roles' => $user_roles,
        'users_permissions' => $users_permissions
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete_deceased_all() {
      $current_user = Auth::user();
      $user_roles = User::find($current_user->id)->all_user_roles;
      $role_model = new Role();
      $users_permissions = $role_model->users_permissions($current_user->id);
      $all_deceased = Deceased::all();

      $all_permission_data = [];

      for ($num = 0; $num < count($users_permissions); $num++) {
        $permission_data = new \stdClass;
        $permission_data->label_name = $users_permissions[$num][0];
        $permission_data->data = $users_permissions[$num];
        $all_permission_data[] = $permission_data;
      };

      return view('administrator.all_delete_deceased',[
        'current_user' => $current_user,
        'user_roles' => $user_roles,
        'users_permissions' => $users_permissions,
        'all_permission_data' => $all_permission_data,
        'all_deceased' => $all_deceased
      ]);
    }

    public function delete_deceased_form($id) {
      $this_deceased = Deceased::find($id);
      return view('administrator.delete_deceased',[
        'deceased' => $this_deceased
      ]);
    }

    public function delete_deceased(Request $request, $id) {
      $current_user = Auth::user();
      $user_roles = User::find($current_user->id)->all_user_roles;
      $role_model = new Role();
      $users_permissions = $role_model->users_permissions($current_user->id);

      $deceased = Deceased::find($id);
      $deceased->delete();

      return redirect()->route('admin.index',[
        'current_user' => $current_user,
        'user_roles' => $user_roles,
        'users_permissions' => $users_permissions
      ]);
    }
}
