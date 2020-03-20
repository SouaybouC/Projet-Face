<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200320054619 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, imper_type_relation_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_D34A04ADC072D5E8 (imper_type_relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_skin_type (product_id INT NOT NULL, skin_type_id INT NOT NULL, INDEX IDX_F70F56ED4584665A (product_id), INDEX IDX_F70F56ED3681431C (skin_type_id), PRIMARY KEY(product_id, skin_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC072D5E8 FOREIGN KEY (imper_type_relation_id) REFERENCES imperfection_type (id)');
        $this->addSql('ALTER TABLE product_skin_type ADD CONSTRAINT FK_F70F56ED4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_skin_type ADD CONSTRAINT FK_F70F56ED3681431C FOREIGN KEY (skin_type_id) REFERENCES skin_type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_skin_type DROP FOREIGN KEY FK_F70F56ED4584665A');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_skin_type');
    }
}
