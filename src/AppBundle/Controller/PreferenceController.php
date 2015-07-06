<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Preference;

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

}
