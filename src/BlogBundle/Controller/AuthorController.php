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
use BlogBundle\Entity\User;
use Doctrine\ORM\Mapping\Id;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @return Response
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \UnexpectedValueException
     */
    public function showAuthorAction(Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();

        $name = $request->attributes->get('slug');

        $userName = $em->getRepository(User::class)->findByUserName($name);
        dump($userName);
        $authors = [];
        $authors = $em->getRepository(Post::class)->findBy($authors);
//        dump($authors);
        $lastPost = $em->getRepository('BlogBundle:Post')->getLastEntity();
        $posts = $em->getRepository(Post::class)->findArticleByDate();

        return $this->render('@Blog/Default/post/authorarticles.html.twig', array(
            'author' => $authors,
            'laspost' => $lastPost,
            'posts' => $lastPost,
        ));
    }


}