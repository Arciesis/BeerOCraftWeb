<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220128170924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE next_infusion_mash_step_without_grain_adjunct_water_grain_ratio (next_infusion_mash_step_without_grain_adjunct_water_grain_ratio INT NOT NULL, water_grain_ratio_id INT NOT NULL, INDEX IDX_2C285A3C3ED1C4CC (next_infusion_mash_step_without_grain_adjunct_water_grain_ratio), INDEX IDX_2C285A3CAE129BE3 (water_grain_ratio_id), PRIMARY KEY(next_infusion_mash_step_without_grain_adjunct_water_grain_ratio, water_grain_ratio_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE next_infusion_mash_step_without_grain_adjunct_water_grain_ratio ADD CONSTRAINT FK_2C285A3C3ED1C4CC FOREIGN KEY (next_infusion_mash_step_without_grain_adjunct_water_grain_ratio) REFERENCES next_infusion_mash_step_without_grain_adjunct (id)'
        );
        $this->addSql(
            'ALTER TABLE next_infusion_mash_step_without_grain_adjunct_water_grain_ratio ADD CONSTRAINT FK_2C285A3CAE129BE3 FOREIGN KEY (water_grain_ratio_id) REFERENCES water_grain_ratio (id)'
        );
        $this->addSql('ALTER TABLE next_infusion_mash_step_without_grain_adjunct DROP FOREIGN KEY FK_193F7E52ACE989FE');
        $this->addSql('DROP INDEX UNIQ_193F7E52ACE989FE ON next_infusion_mash_step_without_grain_adjunct');
        $this->addSql('ALTER TABLE next_infusion_mash_step_without_grain_adjunct DROP water_grain_ratio_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE next_infusion_mash_step_without_grain_adjunct_water_grain_ratio');
        $this->addSql(
            'ALTER TABLE next_infusion_mash_step_without_grain_adjunct ADD water_grain_ratio_id_id INT NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE next_infusion_mash_step_without_grain_adjunct ADD CONSTRAINT FK_193F7E52ACE989FE FOREIGN KEY (water_grain_ratio_id_id) REFERENCES water_grain_ratio (id) ON UPDATE NO ACTION ON DELETE NO ACTION'
        );
        $this->addSql(
            'CREATE UNIQUE INDEX UNIQ_193F7E52ACE989FE ON next_infusion_mash_step_without_grain_adjunct (water_grain_ratio_id_id)'
        );
    }
}
