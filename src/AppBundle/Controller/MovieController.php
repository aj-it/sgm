<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class MovieController extends Controller {

    /**
     * @Route("/api/movie/list", name="movie-list")
     */
    public function listAction() {
        $movies = $this->getDoctrine()
                ->getRepository('AppBundle:Movies')
                ->listAll();
        $data = array();
        foreach ($movies as $movie) {
            $data[] = array(
                'id' => $movie->getIdMovie(),
                'title' => $movie->getTitle(),
                'poster' => $movie->getImdbPoster()
            );
        }
        return new JsonResponse($data);
    }

}
