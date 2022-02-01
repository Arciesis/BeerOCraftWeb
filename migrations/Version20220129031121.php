<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220129031121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE next_infusion_mash_step_with_grain_adjunct DROP INDEX UNIQ_9905EB3FACE989FE, ADD INDEX IDX_9905EB3FACE989FE (water_grain_ratio_id_id)');
        $this->addSql('ALTER TABLE next_infusion_mash_step_with_grain_adjunct CHANGE water_grain_ratio_id_id water_grain_ratio_id_id INT DEFAULT NULL, CHANGE wanted_temp_next_step wanted_temp_at_next_step DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE next_infusion_mash_step_with_grain_adjunct DROP INDEX IDX_9905EB3FACE989FE, ADD UNIQUE INDEX UNIQ_9905EB3FACE989FE (water_grain_ratio_id_id)');
        $this->addSql('ALTER TABLE next_infusion_mash_step_with_grain_adjunct CHANGE water_grain_ratio_id_id water_grain_ratio_id_id INT NOT NULL, CHANGE wanted_temp_at_next_step wanted_temp_next_step DOUBLE PRECISION NOT NULL');
    }
}
