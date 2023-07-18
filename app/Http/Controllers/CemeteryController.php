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
              ['first_name','LIKE','%'.$_GET['name_type'].'%'],
              ['is_deceased','1']
            ])
            ->orWhere([
                ['last_name','LIKE','%'.$_GET['name_type'].'%'],
                ['is_deceased','1']
            ])
            ->orWhere([
                ['maiden_name','LIKE','%'.$_GET['name_type'].'%'],
                ['is_deceased','1']
            ])
            ->orWhere([
                ['nickname','LIKE','%'.$_GET['name_type'].'%'],
                ['is_deceased','1']
            ])
            ->orWhere([
                ['middle_name','LIKE','%'.$_GET['name_type'].'%'],
                ['is_deceased','1']
            ])
            ->orderBy('last_name','ASC')
            ->orderBy('first_name','ASC')
            ->orderBy('middle_name','ASC')
            ->orderBy('maiden_name','ASC')
            ->paginate(20);
        };
        $all_deceased = null;
        if ($all_results) {
          $all_deceased = $all_results;
        } else {
          $all_deceased = Deceased::where('is_deceased','=','1')
            ->orderBy('last_name','ASC')
            ->orderBy('first_name','ASC')
            ->orderBy('middle_name','ASC')
            ->orderBy('maiden_name','ASC')
            ->paginate(20);
        };
        for ($i = 0; $i < count($all_deceased); $i++) {
          $age = null;
          $one_deceased = $all_deceased[$i];
          if (($one_deceased->date_of_birth || ($one_deceased->dob_day && $one_deceased->dob_month && $one_deceased->dob_year)) && ($one_deceased->date_of_death || ($one_deceased->dod_day && $one_deceased->dod_month && $one_deceased->dod_year))) {
            if ($one_deceased->dob_day && $one_deceased->dob_month && $one_deceased->dob_year) {
              $one_deceased->date_of_birth = $one_deceased->dob_year."-".$one_deceased->dob_month."-".$one_deceased->dob_day;
            };
            if ($one_deceased->dod_day && $one_deceased->dod_month && $one_deceased->dod_year) {
              $one_deceased->date_of_death = $one_deceased->dod_year."-".$one_deceased->dod_month."-".$one_deceased->dod_day;
            };
            $yob = intval(substr($one_deceased->date_of_birth,-10,4));
            $yod = intval(substr($one_deceased->date_of_death,-10,4));
            $age = $yod - $yob;
            $mob = intval(substr($one_deceased->date_of_birth,-5,2));
            $mod = intval(substr($one_deceased->date_of_death,-5,2));
            if ($age > 0) {
              if ($mob > $mod) {
                $age = $age - 1;
              } elseif ($mob == $mod) {
                $day_of_birth = intval(substr($one_deceased->date_of_birth,-1,2));
                $day_of_death = intval(substr($one_deceased->date_of_death,-1,2));
                if ($day_of_birth > $day_of_death) {
                  $age = $age - 1;
                };
              };
            };
          } else {
            $age = "---";
          };
          $all_deceased[$i]->age = $age;
        };
        if (isset($_GET['name_type'])) {
          return view('cemetery.list',[
            'css' => 'cemetery',
            'all_deceased' => $all_deceased,
            'param_name' => 'name_type',
            'param_value' => $_GET['name_type']
          ]);
        } else if (isset($_GET['page'])) {
          return view('cemetery.list',[
            'css' => 'cemetery',
            'all_deceased' => $all_deceased,
            'param_name' => 'page',
            'param_value' => $_GET['page']
          ]);
        } else {
          return view('cemetery.list',[
            'css' => 'cemetery',
            'all_deceased' => $all_deceased,
            'param_name' => 'none',
            'param_value' => null
          ]);
        };
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
      if ($_GET['param_name'] && $_GET['param_name'] != 'none') {
        $param_name = $_GET['param_name'];
        $param_value = $_GET['param_value'];
      } else {
        $param_name = null;
        $param_value = null;
      };
      $deceased = Deceased::find($id);
      if ($deceased->nickname) {
        $deceased->nickname = explode(";",$deceased->nickname);
      };
      $age = null;
      if (($deceased->date_of_birth || ($deceased->dob_year && $deceased->dob_month && $deceased->dob_day)) && ($deceased->date_of_death || ($deceased->dod_year && $deceased->dod_month && $deceased->dod_day))) {
        if ($deceased->dob_day && $deceased->dob_month && $deceased->dob_year) {
          $deceased->date_of_birth = $deceased->dob_year."-".$deceased->dob_month."-".$deceased->dob_day;
        };
        if ($deceased->dod_day && $deceased->dod_month && $deceased->dod_year) {
          $deceased->date_of_death = $deceased->dod_year."-".$deceased->dod_month."-".$deceased->dod_day;
        };
        $yob = intval(\Illuminate\Support\Str::limit($deceased->date_of_birth,4,$end=''));
        $yod = intval(\Illuminate\Support\Str::limit($deceased->date_of_death,4,$end=''));
        $age = $yod - $yob;
        $mob = intval(substr($deceased->date_of_birth,-5,2));
        $mod = intval(substr($deceased->date_of_death,-5,2));
        if ($age > 0) {
          if ($mob > $mod) {
            $age = $age - 1;
          } elseif ($mob == $mod) {
            $day_of_birth = intval(substr($deceased->date_of_birth,-1,2));
            $day_of_death = intval(substr($deceased->date_of_death,-1,2));
            if ($day_of_birth > $day_of_death) {
              $age = $age - 1;
            };
          };
        };
      };
      $deceased->age = $age;
      return view('cemetery.individual',[
        'css' => 'cemetery',
        'deceased' => $deceased,
        'param_name' => $param_name,
        'param_value' => $param_value
      ]);
    }

    public function find() {
      $deceased = Deceased::all();
      // Gets a fixed number of random deceased names
      $name_list = [];
      $id_list = [];
      foreach ($deceased as $random) {
        if ($random->is_deceased == 1) {
          if ($random->title) {
            $random->first_name = $random->title." ".$random->first_name;
          };
          if ($random->nickname) {
            $random->nickname = explode(";",$random->nickname)[0];
            $random->first_name = $random->first_name." '".$random->nickname."'";
          };
          if ($random->suffix_name) {
            $random->last_name = $random->last_name." ".$random->suffix_name;
          };
          $name_list[] = [$random->first_name,$random->last_name];
          $id_list[] = $random->id;
        };
      };
      $min_number = 20;
      if (count($name_list) < $min_number) {
        $last_number = count($name_list);
      } else {
        $last_number = $min_number;
      };
      $random_list = [];
      $random_id_list = [];
      for ($num = 0; $num < $last_number; $num++) {
        $selected = random_int(0,count($name_list)-1);
        $new_name = $name_list[$selected];
        $new_id = $id_list[$selected];
        $is_new = true;
        for ($check = 0; $check < count($random_id_list); $check++) {
          if ($random_id_list[$check] == $new_id) {
            $is_new = false;
          };
        };
        if ($is_new == true) {
          $random_list[] = $new_name;
          $random_id_list[] = $new_id;
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

    public function improve_data() {
      return view('cemetery.improve',[
        'css' => 'cemetery'
      ]);
    }

    public function contact() {
      // $all_users = User::all();
      $all_users = User::where('email','!=',null)->orderBy('list_order','desc')->get();
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
