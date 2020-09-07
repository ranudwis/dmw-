<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200906080535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, course_exam_id INT NOT NULL, uploader SMALLINT NOT NULL, uploader_name VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_DADD4A255F4E5B7D (course_exam_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A255F4E5B7D FOREIGN KEY (course_exam_id) REFERENCES course_exam (id)');
        $this->addSql('ALTER TABLE course_exam ADD answer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course_exam ADD CONSTRAINT FK_F0197BC0AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F0197BC0AA334807 ON course_exam (answer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_exam DROP FOREIGN KEY FK_F0197BC0AA334807');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP INDEX UNIQ_F0197BC0AA334807 ON course_exam');
        $this->addSql('ALTER TABLE course_exam DROP answer_id');
    }
}
