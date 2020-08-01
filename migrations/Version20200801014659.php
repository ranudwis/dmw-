<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200801014659 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course_exam (id INT AUTO_INCREMENT NOT NULL, exam_id INT NOT NULL, course_id INT NOT NULL, information VARCHAR(255) DEFAULT NULL, folder_path VARCHAR(255) NOT NULL, question_path VARCHAR(255) DEFAULT NULL, question_and_answer_path VARCHAR(255) DEFAULT NULL, INDEX IDX_F0197BC0578D5E91 (exam_id), INDEX IDX_F0197BC0591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_exam ADD CONSTRAINT FK_F0197BC0578D5E91 FOREIGN KEY (exam_id) REFERENCES exam (id)');
        $this->addSql('ALTER TABLE course_exam ADD CONSTRAINT FK_F0197BC0591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE course_exam');
    }
}
