<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722055533 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, volunteer VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, article LONGTEXT NOT NULL, published DATETIME NOT NULL, edited DATETIME NOT NULL, publisher_type SMALLINT NOT NULL, cover_name VARCHAR(255) DEFAULT NULL, cover_original_name VARCHAR(255) DEFAULT NULL, cover_mime_type VARCHAR(255) DEFAULT NULL, cover_size INT DEFAULT NULL, cover_dimensions LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_label (article_id INT NOT NULL, label_id INT NOT NULL, INDEX IDX_791022F97294869C (article_id), INDEX IDX_791022F933B92F39 (label_id), PRIMARY KEY(article_id, label_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_label ADD CONSTRAINT FK_791022F97294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_label ADD CONSTRAINT FK_791022F933B92F39 FOREIGN KEY (label_id) REFERENCES label (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_label DROP FOREIGN KEY FK_791022F97294869C');
        $this->addSql('ALTER TABLE article_label DROP FOREIGN KEY FK_791022F933B92F39');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_label');
        $this->addSql('DROP TABLE label');
    }
}
