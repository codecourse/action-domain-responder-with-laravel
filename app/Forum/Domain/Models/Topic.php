<?php

namespace App\Forum\Domain\Models;

use App\Forum\Domain\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public static function boot()
    {
        parent::boot();
        
        static::created(function ($topic) {
            $topic->update([
                'slug' => str_slug($topic->id . ' ' . $topic->title)
            ]);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
