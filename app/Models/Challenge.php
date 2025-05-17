<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'category', 'frequency',
        'co2_saved', 'water_saved', 'waste_avoided', 'created_by'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('assigned_at', 'completed_at')
            ->withTimestamps();
    }
}
