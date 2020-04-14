<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImperfectionController extends AbstractController
{
    /**
     * @Route("/imperfection", name="imperfection")
     */
    public function index()
    {
        return $this->render('imperfection/index.html.twig', [
            'controller_name' => 'ImperfectionController',
        ]);
    }
}
