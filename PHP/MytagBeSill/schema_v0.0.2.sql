-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tagBeSill
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tagBeSill
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tagBeSill` DEFAULT CHARACTER SET utf8 ;
USE `tagBeSill` ;

-- -----------------------------------------------------
-- Table `tagBeSill`.`Projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tagBeSill`.`Projects` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `creation_date` TIMESTAMP NOT NULL DEFAULT now(),
  `last_modified` TIMESTAMP NULL,
  `publishing_date` TIMESTAMP NULL,
  `img` VARCHAR(255) NULL,
  `title` VARCHAR(200) NOT NULL,
  `description` BLOB NOT NULL,
  `progress` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tagBeSill`.`Categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tagBeSill`.`Categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` BLOB NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tagBeSill`.`Status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tagBeSill`.`Status` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NOT NULL,
  `projectsId` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `projectsId`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_Status_Projects1_idx` (`projectsId` ASC) ,
  CONSTRAINT `fk_Status_Projects1`
    FOREIGN KEY (`projectsId`)
    REFERENCES `tagBeSill`.`Projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tagBeSill`.`Categories_has_Projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tagBeSill`.`Categories_has_Projects` (
  `categoriesId` INT UNSIGNED NOT NULL,
  `projectsId` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`categoriesId`, `projectsId`),
  INDEX `fk_Categories_has_Projects_Projects1_idx` (`projectsId` ASC) ,
  INDEX `fk_Categories_has_Projects_Categories_idx` (`categoriesId` ASC) ,
  CONSTRAINT `fk_Categories_has_Projects_Categories`
    FOREIGN KEY (`categoriesId`)
    REFERENCES `tagBeSill`.`Categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categories_has_Projects_Projects1`
    FOREIGN KEY (`projectsId`)
    REFERENCES `tagBeSill`.`Projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;