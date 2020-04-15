<?php

namespace App\Controller;

use App\Entity\ImperfectionType;
use App\Entity\Product;
use App\Entity\UserImperfection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/imperfection")
 */
class ImperfectionController extends AbstractController
{
    /**
     * @Route("/", name="imperfection_index")
     */
    public function index(): Response
    {
        // Retourne la,page qui affiche le visage
        return $this->render('imperfection/index.html.twig'
        );
    }

    /**
     * @Route("/details", name="imperfection_details")
     */
    public function formPersist(Request $request, \Swift_Mailer $mailer)
    {

        $product = NULL;
        $user = $this->getUser();
        $manager = $this->getDoctrine()->getManager();
        $user_imperfection = new UserImperfection();

        $imperfection_repo = $manager->getRepository(ImperfectionType::class);

        // Creation du formulaire du details de l'imperfection
        $form = $this->createFormBuilder($user_imperfection)
            ->add('place', ChoiceType::class, [
                'choices' => [
                    'Front' => 'Front',
                    'Au niveau des Yeux' => 'Yeux',
                    'Nez' => 'Nez',
                    'Joue' => 'Joue',
                    'Autour de la Bouche' => 'Bouche',
                    'Menton' => 'Menton',

                ]
            ])
            ->add('CategoryImperfection', ChoiceType::class, [
                'choices' => [
                    'Bouton' => $imperfection_repo->findOneBy(['Label' => 'Bouton']),
                    'Rougeur' => $imperfection_repo->findOneBy(['Label' => 'Rougeur']),
                    'Cernes' => $imperfection_repo->findOneBy(['Label' => 'Cerne']),
                    'Points Noirs' => $imperfection_repo->findOneBy(['Label' => 'Point Noir']),
                    'Comedon' => $imperfection_repo->findOneBy(['Label' => 'Comedon']),
                    'Sqame (Pelage de la peau)' => $imperfection_repo->findOneBy(['Label' => 'Squame']),
                    'Couperose (Maladie de la peau)' => $imperfection_repo->findOneBy(['Label' => 'Couperose']),
                ]
            ])
            ->getForm();

        $form->handleRequest($request);
        // Condition de validation du formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            $user_imperfection->setDateImperfection(new \DateTime());
            $user_imperfection->setUserRelation($user);
            $manager->persist($user_imperfection);
            $manager->flush();


            $product_repo = $manager->getRepository(Product::class);

            // Conditions afin de resortir le produit
            if ($user_imperfection->getCategoryImperfection() === $imperfection_repo->findOneBy(['Label' => 'Bouton'])) {
                $product = $product_repo->findOneBy(['id' => '9']);
            } elseif ($user_imperfection->getCategoryImperfection() === $imperfection_repo->findOneBy(['Label' => 'Rougeur'])) {
                $product = $product_repo->findOneBy(['id' => '6']);
            } elseif ($user_imperfection->getCategoryImperfection() === $imperfection_repo->findOneBy(['Label' => 'Cerne'])) {
                $product = $product_repo->findOneBy(['id' => '2']);
            } elseif ($user_imperfection->getCategoryImperfection() === $imperfection_repo->findOneBy(['Label' => 'Point Noir'])) {
                $product = $product_repo->findOneBy(['id' => '3']);
            } elseif ($user_imperfection->getCategoryImperfection() === $imperfection_repo->findOneBy(['Label' => 'Squame'])) {
                $product = $product_repo->findOneBy(['id' => '4']);
            } elseif ($user_imperfection->getCategoryImperfection() === $imperfection_repo->findOneBy(['Label' => 'Couperose'])) {
                $product = $product_repo->findOneBy(['id' => '5']);

            }

            //redirection vers La page du produit
            return $this->redirectToRoute('product', ['id' => $product->getId()]);


            /*  // Envoie des détails de l'imperfection ainsi que le produit conseillé -> a continuer pour le client

              $message = (new \Swift_Message('Récapitulatif de votre Imperfection'))
                  ->setFrom('nepasrepondre.projetface@gmail.com')
                  ->setTo($user->getEmail())
                  ->setBody(
                      $this->renderView('emails/recap.html.twig',
                          ['name' => $user->getUsername()]
                      ),
                      'text/html'
                  );*/


        }
        //Affichage de la page du formulaire
        return $this->render('imperfection/imperfection.html.twig', [
            'form' => $form->createView(),
            'product' => $product,

        ]);
    }


}
