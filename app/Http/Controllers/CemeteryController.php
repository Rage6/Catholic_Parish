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
        $deceased = Deceased::all();
        $open_plot_count = 0;
        foreach ($deceased as $one_deceased) {
          if ($one_deceased->purchased_by == null && $one_deceased->is_deceased) {
            $open_plot_count++;
          };
        };
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
        return view('cemetery.index',[
          'css' => 'cemetery',
          'all_deceased' => $deceased,
          'open_plot_count' => $open_plot_count,
          'cem_user' => $cemetery_users,
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
