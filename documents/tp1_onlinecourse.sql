-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema onlineClass
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema onlineClass
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `onlineClass` DEFAULT CHARACTER SET utf8 ;
USE `onlineClass` ;

-- -----------------------------------------------------
-- Table `onlineClass`.`students`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onlineClass`.`students` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `birthday` DATE NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onlineClass`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onlineClass`.`course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `course` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onlineClass`.`class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onlineClass`.`class` (
  `course_id` INT NOT NULL,
  `students_id` INT NOT NULL,
  PRIMARY KEY (`course_id`, `students_id`),
  INDEX `fk_course_has_students_students1_idx` (`students_id` ASC) ,
  INDEX `fk_course_has_students_course_idx` (`course_id` ASC) ,
  CONSTRAINT `fk_course_has_students_course`
    FOREIGN KEY (`course_id`)
    REFERENCES `onlineClass`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_has_students_students1`
    FOREIGN KEY (`students_id`)
    REFERENCES `onlineClass`.`students` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `onlineClass`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `onlineClass`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comment` TEXT NOT NULL,
  `class_course_id` INT NOT NULL,
  `class_students_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comments_class1_idx` (`class_course_id` ASC, `class_students_id` ASC) ,
  CONSTRAINT `fk_comments_class1`
    FOREIGN KEY (`class_course_id` , `class_students_id`)
    REFERENCES `onlineClass`.`class` (`course_id` , `students_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
