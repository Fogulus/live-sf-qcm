<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525130334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, question_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_5FB6DEC71E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC71E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE examen CHANGE date_examen date_examen DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE question DROP reponse1, DROP reponse2, DROP reponse3, DROP reponse4, DROP reponse5, DROP point, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC71E27F6BF');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('ALTER TABLE examen CHANGE date_examen date_examen DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE question ADD reponse1 VARCHAR(255) NOT NULL, ADD reponse2 VARCHAR(255) NOT NULL, ADD reponse3 VARCHAR(255) DEFAULT \'NULL\', ADD reponse4 VARCHAR(255) DEFAULT \'NULL\', ADD reponse5 VARCHAR(255) DEFAULT \'NULL\', ADD point INT NOT NULL, CHANGE image image VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
