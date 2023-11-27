<?php

namespace App\App\Responders;

use App\App\Domain\Payloads\ValidationPayload;

abstract class Responder
{
    protected $response;

    public function withResponse($response)
    {
        $this->response = $response;

        return $this;
    }
}
