<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Product::class);
        $produit = $repo->findOneBy(["name"=>'Huile de Jojoba']);

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'produit'=>$produit,
        ]);
    }
}
