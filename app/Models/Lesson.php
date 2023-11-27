<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $with = ["course"];

    public function scopeFilter(Builder $query, $course)
    {
        $ppk = Course::where("slug", $course)->get();

        $query->when($course ?? false, function (Builder $query) use ($ppk) {
            return $query->where("course_id", $ppk[0]->id);
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
