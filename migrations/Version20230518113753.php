<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230518113753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE examen CHANGE date_examen date_examen DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE question CHANGE reponse3 reponse3 VARCHAR(255) DEFAULT NULL, CHANGE reponse4 reponse4 VARCHAR(255) DEFAULT NULL, CHANGE reponse5 reponse5 VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE questionnaire DROP FOREIGN KEY FK_7A64DAFF46CD258');
        $this->addSql('DROP INDEX IDX_7A64DAFF46CD258 ON questionnaire');
        $this->addSql('ALTER TABLE questionnaire ADD matiere VARCHAR(255) NOT NULL, DROP matiere_id');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE examen CHANGE date_examen date_examen DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE question CHANGE reponse3 reponse3 VARCHAR(255) DEFAULT \'NULL\', CHANGE reponse4 reponse4 VARCHAR(255) DEFAULT \'NULL\', CHANGE reponse5 reponse5 VARCHAR(255) DEFAULT \'NULL\', CHANGE image image VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE questionnaire ADD matiere_id INT DEFAULT NULL, DROP matiere');
        $this->addSql('ALTER TABLE questionnaire ADD CONSTRAINT FK_7A64DAFF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_7A64DAFF46CD258 ON questionnaire (matiere_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
