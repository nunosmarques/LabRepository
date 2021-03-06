-- MySQL Script generated by MySQL Workbench
-- 04/26/16 18:18:58
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema labdir
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `labdir` ;

-- -----------------------------------------------------
-- Schema labdir
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `labdir` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `labdir` ;

-- -----------------------------------------------------
-- Table `labdir`.`instituicaotipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`instituicaotipo` (
  `idinstituicaotipo` INT NOT NULL AUTO_INCREMENT,
  `instituicaotipo` VARCHAR(45) NULL,
  `estado` ENUM('S','N') NULL DEFAULT 'N',
  PRIMARY KEY (`idinstituicaotipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`distrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`distrito` (
  `iddistrito` INT NOT NULL AUTO_INCREMENT,
  `distrito` VARCHAR(45) NULL,
  PRIMARY KEY (`iddistrito`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`concelho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`concelho` (
  `idconcelho` INT NOT NULL AUTO_INCREMENT,
  `concelho` VARCHAR(255) NULL,
  `distrito_iddistrito` INT NOT NULL,
  PRIMARY KEY (`idconcelho`),
  INDEX `fk_concelho_distrito1_idx` (`distrito_iddistrito` ASC),
  CONSTRAINT `fk_concelho_distrito1`
    FOREIGN KEY (`distrito_iddistrito`)
    REFERENCES `labdir`.`distrito` (`iddistrito`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`instituicao` (
  `idinstituicao` INT NOT NULL AUTO_INCREMENT,
  `instituicao` VARCHAR(45) NULL,
  `instituicaotipo_idinstituicaotipo` INT NOT NULL,
  `morada` VARCHAR(45) NULL,
  `codigopostal` VARCHAR(8) NULL,
  `localidade` VARCHAR(255) NULL,
  `telefone` VARCHAR(45) NULL,
  `website` VARCHAR(255) NULL,
  `fax` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `concelho_idconcelho` INT NOT NULL,
  `deleted` ENUM('S', 'N') NULL DEFAULT 'N',
  PRIMARY KEY (`idinstituicao`),
  INDEX `fk_instituicao_tipoinstituicao_idx` (`instituicaotipo_idinstituicaotipo` ASC),
  INDEX `fk_instituicao_concelho1_idx` (`concelho_idconcelho` ASC),
  CONSTRAINT `fk_instituicao_instituicaotipo`
    FOREIGN KEY (`instituicaotipo_idinstituicaotipo`)
    REFERENCES `labdir`.`instituicaotipo` (`idinstituicaotipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_instituicao_concelho1`
    FOREIGN KEY (`concelho_idconcelho`)
    REFERENCES `labdir`.`concelho` (`idconcelho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`laboratorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`laboratorio` (
  `idlaboratorio` INT NOT NULL AUTO_INCREMENT,
  `laboratorio` VARCHAR(45) NULL,
  `instituicao_idinstituicao` INT NOT NULL,
  `morada` VARCHAR(45) NULL,
  `codigopostal` VARCHAR(8) NULL,
  `localidade` VARCHAR(255) NULL,
  `telefone` VARCHAR(45) NULL,
  `telemovel` VARCHAR(45) NULL,
  `fb` VARCHAR(255) NULL,
  `horario` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `website` VARCHAR(255) NULL,
  `fax` VARCHAR(45) NULL,
  `concelho_idconcelho` INT NOT NULL,
  `apresentacao` TEXT NULL,
  `logo` VARCHAR(45) NULL,
  `foto` VARCHAR(45) NULL,
  `deleted` ENUM('S', 'N') NULL DEFAULT 'N',
  PRIMARY KEY (`idlaboratorio`),
  INDEX `fk_laboratorio_instituicao1_idx` (`instituicao_idinstituicao` ASC),
  INDEX `fk_laboratorio_concelho1_idx` (`concelho_idconcelho` ASC),
  CONSTRAINT `fk_laboratorio_instituicao1`
    FOREIGN KEY (`instituicao_idinstituicao`)
    REFERENCES `labdir`.`instituicao` (`idinstituicao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorio_concelho1`
    FOREIGN KEY (`concelho_idconcelho`)
    REFERENCES `labdir`.`concelho` (`idconcelho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`area` (
  `idarea` INT NOT NULL AUTO_INCREMENT,
  `area` VARCHAR(45) NULL,
  PRIMARY KEY (`idarea`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`laboratorioarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`laboratorioarea` (
  `laboratorio_idlaboratorio` INT NOT NULL,
  `area_idarea` INT NOT NULL,
  `ordem` INT NULL,
  PRIMARY KEY (`laboratorio_idlaboratorio`, `area_idarea`),
  INDEX `fk_laboratorioarea_area1_idx` (`area_idarea` ASC),
  CONSTRAINT `fk_laboratorioarea_laboratorio1`
    FOREIGN KEY (`laboratorio_idlaboratorio`)
    REFERENCES `labdir`.`laboratorio` (`idlaboratorio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorioarea_area1`
    FOREIGN KEY (`area_idarea`)
    REFERENCES `labdir`.`area` (`idarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`equipamentotipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`equipamentotipo` (
  `idequipamentotipo` INT NOT NULL AUTO_INCREMENT,
  `equipamentotipo` VARCHAR(45) NULL,
  `deleted` ENUM('S', 'N') NULL DEFAULT 'N',
  PRIMARY KEY (`idequipamentotipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`equipamento` (
  `idequipamento` INT NOT NULL AUTO_INCREMENT,
  `equipamento` VARCHAR(45) NULL,
  `equipamentotipo_idequipamentotipo` INT NOT NULL,
  `deleted` ENUM('S', 'N') NULL DEFAULT 'N',
  PRIMARY KEY (`idequipamento`),
  INDEX `fk_equipamento_equipamentotipo1_idx` (`equipamentotipo_idequipamentotipo` ASC),
  CONSTRAINT `fk_equipamento_equipamentotipo1`
    FOREIGN KEY (`equipamentotipo_idequipamentotipo`)
    REFERENCES `labdir`.`equipamentotipo` (`idequipamentotipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`laboratorioequipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`laboratorioequipamento` (
  `laboratorio_idlaboratorio` INT NOT NULL,
  `equipamento_idequipamento` INT NOT NULL,
  PRIMARY KEY (`laboratorio_idlaboratorio`, `equipamento_idequipamento`),
  INDEX `fk_laboratorioequipamento_equipamento1_idx` (`equipamento_idequipamento` ASC),
  CONSTRAINT `fk_laboratorioequipamento_laboratorio1`
    FOREIGN KEY (`laboratorio_idlaboratorio`)
    REFERENCES `labdir`.`laboratorio` (`idlaboratorio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorioequipamento_equipamento1`
    FOREIGN KEY (`equipamento_idequipamento`)
    REFERENCES `labdir`.`equipamento` (`idequipamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`individuo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`individuo` (
  `idindividuo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `morada` VARCHAR(45) NULL,
  `codigopostal` VARCHAR(8) NULL,
  `localidade` VARCHAR(255) NULL,
  `telemovel` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `fax` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `cv` TEXT NULL,
  `twitter` VARCHAR(45) NULL,
  `fb` VARCHAR(45) NULL,
  `linkedin` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `deleted` ENUM('S', 'N') NULL DEFAULT 'N',
  PRIMARY KEY (`idindividuo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`laboratorioindividuo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`laboratorioindividuo` (
  `individuo_idindividuo` INT NOT NULL,
  `laboratorio_idlaboratorio` INT NOT NULL,
  `coordenador` ENUM('S','N') NULL DEFAULT 'N',
  `edita` ENUM('S', 'N') NULL DEFAULT 'N',
  PRIMARY KEY (`individuo_idindividuo`, `laboratorio_idlaboratorio`),
  INDEX `fk_laboratorioindividuo_laboratorio1_idx` (`laboratorio_idlaboratorio` ASC),
  CONSTRAINT `fk_laboratorioindividuo_individuo1`
    FOREIGN KEY (`individuo_idindividuo`)
    REFERENCES `labdir`.`individuo` (`idindividuo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorioindividuo_laboratorio1`
    FOREIGN KEY (`laboratorio_idlaboratorio`)
    REFERENCES `labdir`.`laboratorio` (`idlaboratorio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`individuoarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`individuoarea` (
  `individuo_idindividuo` INT NOT NULL,
  `area_idarea` INT NOT NULL,
  `ordem` INT NULL,
  PRIMARY KEY (`individuo_idindividuo`, `area_idarea`),
  INDEX `fk_individuoarea_area1_idx` (`area_idarea` ASC),
  CONSTRAINT `fk_individuoarea_individuo1`
    FOREIGN KEY (`individuo_idindividuo`)
    REFERENCES `labdir`.`individuo` (`idindividuo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_individuoarea_area1`
    FOREIGN KEY (`area_idarea`)
    REFERENCES `labdir`.`area` (`idarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`mediatipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`mediatipo` (
  `idmediatipo` INT NOT NULL AUTO_INCREMENT,
  `mediatipo` VARCHAR(45) NULL,
  PRIMARY KEY (`idmediatipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `labdir`.`media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labdir`.`media` (
  `idmedia` INT NOT NULL AUTO_INCREMENT,
  `media` VARCHAR(45) NULL,
  `laboratorio_idlaboratorio` INT NOT NULL,
  `mediatipo_idmediatipo` INT NOT NULL,
  `deleted` ENUM('S', 'N') NULL DEFAULT 'N',
  PRIMARY KEY (`idmedia`),
  INDEX `fk_media_laboratorio1_idx` (`laboratorio_idlaboratorio` ASC),
  INDEX `fk_media_mediatipo1_idx` (`mediatipo_idmediatipo` ASC),
  CONSTRAINT `fk_media_laboratorio1`
    FOREIGN KEY (`laboratorio_idlaboratorio`)
    REFERENCES `labdir`.`laboratorio` (`idlaboratorio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_media_mediatipo1`
    FOREIGN KEY (`mediatipo_idmediatipo`)
    REFERENCES `labdir`.`mediatipo` (`idmediatipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `labdir`.`instituicaotipo`
-- -----------------------------------------------------
START TRANSACTION;
USE `labdir`;
INSERT INTO `labdir`.`instituicaotipo` (`idinstituicaotipo`, `instituicaotipo`, `estado`) VALUES (1, 'Estado', 'S');
INSERT INTO `labdir`.`instituicaotipo` (`idinstituicaotipo`, `instituicaotipo`, `estado`) VALUES (2, 'Privado', 'N');

COMMIT;


-- -----------------------------------------------------
-- Data for table `labdir`.`distrito`
-- -----------------------------------------------------
START TRANSACTION;
USE `labdir`;
INSERT INTO `labdir`.`distrito` (`iddistrito`, `distrito`) VALUES (1, 'Santarém');
INSERT INTO `labdir`.`distrito` (`iddistrito`, `distrito`) VALUES (2, 'Lisboa');

COMMIT;


-- -----------------------------------------------------
-- Data for table `labdir`.`concelho`
-- -----------------------------------------------------
START TRANSACTION;
USE `labdir`;
INSERT INTO `labdir`.`concelho` (`idconcelho`, `concelho`, `distrito_iddistrito`) VALUES (1, 'Abrantes', 1);
INSERT INTO `labdir`.`concelho` (`idconcelho`, `concelho`, `distrito_iddistrito`) VALUES (2, 'Tomar', 1);
INSERT INTO `labdir`.`concelho` (`idconcelho`, `concelho`, `distrito_iddistrito`) VALUES (3, 'Lisboa', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `labdir`.`area`
-- -----------------------------------------------------
START TRANSACTION;
USE `labdir`;
INSERT INTO `labdir`.`area` (`idarea`, `area`) VALUES (1, 'Medicina');
INSERT INTO `labdir`.`area` (`idarea`, `area`) VALUES (2, 'Mecânica');
INSERT INTO `labdir`.`area` (`idarea`, `area`) VALUES (3, 'Informática');

COMMIT;


-- -----------------------------------------------------
-- Data for table `labdir`.`equipamentotipo`
-- -----------------------------------------------------
START TRANSACTION;
USE `labdir`;
INSERT INTO `labdir`.`equipamentotipo` (`idequipamentotipo`, `equipamentotipo`, `deleted`) VALUES (1, 'Impressora 3D', NULL);
INSERT INTO `labdir`.`equipamentotipo` (`idequipamentotipo`, `equipamentotipo`, `deleted`) VALUES (2, 'Túnel de Vento', NULL);
INSERT INTO `labdir`.`equipamentotipo` (`idequipamentotipo`, `equipamentotipo`, `deleted`) VALUES (3, 'Raio X', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `labdir`.`equipamento`
-- -----------------------------------------------------
START TRANSACTION;
USE `labdir`;
INSERT INTO `labdir`.`equipamento` (`idequipamento`, `equipamento`, `equipamentotipo_idequipamentotipo`, `deleted`) VALUES (1, 'Epson', 1, 'N');
INSERT INTO `labdir`.`equipamento` (`idequipamento`, `equipamento`, `equipamentotipo_idequipamentotipo`, `deleted`) VALUES (2, 'HP', 1, 'N');
INSERT INTO `labdir`.`equipamento` (`idequipamento`, `equipamento`, `equipamentotipo_idequipamentotipo`, `deleted`) VALUES (3, 'Tunel XYZ 3000', 2, 'N');
INSERT INTO `labdir`.`equipamento` (`idequipamento`, `equipamento`, `equipamentotipo_idequipamentotipo`, `deleted`) VALUES (4, 'Tunellex 4000', 2, 'N');
INSERT INTO `labdir`.`equipamento` (`idequipamento`, `equipamento`, `equipamentotipo_idequipamentotipo`, `deleted`) VALUES (5, 'Raio Xpto', 3, 'N');

COMMIT;


-- -----------------------------------------------------
-- Data for table `labdir`.`mediatipo`
-- -----------------------------------------------------
START TRANSACTION;
USE `labdir`;
INSERT INTO `labdir`.`mediatipo` (`idmediatipo`, `mediatipo`) VALUES (1, 'Foto');
INSERT INTO `labdir`.`mediatipo` (`idmediatipo`, `mediatipo`) VALUES (2, 'Vídeo');

COMMIT;

