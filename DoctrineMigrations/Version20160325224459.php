<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160325224459 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("INSERT IGNORE INTO `refueling` (`id`, `stationName`, `petrolType`, `price`, `volume`, `cost`, `date`, `run`) VALUES (32, 'OKKO', 'A-95 Euro', 20.99, 20, 399.8, '2016-03-16 17:34:13', 0);");
        // this up() migration is auto-generated, please modify it to your needs

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM `refueling` WHERE `id` = 32;");
        // this down() migration is auto-generated, please modify it to your needs

    }
}
