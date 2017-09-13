<?php

namespace AppBundle\Controller;

use AppBundle\Entity\YksiViesti;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LueController extends Controller
{
     /**
     * @Route("/lue", name="sisalto")
     */
    
    public function indexAction(Request $request)
{
  
    $repository = $this->getDoctrine()->getRepository(YksiViesti::class);
    
    $kaikkiViestit = $repository->findAll();

    return $this->render('default/lue.html.twig', array(
            'kaikkiviestit' => $kaikkiViestit,
));

    
}
}

