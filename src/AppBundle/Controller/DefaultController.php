<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use ValidationBundle\Entity\Author;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/extension/{name}", name="extension")
     */
    public function extensionAction(Request $request)
    {
        return $this->render('extensions/index.html.twig', 
            array('name'   => $request->get('name'),
                  'adulte' => true,
            ));
    }
    
    /**
     * @Route("/curl", name="curl")
     */
    public function cURLAction(Request $request)
    {
        $cURL = $this->container->get('app.curl');
        
        $response = $cURL->get('https://jsonplaceholder.typicode.com/todos/',['p' => 'n']);
        
        dump($response);
        
        exit;
    }
   
    
    /**
     * @Route("/validateAuthor", name="validate_author")
     */
    public function validateAuthorAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $validator = $this->get('validator');

        $author = new Author();
        
        $author->setName('Youssef');
        $author->setBook('BigBang');
        $author->setNotification(true);
        
        $validator = $this->get('validator');
        $errors = $validator->validate($author);
        
        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging.
             */
            $errorsString = (string) $errors;
            
            return new Response($errorsString);
        }
        
        $em->persist($author);
        $em->flush();
        
        return new Response('The author is valid! Yes!');
    }
}
