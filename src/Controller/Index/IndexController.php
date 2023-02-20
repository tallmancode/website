<?php

namespace App\Controller\Index;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'bodyClass' => 'overlay-header',
            'pageKeywords' => 'Fullstack developer, PHP developer, MySQL developer, JavaScript developer, Vue.js developer, Symfony developer, Web development portfolio, Front-end development, Back-end development, Fullstack web development, Web application development, Custom web development, Responsive web design, User experience (UX) design, Web development services, Website optimization, Agile development, MVC framework, Object-oriented programming (OOP), Cross-browser compatibility',
            'pageDescription' => 'TallmanCode is the portfolio website of a skilled Fullstack developer specializing in PHP, MySQL, JavaScript, Vue.js, and Symfony. Explore a collection of web development projects that showcase expertise in front-end and back-end development, including custom web applications, responsive design, and user experience (UX) design. Discover how TallmanCode leverages web development technologies to create innovative, dynamic, and functional software solutions.',
            'pageTitle' => 'TallmanCode - Fullstack Developer Portfolio | PHP, MySQL, JavaScript, Vue.js, Symfony'
        ]);
    }
}
