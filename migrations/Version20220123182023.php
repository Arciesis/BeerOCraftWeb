<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220123182023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mash (id INT AUTO_INCREMENT NOT NULL, infusion_mash_steps_id INT DEFAULT NULL, decoction_mash_steps_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(511) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_E666928AC8785EEB (infusion_mash_steps_id), INDEX IDX_E666928ACFBD93AE (decoction_mash_steps_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mash ADD CONSTRAINT FK_E666928AC8785EEB FOREIGN KEY (infusion_mash_steps_id) REFERENCES infusion_mash_steps (id)');
        $this->addSql('ALTER TABLE mash ADD CONSTRAINT FK_E666928ACFBD93AE FOREIGN KEY (decoction_mash_steps_id) REFERENCES decoction_mash_steps (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mash');
    }
}
