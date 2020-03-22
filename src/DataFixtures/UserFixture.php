<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Comments;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {


        $faker =\Faker\Factory::create('fr_FR');

        for($i=1; $i<=3;$i++){
            $user = new User();
            $user->setName($faker->lastName)
                ->setEmail($faker->email)
                ->setFirstname($faker->firstNameFemale)
                ->setPassword($faker->password)
                ->setUsername($faker->userName);
                if($i%2==0){
                    $user->setSex('f');
                }else{
                    $user->setSex('m');
                }
            $manager->persist($user);
        }




        $manager->flush();
    }
}
