<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191021182113 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, partner_at DATETIME DEFAULT NULL, contact VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(255) DEFAULT NULL, model VARCHAR(255) NOT NULL, stockage INT NOT NULL, os VARCHAR(255) NOT NULL, resolution VARCHAR(255) DEFAULT NULL, reseau VARCHAR(255) DEFAULT NULL, batterie VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_couleur (produit_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_FAF60C9CF347EFB (produit_id), INDEX IDX_FAF60C9CC31BA576 (couleur_id), price FLOAT NOT NULL, PRIMARY KEY(produit_id, couleur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, prenom VARCHAR(255) DEFAULT NULL, patronyme VARCHAR(255) DEFAULT NULL, pseudo VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, INDEX IDX_1D1C63B319EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit_couleur ADD CONSTRAINT FK_FAF60C9CF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_couleur ADD CONSTRAINT FK_FAF60C9CC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B319EB6921');
        $this->addSql('ALTER TABLE produit_couleur DROP FOREIGN KEY FK_FAF60C9CC31BA576');
        $this->addSql('ALTER TABLE produit_couleur DROP FOREIGN KEY FK_FAF60C9CF347EFB');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_couleur');
        $this->addSql('DROP TABLE utilisateur');
    }
}
