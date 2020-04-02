<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Class Version20200308201505
 * @package DoctrineMigrations
 * @codeCoverageIgnore
 */
final class Version20200308201505 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('CREATE TABLE dota_pro_player (id INT AUTO_INCREMENT NOT NULL, steam_id INT NOT NULL, name VARCHAR(255) NOT NULL, real_name VARCHAR(255) DEFAULT NULL, team_id INT DEFAULT NULL, sponsor VARCHAR(255) DEFAULT NULL, is_locked TINYINT(1) NOT NULL, is_marked_pro TINYINT(1) NOT NULL, is_pro TINYINT(1) NOT NULL, total_earnings INT DEFAULT NULL, birthday DATETIME DEFAULT NULL, romanized_real_name VARCHAR(255) DEFAULT NULL, roles INT DEFAULT NULL, aliases LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', signature_heroes LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', countries LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ti_wins INT DEFAULT NULL, is_ti_winner TINYINT(1) NOT NULL, twitter VARCHAR(255) DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, twitch VARCHAR(255) DEFAULT NULL, youtube VARCHAR(255) DEFAULT NULL, weibo VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, INDEX dota_pro_player_steam_idx (steam_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('DROP TABLE dota_pro_player');
    }
}
