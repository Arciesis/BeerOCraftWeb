<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823145400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beer_recipe ADD real_owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE beer_recipe ADD CONSTRAINT FK_12A78AED89590964 FOREIGN KEY (real_owner_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_12A78AED89590964 ON beer_recipe (real_owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beer_recipe DROP FOREIGN KEY FK_12A78AED89590964');
        $this->addSql('DROP INDEX UNIQ_12A78AED89590964 ON beer_recipe');
        $this->addSql('ALTER TABLE beer_recipe DROP real_owner_id');
    }
}
