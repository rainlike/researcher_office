<?php

namespace App\DataFixtures;

use App\Entity\ScientificInterest;
use Doctrine\Common\Persistence\ObjectManager;

class ScientificInterestFixtures extends BaseFixture
{
    private static $interests = [
        'Big data',
        'Computer science'
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(ScientificInterest::class, count(self::$interests), function (ScientificInterest $interest, $count) {
            $interest->setName(self::$interests[$count]);
            $interest->setNameCanonical(str_replace(' ', '_', strtolower(self::$interests[$count])));
        });

        $manager->flush();
    }
}
