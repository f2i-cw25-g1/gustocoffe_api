<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611133540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, date_commande DATETIME NOT NULL, adresse_facturation VARCHAR(255) NOT NULL, code_postal_facturation INT NOT NULL, pays_facturation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_place ADD facture_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_place ADD CONSTRAINT FK_3762836A7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('CREATE INDEX IDX_3762836A7F2DEE08 ON reservation_place (facture_id)');
        $this->addSql('ALTER TABLE reservation_salon ADD facture_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_salon ADD CONSTRAINT FK_B11724B07F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('CREATE INDEX IDX_B11724B07F2DEE08 ON reservation_salon (facture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_place DROP FOREIGN KEY FK_3762836A7F2DEE08');
        $this->addSql('ALTER TABLE reservation_salon DROP FOREIGN KEY FK_B11724B07F2DEE08');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP INDEX IDX_3762836A7F2DEE08 ON reservation_place');
        $this->addSql('ALTER TABLE reservation_place DROP facture_id');
        $this->addSql('DROP INDEX IDX_B11724B07F2DEE08 ON reservation_salon');
        $this->addSql('ALTER TABLE reservation_salon DROP facture_id');
    }
}
