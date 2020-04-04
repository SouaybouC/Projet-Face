<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200322200714 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD skin_type_relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495DE94933 FOREIGN KEY (skin_type_relation_id) REFERENCES skin_type (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6495DE94933 ON user (skin_type_relation_id)');
        $this->addSql('ALTER TABLE user_imperfection ADD category_imperfection_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_imperfection ADD CONSTRAINT FK_5E93F6ADD654BF45 FOREIGN KEY (category_imperfection_id) REFERENCES imperfection_type (id)');
        $this->addSql('CREATE INDEX IDX_5E93F6ADD654BF45 ON user_imperfection (category_imperfection_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495DE94933');
        $this->addSql('DROP INDEX IDX_8D93D6495DE94933 ON user');
        $this->addSql('ALTER TABLE user DROP skin_type_relation_id');
        $this->addSql('ALTER TABLE user_imperfection DROP FOREIGN KEY FK_5E93F6ADD654BF45');
        $this->addSql('DROP INDEX IDX_5E93F6ADD654BF45 ON user_imperfection');
        $this->addSql('ALTER TABLE user_imperfection DROP category_imperfection_id');
    }
}
