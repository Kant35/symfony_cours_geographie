<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220209172950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE capitale (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, continent_id INT NOT NULL, capitale_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_349F3CAE921F4C77 (continent_id), UNIQUE INDEX UNIQ_349F3CAEB126FF46 (capitale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAE921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAEB126FF46 FOREIGN KEY (capitale_id) REFERENCES capitale (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAEB126FF46');
        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAE921F4C77');
        $this->addSql('DROP TABLE capitale');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE pays');
    }
}
