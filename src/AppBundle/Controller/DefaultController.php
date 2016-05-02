<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $recentWorks = $this->getDoctrine()->getRepository('AppBundle:Portfolio')->findThreeNewest();
        $recentPosts = $this->getDoctrine()->getRepository('AppBundle:Blog')->findThreeNewest();
        return $this->render('portfolio/home.html.twig', array(
            'works' => $recentWorks,
            'posts' => $recentPosts
        ));
    }
    
    /**
     * @Route("/o-mnie", name="about")
     */
    public function aboutAction()
    {
        return $this->render('portfolio/about.html.twig');
    }
    
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function portfolioAction()
    {
        $allWorks = $this->getDoctrine()->getRepository('AppBundle:Portfolio')->findAll();
       
        return $this->render('portfolio/portfolio.html.twig', array(
            'allWorks' => $allWorks
        ));
    }
    
    /**
     * @Route("/work/{id}", name="work", defaults={"id" = null})
     */
    public function workAction($id)
    {
        $work = $this->getDoctrine()->getRepository('AppBundle:Portfolio')->findOneBy(array('id' => $id));
        if (!$work) {
            throw $this->createNotFoundException('Nie znaleziono takiej pracy!');
        }
        
        return $this->render('/portfolio/work.html.twig', array(
            'work' => $work
        ));
    }
    
    /**
     * @Route("/blog", name="blog")
     */
    public function blogAction()
    {
        $posts = $this->getDoctrine()->getRepository('AppBundle:Blog')->findAll();
        
        return $this->render('/portfolio/blog.html.twig', array(
            'posts' => $posts
        ));
    }
    
    /**
     * @Route("/post/{id}", name="post", defaults={"id" = null})
     */
    public function postAction($id)
    {
        $post = $this->getDoctrine()->getRepository('AppBundle:Blog')->findOneBy(array('id' => $id));
        
        if (!$post) {
            throw $this->createNotFoundException('Nie znaleziono takiego artykułu!');
        }
        
        return $this->render('/portfolio/post.html.twig', array(
            'post' => $post
        ));
    }
    
    /**
     * @Route("/kontakt", name="contact")
     */
    public function contactAction()
    {
        return $this->render('/portfolio/contact.html.twig');
    }
}