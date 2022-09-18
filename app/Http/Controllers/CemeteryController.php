<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Deceased;
use App\Models\User;
use App\Models\Role;
use App\Mail\CemeteryMessage;

use Illuminate\Support\Facades\Mail;

class CemeteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $deceased = Deceased::all();
        // // Gets a fixed number of random deceased names
        // $name_list = [];
        // foreach ($deceased as $random) {
        //   if ($random->is_deceased == 1) {
        //     if ($random->suffix_name) {
        //       $random->last_name = $random->last_name." ".$random->suffix_name;
        //     };
        //     $name_list[] = [$random->first_name,$random->last_name];
        //   };
        // };
        // $min_number = 20;
        // if (count($name_list) < $min_number) {
        //   $last_number = count($name_list);
        // } else {
        //   $last_number = $min_number;
        // };
        // $random_list = [];
        // for ($num = 0; $num < $last_number; $num++) {
        //   $selected = random_int(0,count($name_list)-1);
        //   $new_name = $name_list[$selected];
        //   $is_new = true;
        //   for ($check = 0; $check < count($random_list); $check++) {
        //     if ($random_list[$check] == $new_name) {
        //       $is_new = false;
        //     };
        //   };
        //   if ($is_new == true) {
        //     $random_list[] = $new_name;
        //   } else {
        //     $num--;
        //   };
        // };
        // $full_list = [];
        // for ($full_num = count($random_list); $full_num < $min_number; $full_num++) {
        //   $num_left = $min_number - count($random_list);
        //   $full_list = $random_list;
        //   $random_num = 0;
        //   for ($i = 0; $i < $num_left; $i++) {
        //     $full_list[] = $random_list[$random_num];
        //     if ($random_num >= count($random_list)-1) {
        //       $random_num = 0;
        //     } else {
        //       $random_num++;
        //     };
        //   };
        //   $random_list = $full_list;
        // };

        // // Gets the number of empty plots
        // $open_plot_count = 0;
        // foreach ($deceased as $one_deceased) {
        //   if ($one_deceased->purchased_by == null && $one_deceased->is_deceased == 0) {
        //     $open_plot_count++;
        //   };
        // };
        // // Gets the cemetery admin for contact info
        // $all_users = User::all();
        // $cemetery_roles = explode(",",env('CEMETERY_ROLES'));
        // $cemetery_users = [];
        // foreach ($all_users as $one_user) {
        //   $roles = [];
        //   $user_roles = $one_user->all_user_roles;
        //   foreach ($user_roles as $one_role) {
        //     for ($num = 0; $num < count($cemetery_roles); $num++) {
        //       if ($one_role->title == $cemetery_roles[$num]) {
        //         array_push($roles, $one_role->title);
        //       };
        //     };
        //   };
        //   if (count($roles) > 0) {
        //     $one_user->cemetery_roles = $roles;
        //     array_push($cemetery_users, $one_user);
        //   };
        // };
        return view('cemetery.index',[
          'css' => 'cemetery',
          // 'all_deceased' => $deceased,
          // 'open_plot_count' => $open_plot_count,
          // 'cem_user' => $cemetery_users,
          // 'random_list' => $random_list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('home.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function list()
    {
        // $deceased = Deceased::all();
        if (!isset($_GET['name_type'])) {
          $all_results = null;
        } else {
          $all_results = Deceased::where([
              ['first_name',$_GET['name_type']],
              ['is_deceased','1']
            ])
            ->orWhere([
                ['last_name',$_GET['name_type']],
                ['is_deceased','1']
            ])
            ->orWhere([
                ['maiden_name',$_GET['name_type']],
                ['is_deceased','1']
            ])
            ->orderBy('last_name','ASC')
            ->paginate(20);
        };
        return view('cemetery.list',[
          'css' => 'cemetery',
          'all_deceased' => Deceased::where('is_deceased','=','1')->paginate(20),
          'all_results' => $all_results
        ]);
    }

    public function search(Request $request) {
      $input = request()->validate([
        'name_type' => 'string|max:255|nullable',
      ]);
      return redirect()->route('cemetery.list',[
        'name_type' => $input['name_type']
      ]);
    }

    public function individual($id)
    {
      $deceased = Deceased::find($id);
      return view('cemetery.individual',[
        'css' => 'cemetery',
        'deceased' => $deceased
      ]);
    }

    public function find() {
      $deceased = Deceased::all();
      // Gets a fixed number of random deceased names
      $name_list = [];
      foreach ($deceased as $random) {
        if ($random->is_deceased == 1) {
          if ($random->suffix_name) {
            $random->last_name = $random->last_name." ".$random->suffix_name;
          };
          $name_list[] = [$random->first_name,$random->last_name];
        };
      };
      $min_number = 20;
      if (count($name_list) < $min_number) {
        $last_number = count($name_list);
      } else {
        $last_number = $min_number;
      };
      $random_list = [];
      for ($num = 0; $num < $last_number; $num++) {
        $selected = random_int(0,count($name_list)-1);
        $new_name = $name_list[$selected];
        $is_new = true;
        for ($check = 0; $check < count($random_list); $check++) {
          if ($random_list[$check] == $new_name) {
            $is_new = false;
          };
        };
        if ($is_new == true) {
          $random_list[] = $new_name;
        } else {
          $num--;
        };
      };
      $full_list = [];
      for ($full_num = count($random_list); $full_num < $min_number; $full_num++) {
        $num_left = $min_number - count($random_list);
        $full_list = $random_list;
        $random_num = 0;
        for ($i = 0; $i < $num_left; $i++) {
          $full_list[] = $random_list[$random_num];
          if ($random_num >= count($random_list)-1) {
            $random_num = 0;
          } else {
            $random_num++;
          };
        };
        $random_list = $full_list;
      };
      return view('cemetery.find', [
        'css' => 'cemetery',
        'random_list' => $random_list
      ]);
    }

    public function rules() {
      return view('cemetery.rules', [
        'css' => 'cemetery'
      ]);
    }

    public function rite() {
      return view('cemetery.rite', [
        'css' => 'cemetery'
      ]);
    }

    public function history() {
      return view('cemetery.history', [
        'css' => 'cemetery'
      ]);
    }

    public function available() {
      $deceased = Deceased::all();
      // Gets the number of empty plots
      $open_plot_count = 0;
      foreach ($deceased as $one_deceased) {
        if ($one_deceased->purchased_by == null && $one_deceased->is_deceased == 0) {
          $open_plot_count++;
        };
      };
      return view('cemetery.available', [
        'css' => 'cemetery',
        'open_plot_count' => $open_plot_count
      ]);
    }

    public function contact() {
      $all_users = User::all();
      $cemetery_roles = explode(",",env('CEMETERY_ROLES'));
      $cemetery_users = [];
      foreach ($all_users as $one_user) {
        $roles = [];
        $user_roles = $one_user->all_user_roles;
        foreach ($user_roles as $one_role) {
          for ($num = 0; $num < count($cemetery_roles); $num++) {
            if ($one_role->title == $cemetery_roles[$num]) {
              array_push($roles, $one_role->title);
            };
          };
        };
        if (count($roles) > 0) {
          $one_user->cemetery_roles = $roles;
          array_push($cemetery_users, $one_user);
        };
      };
      return view('cemetery.contact',[
        'css' => 'cemetery',
        // 'all_deceased' => $deceased,
        // 'open_plot_count' => $open_plot_count,
        'cem_user' => $cemetery_users,
        // 'random_list' => $random_list,
      ]);
    }

    public function messaging(Request $request)
    {
      $input = request()->validate([
        'cem_recipient' => 'required',
        'cem_reply_email' => 'required|email',
        'cem_message' => 'required'
      ]);
      $recipient = User::find($input['cem_recipient']);
      Mail::to($recipient->email)->send(new CemeteryMessage($input));
      return redirect()->route('cemetery.index');
    }
}
