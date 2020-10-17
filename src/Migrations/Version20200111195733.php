<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200111195733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE illustration ADD images_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT FK_D67B9A42D44F05E5 FOREIGN KEY (images_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_D67B9A42D44F05E5 ON illustration (images_id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F5926566C');
        $this->addSql('DROP INDEX IDX_C53D045F5926566C ON image');
        $this->addSql('ALTER TABLE image DROP illustration_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY FK_D67B9A42D44F05E5');
        $this->addSql('DROP INDEX IDX_D67B9A42D44F05E5 ON illustration');
        $this->addSql('ALTER TABLE illustration DROP images_id');
        $this->addSql('ALTER TABLE image ADD illustration_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F5926566C FOREIGN KEY (illustration_id) REFERENCES illustration (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F5926566C ON image (illustration_id)');
    }
}
