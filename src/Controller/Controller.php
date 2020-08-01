<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class Controller extends AbstractController
{
    protected function jsonResponse($data, array $config = []): JsonResponse
    {
        $context = [];

        if (isset($config['ignores'])) {
            $context[AbstractNormalizer::IGNORED_ATTRIBUTES] = $config['ignores'];
        }

        if (isset($config['includes'])) {
            $context[AbstractNormalizer::ATTRIBUTES] = $config['includes'];
        }

        return parent::json($data, 200, [], $context);
    }
}
