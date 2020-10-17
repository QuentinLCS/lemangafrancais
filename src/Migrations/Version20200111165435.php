<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200111165435 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE news_utilisateur (news_id INT NOT NULL, utilisateur_id VARCHAR(40) NOT NULL, INDEX IDX_3429D5FCB5A459A0 (news_id), INDEX IDX_3429D5FCFB88E14F (utilisateur_id), PRIMARY KEY(news_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE news_utilisateur ADD CONSTRAINT FK_3429D5FCB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_utilisateur ADD CONSTRAINT FK_3429D5FCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD399501E969C5');
        $this->addSql('DROP INDEX IDX_1DD399501E969C5 ON news');
        $this->addSql('ALTER TABLE news DROP utilisateurs_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE news_utilisateur');
        $this->addSql('ALTER TABLE news ADD utilisateurs_id VARCHAR(40) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD399501E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_1DD399501E969C5 ON news (utilisateurs_id)');
    }
}
