<?php

namespace App\Forum\Responders;

use App\App\Domain\Payloads\ValidationPayload;
use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Forum\Domain\Models\Topic;
use App\Forum\Domain\Resources\TopicResource;
use Illuminate\Support\MessageBag;

class ListTopicResponder extends Responder implements ResponderInterface
{
    /**
     * [respond description]
     * @param  Topic  $topic [description]
     * @return [type]        [description]
     */
    public function respond()
    {
        return TopicResource::collection($this->response->getData());
    }
}
