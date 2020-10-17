<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109132401 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE utilisateur_illustration');
        $this->addSql('DROP TABLE utilisateur_manga');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950FB88E14F');
        $this->addSql('DROP INDEX IDX_1DD39950FB88E14F ON news');
        $this->addSql('ALTER TABLE news CHANGE utilisateur_id utilisateurs_id VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD399501E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_1DD399501E969C5 ON news (utilisateurs_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateur_illustration (utilisateur_id VARCHAR(40) NOT NULL COLLATE utf8mb4_unicode_ci, illustration_id INT NOT NULL, INDEX IDX_BF89BEB1FB88E14F (utilisateur_id), INDEX IDX_BF89BEB15926566C (illustration_id), PRIMARY KEY(utilisateur_id, illustration_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur_manga (utilisateur_id VARCHAR(40) NOT NULL COLLATE utf8mb4_unicode_ci, manga_id INT NOT NULL, INDEX IDX_B09FC6DDFB88E14F (utilisateur_id), INDEX IDX_B09FC6DD7B6461 (manga_id), PRIMARY KEY(utilisateur_id, manga_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE utilisateur_illustration ADD CONSTRAINT FK_BF89BEB15926566C FOREIGN KEY (illustration_id) REFERENCES illustration (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_illustration ADD CONSTRAINT FK_BF89BEB1FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_manga ADD CONSTRAINT FK_B09FC6DD7B6461 FOREIGN KEY (manga_id) REFERENCES manga (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_manga ADD CONSTRAINT FK_B09FC6DDFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD399501E969C5');
        $this->addSql('DROP INDEX IDX_1DD399501E969C5 ON news');
        $this->addSql('ALTER TABLE news CHANGE utilisateurs_id utilisateur_id VARCHAR(40) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_1DD39950FB88E14F ON news (utilisateur_id)');
    }
}
