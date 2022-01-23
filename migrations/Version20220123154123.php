<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220123154123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creation of the entitties to create the Mash Entity';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE decoction_mash_steps (id INT AUTO_INCREMENT NOT NULL, mash_volume_estimation_id INT NOT NULL, init_infusion_id INT NOT NULL, name VARCHAR(255) NOT NULL, total_time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_C4CB4071753828F9 (mash_volume_estimation_id), INDEX IDX_C4CB4071357B2592 (init_infusion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE decoction_mash_steps_next_decoction_mash_step_with_grain_adjunct (decoction_mash_steps_id INT NOT NULL, next_decoction_mash_step_with_grain_adjunct_id INT NOT NULL, INDEX IDX_F2EB24E5CFBD93AE (decoction_mash_steps_id), INDEX IDX_F2EB24E5EF27042D (next_decoction_mash_step_with_grain_adjunct_id), PRIMARY KEY(decoction_mash_steps_id, next_decoction_mash_step_with_grain_adjunct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE decoction_mash_steps_next_decoction_mash_step_wo_grain_adjunct (decoction_mash_steps_id INT NOT NULL, next_decoction_mash_step_without_grain_adjunct_id INT NOT NULL, INDEX IDX_D9B87A1BCFBD93AE (decoction_mash_steps_id), INDEX IDX_D9B87A1B3596481 (next_decoction_mash_step_without_grain_adjunct_id), PRIMARY KEY(decoction_mash_steps_id, next_decoction_mash_step_without_grain_adjunct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infusion_mash_steps (id INT AUTO_INCREMENT NOT NULL, mass_volume_estimation_id INT NOT NULL, init_infusion_id INT NOT NULL, name VARCHAR(255) NOT NULL, total_time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_2C9C0AE65CF4E9F8 (mass_volume_estimation_id), INDEX IDX_2C9C0AE6357B2592 (init_infusion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct (infusion_mash_steps_id INT NOT NULL, next_infusion_mash_step_with_grain_adjunct_id INT NOT NULL, INDEX IDX_31C1B1DFC8785EEB (infusion_mash_steps_id), INDEX IDX_31C1B1DF8496B9AC (next_infusion_mash_step_with_grain_adjunct_id), PRIMARY KEY(infusion_mash_steps_id, next_infusion_mash_step_with_grain_adjunct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infusion_mash_steps_next_infusion_mash_step_wo_grain_adjunct (infusion_mash_steps_id INT NOT NULL, next_infusion_mash_step_without_grain_adjunct_id INT NOT NULL, INDEX IDX_1B132B2BC8785EEB (infusion_mash_steps_id), INDEX IDX_1B132B2BEA346B2 (next_infusion_mash_step_without_grain_adjunct_id), PRIMARY KEY(infusion_mash_steps_id, next_infusion_mash_step_without_grain_adjunct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE init_infusion (id INT AUTO_INCREMENT NOT NULL, init_grain_temp DOUBLE PRECISION NOT NULL, wanted_mash_temp DOUBLE PRECISION NOT NULL, water_grain_ratio DOUBLE PRECISION NOT NULL, water_temp_to_adjunct DOUBLE PRECISION NOT NULL, time DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mash_volume (id INT AUTO_INCREMENT NOT NULL, mass_grain_in_mash DOUBLE PRECISION NOT NULL, water_grain_ratio DOUBLE PRECISION NOT NULL, mash_volume DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE next_decoction_mash_step_with_grain_adjunct (id INT AUTO_INCREMENT NOT NULL, water_grain_ratio_id INT NOT NULL, wanted_temp_next_step DOUBLE PRECISION NOT NULL, decoction_water_grain_ratio DOUBLE PRECISION NOT NULL, water_temp_to_add DOUBLE PRECISION NOT NULL, decoction_boil_time DOUBLE PRECISION NOT NULL, evaporation_rate DOUBLE PRECISION NOT NULL, grain_mass_to_add DOUBLE PRECISION NOT NULL, grain_temp_to_add DOUBLE PRECISION NOT NULL, water_volume_to_add DOUBLE PRECISION NOT NULL, water_boil_time DOUBLE PRECISION NOT NULL, decoction_volume_to_take DOUBLE PRECISION NOT NULL, new_water_grain_ratio DOUBLE PRECISION NOT NULL, time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_87F97361AE129BE3 (water_grain_ratio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE next_decoction_mash_step_without_grain_adjunct (id INT AUTO_INCREMENT NOT NULL, water_grain_ratio_id INT NOT NULL, wanted_temp_next_step DOUBLE PRECISION NOT NULL, decoction_water_grain_ratio DOUBLE PRECISION NOT NULL, water_temp_toadd DOUBLE PRECISION NOT NULL, decoction_boil_time DOUBLE PRECISION NOT NULL, evaporation_rate DOUBLE PRECISION NOT NULL, decoction_volume_to_take DOUBLE PRECISION NOT NULL, time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_728EC3D3AE129BE3 (water_grain_ratio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE next_infusion_mash_step_with_grain_adjunct (id INT AUTO_INCREMENT NOT NULL, water_grain_ratio_id_id INT NOT NULL, grain_mass_to_add DOUBLE PRECISION NOT NULL, temp_of_grain_to_add DOUBLE PRECISION NOT NULL, wanted_temp_next_step DOUBLE PRECISION NOT NULL, water_temp_to_add DOUBLE PRECISION NOT NULL, water_volume_to_add DOUBLE PRECISION NOT NULL, new_water_grain_ratio DOUBLE PRECISION NOT NULL, time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_9905EB3FACE989FE (water_grain_ratio_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE next_infusion_mash_step_without_grain_adjunct (id INT AUTO_INCREMENT NOT NULL, water_grain_ratio_id_id INT NOT NULL, water_adjunct_temp DOUBLE PRECISION NOT NULL, wanted_temp_at_next_step DOUBLE PRECISION NOT NULL, water_volume_to_add DOUBLE PRECISION NOT NULL, new_water_grain_ratio DOUBLE PRECISION NOT NULL, time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_193F7E52ACE989FE (water_grain_ratio_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE water_grain_ratio (id INT AUTO_INCREMENT NOT NULL, init_mash_temp DOUBLE PRECISION NOT NULL, init_mash_dry_grain DOUBLE PRECISION NOT NULL, init_water_volume DOUBLE PRECISION NOT NULL, init_water_grain_ratio DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE decoction_mash_steps ADD CONSTRAINT FK_C4CB4071753828F9 FOREIGN KEY (mash_volume_estimation_id) REFERENCES mash_volume (id)');
        $this->addSql('ALTER TABLE decoction_mash_steps ADD CONSTRAINT FK_C4CB4071357B2592 FOREIGN KEY (init_infusion_id) REFERENCES init_infusion (id)');
        $this->addSql('ALTER TABLE decoction_mash_steps_next_decoction_mash_step_with_grain_adjunct ADD CONSTRAINT FK_F2EB24E5CFBD93AE FOREIGN KEY (decoction_mash_steps_id) REFERENCES decoction_mash_steps (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE decoction_mash_steps_next_decoction_mash_step_with_grain_adjunct ADD CONSTRAINT FK_F2EB24E5EF27042D FOREIGN KEY (next_decoction_mash_step_with_grain_adjunct_id) REFERENCES next_decoction_mash_step_with_grain_adjunct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE decoction_mash_steps_next_decoction_mash_step_wo_grain_adjunct ADD CONSTRAINT FK_D9B87A1BCFBD93AE FOREIGN KEY (decoction_mash_steps_id) REFERENCES decoction_mash_steps (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE decoction_mash_steps_next_decoction_mash_step_wo_grain_adjunct ADD CONSTRAINT FK_D9B87A1B3596481 FOREIGN KEY (next_decoction_mash_step_without_grain_adjunct_id) REFERENCES next_decoction_mash_step_without_grain_adjunct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infusion_mash_steps ADD CONSTRAINT FK_2C9C0AE65CF4E9F8 FOREIGN KEY (mass_volume_estimation_id) REFERENCES mash_volume (id)');
        $this->addSql('ALTER TABLE infusion_mash_steps ADD CONSTRAINT FK_2C9C0AE6357B2592 FOREIGN KEY (init_infusion_id) REFERENCES init_infusion (id)');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct ADD CONSTRAINT FK_31C1B1DFC8785EEB FOREIGN KEY (infusion_mash_steps_id) REFERENCES infusion_mash_steps (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct ADD CONSTRAINT FK_31C1B1DF8496B9AC FOREIGN KEY (next_infusion_mash_step_with_grain_adjunct_id) REFERENCES next_infusion_mash_step_with_grain_adjunct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_wo_grain_adjunct ADD CONSTRAINT FK_1B132B2BC8785EEB FOREIGN KEY (infusion_mash_steps_id) REFERENCES infusion_mash_steps (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_wo_grain_adjunct ADD CONSTRAINT FK_1B132B2BEA346B2 FOREIGN KEY (next_infusion_mash_step_without_grain_adjunct_id) REFERENCES next_infusion_mash_step_without_grain_adjunct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE next_decoction_mash_step_with_grain_adjunct ADD CONSTRAINT FK_87F97361AE129BE3 FOREIGN KEY (water_grain_ratio_id) REFERENCES water_grain_ratio (id)');
        $this->addSql('ALTER TABLE next_decoction_mash_step_without_grain_adjunct ADD CONSTRAINT FK_728EC3D3AE129BE3 FOREIGN KEY (water_grain_ratio_id) REFERENCES water_grain_ratio (id)');
        $this->addSql('ALTER TABLE next_infusion_mash_step_with_grain_adjunct ADD CONSTRAINT FK_9905EB3FACE989FE FOREIGN KEY (water_grain_ratio_id_id) REFERENCES water_grain_ratio (id)');
        $this->addSql('ALTER TABLE next_infusion_mash_step_without_grain_adjunct ADD CONSTRAINT FK_193F7E52ACE989FE FOREIGN KEY (water_grain_ratio_id_id) REFERENCES water_grain_ratio (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE decoction_mash_steps_next_decoction_mash_step_with_grain_adjunct DROP FOREIGN KEY FK_F2EB24E5CFBD93AE');
        $this->addSql('ALTER TABLE decoction_mash_steps_next_decoction_mash_step_wo_grain_adjunct DROP FOREIGN KEY FK_D9B87A1BCFBD93AE');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct DROP FOREIGN KEY FK_31C1B1DFC8785EEB');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_wo_grain_adjunct DROP FOREIGN KEY FK_1B132B2BC8785EEB');
        $this->addSql('ALTER TABLE decoction_mash_steps DROP FOREIGN KEY FK_C4CB4071357B2592');
        $this->addSql('ALTER TABLE infusion_mash_steps DROP FOREIGN KEY FK_2C9C0AE6357B2592');
        $this->addSql('ALTER TABLE decoction_mash_steps DROP FOREIGN KEY FK_C4CB4071753828F9');
        $this->addSql('ALTER TABLE infusion_mash_steps DROP FOREIGN KEY FK_2C9C0AE65CF4E9F8');
        $this->addSql('ALTER TABLE decoction_mash_steps_next_decoction_mash_step_with_grain_adjunct DROP FOREIGN KEY FK_F2EB24E5EF27042D');
        $this->addSql('ALTER TABLE decoction_mash_steps_next_decoction_mash_step_wo_grain_adjunct DROP FOREIGN KEY FK_D9B87A1B3596481');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct DROP FOREIGN KEY FK_31C1B1DF8496B9AC');
        $this->addSql('ALTER TABLE infusion_mash_steps_next_infusion_mash_step_wo_grain_adjunct DROP FOREIGN KEY FK_1B132B2BEA346B2');
        $this->addSql('ALTER TABLE next_decoction_mash_step_with_grain_adjunct DROP FOREIGN KEY FK_87F97361AE129BE3');
        $this->addSql('ALTER TABLE next_decoction_mash_step_without_grain_adjunct DROP FOREIGN KEY FK_728EC3D3AE129BE3');
        $this->addSql('ALTER TABLE next_infusion_mash_step_with_grain_adjunct DROP FOREIGN KEY FK_9905EB3FACE989FE');
        $this->addSql('ALTER TABLE next_infusion_mash_step_without_grain_adjunct DROP FOREIGN KEY FK_193F7E52ACE989FE');
        $this->addSql('DROP TABLE decoction_mash_steps');
        $this->addSql('DROP TABLE decoction_mash_steps_next_decoction_mash_step_with_grain_adjunct');
        $this->addSql('DROP TABLE decoction_mash_steps_next_decoction_mash_step_wo_grain_adjunct');
        $this->addSql('DROP TABLE infusion_mash_steps');
        $this->addSql('DROP TABLE infusion_mash_steps_next_infusion_mash_step_with_grain_adjunct');
        $this->addSql('DROP TABLE infusion_mash_steps_next_infusion_mash_step_wo_grain_adjunct');
        $this->addSql('DROP TABLE init_infusion');
        $this->addSql('DROP TABLE mash_volume');
        $this->addSql('DROP TABLE next_decoction_mash_step_with_grain_adjunct');
        $this->addSql('DROP TABLE next_decoction_mash_step_without_grain_adjunct');
        $this->addSql('DROP TABLE next_infusion_mash_step_with_grain_adjunct');
        $this->addSql('DROP TABLE next_infusion_mash_step_without_grain_adjunct');
        $this->addSql('DROP TABLE water_grain_ratio');
    }
}
