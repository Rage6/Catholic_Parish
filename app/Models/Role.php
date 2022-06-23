<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Role extends Model
{
    use HasFactory;

    public function all_roles() {
      return Role::all();
    }

    public function all_role_permissions() {
      return $this->belongsToMany('App\Models\Permission');
    }

    public function users_permissions($user_id) {
      $users_permissions = [];
      foreach (User::find($user_id)->all_user_roles as $one_role) {
        foreach(Role::find($one_role->id)->all_role_permissions as $one_permission) {
          $is_unique = true;
          for ($num = 0; $num < count($users_permissions); $num++) {
            if ($one_permission->label == $users_permissions[$num]) {
              $is_unique = false;
            };
          };
          if ($is_unique == true) {
            $users_permissions[] = [$one_permission->label,$one_permission->slug];
          };
        };
      };
      return $users_permissions;
    }
}
