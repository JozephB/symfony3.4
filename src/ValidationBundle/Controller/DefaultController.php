<?php

namespace ValidationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use ValidationBundle\Entity\Author;

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
        
        // ... do something to the $author object
        
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
        
        return new Response('The author is valid! Yes!');
    }
}
