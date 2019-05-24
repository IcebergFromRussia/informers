<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190523214117 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE informer DROP CONSTRAINT fk_9378e00cf987d8a8');
        $this->addSql('ALTER TABLE informer DROP CONSTRAINT fk_9378e00c37291e61');
        $this->addSql('alter table service_data drop constraint fk_63b0478ff987d8a8;');
        $this->addSql('alter table service_data drop constraint fk_63b0478f37291e61;');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('drop index idx_63b0478ff987d8a8;');
        $this->addSql('drop index idx_63b0478f37291e61;');
        $this->addSql('ALTER TABLE service_data ADD CONSTRAINT FK_63B0478FF987D8A8 FOREIGN KEY (user_created_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_data ADD CONSTRAINT FK_63B0478F37291E61 FOREIGN KEY (user_changed_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('drop index idx_9378e00c37291e61;');
        $this->addSql('drop index idx_9378e00cf987d8a8;');
        $this->addSql('ALTER TABLE informer ADD CONSTRAINT FK_9378E00CF987D8A8 FOREIGN KEY (user_created_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE informer ADD CONSTRAINT FK_9378E00C37291E61 FOREIGN KEY (user_changed_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE service_data DROP CONSTRAINT FK_63B0478FF987D8A8');
        $this->addSql('ALTER TABLE service_data DROP CONSTRAINT FK_63B0478F37291E61');
        $this->addSql('ALTER TABLE informer DROP CONSTRAINT FK_9378E00CF987D8A8');
        $this->addSql('ALTER TABLE informer DROP CONSTRAINT FK_9378E00C37291E61');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE informer DROP CONSTRAINT fk_9378e00cf987d8a8');
        $this->addSql('ALTER TABLE informer DROP CONSTRAINT fk_9378e00c37291e61');
        $this->addSql('ALTER TABLE informer ADD CONSTRAINT fk_9378e00cf987d8a8 FOREIGN KEY (user_created_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE informer ADD CONSTRAINT fk_9378e00c37291e61 FOREIGN KEY (user_changed_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_data DROP CONSTRAINT fk_63b0478ff987d8a8');
        $this->addSql('ALTER TABLE service_data DROP CONSTRAINT fk_63b0478f37291e61');
        $this->addSql('ALTER TABLE service_data ADD CONSTRAINT fk_63b0478ff987d8a8 FOREIGN KEY (user_created_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_data ADD CONSTRAINT fk_63b0478f37291e61 FOREIGN KEY (user_changed_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
