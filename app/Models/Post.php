<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ["id"];
    protected $with = ["author", "category"];

    public function scopeFilter(Builder $query, array $filters)
    {

        // * Search in All Post
        $query->when($filters["search"] ?? false, function ($query, $search) {
            return $query->where("title", "like", "%" . $search . "%")->orWhere("body", "like", "%" . $search . "%");
        });

        // * Search In Category
        $query->when(
            $filters["category"] ?? false,
            fn (Builder $query, string $category) =>
            $query->whereHas(
                "category",
                fn (Builder $query) =>
                $query->where("slug", $category)
            )
        );

        // * Search By Author
        $query->when(
            $filters["author"] ?? false,
            fn (Builder $query, string $author) =>
            $query->whereHas(
                "author",
                fn (Builder $query) =>
                $query->where("username", $author)
            )
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
