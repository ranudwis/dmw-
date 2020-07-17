<?php

namespace App\Service;

use App\Exception\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator
{
    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate($entity)
    {
        $errors = $this->validator->validate($entity);

        if ($errors->count() !== 0) {
            throw new ValidationException($errors);
        }

        return true;
    }
}
