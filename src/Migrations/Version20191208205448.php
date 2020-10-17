<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191208205448 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE scenario_utilisateur (scenario_id INT NOT NULL, utilisateur_id VARCHAR(40) NOT NULL, INDEX IDX_9C1B88CEE04E49DF (scenario_id), INDEX IDX_9C1B88CEFB88E14F (utilisateur_id), PRIMARY KEY(scenario_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_scenario (utilisateur_id VARCHAR(40) NOT NULL, scenario_id INT NOT NULL, INDEX IDX_203E3147FB88E14F (utilisateur_id), INDEX IDX_203E3147E04E49DF (scenario_id), PRIMARY KEY(utilisateur_id, scenario_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scenario_utilisateur ADD CONSTRAINT FK_9C1B88CEE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_utilisateur ADD CONSTRAINT FK_9C1B88CEFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_scenario ADD CONSTRAINT FK_203E3147FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_scenario ADD CONSTRAINT FK_203E3147E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8FB88E14F');
        $this->addSql('DROP INDEX IDX_3E45C8D8FB88E14F ON scenario');
        $this->addSql('ALTER TABLE scenario DROP utilisateur_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(250) NOT NULL COLLATE utf8mb4_unicode_ci, reponse VARCHAR(1000) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, sujet VARCHAR(250) NOT NULL COLLATE utf8mb4_unicode_ci, contenu VARCHAR(1000) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE scenario_utilisateur');
        $this->addSql('DROP TABLE utilisateur_scenario');
        $this->addSql('ALTER TABLE scenario ADD utilisateur_id VARCHAR(40) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_3E45C8D8FB88E14F ON scenario (utilisateur_id)');
    }
}
