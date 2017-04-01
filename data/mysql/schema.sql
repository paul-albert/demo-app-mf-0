/* Drop and create whole database */

DROP DATABASE IF EXISTS `demo-app-mf-0`;
CREATE DATABASE IF NOT EXISTS `demo-app-mf-0`;


/* Go to created database */

USE `demo-app-mf-0`;


/* Drop and create tables for the database */

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Name',
    `first_name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Vorname',
    `last_name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Nachname',
    `city` VARCHAR(64) NOT NULL DEFAULT '' COMMENT 'Ort',
    `zipcode` VARCHAR(32) NOT NULL DEFAULT '' COMMENT 'PLZ',
    `street` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Strasse',
    `additional_address_data` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Addresszusatz',
    `phone` VARCHAR(64) NOT NULL DEFAULT '' COMMENT 'Tel',
    `mobphone` VARCHAR(64) NOT NULL DEFAULT '' COMMENT 'Handy',
    `fax` VARCHAR(64) NOT NULL DEFAULT '' COMMENT 'Fax',
    `email` VARCHAR(128) NOT NULL DEFAULT '' COMMENT 'email',
    `account_type_1` VARCHAR(64) NOT NULL DEFAULT '' COMMENT 'Bezeichung Konto 1: Privatkonto, Konto Oma',
    `owner_1` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Inhaber',
    `account_number_1` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Konto',
    `banking_code_1` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'BLZ',
    `account_type_2` VARCHAR(64) NOT NULL DEFAULT '' COMMENT 'Bezeichung Konto 2: Privatkonto, Konto Oma',
    `owner_2` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Inhaber',
    `account_number_2` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Konto',
    `banking_code_2` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'BLZ',
    `open_stall` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Openstall',
    `stall` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Stall',
    `coupler` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Koppel',
    `additional_info` TEXT NOT NULL COMMENT 'Sonstige Anmerkungen zum Kudnen',
    `vet` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Tierarzt / Vet doctor name',
    `smith` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Hufschmied',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Client table';

DROP TABLE IF EXISTS `horse`;
CREATE TABLE IF NOT EXISTS `horse` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `client_id` INT(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Kunden Kennung',
    `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Name des Pferdes',
    `online_number` VARCHAR(64) NOT NULL DEFAULT '' COMMENT 'Lebensnummer', 
    `birth_date` DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Geburtstag',
    `sex` ENUM('m', 'f') NOT NULL DEFAULT 'm' COMMENT 'Geschlecht',
    `color` VARCHAR(32) NOT NULL DEFAULT '' COMMENT 'Farbe',
    `arrival_date` DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Zugang',
    `departure_date` DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Abgang',
    `active` TINYINT(1) NOT NULL DEFAULT 1 COMMENT 'Aktiv',
    PRIMARY KEY (`id`),
    KEY (`client_id`),
    FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Horses table';

DROP TABLE IF EXISTS `horse_medication_history`;
CREATE TABLE IF NOT EXISTS `horse_medication_history` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `horse_id` INT(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Pferde Kennung',
    `medicament` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Medikament',
    `date` DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Datum',
    `note` TEXT NOT NULL COMMENT 'Bemerkung',
    PRIMARY KEY (`id`),
    KEY (`horse_id`),
    FOREIGN KEY (`horse_id`) REFERENCES `horse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Horse medication histories table';

DROP TABLE IF EXISTS `horse_place`;
CREATE TABLE IF NOT EXISTS `horse_place` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `horse_id` INT(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Pferde Kennung',
    `box_name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Box',
    `box_number` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Box Nummer',
    `price` DECIMAL(8,2) NOT NULL DEFAULT 0.00 COMMENT 'Preis (in Euro)',
    `account_type` VARCHAR(64) NOT NULL DEFAULT '' COMMENT 'Konto: Privatkonto, Konto Oma',
    `contract_number` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Vertragsnummer',
    PRIMARY KEY (`id`),
    UNIQUE KEY (`box_number`),
    KEY (`horse_id`),
    FOREIGN KEY (`horse_id`) REFERENCES `horse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Horse places table';

DROP TABLE IF EXISTS `horse_service`;
CREATE TABLE IF NOT EXISTS `horse_service` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `horse_id` INT(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Pferde Kennung',
    `active` TINYINT(1) NOT NULL DEFAULT 1 COMMENT 'Aktiv',
    `service_name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Dientleistung',
    `performed_by` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Bereiter',
    `start_date` DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Von',
    `end_date` DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Bis',
    `price` DECIMAL(8,2) NOT NULL DEFAULT 0.00 COMMENT 'Preis (in Euro)',
    `account_type` VARCHAR(64) NOT NULL DEFAULT '' COMMENT 'Konto: Privatkonto, Konto Oma',
    `contract_number` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'Vertragsnummer',
    PRIMARY KEY (`id`),
    KEY (`horse_id`),
    FOREIGN KEY (`horse_id`) REFERENCES `horse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Horse services table';
