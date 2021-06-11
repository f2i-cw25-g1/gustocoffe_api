<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611132345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_place ADD option_bureautique TINYINT(1) NOT NULL, ADD option_restauration TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE reservation_salon ADD option_bureautique TINYINT(1) NOT NULL, ADD option_restauration TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_place DROP option_bureautique, DROP option_restauration');
        $this->addSql('ALTER TABLE reservation_salon DROP option_bureautique, DROP option_restauration');
    }
}
