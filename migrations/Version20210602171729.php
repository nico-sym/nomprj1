<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210602171729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE zper ADD ite_id INT DEFAULT NULL, ADD act_id INT NOT NULL, ADD grp_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zper ADD CONSTRAINT FK_D7B67846793A22D FOREIGN KEY (ite_id) REFERENCES zite (id)');
        $this->addSql('ALTER TABLE zper ADD CONSTRAINT FK_D7B67846D1A55B28 FOREIGN KEY (act_id) REFERENCES zact (id)');
        $this->addSql('ALTER TABLE zper ADD CONSTRAINT FK_D7B67846D51E9150 FOREIGN KEY (grp_id) REFERENCES zgrp (id)');
        $this->addSql('CREATE INDEX IDX_D7B67846793A22D ON zper (ite_id)');
        $this->addSql('CREATE INDEX IDX_D7B67846D1A55B28 ON zper (act_id)');
        $this->addSql('CREATE INDEX IDX_D7B67846D51E9150 ON zper (grp_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE zper DROP FOREIGN KEY FK_D7B67846793A22D');
        $this->addSql('ALTER TABLE zper DROP FOREIGN KEY FK_D7B67846D1A55B28');
        $this->addSql('ALTER TABLE zper DROP FOREIGN KEY FK_D7B67846D51E9150');
        $this->addSql('DROP INDEX IDX_D7B67846793A22D ON zper');
        $this->addSql('DROP INDEX IDX_D7B67846D1A55B28 ON zper');
        $this->addSql('DROP INDEX IDX_D7B67846D51E9150 ON zper');
        $this->addSql('ALTER TABLE zper DROP ite_id, DROP act_id, DROP grp_id');
    }
}
