<?php

namespace App\DataFixtures;

use App\Entity\ImperfectionType;
use App\Entity\Product;
use App\Entity\SkinType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // query my database
        $repositoryIT =$manager->getRepository(ImperfectionType::class);
        $repositoryST =$manager->getRepository(SkinType::class);


        //---------------------- HUILE DE NIGELLE ---------------------
        // look for a single ImperfectionT by name
        $blackhead = $repositoryIT->findOneBy(['Label' => 'Point Noir']);

        //look for a single SkinType by name
        $oilyST= $repositoryST->findOneBy(['Label' => 'Grasse']);


        $huileNigelle = new Product();
        $huileNigelle->setName("Huile de Nigelle")
            ->setDescription("Cette huile permet de ... ")
            ->setImperTypeRelation($blackhead)
            ->addSkinTypeRelation($oilyST);

        $manager->persist($huileNigelle);

        //---------------------- HUILE de JOJOBA ---------------------

            $mixteST = $repositoryST->findOneBy(['Label' => 'Mixte']);
            $bouton = $repositoryIT->findOneBy(['Label' => 'Squame']);
            $huileJojoba =  new Product();
            $huileJojoba->setName("Huile de Jojoba")
                        ->setDescription(" Cette huile permet ...")
                        ->setImperTypeRelation($bouton)
                        ->addSkinTypeRelation($oilyST)
                        ->addSkinTypeRelation($mixteST);

        $manager->persist($huileJojoba);

        //---------------------- HUILE de Callophyle ---------------------

        $cernes=$repositoryIT->findOneBy(['Label' => 'Cerne']);
        $huileCallophyle = new Product();
        $huileCallophyle->setName("Huile de Callophyle")
                        ->setDescription(" Cette huile convient parfaitement pour decongestioner les cernes tout en diminuant la pigmentation de ceux-ci")
                        ->setImperTypeRelation($cernes)
                        ->addSkinTypeRelation($mixteST);
        $manager->persist($huileCallophyle);

        //---------------------- HUILE de Chanvre  ---------------------
        $couperose=$repositoryIT->findOneBy(['Label' => 'Couperose']);

        $huileChanvre = new Product();
        $huileChanvre->setName("Huile de Chanvre")
                    ->setDescription(" Cette huile convient parfaitement pour apaiser les demangesons et attenuer l'apparition des vaisseaux sanguins ")
                    ->setImperTypeRelation($couperose)
                    ->addSkinTypeRelation($mixteST);

        $manager->persist($huileChanvre);

        //---------------------- HUILE de Rose Musquee  ---------------------
        $sechST = $repositoryST->findOneBy(['Label' => 'Seche']);
        $rougeur=$repositoryIT->findOneBy(['Label'=> 'Rougeur']);

        $huileRM = new Product();
        $huileRM->setName("Huile de Rose musquee")
                ->setDescription(" Cette huile convient parfaitement pour apaiser la peau")
                ->setImperTypeRelation($rougeur)
                ->addSkinTypeRelation($sechST)
                ->addSkinTypeRelation($oilyST)
                ->addSkinTypeRelation($mixteST);
        $manager->persist($huileRM);

        //---------------------- Nettoyant INDEMNE Base lavande ---------------------
        $bouton =  $repositoryIT->findOneBy(['Label'=> 'Bouton']);

        $netIBL = new Product();
        $netIBL->setName("Nettoyant INDEMNE Base lavande")
            ->setDescription("Ce nettoyant convient totalement au peaux sensible car elle nettoie sans agresser la peau ")
            ->setImperTypeRelation($bouton)
            ->addSkinTypeRelation($sechST);
        $manager->persist($netIBL);


        //---------------------- Creme DOUCE NATURE KARETHIC ---------------------

        $dem = $repositoryIT->findOneBy(["Label"=>'Demangeaisons']);

        $cremDNK=new Product();
        $cremDNK->setName("Creme  KARETHIC")
            ->setDescription(" De la marque DOUCE NATURE")
            ->addSkinTypeRelation($sechST)
            ->setImperTypeRelation($dem);
        $manager->persist($cremDNK);

        //---------------------- Mousse purifiante Madara ---------------------

        $mpm=new Product();
        $mpm->setName("Mousse purifiante")
            ->setDescription(" Mousse purifiante de la marque Madara")
            ->addSkinTypeRelation($sechST)
            ->addSkinTypeRelation($oilyST)
            ->addSkinTypeRelation($mixteST)
            ->setImperTypeRelation($bouton);
        $manager->persist($mpm);

        //---------------------- Gelée micellaire démaquillante ---------------------

        $GeleeMD=new Product();
        $GeleeMD->setName("Gelée micellaire démaquillante")
            ->setDescription(" De la marque pulpe de vie")
            ->addSkinTypeRelation($oilyST)
            ->setImperTypeRelation($blackhead);
        $manager->persist($GeleeMD);

        //---------------------- Fluide Matifiant CENTIFOLIA ---------------------
        $Irrit = $repositoryIT->findOneBy(["Label"=>'Irritation']);

        $fluide=new Product();
        $fluide->setName("Fluide Matifiant")
            ->setDescription(" Fluide matifiant de la marque Centifolia")
            ->addSkinTypeRelation($oilyST)
            ->setImperTypeRelation($Irrit);
        $manager->persist($fluide);

        $manager->flush();
    }

}

