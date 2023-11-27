<?php

namespace App\Forum\Responders;

use App\App\Domain\Payloads\ValidationPayload;
use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Forum\Domain\Models\Topic;
use App\Forum\Domain\Resources\TopicResource;
use Illuminate\Support\MessageBag;

class CreateTopicResponder extends Responder implements ResponderInterface
{
    /**
     * [respond description]
     * @param  Topic  $topic [description]
     * @return [type]        [description]
     */
    public function respond()
    {
        if ($this->response->getStatus() !== 200) {
            return response()->json($this->response->getData(), $this->response->getStatus());
        }

        return (new TopicResource($this->response->getData()))
            ->response()
            ->setStatusCode($this->response->getStatus());
    }
}
