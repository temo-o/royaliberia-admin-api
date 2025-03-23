<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230821082754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Setup relationships and marriages. king_closure table might not be required.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE relationship_types (
                id INT AUTO_INCREMENT NOT NULL,
                title varchar(128) DEFAULT NULL,
                status_flag int(1) DEFAULT NULL,
                created_at DATETIME DEFAULT current_timestamp NOT NULL,
                PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE=InnoDB'
        );

        $this->addSql('CREATE TABLE relationships (
                id INT AUTO_INCREMENT NOT NULL,
                person1_id INT NOT NULL,
                person2_id INT NOT NULL,
                relationship_type_id INT NOT NULL,
                start_date DATE DEFAULT NULL,
                end_date DATE DEFAULT NULL,
                status_flag TINYINT DEFAULT 1 NOT NULL,
                created_at DATETIME DEFAULT current_timestamp NOT NULL,
                PRIMARY KEY(id)
                ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE=InnoDB'
        );

        $this->addSql('CREATE TABLE marriages (
                id INT AUTO_INCREMENT NOT NULL,
                person1_id INT NOT NULL,
                person2_id INT NOT NULL,
                marriage_date DATE DEFAULT NULL,
                end_date DATE DEFAULT NULL,
                location VARCHAR(255) DEFAULT NULL,
                officiant VARCHAR(255) DEFAULT NULL,
                reason_for_end VARCHAR(255) DEFAULT NULL,
                notes TEXT DEFAULT NULL,
                status_flag TINYINT DEFAULT 1 NOT NULL,
                created_at DATETIME DEFAULT current_timestamp NOT NULL,
                PRIMARY KEY(id)
                ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE=InnoDB'
        );

        $this->addSql('CREATE TABLE king_closure (
            id INT AUTO_INCREMENT NOT NULL,
            ancestor_id INT NOT NULL,
            descendant_id INT NOT NULL,
            depth INT NOT NULL,
            created_at DATETIME DEFAULT current_timestamp NOT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE=InnoDB');


        $this->addSql("
            INSERT INTO person_types (name, status_flag, created_at) 
            VALUES 
            ('Other', 1, current_timestamp),
            ('King', 1, current_timestamp),
            ('Queen', 1, current_timestamp),
            ('Prince', 1, current_timestamp),
            ('Princess', 1, current_timestamp)
        ");

        $this->addSql("
            INSERT INTO relationship_types (title, status_flag, created_at) 
            VALUES 
            ('Father', 1, current_timestamp),
            ('Mother', 1, current_timestamp),
            ('Brother', 1, current_timestamp),
            ('Sister', 1, current_timestamp),
            ('Child', 1, current_timestamp)
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE marriages');
        $this->addSql('DROP TABLE relationships');
        $this->addSql('DROP TABLE relationship_types');
        $this->addSql('DROP TABLE king_closure');
    }
}
