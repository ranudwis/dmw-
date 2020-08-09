<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200809015951 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course ADD folder_path VARCHAR(255) DEFAULT NULL, ADD mid_exam_folder_path VARCHAR(255) DEFAULT NULL, ADD end_exam_folder_path VARCHAR(255) DEFAULT NULL, ADD mid_and_end_exam_path VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP folder_path, DROP mid_exam_folder_path, DROP end_exam_folder_path, DROP mid_and_end_exam_path');
    }
}
