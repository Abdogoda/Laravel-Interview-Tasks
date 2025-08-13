<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function getAllPermissions(): array
    {
        $directPermissions = $this->permissions->pluck('name')->toArray();
        $rolePermissions = $this->roles->flatMap(fn($role) => $role->permissions->pluck('name'))->toArray();
        return array_unique(array_merge($directPermissions, $rolePermissions));
    }

    public function hasPermissions(array $permissions): bool
    {
        return !empty(array_intersect($this->getAllPermissions(), $permissions));
    }
}
