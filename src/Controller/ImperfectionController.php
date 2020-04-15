<?php

namespace App\Controller;

use App\Repository\ImperfectionTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ImperfectionController extends AbstractController
{
    /**
     * @Route("/imperfection", name="imperfection_index")
     */
    public function index()
    {
        return $this->render('imperfection/index.html.twig'
           );
    }






}
