<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220819140533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE beer_recipe (id INT AUTO_INCREMENT NOT NULL, equipment_id INT NOT NULL, style_id INT NOT NULL, yeast_id INT NOT NULL, mash_id INT NOT NULL, name VARCHAR(255) NOT NULL, is_public TINYINT(1) NOT NULL, target_batch_size DOUBLE PRECISION NOT NULL, target_boil_size DOUBLE PRECISION NOT NULL, boil_time DOUBLE PRECISION NOT NULL, specific_gravity DOUBLE PRECISION NOT NULL, INDEX IDX_12A78AED517FE9FE (equipment_id), INDEX IDX_12A78AEDBACD6074 (style_id), INDEX IDX_12A78AEDF345B99 (yeast_id), INDEX IDX_12A78AED6D457775 (mash_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beer_recipe_user (beer_recipe_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_26D5C8554EA5C05B (beer_recipe_id), INDEX IDX_26D5C855A76ED395 (user_id), PRIMARY KEY(beer_recipe_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beer_recipe_fermentable (beer_recipe_id INT NOT NULL, fermentable_id INT NOT NULL, INDEX IDX_7E93AF154EA5C05B (beer_recipe_id), INDEX IDX_7E93AF15CFFB7276 (fermentable_id), PRIMARY KEY(beer_recipe_id, fermentable_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beer_recipe_hop (beer_recipe_id INT NOT NULL, hop_id INT NOT NULL, INDEX IDX_9CC600F14EA5C05B (beer_recipe_id), INDEX IDX_9CC600F1BC3870B6 (hop_id), PRIMARY KEY(beer_recipe_id, hop_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE beer_recipe ADD CONSTRAINT FK_12A78AED517FE9FE FOREIGN KEY (equipment_id) REFERENCES boiler_equipment (id)');
        $this->addSql('ALTER TABLE beer_recipe ADD CONSTRAINT FK_12A78AEDBACD6074 FOREIGN KEY (style_id) REFERENCES beer_style (id)');
        $this->addSql('ALTER TABLE beer_recipe ADD CONSTRAINT FK_12A78AEDF345B99 FOREIGN KEY (yeast_id) REFERENCES yeast (id)');
        $this->addSql('ALTER TABLE beer_recipe ADD CONSTRAINT FK_12A78AED6D457775 FOREIGN KEY (mash_id) REFERENCES mash (id)');
        $this->addSql('ALTER TABLE beer_recipe_user ADD CONSTRAINT FK_26D5C8554EA5C05B FOREIGN KEY (beer_recipe_id) REFERENCES beer_recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beer_recipe_user ADD CONSTRAINT FK_26D5C855A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beer_recipe_fermentable ADD CONSTRAINT FK_7E93AF154EA5C05B FOREIGN KEY (beer_recipe_id) REFERENCES beer_recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beer_recipe_fermentable ADD CONSTRAINT FK_7E93AF15CFFB7276 FOREIGN KEY (fermentable_id) REFERENCES fermentable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beer_recipe_hop ADD CONSTRAINT FK_9CC600F14EA5C05B FOREIGN KEY (beer_recipe_id) REFERENCES beer_recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beer_recipe_hop ADD CONSTRAINT FK_9CC600F1BC3870B6 FOREIGN KEY (hop_id) REFERENCES hop (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beer_recipe_user DROP FOREIGN KEY FK_26D5C8554EA5C05B');
        $this->addSql('ALTER TABLE beer_recipe_fermentable DROP FOREIGN KEY FK_7E93AF154EA5C05B');
        $this->addSql('ALTER TABLE beer_recipe_hop DROP FOREIGN KEY FK_9CC600F14EA5C05B');
        $this->addSql('DROP TABLE beer_recipe');
        $this->addSql('DROP TABLE beer_recipe_user');
        $this->addSql('DROP TABLE beer_recipe_fermentable');
        $this->addSql('DROP TABLE beer_recipe_hop');
        $this->addSql('DROP TABLE refresh_tokens');
    }
}
