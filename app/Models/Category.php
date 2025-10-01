<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Category extends Model
{
    use Sluggable, SoftDeletes;

    protected $guarded = ['id'];

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeGetCategories(Builder $query): Builder
    {
        return $query->select(['name', 'slug']);
    }

    public function scopeGetCategoriesById(Builder $query): Builder
    {
        return $query->select(['id', 'name']);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
