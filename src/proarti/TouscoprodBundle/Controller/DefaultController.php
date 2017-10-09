<?php

namespace proarti\TouscoprodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('@proartiTouscoprod/Default/index.html.twig');
    }

    /**
     * @Route("/faq")
     *
     * @return Response
     */
    public function faqAction()
    {
        return $this->render('@proartiTouscoprod/Default/faq.html.twig');
    }

    /**
     * @Route("/explanation")
     *
     * @return Response
     */
    public function explanationAction()
    {
        return $this->render('@proartiTouscoprod/Default/explanation.html.twig');
    }

    /**
     * @Route("/collect-default")
     *
     * @return Response
     */
    public function collectDefaultAction()
    {
        return $this->render('@proartiTouscoprod/Default/collect-default.html.twig');
    }

    /**
     * @Route("/collect")
     *
     * @return Response
     */
    public function collectPageAction()
    {
        return $this->render('@proartiTouscoprod/Default/collect-pages/collect-1.html.twig');
    }

    /**
     * @Route("/projectindex")
     *
     * @return Response
     */
    public function projectIndexAction()
    {
        return $this->render('@proartiTouscoprod/Default/project-index.html.twig');
    }

}
