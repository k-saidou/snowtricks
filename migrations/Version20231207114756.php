<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207114756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, trick_video_id INT DEFAULT NULL, video1 VARCHAR(255) DEFAULT NULL, video2 VARCHAR(255) DEFAULT NULL, INDEX IDX_7CC7DA2C4C1284F1 (trick_video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C4C1284F1 FOREIGN KEY (trick_video_id) REFERENCES tricks (id)');
        $this->addSql('ALTER TABLE media ADD image_une VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tricks DROP video, DROP image_une, DROP video2');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C4C1284F1');
        $this->addSql('DROP TABLE video');
        $this->addSql('ALTER TABLE media DROP image_une');
        $this->addSql('ALTER TABLE tricks ADD video VARCHAR(255) DEFAULT NULL, ADD image_une VARCHAR(255) DEFAULT NULL, ADD video2 VARCHAR(255) DEFAULT NULL');
    }
}
