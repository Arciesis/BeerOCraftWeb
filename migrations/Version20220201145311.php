<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220201145311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE next_decoction_mash_step_with_grain_adjunct DROP INDEX UNIQ_87F97361AE129BE3, ADD INDEX IDX_87F97361AE129BE3 (water_grain_ratio_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE next_decoction_mash_step_with_grain_adjunct DROP INDEX IDX_87F97361AE129BE3, ADD UNIQUE INDEX UNIQ_87F97361AE129BE3 (water_grain_ratio_id)');
    }
}
