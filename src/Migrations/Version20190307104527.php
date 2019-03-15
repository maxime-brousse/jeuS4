<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190307104527 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE joueurs (id INT AUTO_INCREMENT NOT NULL, joueur_mdp VARCHAR(25) NOT NULL, joueur_email VARCHAR(35) NOT NULL, joueur_date DATETIME DEFAULT NULL, joueur_last DATETIME NOT NULL, joueur_win INT DEFAULT NULL, joueur_loose INT DEFAULT NULL, joueur_duree INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parties (id INT AUTO_INCREMENT NOT NULL, partie_statut TINYINT(1) NOT NULL, partie_tourde TINYINT(1) DEFAULT NULL, partie_de JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', partie_terrain JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', partie_type_v VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE joueurs');
        $this->addSql('DROP TABLE parties');
    }
}
