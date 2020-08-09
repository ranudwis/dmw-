<?php

namespace App\DataFixtures;

use App\Entity\Exam;
use App\Entity\Semester;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExamFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $exam = new Exam();
        $exam->setType(Exam::MID);
        $exam->setSemester(Semester::EVEN);
        $exam->setStartYear(2020);
        $exam->setEndYear(2021);

        $manager->persist($exam);
        $manager->flush();
    }
}
