ALTER TABLE `atk_user` 
    ADD COLUMN `email` VARCHAR(255) NULL DEFAULT NULL  AFTER `id` , 
    ADD COLUMN `is_email_confirmed` VARCHAR(45) NULL DEFAULT NULL  AFTER `email` ;

ALTER TABLE `atk_user` CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT  ;

CREATE  TABLE IF NOT EXISTS `atk_download` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `atk_user_id` INT(11) NULL DEFAULT NULL ,
  `file` VARCHAR(255) NULL DEFAULT NULL ,
  `datetime` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_atk_download_atk_user` (`atk_user_id` ASC) ,
  CONSTRAINT `fk_atk_download_atk_user`
    FOREIGN KEY (`atk_user_id` )
    REFERENCES `atk_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE  TABLE IF NOT EXISTS `atk_donation` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `atk_user_id` INT(11) NULL DEFAULT NULL ,
  `amount` DECIMAL(8,2) NULL DEFAULT NULL ,
  `datetime` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_atk_donation_atk_user1` (`atk_user_id` ASC) ,
  CONSTRAINT `fk_atk_donation_atk_user1`
    FOREIGN KEY (`atk_user_id` )
    REFERENCES `atk_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `atk_purchase` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `atk_user_id` INT(11) NULL DEFAULT NULL ,
  `license` VARCHAR(255) NULL DEFAULT NULL ,
  `datetime` DATETIME NULL DEFAULT NULL ,
  `domain` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_atk_purchase_atk_user1` (`atk_user_id` ASC) ,
  CONSTRAINT `fk_atk_purchase_atk_user1`
    FOREIGN KEY (`atk_user_id` )
    REFERENCES `atk_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


ALTER TABLE `atk_user` CHANGE COLUMN `name` `full_name` VARCHAR(255) NULL DEFAULT NULL  ;

ALTER TABLE `atk_user` 
    ADD COLUMN `password` VARCHAR(255) NULL DEFAULT NULL  AFTER `email` , 
    ADD COLUMN `token_email` VARCHAR(255) NULL DEFAULT NULL  AFTER `facebook_token` , 
    CHANGE COLUMN `is_admin` `is_admin` ENUM('Y','N') NULL DEFAULT NULL  AFTER `is_email_confirmed` ;







