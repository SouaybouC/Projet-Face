<?php

namespace App\DataFixtures;

use App\Entity\Tendancy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TendancyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // ----------- Acneique ---------------
        $Acneique = new Tendancy();
        $Acneique->setLabel("Acneique")
            ->setDescritption("Les peau à tendance acneique sont des peaux ........");
        $manager->persist($Acneique);

        //-------------- Deshydratee ---------------
        $dishydrated= new Tendancy();
        $dishydrated->setLabel("Deshydratee")
            ->setDescritption("peau deshydratée manque d’eau à ne pas confondre avec les peau seches");
        $manager->persist($dishydrated);

        //------------ Sensible -------------------
        $sensible = new Tendancy();
        $sensible->setLabel("Sensible")
            ->setDescritption(" Les peaux sensibles ......");

        $manager->persist($sensible);

        $manager->flush();
    }
}
