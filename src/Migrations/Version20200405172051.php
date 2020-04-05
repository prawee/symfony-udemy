<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200405172051 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, relation_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D34A04AD3256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD3256915B FOREIGN KEY (relation_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE user ADD todo VARCHAR(255) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE todo DROP FOREIGN KEY FK_5A0EB6A0A76ED395');
        $this->addSql('DROP INDEX UNIQ_5A0EB6A0A76ED395 ON todo');
        $this->addSql('ALTER TABLE todo ADD user VARCHAR(255) DEFAULT \'0\' NOT NULL, DROP user_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD3256915B');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE product');
        $this->addSql('ALTER TABLE todo ADD user_id INT NOT NULL, DROP user');
        $this->addSql('ALTER TABLE todo ADD CONSTRAINT FK_5A0EB6A0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A0EB6A0A76ED395 ON todo (user_id)');
        $this->addSql('ALTER TABLE user DROP todo');
    }
}
