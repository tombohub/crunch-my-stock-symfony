<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241012145241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE security (
          id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
          symbol VARCHAR(10) NOT NULL,
          name VARCHAR(255) NOT NULL,
          exchange VARCHAR(10) NOT NULL,
          type VARCHAR(10) NOT NULL,
          ipo_date DATE NOT NULL --(DC2Type:date_immutable)
          ,
          delisting_date DATE DEFAULT NULL --(DC2Type:date_immutable)
          ,
          status VARCHAR(15) NOT NULL,
          isin VARCHAR(12) NOT NULL
        )');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE security');
    }
}
