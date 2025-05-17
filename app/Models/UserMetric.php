<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMetric extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'date', 'co2_saved', 'water_saved', 'waste_avoided'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
