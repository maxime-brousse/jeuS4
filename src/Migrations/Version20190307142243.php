<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190307142243 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE joueurs ADD joueur_speudo_id INT NOT NULL');
        $this->addSql('ALTER TABLE joueurs ADD CONSTRAINT FK_F0FD889D69BF35BC FOREIGN KEY (joueur_speudo_id) REFERENCES parties (id)');
        $this->addSql('CREATE INDEX IDX_F0FD889D69BF35BC ON joueurs (joueur_speudo_id)');
        $this->addSql('ALTER TABLE parties ADD partie_j2 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE joueurs DROP FOREIGN KEY FK_F0FD889D69BF35BC');
        $this->addSql('DROP INDEX IDX_F0FD889D69BF35BC ON joueurs');
        $this->addSql('ALTER TABLE joueurs DROP joueur_speudo_id');
        $this->addSql('ALTER TABLE parties DROP partie_j2');
    }
}
