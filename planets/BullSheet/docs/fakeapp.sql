SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


drop database fakeapp;
create database fakeapp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use fakeapp;


CREATE TABLE IF NOT EXISTS `fakeapp`.`channels` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `categories_id` INT(11) NOT NULL,
  `users_id` INT(11) NOT NULL,
  `the_name` VARCHAR(255) NOT NULL,
  `active` CHAR(1) NOT NULL,
  `the_type` CHAR(1) NOT NULL,
  `slogan` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `the_name_UNIQUE` (`the_name` ASC),
  INDEX `fk_channels_categories1_idx` (`categories_id` ASC),
  INDEX `fk_channels_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_channels_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `fakeapp`.`categories` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_channels_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fakeapp`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `pass` VARCHAR(255) NOT NULL,
  `rib` TEXT NOT NULL,
  `active` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`medias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `channels_id` INT(11) NULL DEFAULT NULL,
  `users_id` INT(11) NULL DEFAULT NULL,
  `programs_id` INT(11) NULL DEFAULT NULL,
  `clip_genres_id` INT(11) NULL DEFAULT NULL,
  `the_name` VARCHAR(255) NOT NULL,
  `the_type` CHAR(1) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `thumbnail` VARCHAR(255) NOT NULL,
  `description` VARCHAR(512) NOT NULL,
  `duration` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_medias_channels1_idx` (`channels_id` ASC),
  INDEX `fk_medias_clip_genres1_idx` (`clip_genres_id` ASC),
  INDEX `fk_medias_programs1_idx` (`programs_id` ASC),
  INDEX `fk_medias_users1_idx` (`users_id` ASC),
  UNIQUE INDEX `the_name_UNIQUE` (`the_name` ASC, `channels_id` ASC),
  CONSTRAINT `fk_medias_channels1`
    FOREIGN KEY (`channels_id`)
    REFERENCES `fakeapp`.`channels` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_medias_clip_genres1`
    FOREIGN KEY (`clip_genres_id`)
    REFERENCES `fakeapp`.`clip_genres` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_medias_programs1`
    FOREIGN KEY (`programs_id`)
    REFERENCES `fakeapp`.`programs` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_medias_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fakeapp`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`clip_genres` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `the_name` VARCHAR(255) NOT NULL,
  `color` VARCHAR(8) NOT NULL,
  `active` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `the_name_UNIQUE` (`the_name` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`tags` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `the_name` VARCHAR(255) NOT NULL,
  `the_type` CHAR(1) NOT NULL,
  `active` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `the_name_UNIQUE` (`the_name` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`medias_has_tags` (
  `medias_id` INT(11) NOT NULL,
  `tags_id` INT(11) NOT NULL,
  PRIMARY KEY (`medias_id`, `tags_id`),
  INDEX `fk_medias_has_tags_tags1_idx` (`tags_id` ASC),
  INDEX `fk_medias_has_tags_medias1_idx` (`medias_id` ASC),
  CONSTRAINT `fk_medias_has_tags_medias1`
    FOREIGN KEY (`medias_id`)
    REFERENCES `fakeapp`.`medias` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_medias_has_tags_tags1`
    FOREIGN KEY (`tags_id`)
    REFERENCES `fakeapp`.`tags` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`panels` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `channels_id` INT(11) NOT NULL,
  `the_name` VARCHAR(255) NOT NULL,
  `the_text` TEXT NOT NULL,
  `color` VARCHAR(32) NOT NULL,
  `bg_color` VARCHAR(32) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pannels_channels1_idx` (`channels_id` ASC),
  CONSTRAINT `fk_pannels_channels1`
    FOREIGN KEY (`channels_id`)
    REFERENCES `fakeapp`.`channels` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`the_events` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `channels_id` INT(11) NOT NULL,
  `medias_id` INT(11) NULL DEFAULT NULL,
  `playlists_id` INT(11) NULL DEFAULT NULL,
  `panels_id` INT(11) NULL DEFAULT NULL,
  `the_name` VARCHAR(255) NOT NULL,
  `thumbnail` VARCHAR(255) NOT NULL,
  `the_type` CHAR(1) NOT NULL,
  `is_overwritable` CHAR(1) NOT NULL,
  `recurring_id` INT(11) NOT NULL,
  `active` CHAR(1) NOT NULL,
  `start_date` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_the_events_channels1_idx` (`channels_id` ASC),
  INDEX `fk_the_events_medias1_idx` (`medias_id` ASC),
  INDEX `fk_the_events_playlists1_idx` (`playlists_id` ASC),
  INDEX `fk_the_events_pannels1_idx` (`panels_id` ASC),
  UNIQUE INDEX `channels_id_UNIQUE` (`channels_id` ASC, `start_date` ASC),
  CONSTRAINT `fk_the_events_channels1`
    FOREIGN KEY (`channels_id`)
    REFERENCES `fakeapp`.`channels` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_the_events_medias1`
    FOREIGN KEY (`medias_id`)
    REFERENCES `fakeapp`.`medias` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_the_events_playlists1`
    FOREIGN KEY (`playlists_id`)
    REFERENCES `fakeapp`.`playlists` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_the_events_pannels1`
    FOREIGN KEY (`panels_id`)
    REFERENCES `fakeapp`.`panels` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`playlists` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `channels_id` INT(11) NOT NULL,
  `the_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_playlists_channels1_idx` (`channels_id` ASC),
  UNIQUE INDEX `the_name_UNIQUE` (`the_name` ASC),
  CONSTRAINT `fk_playlists_channels1`
    FOREIGN KEY (`channels_id`)
    REFERENCES `fakeapp`.`channels` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`playlists_has_medias` (
  `playlists_id` INT(11) NOT NULL,
  `medias_id` INT(11) NOT NULL,
  `the_order` INT(11) NOT NULL,
  PRIMARY KEY (`playlists_id`, `medias_id`),
  INDEX `fk_playlists_has_medias_medias1_idx` (`medias_id` ASC),
  INDEX `fk_playlists_has_medias_playlists1_idx` (`playlists_id` ASC),
  CONSTRAINT `fk_playlists_has_medias_playlists1`
    FOREIGN KEY (`playlists_id`)
    REFERENCES `fakeapp`.`playlists` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_playlists_has_medias_medias1`
    FOREIGN KEY (`medias_id`)
    REFERENCES `fakeapp`.`medias` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`shared_events` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `channels_id` INT(11) NOT NULL,
  `start_date` DATETIME NOT NULL,
  `end_date` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_shared_events_channels1_idx` (`channels_id` ASC),
  CONSTRAINT `fk_shared_events_channels1`
    FOREIGN KEY (`channels_id`)
    REFERENCES `fakeapp`.`channels` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`users_own_shared_events` (
  `users_id` INT(11) NOT NULL,
  `shared_events_id` INT(11) NOT NULL,
  PRIMARY KEY (`users_id`, `shared_events_id`),
  INDEX `fk_users_has_shared_events_shared_events1_idx` (`shared_events_id` ASC),
  INDEX `fk_users_has_shared_events_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_shared_events_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fakeapp`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_shared_events_shared_events1`
    FOREIGN KEY (`shared_events_id`)
    REFERENCES `fakeapp`.`shared_events` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`programs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `channels_id` INT(11) NOT NULL,
  `the_name` VARCHAR(255) NOT NULL,
  `color` VARCHAR(8) NOT NULL,
  `thumbnail` VARCHAR(255) NOT NULL,
  `short_description` VARCHAR(255) NOT NULL,
  `long_description` VARCHAR(512) NOT NULL,
  `extra_text` VARCHAR(255) NOT NULL,
  `lang` CHAR(3) NOT NULL,
  `publication_year` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_programs_channels1_idx` (`channels_id` ASC),
  UNIQUE INDEX `the_name_UNIQUE` (`the_name` ASC, `channels_id` ASC),
  CONSTRAINT `fk_programs_channels1`
    FOREIGN KEY (`channels_id`)
    REFERENCES `fakeapp`.`channels` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `the_name` VARCHAR(255) NOT NULL,
  `active` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `the_name_UNIQUE` (`the_name` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`channels_has_tags` (
  `channels_id` INT(11) NOT NULL,
  `tags_id` INT(11) NOT NULL,
  PRIMARY KEY (`channels_id`, `tags_id`),
  INDEX `fk_channels_has_tags_tags1_idx` (`tags_id` ASC),
  INDEX `fk_channels_has_tags_channels1_idx` (`channels_id` ASC),
  CONSTRAINT `fk_channels_has_tags_channels1`
    FOREIGN KEY (`channels_id`)
    REFERENCES `fakeapp`.`channels` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_channels_has_tags_tags1`
    FOREIGN KEY (`tags_id`)
    REFERENCES `fakeapp`.`tags` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`owner_config` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `the_key` VARCHAR(255) NOT NULL,
  `the_value` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `the_key_UNIQUE` (`the_key` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`channels_options` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `the_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`channels_has_channels_options` (
  `channels_id` INT(11) NOT NULL,
  `channels_options_id` INT(11) NOT NULL,
  `the_value` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`channels_id`, `channels_options_id`),
  INDEX `fk_channels_has_channels_options_channels_options1_idx` (`channels_options_id` ASC),
  INDEX `fk_channels_has_channels_options_channels1_idx` (`channels_id` ASC),
  CONSTRAINT `fk_channels_has_channels_options_channels1`
    FOREIGN KEY (`channels_id`)
    REFERENCES `fakeapp`.`channels` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_channels_has_channels_options_channels_options1`
    FOREIGN KEY (`channels_options_id`)
    REFERENCES `fakeapp`.`channels_options` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`programs_has_tags` (
  `programs_id` INT(11) NOT NULL,
  `tags_id` INT(11) NOT NULL,
  PRIMARY KEY (`programs_id`, `tags_id`),
  INDEX `fk_programs_has_tags_tags1_idx` (`tags_id` ASC),
  INDEX `fk_programs_has_tags_programs1_idx` (`programs_id` ASC),
  CONSTRAINT `fk_programs_has_tags_programs1`
    FOREIGN KEY (`programs_id`)
    REFERENCES `fakeapp`.`programs` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_programs_has_tags_tags1`
    FOREIGN KEY (`tags_id`)
    REFERENCES `fakeapp`.`tags` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`programs_aux_images` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `programs_id` INT(11) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_programs_images_programs1_idx` (`programs_id` ASC),
  CONSTRAINT `fk_programs_images_programs1`
    FOREIGN KEY (`programs_id`)
    REFERENCES `fakeapp`.`programs` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`users_rate_programs` (
  `users_id` INT(11) NOT NULL,
  `programs_id` INT(11) NOT NULL,
  `rating` TINYINT(1) NOT NULL,
  `the_comment` VARCHAR(512) NOT NULL,
  `active` CHAR(1) NOT NULL,
  PRIMARY KEY (`users_id`, `programs_id`),
  INDEX `fk_users_has_programs_programs1_idx` (`programs_id` ASC),
  INDEX `fk_users_has_programs_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_programs_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fakeapp`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_programs_programs1`
    FOREIGN KEY (`programs_id`)
    REFERENCES `fakeapp`.`programs` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `fakeapp`.`programs_teasers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `programs_id` INT(11) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_programs_teasers_programs1_idx` (`programs_id` ASC),
  CONSTRAINT `fk_programs_teasers_programs1`
    FOREIGN KEY (`programs_id`)
    REFERENCES `fakeapp`.`programs` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
