<?php

namespace App\Controller;

use App\Entity\SkinType;
use App\Form\SkinTypeType;
use App\Repository\SkinTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/skin/type")
 */
class SkinTypeController extends AbstractController
{
    /**
     * @Route("/", name="skin_type_index", methods={"GET"})
     */
    public function index(SkinTypeRepository $skinTypeRepository)
    {
        return $this->render('skin_type/index.html.twig', [
            'skin_types' => $skinTypeRepository->findAll()
        ]);
    }

    /**
     * @Route("/Determinate", name="skin_type_user", methods={"GET","POST"})
     */
    public function edit(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repositoryST = $entityManager->getRepository(SkinType::class);
        $skin = $repositoryST->findOneBy(['Label' => 'Normale']);

        // recup le user courrant ---------------------------------------
        $user = $this->getUser();


        if ($request->request->count() > 0) {


            if (($request->request->get('Teint') === "Clair/Lumineux") && ($request->request->get('Pores') === "Non")
                && ($request->request->get('Sensibility') === "Non")) {

                $skin = $repositoryST->findOneBy(['Label' => 'Normale']);

                $user->setSkinTypeRelation($skin);

                $entityManager->persist($user);
                $entityManager->flush();

            } elseif (($request->request->get('Teint') === "Clair/Lumineux" && $request->request->get('Pores') === "Non"
                    && $request->request->get('Sensibility') === "Importante") || ($request->request->get('Teint') === "Clair/Terne" && $request->request->get('Pores') === "Non"
                    && $request->request->get('Sensibility') === "Importante")) {

                $skin = $repositoryST->findOneBy(['Label' => 'Grasse']);

                $user->setSkinTypeRelation($skin);

                $entityManager->persist($user);
                $entityManager->flush();


            } elseif (($request->request->get('Teint') === "Terne/Luisant" && $request->request->get('Pores') === "Oui"
                    && $request->request->get('Sensibility') === "Non") || ($request->request->get('Teint') === "Clair/Terne" && $request->request->get('Pores') === "Oui"
                    && $request->request->get('Sensibility') === "Variable")) {

                $skin = $repositoryST->findOneBy(['Label' => 'Seche']);

                $user->setSkinTypeRelation($skin);

                $entityManager->persist($user);
                $entityManager->flush();


            } else {

                $skin = $repositoryST->findOneBy(['Label' => 'Mixte']);

                $user->setSkinTypeRelation($skin);

                $entityManager->persist($user);
                $entityManager->flush();
            }


            return $this->redirectToRoute('skin_type_show', [
                'skinType' => $skin,
                'id' => $skin->getId(),

            ]);
        }

        return $this->render('skin_type/determinate.html.twig', [
            'skinType' => $skin,
        ]);
    }

    /**
     * @Route("/{id}", name="skin_type_show", methods={"GET"})
     */
    public function show(SkinType $skinType)
    {
        return $this->render('skin_type/show.html.twig', [
            'skinType' => $skinType,
        ]);
    }


    /**
     * @Route("/{id}", name="skin_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SkinType $skinType)
    {
        if ($this->isCsrfTokenValid('delete' . $skinType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($skinType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('skin_type_index');
    }
}