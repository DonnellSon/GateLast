<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231110122254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aside (id VARCHAR(255) NOT NULL, motto VARCHAR(255) DEFAULT NULL, anthem VARCHAR(255) DEFAULT NULL, population VARCHAR(255) DEFAULT NULL, area VARCHAR(255) DEFAULT NULL, population_density VARCHAR(255) DEFAULT NULL, gdp VARCHAR(255) DEFAULT NULL, gdp_nominal VARCHAR(255) DEFAULT NULL, hdi VARCHAR(255) DEFAULT NULL, currency VARCHAR(255) DEFAULT NULL, driving_side VARCHAR(255) DEFAULT NULL, calling_code VARCHAR(255) DEFAULT NULL, internet_tld VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author (id VARCHAR(255) NOT NULL, author_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id VARCHAR(255) NOT NULL, author_id VARCHAR(255) NOT NULL, commentable_id VARCHAR(255) DEFAULT NULL, content VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9474526CF675F31B (author_id), INDEX IDX_9474526CF8B08B0 (commentable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentable_entity (id VARCHAR(255) NOT NULL, commentable_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id VARCHAR(255) NOT NULL, active_logo_id VARCHAR(255) DEFAULT NULL, author_id VARCHAR(255) NOT NULL, company_size_id VARCHAR(255) NOT NULL, company_type_id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, nif_stat VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL, description LONGTEXT NOT NULL, numero VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, web_site VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_4FBF094F7AC3A854 (active_logo_id), INDEX IDX_4FBF094FF675F31B (author_id), INDEX IDX_4FBF094F69DFB2F0 (company_size_id), INDEX IDX_4FBF094FE51E9644 (company_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_domaine (company_id VARCHAR(255) NOT NULL, domaine_id VARCHAR(255) NOT NULL, INDEX IDX_58FD101B979B1AD6 (company_id), INDEX IDX_58FD101B4272FC9F (domaine_id), PRIMARY KEY(company_id, domaine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_logo (id VARCHAR(255) NOT NULL, company_id VARCHAR(255) DEFAULT NULL, file_url VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', active TINYINT(1) NOT NULL, file_name VARCHAR(255) NOT NULL, file_size VARCHAR(255) NOT NULL, INDEX IDX_A7E380FD979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_size (id VARCHAR(255) NOT NULL, size VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_type (id VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, requester_id VARCHAR(255) NOT NULL, receiver_id VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_4C62E638ED442CF4 (requester_id), INDEX IDX_4C62E638CD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discussion (id VARCHAR(255) NOT NULL, discu_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domaine (id VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domaine_invest (domaine_id VARCHAR(255) NOT NULL, invest_id VARCHAR(255) NOT NULL, INDEX IDX_E4E0EEA84272FC9F (domaine_id), INDEX IDX_E4E0EEA8C7065BD6 (invest_id), PRIMARY KEY(domaine_id, invest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluation (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flag (id VARCHAR(255) NOT NULL, file_url VARCHAR(255) DEFAULT NULL, file_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE global_search (id INT AUTO_INCREMENT NOT NULL, query VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id VARCHAR(255) NOT NULL, image_entity_id VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C53D045F59A7A609 (image_entity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_entity (id VARCHAR(255) NOT NULL, image_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invest (id VARCHAR(255) NOT NULL, company_id VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, need VARCHAR(255) NOT NULL, collected VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_EB095F86979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invest_picture (id VARCHAR(255) NOT NULL, invest_id VARCHAR(255) DEFAULT NULL, file_url VARCHAR(255) NOT NULL, file_name VARCHAR(255) NOT NULL, INDEX IDX_5A511CF1C7065BD6 (invest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_grade (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, author_id VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, salary JSON NOT NULL COMMENT \'(DC2Type:json)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', xp VARCHAR(255) DEFAULT NULL, summary VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_288A3A4EF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id VARCHAR(255) NOT NULL, language VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language_pays (language_id VARCHAR(255) NOT NULL, pays_id VARCHAR(255) NOT NULL, INDEX IDX_696D6E282F1BAF4 (language_id), INDEX IDX_696D6E2A6E44244 (pays_id), PRIMARY KEY(language_id, pays_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation (id VARCHAR(255) NOT NULL, lat_long VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id VARCHAR(255) NOT NULL, latitude VARCHAR(255) DEFAULT NULL, longitude VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_entity (id INT AUTO_INCREMENT NOT NULL, discussion_id VARCHAR(255) DEFAULT NULL, user_id VARCHAR(255) DEFAULT NULL, INDEX IDX_2AFEC65B1ADED311 (discussion_id), INDEX IDX_2AFEC65BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, author_id VARCHAR(255) NOT NULL, discussion_id VARCHAR(255) DEFAULT NULL, content VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B6BD307FF675F31B (author_id), INDEX IDX_B6BD307F1ADED311 (discussion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id VARCHAR(255) NOT NULL, seal_id VARCHAR(255) DEFAULT NULL, location_id VARCHAR(255) DEFAULT NULL, aside_id VARCHAR(255) DEFAULT NULL, flag_id VARCHAR(255) DEFAULT NULL, pays_history_id VARCHAR(255) DEFAULT NULL, pays_geography_id VARCHAR(255) DEFAULT NULL, pays_gouvernment_id VARCHAR(255) DEFAULT NULL, pays_economy_id VARCHAR(255) DEFAULT NULL, pays_cultures_id VARCHAR(255) DEFAULT NULL, pays_demog_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_349F3CAE54778145 (seal_id), UNIQUE INDEX UNIQ_349F3CAE64D218E (location_id), UNIQUE INDEX UNIQ_349F3CAE725221F6 (aside_id), UNIQUE INDEX UNIQ_349F3CAE919FE4E5 (flag_id), INDEX IDX_349F3CAEB82157BA (pays_history_id), INDEX IDX_349F3CAE79EC8569 (pays_geography_id), INDEX IDX_349F3CAE2CF2FF33 (pays_gouvernment_id), INDEX IDX_349F3CAED2FBB123 (pays_economy_id), INDEX IDX_349F3CAEC7091461 (pays_cultures_id), INDEX IDX_349F3CAE2E5B24A8 (pays_demog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_cultures (id VARCHAR(255) NOT NULL, extra_data JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_demog (id VARCHAR(255) NOT NULL, extra_data JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_economy (id VARCHAR(255) NOT NULL, extra_data JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_geography (id VARCHAR(255) NOT NULL, extra_data JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_gouvernment (id VARCHAR(255) NOT NULL, extra_data JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_history (id VARCHAR(255) NOT NULL, extra_data JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id VARCHAR(255) NOT NULL, author_id VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5A8A6C8DF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile_picture (id VARCHAR(255) NOT NULL, user_id VARCHAR(255) NOT NULL, file_url VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', active TINYINT(1) NOT NULL, file_name VARCHAR(255) NOT NULL, ext_url VARCHAR(255) DEFAULT NULL, INDEX IDX_C5659115A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE religion (id VARCHAR(255) NOT NULL, religion VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1055F4F91055F4F9 (religion), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE religion_pays (religion_id VARCHAR(255) NOT NULL, pays_id VARCHAR(255) NOT NULL, INDEX IDX_52F0163B7850CBD (religion_id), INDEX IDX_52F0163A6E44244 (pays_id), PRIMARY KEY(religion_id, pays_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seal (id VARCHAR(255) NOT NULL, file_url VARCHAR(255) NOT NULL, file_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thumbnail (id VARCHAR(255) NOT NULL, post_id VARCHAR(255) NOT NULL, file_name VARCHAR(255) NOT NULL, file_size INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', file_url VARCHAR(255) NOT NULL, INDEX IDX_C35726E64B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id VARCHAR(255) NOT NULL, gender_id VARCHAR(255) DEFAULT NULL, active_profile_picture_id VARCHAR(255) DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) DEFAULT NULL, birth_date VARCHAR(255) DEFAULT NULL, google_id VARCHAR(255) DEFAULT NULL, fb_id VARCHAR(255) DEFAULT NULL, linked_in_id VARCHAR(255) DEFAULT NULL, instagram_id VARCHAR(255) DEFAULT NULL, microsoft_id VARCHAR(255) DEFAULT NULL, discord_id VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649708A0E0 (gender_id), UNIQUE INDEX UNIQ_8D93D649A4767CB2 (active_profile_picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF8B08B0 FOREIGN KEY (commentable_id) REFERENCES commentable_entity (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F7AC3A854 FOREIGN KEY (active_logo_id) REFERENCES company_logo (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F69DFB2F0 FOREIGN KEY (company_size_id) REFERENCES company_size (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FE51E9644 FOREIGN KEY (company_type_id) REFERENCES company_type (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FBF396750 FOREIGN KEY (id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_domaine ADD CONSTRAINT FK_58FD101B979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_domaine ADD CONSTRAINT FK_58FD101B4272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_logo ADD CONSTRAINT FK_A7E380FD979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638ED442CF4 FOREIGN KEY (requester_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE domaine_invest ADD CONSTRAINT FK_E4E0EEA84272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE domaine_invest ADD CONSTRAINT FK_E4E0EEA8C7065BD6 FOREIGN KEY (invest_id) REFERENCES invest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F59A7A609 FOREIGN KEY (image_entity_id) REFERENCES image_entity (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBF396750 FOREIGN KEY (id) REFERENCES commentable_entity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invest ADD CONSTRAINT FK_EB095F86979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE invest_picture ADD CONSTRAINT FK_5A511CF1C7065BD6 FOREIGN KEY (invest_id) REFERENCES invest (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4EF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE language_pays ADD CONSTRAINT FK_696D6E282F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_pays ADD CONSTRAINT FK_696D6E2A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_entity ADD CONSTRAINT FK_2AFEC65B1ADED311 FOREIGN KEY (discussion_id) REFERENCES discussion (id)');
        $this->addSql('ALTER TABLE member_entity ADD CONSTRAINT FK_2AFEC65BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F1ADED311 FOREIGN KEY (discussion_id) REFERENCES discussion (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE54778145 FOREIGN KEY (seal_id) REFERENCES seal (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE725221F6 FOREIGN KEY (aside_id) REFERENCES aside (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE919FE4E5 FOREIGN KEY (flag_id) REFERENCES flag (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAEB82157BA FOREIGN KEY (pays_history_id) REFERENCES pays_history (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE79EC8569 FOREIGN KEY (pays_geography_id) REFERENCES pays_geography (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE2CF2FF33 FOREIGN KEY (pays_gouvernment_id) REFERENCES pays_gouvernment (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAED2FBB123 FOREIGN KEY (pays_economy_id) REFERENCES pays_economy (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAEC7091461 FOREIGN KEY (pays_cultures_id) REFERENCES pays_cultures (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE2E5B24A8 FOREIGN KEY (pays_demog_id) REFERENCES pays_demog (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DBF396750 FOREIGN KEY (id) REFERENCES commentable_entity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profile_picture ADD CONSTRAINT FK_C5659115A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE religion_pays ADD CONSTRAINT FK_52F0163B7850CBD FOREIGN KEY (religion_id) REFERENCES religion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE religion_pays ADD CONSTRAINT FK_52F0163A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE thumbnail ADD CONSTRAINT FK_C35726E64B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE thumbnail ADD CONSTRAINT FK_C35726E6BF396750 FOREIGN KEY (id) REFERENCES image_entity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A4767CB2 FOREIGN KEY (active_profile_picture_id) REFERENCES profile_picture (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BF396750 FOREIGN KEY (id) REFERENCES author (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF675F31B');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF8B08B0');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F7AC3A854');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FF675F31B');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F69DFB2F0');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FE51E9644');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FBF396750');
        $this->addSql('ALTER TABLE company_domaine DROP FOREIGN KEY FK_58FD101B979B1AD6');
        $this->addSql('ALTER TABLE company_domaine DROP FOREIGN KEY FK_58FD101B4272FC9F');
        $this->addSql('ALTER TABLE company_logo DROP FOREIGN KEY FK_A7E380FD979B1AD6');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638ED442CF4');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638CD53EDB6');
        $this->addSql('ALTER TABLE domaine_invest DROP FOREIGN KEY FK_E4E0EEA84272FC9F');
        $this->addSql('ALTER TABLE domaine_invest DROP FOREIGN KEY FK_E4E0EEA8C7065BD6');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F59A7A609');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBF396750');
        $this->addSql('ALTER TABLE invest DROP FOREIGN KEY FK_EB095F86979B1AD6');
        $this->addSql('ALTER TABLE invest_picture DROP FOREIGN KEY FK_5A511CF1C7065BD6');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4EF675F31B');
        $this->addSql('ALTER TABLE language_pays DROP FOREIGN KEY FK_696D6E282F1BAF4');
        $this->addSql('ALTER TABLE language_pays DROP FOREIGN KEY FK_696D6E2A6E44244');
        $this->addSql('ALTER TABLE member_entity DROP FOREIGN KEY FK_2AFEC65B1ADED311');
        $this->addSql('ALTER TABLE member_entity DROP FOREIGN KEY FK_2AFEC65BA76ED395');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF675F31B');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F1ADED311');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE54778145');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE64D218E');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE725221F6');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE919FE4E5');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAEB82157BA');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE79EC8569');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE2CF2FF33');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAED2FBB123');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAEC7091461');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE2E5B24A8');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DF675F31B');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DBF396750');
        $this->addSql('ALTER TABLE profile_picture DROP FOREIGN KEY FK_C5659115A76ED395');
        $this->addSql('ALTER TABLE religion_pays DROP FOREIGN KEY FK_52F0163B7850CBD');
        $this->addSql('ALTER TABLE religion_pays DROP FOREIGN KEY FK_52F0163A6E44244');
        $this->addSql('ALTER TABLE thumbnail DROP FOREIGN KEY FK_C35726E64B89032C');
        $this->addSql('ALTER TABLE thumbnail DROP FOREIGN KEY FK_C35726E6BF396750');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649708A0E0');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A4767CB2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BF396750');
        $this->addSql('DROP TABLE aside');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE commentable_entity');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE company_domaine');
        $this->addSql('DROP TABLE company_logo');
        $this->addSql('DROP TABLE company_size');
        $this->addSql('DROP TABLE company_type');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE domaine_invest');
        $this->addSql('DROP TABLE evaluation');
        $this->addSql('DROP TABLE flag');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE global_search');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE image_entity');
        $this->addSql('DROP TABLE invest');
        $this->addSql('DROP TABLE invest_picture');
        $this->addSql('DROP TABLE job_grade');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE job_type');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE language_pays');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE member_entity');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE pays_cultures');
        $this->addSql('DROP TABLE pays_demog');
        $this->addSql('DROP TABLE pays_economy');
        $this->addSql('DROP TABLE pays_geography');
        $this->addSql('DROP TABLE pays_gouvernment');
        $this->addSql('DROP TABLE pays_history');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE profile_picture');
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('DROP TABLE religion');
        $this->addSql('DROP TABLE religion_pays');
        $this->addSql('DROP TABLE seal');
        $this->addSql('DROP TABLE thumbnail');
        $this->addSql('DROP TABLE user');
    }
}
