<?php

namespace App\Exception;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationList;

class ValidationException extends Exception implements ResponseExceptionInterface
{
    private $response;

    public function __construct(ConstraintViolationList $errors)
    {
        parent::__construct('Invalid input data', Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->response = new JsonResponse(
            [
                'messages' => $this->processErrorMessages($errors)
            ],
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    private function processErrorMessages(ConstraintViolationList $errors)
    {
        $messages = [];

        foreach ($errors as $error) {
            $messages[] = $error->getMessage();
        }

        return $messages;
    }

    public function getResponse(): JsonResponse
    {
        return $this->response;
    }
}
