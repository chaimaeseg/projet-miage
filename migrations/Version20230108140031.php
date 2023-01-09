<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230108140031 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, localisation VARCHAR(255) NOT NULL, surface DOUBLE PRECISION NOT NULL, prix DOUBLE PRECISION NOT NULL, is_favorite TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bien_categories (bien_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_FF60565BBD95B80F (bien_id), INDEX IDX_FF60565BA21214B7 (categories_id), PRIMARY KEY(bien_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bien_categories ADD CONSTRAINT FK_FF60565BBD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bien_categories ADD CONSTRAINT FK_FF60565BA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bien_categories DROP FOREIGN KEY FK_FF60565BBD95B80F');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE bien_categories');
    }
}
