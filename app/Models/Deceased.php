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
      'date_of_birth',
      'date_of_death',
      'on_tombstone',
      'spouse',
      'children',
      'is_deceased',
      'is_purchased'
    ];
}
