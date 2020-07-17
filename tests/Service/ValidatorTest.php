<?php

namespace App\Tests;

use App\Exception\ValidationException;
use App\Service\Validator;
use App\Tests\TestCase;
use Symfony\Component\Validator\Constraints as Assert;

class ValidatorTest extends TestCase
{
    private $validator;

    public function setUp()
    {
        self::bootKernel();
        $this->validator = self::$container->get(Validator::class);
    }

    public function testCanThrowExceptionWhenGivenInvalidData()
    {
        $this->expectException(ValidationException::class);

        $entity = new Entity();

        $this->validator->validate($entity);
    }
}

class Entity
{
    /**
     * @Assert\NotNull
     */
    private $property1;

    public function setPropertyOne($property1): self
    {
        $this->property1 = $property1;
    }
}
