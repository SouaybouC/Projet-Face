<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Entity\Product;
use App\Form\CommentsType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index (ProductRepository $productRepository)
    {
        $produits = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('product/index.html.twig',
            [
                'produits'=>$produits

            ]);
    }

    /**
     * @Route("/{name}", name ="product")
     */
    public function form(Request $request)
    {

        $produit = $this->getDoctrine()->getRepository(Product::class)->findOneByName('Huile de Callophyle');

        if (!$produit) {
            // Si aucun article n'est trouvé, nous créons une exception
            throw $this->createNotFoundException('Pas de produit');
        }
        $commentaires = $this->getDoctrine()->getRepository(Comments::class)->findAll();


        // Nous créons l'instance de "Commentaires"
        $comments = new Comments();

        // Nous créons le formulaire en utilisant "CommentairesType" et on lui passe l'instance
        $form = $this->createForm(CommentsType::class, $comments);
        $form->handleRequest($request);
        //Nous vérifions si le formulaire à été soumis
        if ($form->isSubmitted()&& $form->isValid()) {

            // Hydrate notre commentaire avec l'article
            $comments->setProductRelation($produit);

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($comments);
            $doctrine->flush();

        }

        return $this->render('product/index.html.twig', [
            'form' => $form->createView(),
            'produit'=> $produit,
            'comments'=>$comments,

        ]);
    }

    /**
     * @Route("/edit/{id}", name ="comment_edit")
     */

    public function edit(Request $request, Comments $comments){

        $product = $this->getDoctrine()->getRepository(Product::class)->findOneByName('Huile de Callophyle');
        $form = $this->createForm(CommentsType::class, $comments);
        $form->handleRequest($request);


        //Nous vérifions si le formulaire à été soumis
        if ($form->isSubmitted()&& $form->isValid()) {
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->flush();
            return $this->redirectToRoute('product', ['name'=>$product->getName()]);

        }

        return $this->render('product/removecom.html.twig', [
            'form' => $form->createView(),
            'produit'=> $product,
            'comments'=>$comments,

        ]);

    }

    /**
     * @Route("/product/{id}", name ="delete")
     */

    public function delete(Comments $comments){

        $product = $this->getDoctrine()->getRepository(Product::class)->findOneByName('Huile de Callophyle');
        $doctrine= $this->getDoctrine()->getManager();
        $doctrine->remove($comments);
        $doctrine->flush();

        return $this->redirectToRoute('product', ['name'=>$product->getName()]);
    }


}

