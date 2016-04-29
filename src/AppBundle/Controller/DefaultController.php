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
}
