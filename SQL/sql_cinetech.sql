-- MySQL Script generated by MySQL Workbench
-- Wed Mar 20 23:37:42 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cinetech
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cinetech` ;

-- -----------------------------------------------------
-- Schema cinetech
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cinetech` DEFAULT CHARACTER SET utf8mb4 ;
USE `cinetech` ;

-- -----------------------------------------------------
-- Table `cinetech`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cinetech`.`users` ;

CREATE TABLE IF NOT EXISTS `cinetech`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(100) NULL,
  `password` VARCHAR(255) NULL,
  `email` VARCHAR(155) NULL,
  `id_session_tmdb` VARCHAR(255) NULL,
  `firstname` VARCHAR(100) NULL,
  `lastname` VARCHAR(100) NULL,
  `birthday` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE  = InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `cinetech`.`favorites`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cinetech`.`favorites` ;

CREATE TABLE IF NOT EXISTS `cinetech`.`favorites` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `object-tmdb` JSON NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_favorites_users_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_favorites_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `cinetech`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE  = InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `cinetech`.`comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cinetech`.`comments` ;

CREATE TABLE IF NOT EXISTS `cinetech`.`comments` (
  `id` INT NOT NULL,
  `comments` TEXT(500) NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comments_users1_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `cinetech`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE  = InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
