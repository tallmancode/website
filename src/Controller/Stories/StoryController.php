<?php

namespace App\Controller\Stories;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoryController extends AbstractController
{
    #[Route('/stories', name: 'stories')]
    public function index(): Response
    {
        return $this->render('stories/index.html.twig', [
            'controller_name' => 'StoryController',
            'pageRobots' => 'index, follow',
            'bodyClass' => 'overlay-header with-logo',
        ]);
    }

    #[Route('/stories/{slug}', name: 'stories_story')]
    public function story(): Response
    {
//        return $this->render('stories/story/index.html.twig', [
//            'controller_name' => 'StoryController',
//        ]);
    }
}
