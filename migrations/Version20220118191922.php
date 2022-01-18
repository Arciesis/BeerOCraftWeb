<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220118191922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE beer_style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, bjcp_category VARCHAR(255) NOT NULL, ibu_min SMALLINT NOT NULL, ibu_max SMALLINT NOT NULL, abv_min SMALLINT NOT NULL, abv_max SMALLINT NOT NULL, og_min DOUBLE PRECISION NOT NULL, og_max DOUBLE PRECISION NOT NULL, fg_min DOUBLE PRECISION NOT NULL, fg_max DOUBLE PRECISION NOT NULL, gaz_volume_min DOUBLE PRECISION DEFAULT NULL, gaz_volume_max DOUBLE PRECISION DEFAULT NULL, lovibond SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE beer_style');
    }
}
