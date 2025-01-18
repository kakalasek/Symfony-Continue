<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250118131021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pobocka MODIFY id_pobocka INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON pobocka');
        $this->addSql('ALTER TABLE pobocka CHANGE id_pobocka id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE pobocka ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE zamestnanec ADD CONSTRAINT FK_1ADB89F83318FBD FOREIGN KEY (pobocka_id) REFERENCES pobocka (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pobocka MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON pobocka');
        $this->addSql('ALTER TABLE pobocka CHANGE id id_pobocka INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE pobocka ADD PRIMARY KEY (id_pobocka)');
        $this->addSql('ALTER TABLE zamestnanec DROP FOREIGN KEY FK_1ADB89F83318FBD');
    }
}
