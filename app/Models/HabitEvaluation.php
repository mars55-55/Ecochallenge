<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitEvaluation extends Model
{
    protected $fillable = ['user_id', 'answers', 'carbon_footprint'];
}
