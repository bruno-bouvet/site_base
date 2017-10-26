<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 26/10/2017
 * Time: 14:13
 */

namespace BlogBundle\Controller;

use BlogBundle\Entity\Author;
use BlogBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class DefaultController
 * @package BlogBundle\Controller
 * @Route("/")
 */
class AuthorController extends Controller
{

    /**
     * Finds and displays a post entity.
     *
     * @Route("/author/{slug}", name="author", defaults={"slug" = false}, requirements={"slug" = "[0-9a-zA-Z\/\-]*"})
     * @Method("GET")
     * @return Response
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    public function showAuthorAction(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $authors = [];
        $authors = $em->getRepository(Post::class)->findBy($authors);
        dump($authors);
        $lastPost = $em->getRepository('BlogBundle:Post')->getLastEntity();
        $posts = $em->getRepository(Post::class)->findArticleByDate();

        return $this->render('@Blog/Default/post/authorarticles.html.twig', array(
            'author' => $authors,
            'laspost' => $lastPost,
            'posts' => $lastPost,
        ));
    }


}