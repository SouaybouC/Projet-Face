<?php

namespace App\Controller;

use App\Repository\ImperfectionTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/imperfection", name="imperfection")
 */
class ImperfectionController extends AbstractController
{
    /**
     * @Route("/", name="imperfection_index")
     */
    public function index(ImperfectionTypeRepository $imperfectionTypeRepository)
    {
        return $this->render('imperfection/index.html.twig', [
            'imperfections' => $imperfectionTypeRepository->findAll(),
        ]);
    }






}
