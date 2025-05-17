<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;       
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
         'eco_preferences', // preferencias ecológicas
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class)
            ->withPivot('assigned_at', 'completed_at')
            ->withTimestamps();
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function metrics()
    {
        return $this->hasMany(\App\Models\UserMetric::class);
    }
}
