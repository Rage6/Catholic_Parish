<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'first_name',
      'maiden_name',
      'last_name',
      'suffix_name',
      'date_of_birth',
      'date_of_death',
      'personal_description',
      'on_tombstone',
      'spouse',
      'children',
      'email',
      'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function all_user_roles() {
      return $this->belongsToMany('App\Models\Role');
    }

    // For example, this function is used by the 'UserRole.php' middleware that I made.
    public function check_for_role($role_title) {
      foreach ($this->all_user_roles as $one_role) {
        if ($one_role->title == $role_title) {
          return true;
        };
      };
      return false;
    }

    public function check_for_permission($permission_label) {
      foreach ($this->all_user_roles as $one_role) {
        $all_permissions = Role::find($one_role->id)->all_role_permissions;
        foreach ($all_permissions as $one_permission) {
          if ($one_permission->label == $permission_label) {
            return true;
          };
        };
      };
      return false;
    }
}
