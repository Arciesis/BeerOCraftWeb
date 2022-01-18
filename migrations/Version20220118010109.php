<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220118010109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boiler_equipment DROP FOREIGN KEY FK_99BF9AC17E3C61F9');
        $this->addSql('DROP INDEX IDX_99BF9AC17E3C61F9 ON boiler_equipment');
        $this->addSql('ALTER TABLE boiler_equipment CHANGE owner_id owner_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE boiler_equipment ADD CONSTRAINT FK_99BF9AC18FDDAB70 FOREIGN KEY (owner_id_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_99BF9AC18FDDAB70 ON boiler_equipment (owner_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boiler_equipment DROP FOREIGN KEY FK_99BF9AC18FDDAB70');
        $this->addSql('DROP INDEX IDX_99BF9AC18FDDAB70 ON boiler_equipment');
        $this->addSql('ALTER TABLE boiler_equipment CHANGE owner_id_id owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE boiler_equipment ADD CONSTRAINT FK_99BF9AC17E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_99BF9AC17E3C61F9 ON boiler_equipment (owner_id)');
    }
}
