<?php

namespace ValidationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use ValidationBundle\Entity\Author;
use ValidationBundle\Form\AuthorType;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/validation")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $author = new Author();
        
        $form = $this->createForm(AuthorType::class, $author);
        // ... do something to the $author object
        
        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/datasource", name="datasource")
     */
    public function dataSourceAction()
    {
        $data = array(array("text"=> "Name 1",
                            "value"=>"Company 1"),
                      array("text"=> "Name @",
                            "value"=>"Company 2"),
                       array("text"=> "Name 2",
                            "value"=>"Company 3"),
                            array("text"=> "Name 4",
                                "value"=>"Company 4"),
                            array("text"=> "Name 5",
                                "value"=>"Company 5"),
                            array("text"=> "Name 6",
                                "value"=>"Company 6")
                      );
        
       return JsonResponse::create($data);
    }
}
