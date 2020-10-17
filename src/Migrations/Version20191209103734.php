<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191209103734 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateur_illustration (utilisateur_id VARCHAR(40) NOT NULL, illustration_id INT NOT NULL, INDEX IDX_BF89BEB1FB88E14F (utilisateur_id), INDEX IDX_BF89BEB15926566C (illustration_id), PRIMARY KEY(utilisateur_id, illustration_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE illustration_utilisateur (illustration_id INT NOT NULL, utilisateur_id VARCHAR(40) NOT NULL, INDEX IDX_CDF5172E5926566C (illustration_id), INDEX IDX_CDF5172EFB88E14F (utilisateur_id), PRIMARY KEY(illustration_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur_illustration ADD CONSTRAINT FK_BF89BEB1FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_illustration ADD CONSTRAINT FK_BF89BEB15926566C FOREIGN KEY (illustration_id) REFERENCES illustration (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE illustration_utilisateur ADD CONSTRAINT FK_CDF5172E5926566C FOREIGN KEY (illustration_id) REFERENCES illustration (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE illustration_utilisateur ADD CONSTRAINT FK_CDF5172EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY FK_D67B9A42FB88E14F');
        $this->addSql('DROP INDEX IDX_D67B9A42FB88E14F ON illustration');
        $this->addSql('ALTER TABLE illustration DROP utilisateur_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE utilisateur_illustration');
        $this->addSql('DROP TABLE illustration_utilisateur');
        $this->addSql('ALTER TABLE illustration ADD utilisateur_id VARCHAR(40) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT FK_D67B9A42FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_D67B9A42FB88E14F ON illustration (utilisateur_id)');
    }
}
