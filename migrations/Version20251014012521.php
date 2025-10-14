<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251014012521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE membership (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer ADD status_id INT NOT NULL, ADD membership_id INT NOT NULL, DROP status, DROP membership');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E096BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E091FB354CD FOREIGN KEY (membership_id) REFERENCES membership (id)');
        $this->addSql('CREATE INDEX IDX_81398E096BF700BD ON customer (status_id)');
        $this->addSql('CREATE INDEX IDX_81398E091FB354CD ON customer (membership_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E091FB354CD');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E096BF700BD');
        $this->addSql('DROP TABLE membership');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP INDEX IDX_81398E096BF700BD ON customer');
        $this->addSql('DROP INDEX IDX_81398E091FB354CD ON customer');
        $this->addSql('ALTER TABLE customer ADD status VARCHAR(255) NOT NULL, ADD membership VARCHAR(255) NOT NULL, DROP status_id, DROP membership_id');
    }
}
