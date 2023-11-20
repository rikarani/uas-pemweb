<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ["id"];

    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function sluggable(): array
    {
        return [
            "slug" => [
                "source" => "name"
            ]
        ];
    }
}
