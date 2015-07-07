<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Preference;
use Elasticsearch\Client;

class PreferenceController extends Controller {


    /**
     * @Route("/api/preference/like", name="preference-like")
     */
    public function likeAction() {

      $idProfile = $this->get('request')->get('idProfile');
      $idMovie = $this->get('request')->get('idMovie');

      if ($idMovie && $idProfile) {

        $movie = $this->getDoctrine()->getRepository('AppBundle:Movie')->find($idMovie);
        $profile = $this->getDoctrine()->getRepository('AppBundle:Profile')->find($idProfile);

        $preference = new Preference();
        $preference->setIdMovie($movie)
          ->setIdProfile($profile)
          ->setLiked(1)
          ->setCreatedAt(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($preference);
        $em->flush();

      }

      return new JsonResponse($preference->getIdPreference());
    }

    /**
     * @Route("/api/preference/dislike", name="preference-dislike")
     */
    public function dislikeAction() {

      $idProfile = $this->get('request')->get('idProfile');
      $idMovie = $this->get('request')->get('idMovie');

      if ($idMovie && $idProfile) {

        $movie = $this->getDoctrine()->getRepository('AppBundle:Movie')->find($idMovie);
        $profile = $this->getDoctrine()->getRepository('AppBundle:Profile')->find($idProfile);

        $preference = new Preference();
        $preference->setIdMovie($movie)
          ->setIdProfile($profile)
          ->setLiked(0)
          ->setCreatedAt(new \DateTime());

        // Enregistrement de la préférence dans MySQL
        $em = $this->getDoctrine()->getManager();
        $em->persist($preference);
        $em->flush();

        // Mise à jour de la préférence dans ElasticSearch
        $client = new Client();
        $params['index'] = 'sgm';
        $params['type']  = 'movie';
        $params['id'] = $movie->getIdMovie();

        foreach ($preference->fetchAll() as $preference) {

        }


      }

      return new JsonResponse($preference->getIdPreference());
    }

}
