<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240324111240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE p06_collectionneur_p06_piece_modele (p06_collectionneur_id INT NOT NULL, p06_piece_modele_id INT NOT NULL, INDEX IDX_1F37D29FEC990910 (p06_collectionneur_id), INDEX IDX_1F37D29F421006CB (p06_piece_modele_id), PRIMARY KEY(p06_collectionneur_id, p06_piece_modele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE p06_collectionneur_p06_piece_modele ADD CONSTRAINT FK_1F37D29FEC990910 FOREIGN KEY (p06_collectionneur_id) REFERENCES p06_collectionneur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE p06_collectionneur_p06_piece_modele ADD CONSTRAINT FK_1F37D29F421006CB FOREIGN KEY (p06_piece_modele_id) REFERENCES p06_piece_modele (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE p06_collectionneur_p06_piece_modele DROP FOREIGN KEY FK_1F37D29FEC990910');
        $this->addSql('ALTER TABLE p06_collectionneur_p06_piece_modele DROP FOREIGN KEY FK_1F37D29F421006CB');
        $this->addSql('DROP TABLE p06_collectionneur_p06_piece_modele');
    }
}
