<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'text',
        'image',
        'image_seo',
        'slug',
    ];

    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'date:d-m-Y',
    ];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Ymd His');
    }

    public static function getNextId()
    {
        if (Blog::all()->last() !== null) {
            $lastId = Blog::all()->last()->id + 1;
        } else {
            $lastId = 1;
        }

        return $lastId;
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function activeComments()
    {
        return $this->hasMany(BlogComment::class)->where('status', '=', '1');
    }
}
