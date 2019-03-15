<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190306093126 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cartes (id INT AUTO_INCREMENT NOT NULL, carte_nom LONGTEXT NOT NULL, carte_metier VARCHAR(255) NOT NULL, carte_force INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueurs (id INT AUTO_INCREMENT NOT NULL, joueur_speudo VARCHAR(20) NOT NULL, joueur_mdp VARCHAR(20) NOT NULL, joueur_email VARCHAR(35) NOT NULL, joueur_date DATETIME DEFAULT NULL, joueur_connexion DATETIME DEFAULT NULL, joueur_win INT DEFAULT NULL, joueur_loose INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parties (id INT AUTO_INCREMENT NOT NULL, partie_statut TINYINT(1) NOT NULL, partie_joueur1 VARCHAR(20) NOT NULL, partie_joueur2 VARCHAR(20) DEFAULT NULL, partie_tourde TINYINT(1) DEFAULT NULL, partie_des JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', partie_terrain_j JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', partie_joueur_a JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', partie_duree INT DEFAULT NULL, partie_victoire VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, date DATETIME DEFAULT NULL, texte VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(15) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE cartes');
        $this->addSql('DROP TABLE joueurs');
        $this->addSql('DROP TABLE parties');
    }
}
