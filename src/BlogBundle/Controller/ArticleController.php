<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 26/10/2017
 * Time: 10:59
 */

namespace BlogBundle\Controller;


use BlogBundle\Entity\Author;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package BlogBundle\Controller
 * @Route("/")
 */
class ArticleController extends Controller
{
    /**
     * Finds and displays a post entity.
     *
     * @Route("/article/{slug}", name="article", defaults={"slug" = false}, requirements={"slug" = "[0-9a-zA-Z\/\-]*"})
     * @Method("GET")
     * @param Post $post
     * @return Response
     */
    public function showAction(Post $post): Response
    {
        $em = $this->getDoctrine()->getManager();

        $lastPost = $em->getRepository('BlogBundle:Post')->getLastEntity();
        $posts = $em->getRepository(Post::class)->findArticleByDate();


        $author = [];
        $author = $em->getRepository(Author::class)->findBy($author);

        return $this->render('@Blog/Default/article.html.twig', array(
            'post' => $post,
            'lastPost' => $lastPost,
            'posts' => $posts,
            'author' => $author,
        ));
    }


}