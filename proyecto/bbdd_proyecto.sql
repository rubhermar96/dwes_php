-- MySQL Script generated by MySQL Workbench
-- Fri Nov 27 19:13:17 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- Table `cliente`
-- -----------------------------------------------------
DROP TABLE  `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `dni_cliente` VARCHAR(9) NOT NULL,
  `nombre_cliente` VARCHAR(45) NOT NULL,
  `tfno_cliente` INT(9) NOT NULL,
  `email_cliente` VARCHAR(100) NOT NULL,
  `pass_cliente` VARCHAR(45) NOT NULL,
  `usuario_cliente` VARCHAR(45) NOT NULL,
  `apellidos_cliente` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE INDEX `email_cliente_UNIQUE` (`email_cliente` ASC) ,
  UNIQUE INDEX `usuario_cliente_UNIQUE` (`usuario_cliente` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `servicio`
-- -----------------------------------------------------
DROP TABLE  `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `id_servicio` INT NOT NULL AUTO_INCREMENT,
  `nombre_servicio` VARCHAR(100) NOT NULL,
  `coste_servicio` DOUBLE(4,2) NOT NULL,
  `tipo_servicio` SET('H', 'M', 'N') NOT NULL,
  PRIMARY KEY (`id_servicio`),
  UNIQUE INDEX `tipo_servicio_UNIQUE` (`nombre_servicio` ASC) ,
  UNIQUE INDEX `id_servicio_UNIQUE` (`id_servicio` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabajador`
-- -----------------------------------------------------
DROP TABLE  `trabajador`;
CREATE TABLE IF NOT EXISTS `trabajador` (
  `id_trabajador` INT NOT NULL AUTO_INCREMENT,
  `nombre_trabajador` VARCHAR(45) NOT NULL,
  `usuario_trabajador` VARCHAR(45) NOT NULL,
  `pass_trabajador` VARCHAR(45) NOT NULL,
  `apellidos_trabajador` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_trabajador`),
  UNIQUE INDEX `id_trabajador_UNIQUE` (`id_trabajador` ASC) ,
  UNIQUE INDEX `usuario_trabajador_UNIQUE` (`usuario_trabajador` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cita`
-- -----------------------------------------------------
DROP TABLE  `cita`;
CREATE TABLE IF NOT EXISTS `cita` (
  `id_cita` INT NOT NULL AUTO_INCREMENT,
  `fecha_cita` DATETIME NOT NULL,
  `hora_cita` VARCHAR(5) NOT NULL,
  `id_cliente` INT NOT NULL,
  `id_servicio` INT NOT NULL,
  `Trabajador_id_trabajador` INT NOT NULL,
  PRIMARY KEY (`id_cita`, `id_cliente`, `id_servicio`, `Trabajador_id_trabajador`),
  UNIQUE INDEX `id_cita_UNIQUE` (`id_cita` ASC) ,
  INDEX `fk_Cita_Cliente_idx` (`id_cliente` ASC) ,
  INDEX `fk_Cita_Servicio1_idx` (`id_servicio` ASC),
  INDEX `fk_Cita_Trabajador1_idx` (`Trabajador_id_trabajador` ASC) ,
  CONSTRAINT `fk_Cita_Cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `cliente` (`id_cliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Cita_Servicio`
    FOREIGN KEY (`id_servicio`)
    REFERENCES `servicio` (`id_servicio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Cita_Trabajador`
    FOREIGN KEY (`Trabajador_id_trabajador`)
    REFERENCES `trabajador` (`id_trabajador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

/*Inserts*/
INSERT INTO `cliente` VALUES 
(1,'88321234E','Marta',698432123,'email1@email.com','81dc9bdb52d04dc20036dbd8313ed055','usuario1','Lopez'),
(2,'44332123E','Manuel',654323452,'email2@email.com','81dc9bdb52d04dc20036dbd8313ed055','usuario2','Nuñez Pérez'),
(3,'59483234L','Juan Antonio',987876754,'email3@email.com','81dc9bdb52d04dc20036dbd8313ed055','usuario3','Hernández Hernández');

INSERT INTO `servicio` VALUES (1,'Corte Pelo Hombre',12.99,'H'),
(2,'Corte Pelo Mujer',21.99,'M'),
(3,'Corte Pelo Niño/a',9.99,'N'),
(4,'Corte + Barba Hombre',15.99,'H'),
(5,'Tinte Mujer',30.00,'M'),
(6,'Tinte Hombre',20.55,'H'),
(7,'Tinte Niño/a',20.55,'N');

INSERT INTO `trabajador` VALUES (1,'Administrador','admin','admin','Administrador'),
(2,'Mario','trabajador1','81dc9bdb52d04dc20036dbd8313ed055','Pena Lopez'),
(3,'Maria','trabajador2','81dc9bdb52d04dc20036dbd8313ed055','Sierra Castillo');

INSERT INTO `cita` VALUES (4,'2020-12-17 00:00:00','12:30',1,2,2),
(5,'2020-12-17 00:00:00','13:00',1,5,2),
(6,'2020-12-16 00:00:00','19:00',2,4,3),
(7,'2020-12-23 00:00:00','18:00',3,3,3),
(8,'2020-12-23 00:00:00','18:30',3,7,3);