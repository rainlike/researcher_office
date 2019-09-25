<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190925103558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE diploma (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, author VARCHAR(255) NOT NULL, date DATETIME NOT NULL, file VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, co_authors_simple LONGTEXT DEFAULT NULL, place LONGTEXT DEFAULT NULL, date DATETIME NOT NULL, pages VARCHAR(255) DEFAULT NULL, notes LONGTEXT DEFAULT NULL, file VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication_user (publication_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_866B578438B217A7 (publication_id), INDEX IDX_866B5784A76ED395 (user_id), PRIMARY KEY(publication_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE publication_user ADD CONSTRAINT FK_866B578438B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication_user ADD CONSTRAINT FK_866B5784A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE publication_user DROP FOREIGN KEY FK_866B578438B217A7');
        $this->addSql('DROP TABLE diploma');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE publication_user');
    }
}
