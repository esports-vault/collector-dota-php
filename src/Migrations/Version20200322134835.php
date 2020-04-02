<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200322134835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('CREATE TABLE dota_match (id BIGINT NOT NULL, league_id INT DEFAULT NULL, series_id INT DEFAULT NULL, tournament_id INT DEFAULT NULL, cluster_id INT NOT NULL, region_id INT NOT NULL, dire_team_id INT NOT NULL, radiant_team_id INT DEFAULT NULL, actual_rank INT NOT NULL, ranking INT NOT NULL, average_imp INT NOT NULL, is_stats TINYINT(1) NOT NULL, did_radiant_win TINYINT(1) NOT NULL, game_mode INT NOT NULL, game_version_id INT NOT NULL, lobby_type INT NOT NULL, replay_salt VARCHAR(255) NOT NULL, start_date_time DATETIME NOT NULL, barracks_status_dire INT NOT NULL, barracks_status_radiant INT NOT NULL, tournament_round INT DEFAULT NULL, tower_status_dire INT NOT NULL, tower_status_radiant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('DROP TABLE dota_match');
    }
}
