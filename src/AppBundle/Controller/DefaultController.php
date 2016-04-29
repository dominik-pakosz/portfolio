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
        return $this->render('portfolio/home.html.twig');
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
        return $this->render('portfolio/portfolio.html.twig');
    }
    
    /**
     * @Route("/work/{id}", name="work", defaults={"id" = null})
     */
    public function workAction($id)
    {
        if ($id) {
            //logika pobrania i wyświetlenia konkretnej pracy z bazy
        } else {
            return $this->redirectToRoute('homepage');
        }
    }
    
    /**
     * @Route("/blog", name="blog")
     */
    public function blogAction()
    {
        return $this->render('/portfolio/blog.html.twig');
    }
    
    /**
     * @Route("/post/{title}", name="post", defaults={"title" = null})
     */
    public function postAction($title)
    {
        if ($title) {
            //logika wyciągania posta z bazy 
        } else {
            return $this->redirectToRoute('homepage');
            //lub wywal 404 -> jeszcze do przemyślenia
        }
    }
    
    /**
     * @Route("/kontakt", name="contact")
     */
    public function contactAction()
    {
        return $this->render('/portfolio/contact.html.twig');
    }
}