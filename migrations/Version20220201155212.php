<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220201155212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE next_decoction_mash_step_with_grain_adjunct ADD temp_of_brew_water_adjunct DOUBLE PRECISION NOT NULL, DROP water_boil_time, DROP time');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE next_decoction_mash_step_with_grain_adjunct ADD time DOUBLE PRECISION NOT NULL, CHANGE temp_of_brew_water_adjunct water_boil_time DOUBLE PRECISION NOT NULL');
    }
}
