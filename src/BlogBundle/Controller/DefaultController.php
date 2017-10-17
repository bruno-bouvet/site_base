<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @throws \LogicException
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


//    /**
//     * Finds and displays a post entity.
//     *
//     * @Route("/{$id}/{Slug}", name = "article")
//     * @Method("GET")
//     * @param $Slug
//     * @return Response
//     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
//     * @throws \LogicException
//     */
//    public function showAction( $Slug): Response
//    {
//        $article = $this->getDoctrine()
//            ->getRepository(Post::class)
//            ->findOneBy(array('slug' => $Slug));
//        dump($article);
//
//        if (!$article) {
//            throw $this->createNotFoundException();
//        }
//
//        return $this->render('@Blog/Default/article.html.twig', array(
//            'article' => $article,
//        ));
//    }

    /**
     * Finds and displays a post entity.
     *
     * @Route("/{id}", name="article")
     * @Method("GET")
     * @param Post $post
     * @return Response
     */
    public function showAction(Post $post): Response
    {

        return $this->render('@Blog/Default/article.html.twig', array(
            'post' => $post,
        ));
    }
}