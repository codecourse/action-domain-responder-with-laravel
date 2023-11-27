<?php

namespace App\Forum\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'body',
        'topic_id'
    ];
}
