<?php

namespace AppBundle\Controller;

use AppBundle\Entity\YksiViesti;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class KirjoitaController extends Controller
{
    /**
     * @Route("/kirjoita", name="lomake")
     */
    public function indexAction(Request $request) {
        
         // create a task and give it some dummy data for this example
        $viestiKirjaan = new YksiViesti();
       // $viestiKirjaan->setKirjoitettuViesti("Just some dummy data...");
        $viestiKirjaan->setAjankohta(new DateTime());

        $form = $this->createFormBuilder($viestiKirjaan)
            ->add('kirjoittajanNimi', TextType::class)
            ->add('kirjoitettuViesti', TextType::class)
            // ->add('ajankohta', DateType::class)
            ->add('sahkopostiOsoite', EmailType::class) 
            ->add('kirjoitettuViesti', TextareaType::class)    
            ->add('save', SubmitType::class, array('label' => 'Tallenna viesti'))
            ->getForm();

         $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $task = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }
        
        return $this->render('default/kirjoita.html.twig', array(
            'form' => $form->createView(),
        ));
    }
        
    } 


