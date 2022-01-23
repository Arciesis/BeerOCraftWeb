<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220123105618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE infusion_mash_steps (id INT AUTO_INCREMENT NOT NULL, mass_volume_estimation_id INT NOT NULL, init_infusion_id INT NOT NULL, name VARCHAR(255) NOT NULL, total_time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_2C9C0AE65CF4E9F8 (mass_volume_estimation_id), INDEX IDX_2C9C0AE6357B2592 (init_infusion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct (infusion_mash_steps_id INT NOT NULL, next_infusion_mash_step_with_grain_adjunct_id INT NOT NULL, INDEX IDX_31C1B1DFC8785EEB (infusion_mash_steps_id), INDEX IDX_31C1B1DF8496B9AC (next_infusion_mash_step_with_grain_adjunct_id), PRIMARY KEY(infusion_mash_steps_id, next_infusion_mash_step_with_grain_adjunct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infusion_mash_steps_next_infusion_mash_step_wo_grain_adjunct (infusion_mash_steps_id INT NOT NULL, next_infusion_mash_step_wo_grain_adjunct_id INT NOT NULL, INDEX IDX_6C801D2DC8785EEB (infusion_mash_steps_id), INDEX IDX_6C801D2DEA346B2 (next_infusion_mash_step_wo_grain_adjunct_id), PRIMARY KEY(infusion_mash_steps_id, next_infusion_mash_step_wo_grain_adjunct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE init_infusion (id INT AUTO_INCREMENT NOT NULL, init_grain_temp DOUBLE PRECISION NOT NULL, wanted_mash_temp DOUBLE PRECISION NOT NULL, water_grain_ratio DOUBLE PRECISION NOT NULL, water_temp_to_adjunct DOUBLE PRECISION NOT NULL, time DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mash_volume (id INT AUTO_INCREMENT NOT NULL, mass_grain_in_mash DOUBLE PRECISION NOT NULL, water_grain_ratio DOUBLE PRECISION NOT NULL, mash_volume DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE next_infusion_mash_step_with_grain_adjunct (id INT AUTO_INCREMENT NOT NULL, water_grain_ratio_id_id INT NOT NULL, grain_mass_to_add DOUBLE PRECISION NOT NULL, temp_of_grain_to_add DOUBLE PRECISION NOT NULL, wanted_temp_next_step DOUBLE PRECISION NOT NULL, water_temp_to_add DOUBLE PRECISION NOT NULL, water_volume_to_add DOUBLE PRECISION NOT NULL, new_water_grain_ratio DOUBLE PRECISION NOT NULL, time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_9905EB3FACE989FE (water_grain_ratio_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE next_infusion_mash_step_wo_grain_adjunct (id INT AUTO_INCREMENT NOT NULL, water_grain_ratio_id_id INT NOT NULL, water_adjunct_temp DOUBLE PRECISION NOT NULL, wanted_temp_at_next_step DOUBLE PRECISION NOT NULL, water_volume_to_add DOUBLE PRECISION NOT NULL, new_water_grain_ratio DOUBLE PRECISION NOT NULL, time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_193F7E52ACE989FE (water_grain_ratio_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE water_grain_ratio (id INT AUTO_INCREMENT NOT NULL, init_mash_temp DOUBLE PRECISION NOT NULL, init_mash_dry_grain DOUBLE PRECISION NOT NULL, init_water_volume DOUBLE PRECISION NOT NULL, init_water_grain_ratio DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE infusion_mash_steps ADD CONSTRAINT FK_2C9C0AE65CF4E9F8 FOREIGN KEY (mass_volume_estimation_id) REFERENCES mash_volume (id)');
        $this->addSql('ALTER TABLE infusion_mash_steps ADD CONSTRAINT FK_2C9C0AE6357B2592 FOREIGN KEY (init_infusion_id) REFERENCES init_infusion (id)');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct ADD CONSTRAINT FK_31C1B1DFC8785EEB FOREIGN KEY (infusion_mash_steps_id) REFERENCES infusion_mash_steps (id)');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct ADD CONSTRAINT FK_31C1B1DF8496B9AC FOREIGN KEY (next_infusion_mash_step_with_grain_adjunct_id) REFERENCES next_infusion_mash_step_with_grain_adjunct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_wo_grain_adjunct ADD CONSTRAINT FK_6C801D2DC8785EEB FOREIGN KEY (infusion_mash_steps_id) REFERENCES infusion_mash_steps (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_wo_grain_adjunct ADD CONSTRAINT FK_6C801D2DEA346B2 FOREIGN KEY (next_infusion_mash_step_wo_grain_adjunct_id) REFERENCES next_infusion_mash_step_wo_grain_adjunct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE next_infusion_mash_step_with_grain_adjunct ADD CONSTRAINT FK_9905EB3FACE989FE FOREIGN KEY (water_grain_ratio_id_id) REFERENCES water_grain_ratio (id)');
        $this->addSql('ALTER TABLE next_infusion_mash_step_wo_grain_adjunct ADD CONSTRAINT FK_193F7E52ACE989FE FOREIGN KEY (water_grain_ratio_id_id) REFERENCES water_grain_ratio (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct DROP FOREIGN KEY FK_31C1B1DFC8785EEB');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_without_grain_adjunct DROP FOREIGN KEY FK_6C801D2DC8785EEB');
        $this->addSql('ALTER TABLE infusion_mash_steps DROP FOREIGN KEY FK_2C9C0AE6357B2592');
        $this->addSql('ALTER TABLE infusion_mash_steps DROP FOREIGN KEY FK_2C9C0AE65CF4E9F8');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct DROP FOREIGN KEY FK_31C1B1DF8496B9AC');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_without_grain_adjunct DROP FOREIGN KEY FK_6C801D2DEA346B2');
        $this->addSql('ALTER TABLE next_infusion_mash_step_with_grain_adjunct DROP FOREIGN KEY FK_9905EB3FACE989FE');
        $this->addSql('ALTER TABLE next_infusion_mash_step_without_grain_adjunct DROP FOREIGN KEY FK_193F7E52ACE989FE');
        $this->addSql('DROP TABLE infusion_mash_steps');
        $this->addSql('DROP TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct');
        $this->addSql('DROP TABLE infusion_mash_steps_next_infusion_mash_step_without_grain_adjunct');
        $this->addSql('DROP TABLE init_infusion');
        $this->addSql('DROP TABLE mash_volume');
        $this->addSql('DROP TABLE next_infusion_mash_step_with_grain_adjunct');
        $this->addSql('DROP TABLE next_infusion_mash_step_without_grain_adjunct');
        $this->addSql('DROP TABLE water_grain_ratio');
    }
}
