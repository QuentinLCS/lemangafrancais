<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190921150611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateur (id VARCHAR(40) NOT NULL, uti_id_parrainer VARCHAR(36) DEFAULT NULL, lan_id INT NOT NULL, uti_mail VARCHAR(100) NOT NULL, uti_telephone VARCHAR(12) DEFAULT NULL, uti_naissance DATE DEFAULT NULL, uti_inscription DATETIME DEFAULT NULL, uti_derniere_session DATETIME DEFAULT NULL, uti_connecte TINYINT(1) DEFAULT NULL, uti_avatar_nom_fichier VARCHAR(255) DEFAULT NULL, uti_tokens INT DEFAULT NULL, uti_biographie VARCHAR(300) DEFAULT NULL, uti_mdp VARCHAR(300) NOT NULL, uti_ip VARCHAR(15) DEFAULT NULL, uti_notif INT DEFAULT NULL, uti_derniere_maj DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE endosser (utilisateur_id VARCHAR(40) NOT NULL, role_id INT NOT NULL, INDEX IDX_271BBD57FB88E14F (utilisateur_id), INDEX IDX_271BBD57D60322AC (role_id), PRIMARY KEY(utilisateur_id, role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE endosser ADD CONSTRAINT FK_271BBD57FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE endosser ADD CONSTRAINT FK_271BBD57D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE endosser DROP FOREIGN KEY FK_271BBD57FB88E14F');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE endosser');
    }
}
