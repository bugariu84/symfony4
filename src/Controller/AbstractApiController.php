<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 19.02.2018
 * Time: 20:23
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AbstractApiController extends Controller
{
    protected function jsonResponse($data)
    {
        $jsonContent = $this->serialize($data);

        return new Response($jsonContent, 200, ['Content-Type' => 'application/json']);
    }

    protected function serialize($data, $format = 'json')
    {
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer([$normalizer], [$encoder]);

        try {
            $normalizer->setCircularReferenceHandler(function ($object) {
                return $object->getId();
            });
            return $serializer->serialize($data, 'json');
        } catch (CircularReferenceException $e) {
            throw $e;
        }
    }
}