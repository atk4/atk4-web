SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

-- ALTER TABLE `atk_survey_1` DROP FOREIGN KEY `fk_atk_survey_atk_user1` ;

-- ALTER TABLE `atk_survey_1` 
--  ADD CONSTRAINT `fk_atk_survey_atk_user1`
--  FOREIGN KEY (`user_id` )
--  REFERENCES `atk_user` (`id` )
--  ON DELETE NO ACTION
--  ON UPDATE NO ACTION;

CREATE  TABLE IF NOT EXISTS `atk_moreinfo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `page` VARCHAR(255) NULL DEFAULT NULL ,
  `url` VARCHAR(255) NULL DEFAULT NULL ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `is_approved` ENUM('Y','N') NULL DEFAULT 'N' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `atk_moreinfo` 
ADD INDEX `page` (`page` ASC) ;

ALTER TABLE `atk_moreinfo` ADD COLUMN `ord` INT(11) NULL DEFAULT NULL  AFTER `id` 
, ADD INDEX `ord` (`ord` ASC) ;


ALTER TABLE `atk_moreinfo` ADD COLUMN `atk_user_id` INT(11) NOT NULL  AFTER `is_approved` , 
  ADD CONSTRAINT `fk_atk_moreinfo_atk_user1`
  FOREIGN KEY (`atk_user_id` )
  REFERENCES `atk_user` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_atk_moreinfo_atk_user1` (`atk_user_id` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

