<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191209102345 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateur_manga (utilisateur_id VARCHAR(40) NOT NULL, manga_id INT NOT NULL, INDEX IDX_B09FC6DDFB88E14F (utilisateur_id), INDEX IDX_B09FC6DD7B6461 (manga_id), PRIMARY KEY(utilisateur_id, manga_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manga_utilisateur (manga_id INT NOT NULL, utilisateur_id VARCHAR(40) NOT NULL, INDEX IDX_92D175317B6461 (manga_id), INDEX IDX_92D17531FB88E14F (utilisateur_id), PRIMARY KEY(manga_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur_manga ADD CONSTRAINT FK_B09FC6DDFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_manga ADD CONSTRAINT FK_B09FC6DD7B6461 FOREIGN KEY (manga_id) REFERENCES manga (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE manga_utilisateur ADD CONSTRAINT FK_92D175317B6461 FOREIGN KEY (manga_id) REFERENCES manga (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE manga_utilisateur ADD CONSTRAINT FK_92D17531FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E03FB88E14F');
        $this->addSql('DROP INDEX IDX_765A9E03FB88E14F ON manga');
        $this->addSql('ALTER TABLE manga DROP utilisateur_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE utilisateur_manga');
        $this->addSql('DROP TABLE manga_utilisateur');
        $this->addSql('ALTER TABLE manga ADD utilisateur_id VARCHAR(40) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E03FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_765A9E03FB88E14F ON manga (utilisateur_id)');
    }
}
