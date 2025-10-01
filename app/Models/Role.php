<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Roles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class Role extends Model
{
    protected $fillable = ['name'];

    protected $casts = [
        'name' => Roles::class,
    ];

    public function scopeRoleByName(Builder $query, string $role): Builder
    {
        return $query->where('name', $role);
    }
}
