<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Enums\Roles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Role extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = ['name'];

    protected $casts = [
        'name' => Roles::class,
    ];

    public function scopeRoleByName(Builder $query, string $role): Builder
    {
        return $query->where('name', $role);
    }
}
