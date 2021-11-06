<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210825203308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie_list (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_B7AED915A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_list_user_movie (movie_list_id INT NOT NULL, user_movie_id INT NOT NULL, INDEX IDX_1027B3851D3854A5 (movie_list_id), INDEX IDX_1027B3856F1E52FC (user_movie_id), PRIMARY KEY(movie_list_id, user_movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_movie (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie_list ADD CONSTRAINT FK_B7AED915A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE movie_list_user_movie ADD CONSTRAINT FK_1027B3851D3854A5 FOREIGN KEY (movie_list_id) REFERENCES movie_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_list_user_movie ADD CONSTRAINT FK_1027B3856F1E52FC FOREIGN KEY (user_movie_id) REFERENCES user_movie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_list_user_movie DROP FOREIGN KEY FK_1027B3851D3854A5');
        $this->addSql('ALTER TABLE movie_list_user_movie DROP FOREIGN KEY FK_1027B3856F1E52FC');
        $this->addSql('DROP TABLE movie_list');
        $this->addSql('DROP TABLE movie_list_user_movie');
        $this->addSql('DROP TABLE user_movie');
    }
}
