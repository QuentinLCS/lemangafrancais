<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191010131751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE illustration');
        $this->addSql('DROP TABLE manga');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE scenario');
        $this->addSql('ALTER TABLE publication ADD pub_date_derniere_modif DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE illustration (id INT AUTO_INCREMENT NOT NULL, ill_titre VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ill_contenu LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, ill_date_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE manga (id INT AUTO_INCREMENT NOT NULL, man_titre VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, man_contenu LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, man_date_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, new_titre VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, new_contenu LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, new_date_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, sce_titre VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, sce_contenu LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, sce_date_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE publication DROP pub_date_derniere_modif');
    }
}
