<?php

namespace App\DataFixtures;

use App\Entity\Comments;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommentsFaker extends Fixture
{
    public function load(ObjectManager $manager)
    {/*
    $repositoryProduct = $manager->getRepository(Product::class);
        $produit1 = $repositoryProduct->findOneBy(['name' => 'Huile de Jojoba']);
    $repositoryUser = $manager->getRepository(User::class);
        $author = $repositoryProduct->findOneBy(['name' => 'Huile de Jojoba']);

            $comment = new Comments();
            $content ='<p>'.join($faker->paragraphs(1), '</p><p>'.'</p>';
            $comment->setTitle($faker->title)
                ->setContains($content)
                ->setProductRelation($produit1)
                ->setUserRelation($author);


        $manager->flush();*/
    }
}
