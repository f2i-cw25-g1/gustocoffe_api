<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611084937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_place ADD place_grande_salle_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_place ADD CONSTRAINT FK_3762836AE622D39B FOREIGN KEY (place_grande_salle_id) REFERENCES place_grande_salle (id)');
        $this->addSql('CREATE INDEX IDX_3762836AE622D39B ON reservation_place (place_grande_salle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_place DROP FOREIGN KEY FK_3762836AE622D39B');
        $this->addSql('DROP INDEX IDX_3762836AE622D39B ON reservation_place');
        $this->addSql('ALTER TABLE reservation_place DROP place_grande_salle_id');
    }
}
