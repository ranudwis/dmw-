<?php

namespace App\DataFixtures;

use App\Entity\Label;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LabelFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 3; $i++) {
            $label = new Label();
            $label->setName($faker->words(2, true));
            $label->setSlug($faker->word);

            $manager->persist($label);
        }

        $manager->flush();
    }
}
