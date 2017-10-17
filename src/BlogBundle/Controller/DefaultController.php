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

        $tags = $em->getRepository('BlogBundle:Post')->getPostTags();
        $posts = $em->getRepository('BlogBundle:Post')->findAll();

        return $this->render('@Blog/Default/index.html.twig', array(
            'name' => $name,
            'posts' => $posts,
            'lastPost' => $lastPost,
            'tags' => $tags,
        ));
    }


    /**
     * Finds and displays a post entity.
     *
     * @Route("/{Slug}", name = "article")
     * @Method("GET")
     * @param Request $request
     * @param $Slug
     * @return Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \LogicException
     */
    public function showAction(Request $request, $Slug): Response
    {
        $article = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findOneBy(array('slug' => $Slug));
dump($article);

        if (!$article) {
            throw $this->createNotFoundException();
        }

        return $this->render('@Blog/Default/article.html.twig', array(
            'article' => $article,
        ));
    }


    /**
     * @param $text
     * @return mixed|string
     */
    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('#[^\\pL\d]+#u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        if (function_exists('iconv'))
        {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('#[^-\w]+#', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }

        return $text;
    }
}