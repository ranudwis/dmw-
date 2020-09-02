<?php

namespace App\Tests\Controller\Traits;

use App\Entity\CourseExam;
use App\Factory\CourseExamFactory;
use App\Factory\GoogleDriveFileFactory;
use App\Service\CloudStorage\File\GoogleDriveFile;
use Doctrine\ORM\EntityManagerInterface;

trait CourseExamTrait
{
    private function createFactoryMock()
    {
        $entityManager = static::$container->get(EntityManagerInterface::class);

        $courseExam = new CourseExam();
        $courseExam->setFolderPath('');
        $courseExam->setExam($this->exam);
        $courseExam->setCourse($this->course);

        $entityManager->persist($courseExam);
        $entityManager->flush();

        $factory = $this->createMock(CourseExamFactory::class);

        $factory->method('getOrCreate')->willReturn($courseExam);

        static::$container->set('test.' . CourseExamFactory::class, $factory);

        $fileFactory = $this->createMock(GoogleDriveFileFactory::Class);
        $file = $this->createMock(GoogleDriveFile::class);

        $file->method('getPath')->willReturn('filepath');

        $fileFactory->method('create')->willReturn($file);

        static::$container->set('test.' . GoogleDriveFileFactory::class, $fileFactory);
    }
}
