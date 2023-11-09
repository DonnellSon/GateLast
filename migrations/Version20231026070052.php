<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231026070052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profile_picture ADD ext_url VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD google_id VARCHAR(255) DEFAULT NULL, ADD fb_id VARCHAR(255) DEFAULT NULL, ADD linked_in_id VARCHAR(255) DEFAULT NULL, ADD instagram_id VARCHAR(255) DEFAULT NULL, ADD microsoft_id VARCHAR(255) DEFAULT NULL, ADD discord_id VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profile_picture DROP ext_url');
        $this->addSql('ALTER TABLE user DROP google_id, DROP fb_id, DROP linked_in_id, DROP instagram_id, DROP microsoft_id, DROP discord_id');
    }
}
