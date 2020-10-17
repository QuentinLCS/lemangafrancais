<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190921191904 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activites ADD act_utilisateur_id VARCHAR(40) NOT NULL');
        $this->addSql('ALTER TABLE activites ADD CONSTRAINT FK_766B5EB5B488FDCF FOREIGN KEY (act_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_766B5EB5B488FDCF ON activites (act_utilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activites DROP FOREIGN KEY FK_766B5EB5B488FDCF');
        $this->addSql('DROP INDEX IDX_766B5EB5B488FDCF ON activites');
        $this->addSql('ALTER TABLE activites DROP act_utilisateur_id');
    }
}
