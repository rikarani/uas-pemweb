<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Course extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ["id"];

    public function scopeSemester(Builder $query, $semester)
    {
        return $query->when($semester ?? false, function (Builder $query) use ($semester) {
            $query->where("semester", $semester);
        });
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
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
