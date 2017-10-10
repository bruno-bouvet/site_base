<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @throws \LogicException
     */
    public function indexAction()
    {
        $name = $this->getUser();

        return $this->render('@Blog/Default/index.html.twig', array(
            'name' => $name,
        ));
    }

}