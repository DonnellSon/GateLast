<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017070319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author_contact DROP FOREIGN KEY FK_958797BE7A1254A');
        $this->addSql('ALTER TABLE author_contact DROP FOREIGN KEY FK_958797BA76ED395');
        $this->addSql('DROP TABLE author_contact');
        $this->addSql('ALTER TABLE contact ADD requester_id VARCHAR(255) NOT NULL, ADD receiver_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638ED442CF4 FOREIGN KEY (requester_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638ED442CF4 ON contact (requester_id)');
        $this->addSql('CREATE INDEX IDX_4C62E638CD53EDB6 ON contact (receiver_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author_contact (user_id VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, contact_id VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_958797BE7A1254A (contact_id), INDEX IDX_958797BA76ED395 (user_id), PRIMARY KEY(user_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE author_contact ADD CONSTRAINT FK_958797BE7A1254A FOREIGN KEY (contact_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE author_contact ADD CONSTRAINT FK_958797BA76ED395 FOREIGN KEY (user_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638ED442CF4');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638CD53EDB6');
        $this->addSql('DROP INDEX IDX_4C62E638ED442CF4 ON contact');
        $this->addSql('DROP INDEX IDX_4C62E638CD53EDB6 ON contact');
        $this->addSql('ALTER TABLE contact DROP requester_id, DROP receiver_id');
    }
}
