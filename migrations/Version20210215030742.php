<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210215030742 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE airlines (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE airports (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, city_code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, country_code VARCHAR(255) NOT NULL, region_code VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longtitude DOUBLE PRECISION NOT NULL, timezone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flights (id INT AUTO_INCREMENT NOT NULL, airline VARCHAR(255) NOT NULL, number INT NOT NULL, departure_airport VARCHAR(255) NOT NULL, departure_time DATETIME NOT NULL, arrival_airport VARCHAR(255) NOT NULL, arrival_time DATETIME NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE airlines');
        $this->addSql('DROP TABLE airports');
        $this->addSql('DROP TABLE flights');
    }
}
