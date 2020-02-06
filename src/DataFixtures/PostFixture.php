<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0;$i<10;$i++)
        {
        $post = new Post();
        $post->setTitle('title n '.$i);
        $manager->persist($post);
        $manager->flush();
        }
    }
}
