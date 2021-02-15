<?php

namespace App\Controller;

use App\Repository\AirlinesRepository;
use App\Repository\AirportsRepository;
use App\Repository\FlightsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\Constraints\Json;
use \DateTime;

/**
 * @Route("/api", name="api_")
 */
class APIController extends AbstractController
{

    /**
     * @Route("/flights/flightSearch", name="flightSearch", methods={"POST"})
     * @param FlightsRepository $flightRepo
     * @param Request $request
     * @return Response
     */
    public function flightSearch(FlightsRepository $flightRepo , Request $request): Response
    {
        $arrival_airport = $request->request->get('arrival_airport', null);
        $departure_airport = $request->request->get('departure_airport', null);
        $arrival_time = $request->request->get('arrival_time', null);
        $departure_time = $request->request->get('departure_time', null);

        if(empty($arrival_airport)){
            throw new BadRequestHttpException(("Content is Empty"));
        }

        $arrival_time_p = new DateTime($arrival_time);
        $departure_time_p = new DateTime($departure_time);

        $criteria = Array ('arrival_airport' => $arrival_time_p,
            'arrival_airport' => $arrival_airport,
            'departure_time' => $departure_time_p,
            'departure_airport' => $departure_airport);

        $flights = $flightRepo->findBy($criteria);

        $encoders = [new JsonEncoder()];

        $normalizers = [new DateTimeNormalizer(), new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($flights , 'json' ,[
            'circular_reference_handler' => function($object){
                return $object->getId();
            }
        ]);

        return new Response($jsonContent);

    }

    /**
     * @Route("/flights/listOfFlights", name="listOfFlights", methods={"GET"})
     * @param FlightsRepository $flightRepo
     * @return Response
     */
    public function listOfFlights(FlightsRepository $flightRepo): Response
    {
        $flights = $flightRepo->findAll();

        $encoders = [new JsonEncoder()];

        $normalizers = [new DateTimeNormalizer(), new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($flights , 'json' ,[
            'circular_reference_handler' => function($object){
            return $object->getId();
            }
        ]);

        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return  $response;
    }

    /**
     * @Route("/flights/listOfAirports", name="listOfAirports", methods={"GET"})
     * @param AirportsRepository $airportRepo
     * @return Response
     */
    public function listOfAirports(AirportsRepository $airportRepo): Response
    {
        $airports = $airportRepo->findAll();

        $encoders = [new JsonEncoder()];

        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($airports , 'json' ,[
            'circular_reference_handler' => function($object){
                return $object->getId();
            }
        ]);

        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return  $response;
    }

    /**
     * @Route("/flights/listOfAirlines", name="listOfAirlines", methods={"GET"})
     * @param AirlinesRepository $airlinesRepo
     * @return Response
     */
    public function listOfAirlines(AirlinesRepository $airlinesRepo): Response
    {
        $airlines = $airlinesRepo->findAll();

        $encoders = [new JsonEncoder()];

        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($airlines , 'json' ,[
            'circular_reference_handler' => function($object){
                return $object->getId();
            }
        ]);

        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return  $response;
    }
}
