<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController
{
    public function getRequestPayload(Request $request): array
    {
        return \json_decode(json: $request->getContent(), associative: true, flags: JSON_THROW_ON_ERROR);
    }
}