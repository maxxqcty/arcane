<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251014105800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer_services (customer_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_5FF7A2469395C3F3 (customer_id), INDEX IDX_5FF7A246ED5CA9E6 (service_id), PRIMARY KEY(customer_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer_services ADD CONSTRAINT FK_5FF7A2469395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_services ADD CONSTRAINT FK_5FF7A246ED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_services DROP FOREIGN KEY FK_5FF7A2469395C3F3');
        $this->addSql('ALTER TABLE customer_services DROP FOREIGN KEY FK_5FF7A246ED5CA9E6');
        $this->addSql('DROP TABLE customer_services');
    }
}
