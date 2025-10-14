<?php

namespace App\DataFixtures;

use App\Entity\Membership;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MembershipFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $memberships = ['Silver', 'Gold', 'Platinum'];

        foreach ($memberships as $type) {
            $membership = new Membership();
            $membership->setType($type);
            $manager->persist($membership);
        }

        $manager->flush();
    }
}
