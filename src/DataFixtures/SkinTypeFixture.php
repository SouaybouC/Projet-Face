<?php

namespace App\DataFixtures;

use App\Entity\SkinType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkinTypeFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //------------------- Normal Skin -------------------------
        $normal = new SkinType();
        $normal->setLabel("Normale")
            ->setTone("Clair/Lumineux")
            ->setBrightness("Non")
            ->setSensibility("Non")
            ->setPores("Non")
            ->setBlackhead(false)
            ->setDescription(" La peau Normale est une peau seine sans reel besoin ni problème continuer à en prendre soin tout en l'hydratant convenablement ");
        $manager->persist($normal);

        //------------------ Dry Skin  ------------------------------
        $dry = new SkinType();
        $dry->setLabel("Seche")
            ->setTone("Clair/Terne")
            ->setBrightness("Non")
            ->setSensibility("Importante")
            ->setPores("Non")
            ->setBlackhead("Non")
            ->setDescription(" La peau Seche est");
        $manager->persist(($dry));

        //-------------------- Oily Skin  ------------------------------
        $oily = new SkinType();
        $oily->setLabel("Grasse")
            ->setTone("Terne/Luisant")
            ->setBrightness("Oui")
            ->setSensibility("Non")
            ->setPores("Dilates")
            ->setBlackhead(true)

            ->setDescription(" La peau Mixte est ....");
        $manager->persist(($oily));


        //--------------------- Mixt Skin  ------------------------------
        $mixte = new SkinType();
        $mixte->setLabel("Mixte")
            ->setTone("Terne/Luisant zone T")
            ->setBrightness("Zone T")
            ->setSensibility("Variable")
            ->setPores("Dilates zone T")
            ->setBlackhead(true)

            ->setDescription(" La peau Mixte est ....");
        $manager->persist(($mixte));

        $manager->flush();
    }
}
