<?php

namespace App\Controller;

use App\Entity\ImperfectionType;
use App\Entity\User;
use App\Entity\UserImperfection;
use App\Form\UserType;
use App\Repository\UserImperfectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    /**
     * @Route("/user/historique", name="user_history")
     */
    // Historique des informations de l'utilisateurs -> continuer pour la cliente
    /* public function userHistory()
     {
         $user = $this->getUser();
         $manager = $this->getDoctrine()->getManager();
         $user_imperfection_repo = $manager->getRepository(UserImperfection::class);
         $imp_repository = $manager->getRepository(ImperfectionType::class);
         $user_imperfection = $user_imperfection_repo->findOneBy(['UserRelation' => $user->getId()]);
         $imp = $imp_repository->find($user_imperfection->getCategoryImperfection()->getId());

         return $this->render('user/history.html.twig', [
             'user_imp' => $user_imperfection,
             'imperfection' => $imp
         ]);
     }*/


}
