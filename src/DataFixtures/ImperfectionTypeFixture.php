<?php

namespace App\DataFixtures;

use App\Entity\ImperfectionType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImperfectionTypeFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //---------- Cerne -----------------------
        $cernes = new ImperfectionType();
        $cernes->setLabel("Cerne")
            ->setDescription(" sous forme de poches ou/et pigmentee cette imperfection est une marque de fatigue");

        // ------ Rougeur -----------------------

        $rougeur = new ImperfectionType();
        $rougeur->setLabel("Rougeur")
            ->setDescription(" Reaction de la peau ");

        //----------Squames----------------------
        $squames = new ImperfectionType();
        $squames->setLabel("Squame")
            ->setDescription("peau qui pele");

        //---------- Point noir ------------------
        $darkhead = new ImperfectionType();
        $darkhead->setLabel("Point Noir")
            ->setDescription("Comedons obstrues");

        //----------- Bouton a tete blanche ----------
        $whitehead = new ImperfectionType();
        $whitehead->setLabel("Bouton")
            ->setDescription(" Cette imperfection est du à plusieurs facteur internes comme externes plus communement appeler bouton d'acnés");

        //-------- Microkystes -----------------
        $cou = new ImperfectionType();
        $cou->setLabel("Couperose")
            ->setDescription("Maladie de la peau : petits vaisseau sanguin apparent");

        //--------- Demangeaisons -------------
        $dem = new ImperfectionType();
        $dem->setLabel("Demangeaisons")
                ->setDescription("Inconfortable ");


        //---------- dartre ----------------
        $dartres = new ImperfectionType();
        $dartres->setLabel("Darte")
                ->setDescription(" Darte ...");

        //---------- comedon ----------------
        $comedon = new ImperfectionType();
        $comedon->setLabel("Comedon")
            ->setDescription(" Comedon ...");

        //---------- Irritation ----------------
        $Irritation = new ImperfectionType();
        $Irritation->setLabel("Irritation")
            ->setDescription(" Irritation...");

        //---------- Tiraillement ----------------
        $Tiraillement = new ImperfectionType();
        $Tiraillement->setLabel("Tiraillement")
            ->setDescription(" Tiraillement...");

        //----------  stries ----------------
        $Stries = new ImperfectionType();
        $Stries->setLabel("Stries")
            ->setDescription(" Stries...");



        //----------- mes persist ---------

        $manager->persist($cernes);
        $manager->persist($cou);
        $manager->persist($whitehead);
        $manager->persist($darkhead);
        $manager->persist($squames);
        $manager->persist($rougeur);

        $manager->persist($dem);
        $manager->persist($comedon);
        $manager->persist($Irritation);
        $manager->persist($Tiraillement);
        $manager->persist($Stries);

        $manager->flush();
    }
}
