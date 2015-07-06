<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Profile;

class ProfileController extends Controller {

    /**
     * @Route("/api/profile/save", name="profile-save")
     */
    public function saveAction() {
        $username = $this->get('request')->get('username');
        if ($username != '') {
          $profile = new Profile();
          $profile->setUsername($username);
          $profile->setCreatedAt(new \DateTime());
          $profile->setLastConnection(new \DateTime());

          $em = $this->getDoctrine()->getManager();
          $em->persist($profile);
          $em->flush();
        }
        return new JsonResponse(array(
          'idProfile' => $profile->getIdProfile()
        ));
    }

}
