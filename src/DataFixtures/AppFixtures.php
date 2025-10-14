<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // This file can remain empty if you separate fixtures per entity.
        // It simply serves as an entry point for Doctrine to detect and run all fixture classes.
    }
}
