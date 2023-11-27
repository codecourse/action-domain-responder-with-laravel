<?php

namespace App\Forum\Actions;

use App\Forum\Domain\Repositories\TopicRepository;
use App\Forum\Domain\Services\CreateTopicService;
use App\Forum\Domain\Services\ListTopicService;
use App\Forum\Responders\CreateTopicResponder;
use App\Forum\Responders\ListTopicResponder;
use Illuminate\Http\Request;

class ListTopicAction
{
    protected $service;

    protected $responder;

    public function __construct(ListTopicService $service, ListTopicResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        $topics = $this->service->handle();

        return $this->responder->withResponse($topics)->respond();
    }
}
