<?php

namespace App\Forum\Domain\Repositories;

use App\Forum\Domain\Models\Topic;

class TopicRepository
{
    public function all()
    {
        return Topic::get();
    }

    public function create($data)
    {
        return Topic::create($data);
    }
}