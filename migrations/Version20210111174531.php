<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210111174531 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE drawer_settings (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cabinet_width SMALLINT NOT NULL, sidewall_height SMALLINT NOT NULL, sidewall_body_width SMALLINT NOT NULL, nominal_length SMALLINT NOT NULL, damping_function VARCHAR(255) NOT NULL, material VARCHAR(255) NOT NULL, connection_type VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE drawer_settings');
    }
}
