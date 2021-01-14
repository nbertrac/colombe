-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema greta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema greta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `greta` DEFAULT CHARACTER SET utf8mb4 ;
USE `greta` ;

-- -----------------------------------------------------
-- Table `greta`.`Enseignants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greta`.`Enseignants` (
  `code_p` SMALLINT NOT NULL,
  `nom_p` VARCHAR(45) NOT NULL,
  `grade` TINYINT NULL,
  `embauche` DATE NULL,
  PRIMARY KEY (`code_p`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greta`.`Matieres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greta`.`Matieres` (
  `code_m` SMALLINT NOT NULL,
  `nom_m` VARCHAR(5) NOT NULL,
  `coeff` TINYINT NULL,
  `code_p` SMALLINT NOT NULL,
  PRIMARY KEY (`code_m`),
  INDEX `fk_Matieres_Enseignants_idx` (`code_p` ASC) VISIBLE,
  CONSTRAINT `fk_Matieres_Enseignants`
    FOREIGN KEY (`code_p`)
    REFERENCES `greta`.`Enseignants` (`code_p`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greta`.`Etudiants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greta`.`Etudiants` (
  `code_e` INT NOT NULL,
  `nom_e` VARCHAR(45) NOT NULL,
  `ddn` DATE NULL,
  `sexe` CHAR(1) NULL,
  PRIMARY KEY (`code_e`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greta`.`Etudie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greta`.`Etudie` (
  `code_e` INT NOT NULL,
  `code_m` SMALLINT NOT NULL,
  PRIMARY KEY (`code_e`, `code_m`),
  INDEX `fk_Etudiants_has_Matieres_Matieres1_idx` (`code_m` ASC) VISIBLE,
  INDEX `fk_Etudiants_has_Matieres_Etudiants1_idx` (`code_e` ASC) VISIBLE,
  CONSTRAINT `fk_Etudiants_has_Matieres_Etudiants1`
    FOREIGN KEY (`code_e`)
    REFERENCES `greta`.`Etudiants` (`code_e`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Etudiants_has_Matieres_Matieres1`
    FOREIGN KEY (`code_m`)
    REFERENCES `greta`.`Matieres` (`code_m`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
