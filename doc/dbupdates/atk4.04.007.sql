ALTER TABLE `atk_survey` ADD COLUMN `is_completed` ENUM('Y','N') NULL DEFAULT 'Y'  AFTER `prof_educate` ;
ALTER TABLE `atk_survey` RENAME TO  `atk4`.`atk_survey_1` ;

ALTER TABLE `atk_survey_1` DROP COLUMN `is_public` , DROP COLUMN `model` , DROP COLUMN `descr` , DROP COLUMN `name` ;

CREATE  TABLE IF NOT EXISTS `atk_survey` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `descr` TEXT NULL DEFAULT NULL ,
  `page` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `atk_survey` ADD COLUMN `is_public` ENUM('Y','N') NULL DEFAULT NULL  AFTER `page` ;

