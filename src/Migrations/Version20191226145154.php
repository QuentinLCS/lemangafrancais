<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191226145154 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, utilisateur_id VARCHAR(40) NOT NULL, recrutement_id INT NOT NULL, can_date DATETIME NOT NULL, can_contenu LONGTEXT NOT NULL, can_etat VARCHAR(255) NOT NULL, INDEX IDX_E33BD3B8FB88E14F (utilisateur_id), INDEX IDX_E33BD3B8FCC7117B (recrutement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8FCC7117B FOREIGN KEY (recrutement_id) REFERENCES recrutement (id)');
        $this->addSql('DROP TABLE candidatures');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE candidatures (id INT AUTO_INCREMENT NOT NULL, utilisateur_id VARCHAR(40) NOT NULL COLLATE utf8mb4_unicode_ci, recrutement_id INT NOT NULL, can_date DATETIME NOT NULL, can_contenu LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, can_etat VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_DE57CF66FCC7117B (recrutement_id), INDEX IDX_DE57CF66FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE candidatures ADD CONSTRAINT FK_DE57CF66FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE candidatures ADD CONSTRAINT FK_DE57CF66FCC7117B FOREIGN KEY (recrutement_id) REFERENCES recrutement (id)');
        $this->addSql('DROP TABLE candidature');
    }
}
