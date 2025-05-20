<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManualAction extends Model
{
    protected $fillable = ['user_id', 'action', 'description', 'date'];
}
