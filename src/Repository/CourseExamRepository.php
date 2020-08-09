<?php

namespace App\Repository;

use App\Enity\Exam;
use App\Entity\CourseExam;
use App\Entiy\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseExam|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseExam|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseExam[]    findAll()
 * @method CourseExam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseExamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseExam::class);
    }

    public function getAllExamWithCourseSlug($slug)
    {
        $query = $this->getEntityManager()->createQuery('
            SELECT exam
            FROM App\Entity\Exam exam
            LEFT JOIN exam.courses courses
            LEFT JOIN courses.course course
            WHERE course.slug = :slug OR course.slug IS NULL
        ');

        $query->setParameter('slug', $slug);

        return $query->getResult();
    }

    // /**
    //  * @return CourseExam[] Returns an array of CourseExam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CourseExam
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
