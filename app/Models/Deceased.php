<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    use HasFactory;

    protected $fillable = [
      'first_name',
      'middle_name',
      'last_name',
      'maiden_name',
      'suffix_name',
      'nickname',
      'prefers_middle_name',
      // 'date_of_birth',
      'dob_month',
      'dob_day',
      'dob_year',
      // 'date_of_death',
      'dod_month',
      'dod_day',
      'dod_year',
      'father_name',
      'mother_name',
      'title',
      'vocation',
      'on_tombstone',
      'spouse',
      'children',
      'profile_photo',
      'tombstone_photo',
      // 'map_photo',
      'zone',
      'is_deceased',
      'purchased_by',
      'public_notes',
      'admin_notes'
    ];
}
