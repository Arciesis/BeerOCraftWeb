<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921124643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hop (id INT AUTO_INCREMENT NOT NULL, alpha_acide SMALLINT NOT NULL, beta_acide SMALLINT NOT NULL, form VARCHAR(255) NOT NULL, humulene SMALLINT DEFAULT NULL, caryophyllene SMALLINT DEFAULT NULL, cohumulone SMALLINT DEFAULT NULL, myrcene SMALLINT DEFAULT NULL, polyphenole SMALLINT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE yeast (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, viability SMALLINT NOT NULL, temp_min SMALLINT NOT NULL, temp_max SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fermentable ADD name VARCHAR(255) NOT NULL, ADD type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE hop');
        $this->addSql('DROP TABLE yeast');
        $this->addSql('ALTER TABLE fermentable DROP name, DROP type');
    }
}
