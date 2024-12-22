<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222200816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employee_workplace (employee_id INT NOT NULL, workplace_id INT NOT NULL, INDEX IDX_D56BFAAC8C03F15C (employee_id), INDEX IDX_D56BFAACAC25FB46 (workplace_id), PRIMARY KEY(employee_id, workplace_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employee_workplace ADD CONSTRAINT FK_D56BFAAC8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employee_workplace ADD CONSTRAINT FK_D56BFAACAC25FB46 FOREIGN KEY (workplace_id) REFERENCES workplace (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee_workplace DROP FOREIGN KEY FK_D56BFAAC8C03F15C');
        $this->addSql('ALTER TABLE employee_workplace DROP FOREIGN KEY FK_D56BFAACAC25FB46');
        $this->addSql('DROP TABLE employee_workplace');
    }
}
