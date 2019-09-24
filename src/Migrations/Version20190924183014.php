<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190924183014 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, second_name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, email VARCHAR(255) NOT NULL, patronymic VARCHAR(255) DEFAULT NULL, birth_place VARCHAR(255) DEFAULT NULL, education VARCHAR(255) DEFAULT NULL, degree VARCHAR(255) DEFAULT NULL, biography LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_scientific_interest (user_id INT NOT NULL, scientific_interest_id INT NOT NULL, INDEX IDX_D06C3303A76ED395 (user_id), INDEX IDX_D06C330363156B8C (scientific_interest_id), PRIMARY KEY(user_id, scientific_interest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scientific_interest (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, name_canonical VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_scientific_interest ADD CONSTRAINT FK_D06C3303A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_scientific_interest ADD CONSTRAINT FK_D06C330363156B8C FOREIGN KEY (scientific_interest_id) REFERENCES scientific_interest (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_scientific_interest DROP FOREIGN KEY FK_D06C3303A76ED395');
        $this->addSql('ALTER TABLE user_scientific_interest DROP FOREIGN KEY FK_D06C330363156B8C');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_scientific_interest');
        $this->addSql('DROP TABLE scientific_interest');
    }
}
