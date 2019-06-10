<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190521145928 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE informer ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE informer ADD CONSTRAINT FK_9378E00CC54C8C93 FOREIGN KEY (type_id) REFERENCES informer_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9378E00CC54C8C93 ON informer (type_id)');
        $this->addSql('ALTER TABLE service_data_type DROP "ыщке"');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE informer DROP CONSTRAINT FK_9378E00CC54C8C93');
        $this->addSql('DROP INDEX IDX_9378E00CC54C8C93');
        $this->addSql('ALTER TABLE informer DROP type_id');
        $this->addSql('ALTER TABLE service_data_type ADD "ыщке" VARCHAR(255) NOT NULL');
    }
}
