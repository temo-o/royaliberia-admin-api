<?php

namespace App\Controller;

use App\Service\PersonService;
use JsonException;
use Symfony\Component\HttpFoundation\Request;

class PersonController extends AbstractController
{
    public function __construct(protected PersonService $personService)
    {
    }

//    /**
//     * @throws JsonException
//     */
//    public function createPerson(Request $request): array
//    {
//        $data = $this->getRequestPayload($request);
//        return $this->personService->createPerson($data);
//    }
}