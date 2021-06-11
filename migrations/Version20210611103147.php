<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611103147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_grande_salle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, image LONGTEXT NOT NULL, INDEX IDX_29A5EC27BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_place (id INT AUTO_INCREMENT NOT NULL, place_grande_salle_id INT NOT NULL, date_reservation DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_3762836AE622D39B (place_grande_salle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_salon (id INT AUTO_INCREMENT NOT NULL, salon_id INT NOT NULL, date_reservation DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_B11724B04C91BDE4 (salon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE reservation_place ADD CONSTRAINT FK_3762836AE622D39B FOREIGN KEY (place_grande_salle_id) REFERENCES place_grande_salle (id)');
        $this->addSql('ALTER TABLE reservation_salon ADD CONSTRAINT FK_B11724B04C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE reservation_place DROP FOREIGN KEY FK_3762836AE622D39B');
        $this->addSql('ALTER TABLE reservation_salon DROP FOREIGN KEY FK_B11724B04C91BDE4');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE place_grande_salle');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE reservation_place');
        $this->addSql('DROP TABLE reservation_salon');
        $this->addSql('DROP TABLE salon');
    }
}
