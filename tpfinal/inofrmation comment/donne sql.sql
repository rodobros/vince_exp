-- MySQL Script generated by MySQL Workbench
-- Mon Dec  2 13:28:03 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema magasin_de_sport
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema magasin_de_sport
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `magasin_de_sport` DEFAULT CHARACTER SET utf8 ;
USE `magasin_de_sport` ;

-- -----------------------------------------------------
-- Table `magasin_de_sport`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `magasin_de_sport`.`categorie` (
  `categorie_id` INT NOT NULL AUTO_INCREMENT,
  `categorie_nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`categorie_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `magasin_de_sport`.`marque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `magasin_de_sport`.`marque` (
  `marque_id` INT NOT NULL AUTO_INCREMENT,
  `marque_nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`marque_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `magasin_de_sport`.`commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `magasin_de_sport`.`commande` (
  `commande_id` INT NOT NULL AUTO_INCREMENT,
  `commande_date` DATE NOT NULL,
  PRIMARY KEY (`commande_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `magasin_de_sport`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `magasin_de_sport`.`client` (
  `client_id` INT NOT NULL AUTO_INCREMENT,
  `client_nom` VARCHAR(45) NOT NULL,
  `client_prenom` VARCHAR(45) NOT NULL,
  `client_mot_de_passe` VARCHAR(45) NOT NULL,
  `courriel` VARCHAR(45) NOT NULL,
  `commande_commande_id` INT NOT NULL,
  PRIMARY KEY (`client_id`),
  INDEX `fk_client_commande1_idx` (`commande_commande_id` ASC) ,
  CONSTRAINT `fk_client_commande1`
    FOREIGN KEY (`commande_commande_id`)
    REFERENCES `magasin_de_sport`.`commande` (`commande_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `magasin_de_sport`.`produit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `magasin_de_sport`.`produit` (
  `produit_id` INT NOT NULL AUTO_INCREMENT,
  `produit_nom` VARCHAR(45) NOT NULL,
  `produit_description` VARCHAR(45) NOT NULL,
  `produit_prix` VARCHAR(45) NOT NULL,
  `categorie_categorie_id` INT NOT NULL,
  `marque_marque_id` INT NOT NULL,
  PRIMARY KEY (`produit_id`),
  INDEX `fk_produit_categorie1_idx` (`categorie_categorie_id` ASC) ,
  INDEX `fk_produit_marque1_idx` (`marque_marque_id` ASC) ,
  CONSTRAINT `fk_produit_categorie1`
    FOREIGN KEY (`categorie_categorie_id`)
    REFERENCES `magasin_de_sport`.`categorie` (`categorie_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produit_marque1`
    FOREIGN KEY (`marque_marque_id`)
    REFERENCES `magasin_de_sport`.`marque` (`marque_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `magasin_de_sport`.`detail_commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `magasin_de_sport`.`detail_commande` (
  `commande_commande_id` INT NOT NULL AUTO_INCREMENT,
  `produit_produit_id` INT NOT NULL,
  PRIMARY KEY (`commande_commande_id`, `produit_produit_id`),
  INDEX `fk_commande_has_produit_produit1_idx` (`produit_produit_id` ASC) ,
  INDEX `fk_commande_has_produit_commande1_idx` (`commande_commande_id` ASC) ,
  CONSTRAINT `fk_commande_has_produit_commande1`
    FOREIGN KEY (`commande_commande_id`)
    REFERENCES `magasin_de_sport`.`commande` (`commande_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_commande_has_produit_produit1`
    FOREIGN KEY (`produit_produit_id`)
    REFERENCES `magasin_de_sport`.`produit` (`produit_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


SELECT produit_nom,produit_description,produit_prix,marque_nom from produit
join categorie
on produit.categorie_categorie_id = categorie_id
join marque
on produit.marque_marque_id = marque_id
