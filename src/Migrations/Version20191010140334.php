<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191010140334 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE publication DROP pub_date_derniere_modif');
        $this->addSql('ALTER TABLE illustration ADD utilisateur_id VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT FK_D67B9A42FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_D67B9A42FB88E14F ON illustration (utilisateur_id)');
        $this->addSql('ALTER TABLE image ADD manga_id INT NOT NULL, ADD illustration_id INT NOT NULL, ADD ima_nom_fichier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F7B6461 FOREIGN KEY (manga_id) REFERENCES manga (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F5926566C FOREIGN KEY (illustration_id) REFERENCES illustration (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F7B6461 ON image (manga_id)');
        $this->addSql('CREATE INDEX IDX_C53D045F5926566C ON image (illustration_id)');
        $this->addSql('ALTER TABLE manga ADD utilisateur_id VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E03FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_765A9E03FB88E14F ON manga (utilisateur_id)');
        $this->addSql('ALTER TABLE news ADD utilisateur_id VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_1DD39950FB88E14F ON news (utilisateur_id)');
        $this->addSql('ALTER TABLE scenario ADD utilisateur_id VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_3E45C8D8FB88E14F ON scenario (utilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY FK_D67B9A42FB88E14F');
        $this->addSql('DROP INDEX IDX_D67B9A42FB88E14F ON illustration');
        $this->addSql('ALTER TABLE illustration DROP utilisateur_id');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F7B6461');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F5926566C');
        $this->addSql('DROP INDEX IDX_C53D045F7B6461 ON image');
        $this->addSql('DROP INDEX IDX_C53D045F5926566C ON image');
        $this->addSql('ALTER TABLE image DROP manga_id, DROP illustration_id, DROP ima_nom_fichier');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E03FB88E14F');
        $this->addSql('DROP INDEX IDX_765A9E03FB88E14F ON manga');
        $this->addSql('ALTER TABLE manga DROP utilisateur_id');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950FB88E14F');
        $this->addSql('DROP INDEX IDX_1DD39950FB88E14F ON news');
        $this->addSql('ALTER TABLE news DROP utilisateur_id');
        $this->addSql('ALTER TABLE publication ADD pub_date_derniere_modif DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8FB88E14F');
        $this->addSql('DROP INDEX IDX_3E45C8D8FB88E14F ON scenario');
        $this->addSql('ALTER TABLE scenario DROP utilisateur_id');
    }
}
