<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215200754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adding new columns to person table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE person ADD image_sequence_count INT NOT NULL DEFAULT 0');
        $this->addSql('ALTER TABLE person ADD date_of_death VARCHAR(32) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE person ADD position_start_year INT DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD position_end_year INT DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD position_exact_start_date VARCHAR(32) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE person ADD position_exact_end_date VARCHAR(32) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE person DROP COLUMN image_sequence_count');
        $this->addSql('ALTER TABLE person DROP COLUMN date_of_death');
        $this->addSql('ALTER TABLE person DROP COLUMN position_start_year');
        $this->addSql('ALTER TABLE person DROP COLUMN position_end_year');
        $this->addSql('ALTER TABLE person DROP COLUMN position_exact_start_date');
        $this->addSql('ALTER TABLE person DROP COLUMN position_exact_end_date');
    }

}
