<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231213141724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC79F37AE5');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCBB208D73');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCBB208D73 FOREIGN KEY (id_tricks_id) REFERENCES tricks (id)');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C3B153154');
        $this->addSql('ALTER TABLE media DROP image_une, CHANGE tricks_id tricks_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C3B153154 FOREIGN KEY (tricks_id) REFERENCES tricks (id)');
        $this->addSql('ALTER TABLE tricks DROP FOREIGN KEY FK_E1D902C1BCF5E72D');
        $this->addSql('ALTER TABLE tricks DROP FOREIGN KEY FK_E1D902C179F37AE5');
        $this->addSql('ALTER TABLE tricks ADD CONSTRAINT FK_E1D902C1BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE tricks ADD CONSTRAINT FK_E1D902C179F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C4C1284F1');
        $this->addSql('ALTER TABLE video DROP video2');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C4C1284F1 FOREIGN KEY (trick_video_id) REFERENCES tricks (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC79F37AE5');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCBB208D73');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCBB208D73 FOREIGN KEY (id_tricks_id) REFERENCES tricks (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C3B153154');
        $this->addSql('ALTER TABLE media ADD image_une VARCHAR(255) DEFAULT NULL, CHANGE tricks_id tricks_id INT NOT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C3B153154 FOREIGN KEY (tricks_id) REFERENCES tricks (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tricks DROP FOREIGN KEY FK_E1D902C1BCF5E72D');
        $this->addSql('ALTER TABLE tricks DROP FOREIGN KEY FK_E1D902C179F37AE5');
        $this->addSql('ALTER TABLE tricks ADD CONSTRAINT FK_E1D902C1BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tricks ADD CONSTRAINT FK_E1D902C179F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C4C1284F1');
        $this->addSql('ALTER TABLE video ADD video2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C4C1284F1 FOREIGN KEY (trick_video_id) REFERENCES tricks (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
