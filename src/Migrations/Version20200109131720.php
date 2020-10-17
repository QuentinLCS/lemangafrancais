<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109131720 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ecrire DROP FOREIGN KEY FK_918824CC38B217A7');
        $this->addSql('DROP TABLE ecrire');
        $this->addSql('DROP TABLE publication');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ecrire (publication_id INT NOT NULL, utilisateur_id VARCHAR(40) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_918824CC38B217A7 (publication_id), INDEX IDX_918824CCFB88E14F (utilisateur_id), PRIMARY KEY(publication_id, utilisateur_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, pub_titre VARCHAR(200) DEFAULT NULL COLLATE utf8mb4_unicode_ci, pub_contenu MEDIUMTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, pub_image LONGBLOB DEFAULT NULL, pub_date_creation DATETIME DEFAULT NULL, pub_date_derniere_modif DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ecrire ADD CONSTRAINT FK_918824CC38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ecrire ADD CONSTRAINT FK_918824CCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }
}
