<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230727121217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create initial tables like person and countries';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('CREATE TABLE person_types (
                id INT AUTO_INCREMENT NOT NULL,
                name varchar(128) DEFAULT NULL,
                status_flag int(1) DEFAULT NULL,
                created_at DATETIME DEFAULT current_timestamp NOT NULL,
                updated_at DATETIME DEFAULT NULL,
                PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE=InnoDB'
        );

        $this->addSql('CREATE TABLE person (
                id INT AUTO_INCREMENT NOT NULL,
                person_type INT NOT NULL,
                first_name varchar(255) DEFAULT NULL,
                last_name varchar(255) DEFAULT NULL,
                additional_name varchar(255) DEFAULT NULL,
                pseudonym varchar(255) DEFAULT NULL,
                courtesy_title varchar(255) DEFAULT NULL,
                title varchar(255) DEFAULT NULL,
                date_of_birth varchar(16) DEFAULT NULL,
                created_at DATETIME DEFAULT current_timestamp NOT NULL,
                updated_at DATETIME DEFAULT NULL,
                PRIMARY KEY(id),
                CONSTRAINT fk_person_person_type FOREIGN KEY (person_type) REFERENCES person_types(id) ON UPDATE CASCADE ON DELETE RESTRICT
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE=InnoDB'
        );

        $this->addSql('INSERT INTO person_types (`name`, `status_flag`) VALUES("raw", 1)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE person_types');
    }
}
