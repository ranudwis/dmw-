<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Tests\Traits\WithFaker;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }

    protected function setUpTraits()
    {
        parent::setUpTraits();

        $uses = array_flip(class_uses_recursive(get_class($this)));

        if (isset($uses[WithFaker::class])) {
            $this->setUpFaker();
        }
    }
}
