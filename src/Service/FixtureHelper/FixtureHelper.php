<?php

namespace App\Service\FixtureHelper;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class FixtureHelper
{
    /**
     * @throws ExceptionInterface
     */
    public function mapArrayToEntity($data, $class)
    {
        $serializer = new Serializer([new ObjectNormalizer()]);
        return $serializer->denormalize($data, $class);
    }
}