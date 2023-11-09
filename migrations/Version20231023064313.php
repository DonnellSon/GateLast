<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023064313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company ADD active_logo_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F7AC3A854 FOREIGN KEY (active_logo_id) REFERENCES profile_picture (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4FBF094F7AC3A854 ON company (active_logo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F7AC3A854');
        $this->addSql('DROP INDEX UNIQ_4FBF094F7AC3A854 ON company');
        $this->addSql('ALTER TABLE company DROP active_logo_id');
    }
}
