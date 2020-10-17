<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190913200425 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lexique (id INT AUTO_INCREMENT NOT NULL, lex_mot VARCHAR(50) NOT NULL, lex_definition LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE permission DROP per_nom, CHANGE id id VARCHAR(100) NOT NULL, CHANGE per_desc per_desc VARCHAR(200) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE lexique');
        $this->addSql('ALTER TABLE permission ADD per_nom VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE per_desc per_desc VARCHAR(128) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
