<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210602170204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE zgru ADD usr_id INT NOT NULL, ADD grp_id INT NOT NULL');
        $this->addSql('ALTER TABLE zgru ADD CONSTRAINT FK_5538DC86C69D3FB FOREIGN KEY (usr_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE zgru ADD CONSTRAINT FK_5538DC86D51E9150 FOREIGN KEY (grp_id) REFERENCES zgrp (id)');
        $this->addSql('CREATE INDEX IDX_5538DC86C69D3FB ON zgru (usr_id)');
        $this->addSql('CREATE INDEX IDX_5538DC86D51E9150 ON zgru (grp_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE zgru DROP FOREIGN KEY FK_5538DC86C69D3FB');
        $this->addSql('ALTER TABLE zgru DROP FOREIGN KEY FK_5538DC86D51E9150');
        $this->addSql('DROP INDEX IDX_5538DC86C69D3FB ON zgru');
        $this->addSql('DROP INDEX IDX_5538DC86D51E9150 ON zgru');
        $this->addSql('ALTER TABLE zgru DROP usr_id, DROP grp_id');
    }
}
