<?php

namespace App\Forum\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\ValidationPayload;
use App\App\Domain\ServiceInterface;
use App\Forum\Domain\Repositories\PostRepository;
use App\Forum\Domain\Repositories\TopicRepository;

class ListTopicService implements ServiceInterface
{
    /**
     * [$topics description]
     * @var [type]
     */
    protected $topics;

    /**
     * [__construct description]
     * @param TopicRepository $topics [description]
     * @param PostRepository  $posts  [description]
     */
    public function __construct(TopicRepository $topics)
    {
        $this->topics = $topics;
    }

    /**
     * [handle description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function handle($data = [])
    {
        return new GenericPayload($this->topics->all());
    }
}
