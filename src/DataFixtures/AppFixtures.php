<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpClient\HttpClient;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $campus=new Campus();
         $campus->setName("Niort");
       $manager->persist($campus);

        $manager->flush();
    }
}
