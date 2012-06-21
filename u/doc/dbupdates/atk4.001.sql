CREATE  TABLE IF NOT EXISTS `atk_certificate` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `atk_purchase_id` INT(11) NOT NULL ,
  `license_data` VARCHAR(255) NULL DEFAULT NULL ,
  `license_checksum` VARCHAR(255) NULL DEFAULT NULL ,
  `certificate` VARCHAR(255) NULL DEFAULT NULL ,
  `issued_dts` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_atk_certificate_atk_purchase1` (`atk_purchase_id` ASC) ,
  CONSTRAINT `fk_atk_certificate_atk_purchase1`
    FOREIGN KEY (`atk_purchase_id` )
    REFERENCES `atk_purchase` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `atk_certificate` 
  ADD COLUMN `expires_dts` DATE NULL DEFAULT NULL  AFTER `issued_dts` , 
  CHANGE COLUMN `certificate` `certificate` TEXT NULL DEFAULT NULL  ;

CREATE  TABLE IF NOT EXISTS `atk_addon` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `atk_user_id` INT(11) NOT NULL ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `descr` TEXT NULL DEFAULT NULL ,
  `homepage_url` VARCHAR(255) NULL DEFAULT NULL ,
  `created_dts` DATETIME NULL DEFAULT NULL ,
  `expires_dts` DATETIME NULL DEFAULT NULL ,
  `cost` DECIMAL(8,2) NULL DEFAULT NULL ,
  `paypal` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `name` (`name` ASC) ,
  INDEX `fk_atk_addon_atk_user1` (`atk_user_id` ASC) ,
  CONSTRAINT `fk_atk_addon_atk_user1`
    FOREIGN KEY (`atk_user_id` )
    REFERENCES `atk_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `atk_addon_version` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `atk_addon_id` INT(11) NOT NULL ,
  `version` VARCHAR(255) NULL DEFAULT NULL ,
  `url` VARCHAR(255) NULL DEFAULT NULL ,
  `checksum` VARCHAR(255) NULL DEFAULT NULL ,
  `is_public` TINYINT(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_atk_addon_version_atk_addon1` (`atk_addon_id` ASC) ,
  CONSTRAINT `fk_atk_addon_version_atk_addon1`
    FOREIGN KEY (`atk_addon_id` )
    REFERENCES `atk_addon` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `atk_purchase` ADD COLUMN `project_url` VARCHAR(255) NULL DEFAULT NULL  AFTER `project_type` ;

ALTER TABLE `atk_certificate` ADD COLUMN `type` VARCHAR(255) NULL DEFAULT NULL  AFTER `domain` ;
ALTER TABLE `atk_certificate` ADD COLUMN `cert_id` VARCHAR(255) NULL DEFAULT NULL  AFTER `domain` ;
ALTER TABLE `atk_certificate` ADD COLUMN `repo` VARCHAR(255) NULL DEFAULT NULL  AFTER `type` ;



