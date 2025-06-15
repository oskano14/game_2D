<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250615091722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE characters DROP FOREIGN KEY characters_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE characters CHANGE user_id user_id INT DEFAULT NULL, CHANGE position_x position_x DOUBLE PRECISION DEFAULT NULL, CHANGE position_y position_y DOUBLE PRECISION DEFAULT NULL, CHANGE defeated_boss defeated_boss TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE characters ADD CONSTRAINT FK_3A29410EA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE progress DROP FOREIGN KEY progress_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE progress CHANGE character_id character_id INT DEFAULT NULL, CHANGE completed completed TINYINT(1) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE progress ADD CONSTRAINT FK_2201F2461136BE75 FOREIGN KEY (character_id) REFERENCES characters (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE characters DROP FOREIGN KEY FK_3A29410EA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE characters CHANGE user_id user_id INT NOT NULL, CHANGE position_x position_x DOUBLE PRECISION DEFAULT '0', CHANGE position_y position_y DOUBLE PRECISION DEFAULT '0', CHANGE defeated_boss defeated_boss TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE characters ADD CONSTRAINT characters_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE progress DROP FOREIGN KEY FK_2201F2461136BE75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE progress CHANGE character_id character_id INT NOT NULL, CHANGE completed completed TINYINT(1) DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE progress ADD CONSTRAINT progress_ibfk_1 FOREIGN KEY (character_id) REFERENCES characters (id) ON DELETE CASCADE
        SQL);
    }
}
