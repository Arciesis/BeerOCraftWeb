<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210917110656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fermentable (id INT AUTO_INCREMENT NOT NULL, humidity SMALLINT DEFAULT NULL, grind_extract SMALLINT DEFAULT NULL, total_prot SMALLINT DEFAULT NULL, soluble_prot SMALLINT DEFAULT NULL, kolbach_index SMALLINT DEFAULT NULL, fan SMALLINT DEFAULT NULL, ebc SMALLINT NOT NULL, kz SMALLINT DEFAULT NULL, saccharification SMALLINT NOT NULL, distatic_power INT NOT NULL, ph SMALLINT DEFAULT NULL, fiability SMALLINT DEFAULT NULL, homogeneity SMALLINT DEFAULT NULL, viscosity SMALLINT DEFAULT NULL, bglucane SMALLINT DEFAULT NULL, limit_attenuation SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE fermentable');
        $this->addSql('DROP TABLE `user`');
    }
}
