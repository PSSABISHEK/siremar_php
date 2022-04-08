-- MySQL Script generated by MySQL Workbench
-- Wed Feb  2 16:48:06 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema vxs8596_siremar
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema vxs8596_siremar
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vxs8596_siremar` DEFAULT CHARACTER SET latin1 ;
USE `vxs8596_siremar` ;

-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`amenities_mapping`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`amenities_mapping` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `user_id` INT(8) NOT NULL,
  `amenities_id` CHAR(4) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `amenities_mapping_fk0` (`user_id` ASC) ,
  INDEX `amenities_mapping_fk1` (`amenities_id` ASC) ,
  CONSTRAINT `amenities_mapping_fk0`
    FOREIGN KEY (`user_id`)
    REFERENCES `vxs8596_siremar`.`user_accounts` (`user_id`),
  CONSTRAINT `amenities_mapping_fk1`
    FOREIGN KEY (`amenities_id`)
    REFERENCES `vxs8596_siremar`.`master_amenities` (`amenities_code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`course_enrollments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`course_enrollments` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `user_id` INT(8) NOT NULL,
  `school_code` CHAR(4) NOT NULL,
  `course_code` CHAR(4) NOT NULL,
  `is_approved` TINYINT(1) NOT NULL,
  `created_on` DATETIME NOT NULL,
  `updated_on` DATETIME NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_id` (`user_id` ASC) ,
  UNIQUE INDEX `school_code` (`school_code` ASC) ,
  UNIQUE INDEX `course_code` (`course_code` ASC) ,
  CONSTRAINT `course_enrollments_fk0`
    FOREIGN KEY (`user_id`)
    REFERENCES `vxs8596_siremar`.`user_accounts` (`user_id`),
  CONSTRAINT `course_enrollments_fk1`
    FOREIGN KEY (`school_code`)
    REFERENCES `vxs8596_siremar`.`master_schools` (`school_code`),
  CONSTRAINT `course_enrollments_fk2`
    FOREIGN KEY (`course_code`)
    REFERENCES `vxs8596_siremar`.`master_courses` (`course_code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`event_bookings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`event_bookings` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `user_id` INT(8) NULL,
  `event_id` CHAR(4) NULL,
  `is_active` TINYINT NULL,
  `transaction_id` CHAR(32) NULL,
  PRIMARY KEY (`id`),
  INDEX `event_bookings_fk0_idx` (`event_id` ASC) ,
  INDEX `event_bookings_fk1_idx` (`user_id` ASC) ,
  UNIQUE INDEX `transaction_id_UNIQUE` (`transaction_id` ASC) ,
  CONSTRAINT `event_bookings_fk0`
    FOREIGN KEY (`event_id`)
    REFERENCES `vxs8596_siremar`.`event_list` (`event_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `event_bookings_fk1`
    FOREIGN KEY (`user_id`)
    REFERENCES `vxs8596_siremar`.`user_accounts` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`event_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`event_list` (
  `id` INT(8) NOT NULL AUTO_INCREMENT,
  `event_id` CHAR(4) NULL,
  `name` CHAR(32) NULL,
  `date` DATETIME NULL,
  `description` VARCHAR(256) NULL,
  `max_seats` INT(4) NULL,
  `discount_rate` INT(4) NULL,
  `is_active` TINYINT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `event_id_UNIQUE` (`event_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`ferry`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`ferry` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `ferry_name` CHAR(32) NULL,
  `ferry_no` CHAR(4) NOT NULL,
  `departure` TIME NULL,
  `is_active` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `flight_no_UNIQUE` (`ferry_no` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`flights`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`flights` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `airline_name` CHAR(32) NULL,
  `flight_no` CHAR(4) NOT NULL,
  `departure` TIME NULL,
  `is_active` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `flight_no_UNIQUE` (`flight_no` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`master_amenities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`master_amenities` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `amenities_code` CHAR(4) NOT NULL,
  `name` CHAR(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `amenities_code` (`amenities_code` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`master_clinics`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`master_clinics` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `clinic_code` CHAR(4) NOT NULL,
  `name` CHAR(32) NOT NULL,
  `address` CHAR(50) NOT NULL,
  `from_time` TIME NOT NULL,
  `to_time` TIME NOT NULL,
  `max_seats` INT(4) NOT NULL DEFAULT '20',
  `doctor_name` CHAR(32) NOT NULL,
  `specialization` CHAR(32) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `clinic_code` (`clinic_code` ASC) ,
  UNIQUE INDEX `name` (`name` ASC) ,
  UNIQUE INDEX `address` (`address` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`master_courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`master_courses` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `course_code` CHAR(4) NOT NULL,
  `name` CHAR(32) NOT NULL,
  `max_seats` INT(4) NOT NULL DEFAULT '20',
  `is_active` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `course_code` (`course_code` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`master_destination`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`master_destination` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `country_code` CHAR(4) NULL,
  `name` CHAR(32) NULL,
  `discount_rate` INT(4) NULL,
  `is_active` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `country_code_UNIQUE` (`country_code` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`master_schools`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`master_schools` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `school_code` CHAR(4) NOT NULL,
  `name` CHAR(32) NOT NULL,
  `address` CHAR(50) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `school_code` (`school_code` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`message_records`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`message_records` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `message` VARCHAR(256) NULL,
  `message_time` DATETIME NULL,
  `coversation_id` INT(8) NULL,
  `is_by_resident` TINYINT NULL,
  PRIMARY KEY (`id`),
  INDEX `msg_records_fk0_idx` (`coversation_id` ASC) ,
  CONSTRAINT `msg_records_fk0`
    FOREIGN KEY (`coversation_id`)
    REFERENCES `vxs8596_siremar`.`user_conversations` (`conversation_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`move_outs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`move_outs` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `user_id` INT(8) NOT NULL,
  `comments` VARCHAR(256) NOT NULL,
  `is_approved` TINYINT(1) NOT NULL DEFAULT '0',
  `created_on` DATETIME NOT NULL,
  `updated_on` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `move_outs_fk0` (`user_id` ASC) ,
  CONSTRAINT `move_outs_fk0`
    FOREIGN KEY (`user_id`)
    REFERENCES `vxs8596_siremar`.`user_accounts` (`user_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`transport_bookings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`transport_bookings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT(8) NULL,
  `transport_id` CHAR(4) NULL,
  `type` CHAR(32) NULL,
  `destination` CHAR(32) NULL,
  `transaction_id` CHAR(32) NULL,
  `is_active` TINYINT NULL,
  PRIMARY KEY (`id`),
  INDEX `flight_bookings_fk0_idx` (`transport_id` ASC) ,
  INDEX `flight_bookings_fk1_idx` (`user_id` ASC) ,
  INDEX `flight_bookings_fk2_idx` (`destination` ASC) ,
  UNIQUE INDEX `transaction_id_UNIQUE` (`transaction_id` ASC) ,
  CONSTRAINT `flight_bookings_fk0`
    FOREIGN KEY (`transport_id`)
    REFERENCES `vxs8596_siremar`.`flights` (`flight_no`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `flight_bookings_fk1`
    FOREIGN KEY (`user_id`)
    REFERENCES `vxs8596_siremar`.`user_accounts` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `flight_bookings_fk2`
    FOREIGN KEY (`destination`)
    REFERENCES `vxs8596_siremar`.`master_destination` (`country_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `flight_bookings_fk3`
    FOREIGN KEY (`transport_id`)
    REFERENCES `vxs8596_siremar`.`ferry` (`ferry_no`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`user_accounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`user_accounts` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `user_id` INT(8) NOT NULL,
  `fname` CHAR(32) NOT NULL,
  `lname` CHAR(32) NULL DEFAULT NULL,
  `birth_place` CHAR(32) NOT NULL,
  `dob` DATE NOT NULL,
  `address` CHAR(50) NOT NULL,
  `apt_no` INT(4) NOT NULL,
  `email` CHAR(32) NOT NULL,
  `pwd` VARCHAR(256) NOT NULL,
  `proof_url` VARCHAR(256) NOT NULL,
  `user_role` CHAR(4) NOT NULL DEFAULT '3',
  `is_active` TINYINT(1) NOT NULL DEFAULT '0',
  `created_on` DATETIME NOT NULL,
  `updated_on` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_id` (`user_id` ASC) ,
  UNIQUE INDEX `email` (`email` ASC) ,
  INDEX `user_accounts_fk0` (`user_role` ASC) ,
  CONSTRAINT `user_accounts_fk0`
    FOREIGN KEY (`user_role`)
    REFERENCES `vxs8596_siremar`.`user_roles` (`role_code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`user_appointments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`user_appointments` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `user_id` INT(8) NOT NULL,
  `clinic_code` CHAR(4) NOT NULL,
  `is_approved` TINYINT(1) NOT NULL DEFAULT '0',
  `transaction_id` CHAR(32) NULL,
  `created_on` DATETIME NOT NULL,
  `updated_on` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_id` (`user_id` ASC) ,
  UNIQUE INDEX `clinic_code` (`clinic_code` ASC) ,
  UNIQUE INDEX `is_approved` (`is_approved` ASC) ,
  UNIQUE INDEX `transaction_id_UNIQUE` (`transaction_id` ASC) ,
  CONSTRAINT `user_appointments_fk0`
    FOREIGN KEY (`user_id`)
    REFERENCES `vxs8596_siremar`.`user_accounts` (`user_id`),
  CONSTRAINT `user_appointments_fk1`
    FOREIGN KEY (`clinic_code`)
    REFERENCES `vxs8596_siremar`.`master_clinics` (`clinic_code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`user_conversations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`user_conversations` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `resident_user_id` INT(8) NULL,
  `inspector_user_id` INT(8) NOT NULL,
  `conversation_id` INT(8) NULL,
  `is_active` TINYINT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `conversation_id_UNIQUE` (`conversation_id` ASC),
  INDEX `user_cov_fk0_idx` (`resident_user_id` ASC),
  INDEX `user_cov_fk1_idx` (`inspector_user_id` ASC),
  CONSTRAINT `user_cov_fk0`
    FOREIGN KEY (`resident_user_id`)
    REFERENCES `vxs8596_siremar`.`user_accounts` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `user_cov_fk1`
    FOREIGN KEY (`inspector_user_id`)
    REFERENCES `vxs8596_siremar`.`user_accounts` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vxs8596_siremar`.`user_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vxs8596_siremar`.`user_roles` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `role_code` CHAR(4) NOT NULL,
  `role_name` CHAR(32) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `role_code` (`role_code` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;