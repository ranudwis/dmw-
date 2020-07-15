<?php

namespace Tests\Traits;

use Faker\Factory;

trait WithFaker
{
    private $faker;

    protected function setUpFaker()
    {
        $this->faker = Factory::create();
    }
}
