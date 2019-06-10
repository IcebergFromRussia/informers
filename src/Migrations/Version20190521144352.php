<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190521144352 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE informer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE informer_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE service_data_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE service_data_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE informer (id INT NOT NULL, service_data_id INT NOT NULL, user_created_id INT NOT NULL, user_changed_id INT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, error_code VARCHAR(255) DEFAULT NULL, error_text VARCHAR(255) DEFAULT NULL, notification_count INT NOT NULL, key VARCHAR(255) DEFAULT NULL, data VARCHAR(255) NOT NULL, sort INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, actualized_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9378E00CF871F3A0 ON informer (service_data_id)');
        $this->addSql('CREATE INDEX IDX_9378E00CF987D8A8 ON informer (user_created_id)');
        $this->addSql('CREATE INDEX IDX_9378E00C37291E61 ON informer (user_changed_id)');
        $this->addSql('CREATE TABLE informer_type (id INT NOT NULL, code VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, sort INT NOT NULL, enabled BOOLEAN DEFAULT NULL, key_field_regex VARCHAR(255) DEFAULT NULL, block_user_create BOOLEAN NOT NULL, block_user_delete BOOLEAN NOT NULL, block_user_deactivate BOOLEAN NOT NULL, data_schema JSON DEFAULT NULL, service_data_validation JSON DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE service_data (id INT NOT NULL, type_id INT NOT NULL, user_created_id INT NOT NULL, user_changed_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, key VARCHAR(255) DEFAULT NULL, data JSON DEFAULT NULL, sort INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_63B0478FC54C8C93 ON service_data (type_id)');
        $this->addSql('CREATE INDEX IDX_63B0478FF987D8A8 ON service_data (user_created_id)');
        $this->addSql('CREATE INDEX IDX_63B0478F37291E61 ON service_data (user_changed_id)');
        $this->addSql('CREATE TABLE service_data_type (id INT NOT NULL, code VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, enabled BOOLEAN DEFAULT NULL, key_field_regex VARCHAR(255) DEFAULT NULL, ыщке VARCHAR(255) NOT NULL, sort INT NOT NULL, data_schema JSON DEFAULT NULL, form_params JSON DEFAULT NULL, block_user_create BOOLEAN NOT NULL, block_user_delete BOOLEAN NOT NULL, block_user_deactivate BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE informer ADD CONSTRAINT FK_9378E00CF871F3A0 FOREIGN KEY (service_data_id) REFERENCES service_data (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE informer ADD CONSTRAINT FK_9378E00CF987D8A8 FOREIGN KEY (user_created_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE informer ADD CONSTRAINT FK_9378E00C37291E61 FOREIGN KEY (user_changed_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_data ADD CONSTRAINT FK_63B0478FC54C8C93 FOREIGN KEY (type_id) REFERENCES service_data_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_data ADD CONSTRAINT FK_63B0478FF987D8A8 FOREIGN KEY (user_created_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_data ADD CONSTRAINT FK_63B0478F37291E61 FOREIGN KEY (user_changed_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE informer DROP CONSTRAINT FK_9378E00CF871F3A0');
        $this->addSql('ALTER TABLE service_data DROP CONSTRAINT FK_63B0478FC54C8C93');
        $this->addSql('ALTER TABLE informer DROP CONSTRAINT FK_9378E00CF987D8A8');
        $this->addSql('ALTER TABLE informer DROP CONSTRAINT FK_9378E00C37291E61');
        $this->addSql('ALTER TABLE service_data DROP CONSTRAINT FK_63B0478FF987D8A8');
        $this->addSql('ALTER TABLE service_data DROP CONSTRAINT FK_63B0478F37291E61');
        $this->addSql('DROP SEQUENCE informer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE informer_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE service_data_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE service_data_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP TABLE informer');
        $this->addSql('DROP TABLE informer_type');
        $this->addSql('DROP TABLE service_data');
        $this->addSql('DROP TABLE service_data_type');
        $this->addSql('DROP TABLE "user"');
    }
}
