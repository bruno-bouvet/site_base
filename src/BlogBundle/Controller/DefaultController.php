<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Post;
use DateInterval;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @throws \LogicException
     * @throws \Exception
     */
    public function indexAction()
    {
        $name = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $lastPost = $em
            ->getRepository('BlogBundle:Post')->getLastEntity();

        $tags = $em->getRepository(Post::class)->getPostTags();
        $posts = $em->getRepository(Post::class)->findArticleByDate();

        return $this->render('@Blog/Default/index.html.twig', array(
            'name' => $name,
            'posts' => $posts,
            'lastPost' => $lastPost,
            'tags' => $tags,
        ));
    }

    /**
     * @throws \LogicException
     */
    public function sideBarAction()
    {
        $name = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $lastPost = $em
            ->getRepository('BlogBundle:Post')->getLastEntity();

        $tags = $em->getRepository(Post::class)->getPostTags();
        $posts = $em->getRepository(Post::class)->findArticleByDate();

        return $this->render('@Blog/includes/sidebar-actus.html.twig', array(
            'name' => $name,
            'posts' => $posts,
            'lastPost' => $lastPost,
            'tags' => $tags,
        ));
    }

    /**
     * Finds and displays a post entity.
     *
     * @Route("/{id}", name="article")
     * @Method("GET")
     * @param Post $post
     * @return Response
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    public function showAction(Post $post): Response
    {
        $em = $this->getDoctrine()->getManager();

        $lastPost = $em->getRepository('BlogBundle:Post')->getLastEntity();
        $posts = $em->getRepository(Post::class)->findArticleByDate();

        return $this->render('@Blog/Default/article.html.twig', array(
            'post' => $post,
            'lastPost' => $lastPost,
            'posts' => $posts,
        ));
    }
}