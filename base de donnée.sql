-- MySQL Script generated by MySQL Workbench
-- Wed Oct 25 08:49:18 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rallye_video
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rallye_video
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rallye_video` DEFAULT CHARACTER SET utf8 ;
USE `rallye_video` ;

-- -----------------------------------------------------
-- Table `rallye_video`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rallye_video`.`role` (
  `idrole` INT NOT NULL AUTO_INCREMENT,
  `nom_autorisation` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idrole`),
  UNIQUE INDEX `nom_autorisation_UNIQUE` (`nom_autorisation` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rallye_video`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rallye_video`.`user` (
  `iduser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role_idrole` INT NOT NULL,
  PRIMARY KEY (`iduser`, `role_idrole`),
  UNIQUE INDEX `idusers_UNIQUE` (`iduser` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_user_role_idx` (`role_idrole` ASC) ,
  CONSTRAINT `fk_user_role`
    FOREIGN KEY (`role_idrole`)
    REFERENCES `rallye_video`.`role` (`idrole`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rallye_video`.`team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rallye_video`.`team` (
  `idteam` INT NOT NULL AUTO_INCREMENT,
  `nom_equipe` VARCHAR(45) NOT NULL,
  `depot` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`idteam`),
  UNIQUE INDEX `idequipes_UNIQUE` (`idteam` ASC) ,
  UNIQUE INDEX `nom_equipe_UNIQUE` (`nom_equipe` ASC) ,
  UNIQUE INDEX `depot_UNIQUE` (`depot` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rallye_video`.`user_has_team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rallye_video`.`user_has_team` (
  `user_iduser` INT UNSIGNED NOT NULL,
  `user_role_idrole` INT NOT NULL,
  `user_team_idteam` INT NOT NULL,
  `team_idteam` INT NOT NULL,
  PRIMARY KEY (`user_iduser`, `user_role_idrole`, `user_team_idteam`, `team_idteam`),
  INDEX `fk_user_has_team_team1_idx` (`team_idteam` ASC) ,
  INDEX `fk_user_has_team_user1_idx` (`user_iduser` ASC, `user_role_idrole` ASC, `user_team_idteam` ASC) ,
  CONSTRAINT `fk_user_has_team_user1`
    FOREIGN KEY (`user_iduser` , `user_role_idrole`)
    REFERENCES `rallye_video`.`user` (`iduser` , `role_idrole`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_team_team1`
    FOREIGN KEY (`team_idteam`)
    REFERENCES `rallye_video`.`team` (`idteam`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
