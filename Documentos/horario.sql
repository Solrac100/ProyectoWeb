﻿-- MySQL Script generated by MySQL Workbench
-- 11/03/17 02:04:35
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`trabajador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`trabajador` ;

CREATE TABLE IF NOT EXISTS `horarios`.`trabajador` (
  `idtrabajador` INT NOT NULL,
  `nombre` VARCHAR(25) NOT NULL,
  `apellidos` VARCHAR(35) NOT NULL,
  `celular` VARCHAR(13) NULL,
  `correo` VARCHAR(45) NULL,
  `Rol` VARCHAR(1) NOT NULL,
  `fechaelim` TIMESTAMP(6) NULL,
  PRIMARY KEY (`idtrabajador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`grupo` ;

CREATE TABLE IF NOT EXISTS `horarios`.`grupo` (
  `idgrupo` INT NOT NULL,
  `nombre` VARCHAR(4) NOT NULL,
  `salon` VARCHAR(4) NOT NULL,
  `piso` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`idgrupo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`alumno` ;

CREATE TABLE IF NOT EXISTS `horarios`.`alumno` (
  `idalumno` INT NOT NULL,
  `nombre` VARCHAR(25) NOT NULL,
  `apellidos` VARCHAR(35) NOT NULL,
  `rol` VARCHAR(1) NOT NULL,
  `idgrupo` INT NOT NULL,
  `fechaelim` TIMESTAMP(6) NOT NULL,
  PRIMARY KEY (`idalumno`, `idgrupo`),
  INDEX `fk_alumno_grupo_idx` (`idgrupo` ASC),
  CONSTRAINT `fk_alumno_grupo`
    FOREIGN KEY (`idgrupo`)
    REFERENCES `mydb`.`grupo` (`idgrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`periodo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`periodo` ;

CREATE TABLE IF NOT EXISTS `horarios`.`periodo` (
  `idperiodo` INT NOT NULL,
  `tipo` VARCHAR(1) NOT NULL,
  `año` VARCHAR(4) NOT NULL,
  PRIMARY KEY (`idperiodo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`hora`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`hora` ;

CREATE TABLE IF NOT EXISTS `horarios`.`hora` (
  `idhora` INT NOT NULL,
  `Inicio` VARCHAR(5) NOT NULL,
  `Final` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`idhora`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`dia` ;

CREATE TABLE IF NOT EXISTS `horarios`.`dia` (
  `iddia` INT NOT NULL,
  `dia` INT NOT NULL,
  PRIMARY KEY (`iddia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`clase`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`clase` ;

CREATE TABLE IF NOT EXISTS `horarios`.`clase` (
  `idclase` INT NOT NULL,
  `idalumno` INT NOT NULL,
  `idgrupo` INT NOT NULL,
  `idtrabajador` INT NOT NULL,
  `periodo_idperiodo` INT NOT NULL,
  `hora_idhora` INT NOT NULL,
  `dia_iddia` INT NOT NULL,
  PRIMARY KEY (`idclase`, `periodo_idperiodo`, `hora_idhora`, `dia_iddia`),
  INDEX `fk_alumno_has_trabajador_trabajador1_idx` (`idtrabajador` ASC),
  INDEX `fk_alumno_has_trabajador_alumno1_idx` (`idalumno` ASC, `idgrupo` ASC),
  INDEX `fk_clase_periodo1_idx` (`periodo_idperiodo` ASC),
  INDEX `fk_clase_hora1_idx` (`hora_idhora` ASC),
  INDEX `fk_clase_dia1_idx` (`dia_iddia` ASC),
  CONSTRAINT `fk_alumno_has_trabajador_alumno1`
    FOREIGN KEY (`idalumno` , `idgrupo`)
    REFERENCES `mydb`.`alumno` (`idalumno` , `idgrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_has_trabajador_trabajador1`
    FOREIGN KEY (`idtrabajador`)
    REFERENCES `mydb`.`trabajador` (`idtrabajador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clase_periodo1`
    FOREIGN KEY (`periodo_idperiodo`)
    REFERENCES `mydb`.`periodo` (`idperiodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clase_hora1`
    FOREIGN KEY (`hora_idhora`)
    REFERENCES `mydb`.`hora` (`idhora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clase_dia1`
    FOREIGN KEY (`dia_iddia`)
    REFERENCES `mydb`.`dia` (`iddia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`asisAlumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`asisAlumno` ;

CREATE TABLE IF NOT EXISTS `horarios`.`asisAlumno` (
  `idasisAlumno` INT NOT NULL,
  `idclase` INT NOT NULL,
  `idperiodo` INT NOT NULL,
  `idhora` INT NOT NULL,
  `iddia` INT NOT NULL,
  `registro` TIMESTAMP(6) NOT NULL,
  PRIMARY KEY (`idasisAlumno`, `idclase`, `idperiodo`, `idhora`, `iddia`),
  INDEX `fk_asisAlumno_clase1_idx` (`idclase` ASC, `idperiodo` ASC, `idhora` ASC, `iddia` ASC),
  CONSTRAINT `fk_asisAlumno_clase1`
    FOREIGN KEY (`idclase` , `idperiodo` , `idhora` , `iddia`)
    REFERENCES `mydb`.`clase` (`idclase` , `periodo_idperiodo` , `hora_idhora` , `dia_iddia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`asisTrabajador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`asisTrabajador` ;

CREATE TABLE IF NOT EXISTS `horarios`.`asisTrabajador` (
  `idasisTrabajador` INT NOT NULL,
  `idclase` INT NOT NULL,
  `idperiodo` INT NOT NULL,
  `idhora` INT NOT NULL,
  `iddia` INT NOT NULL,
  `registro` TIMESTAMP(6) NOT NULL,
  PRIMARY KEY (`idasisTrabajador`, `idclase`, `idperiodo`, `idhora`, `iddia`),
  INDEX `fk_asisTrabajador_clase1_idx` (`idclase` ASC, `idperiodo` ASC, `idhora` ASC, `iddia` ASC),
  CONSTRAINT `fk_asisTrabajador_clase1`
    FOREIGN KEY (`idclase` , `idperiodo` , `idhora` , `iddia`)
    REFERENCES `mydb`.`clase` (`idclase` , `periodo_idperiodo` , `hora_idhora` , `dia_iddia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
