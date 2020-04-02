<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200323164126 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dota_match_player (id INT NOT NULL, match_id BIGINT NOT NULL, party_id INT DEFAULT NULL, role INT NOT NULL, role_basic INT NOT NULL, level INT NOT NULL, lane INT NOT NULL, num_denies INT NOT NULL, num_last_hits INT NOT NULL, kills INT NOT NULL, deaths INT NOT NULL, assists INT NOT NULL, gold INT NOT NULL, gold_spent INT NOT NULL, gold_per_minute INT NOT NULL, experience_per_minute INT NOT NULL, imp INT DEFAULT NULL, networth INT NOT NULL, hero_id INT NOT NULL, hero_damage INT NOT NULL, hero_healing INT NOT NULL, tower_damage INT NOT NULL, is_radiant TINYINT(1) NOT NULL, is_victory TINYINT(1) NOT NULL, is_random TINYINT(1) NOT NULL, INDEX IDX_8F021D1E2ABEACD6 (match_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dota_match_player ADD CONSTRAINT FK_8F021D1E2ABEACD6 FOREIGN KEY (match_id) REFERENCES dota_match (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE dota_match_player');
    }
}
