CREATE  TABLE IF NOT EXISTS `atk_survey` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `descr` TEXT NULL DEFAULT NULL ,
  `model` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `atk_survey` ADD COLUMN `is_public` ENUM('Y','N') NULL DEFAULT 'N'  AFTER `model` ;

ALTER TABLE `atk_survey` ADD COLUMN `user_id` INT(11) NOT NULL  AFTER `is_public` , 
  ADD CONSTRAINT `fk_atk_survey_atk_user1`
  FOREIGN KEY (`user_id` )
  REFERENCES `atk_user` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_atk_survey_atk_user1` (`user_id` ASC) ;


ALTER TABLE `atk_survey` ADD COLUMN `created_dts` DATETIME NULL DEFAULT NULL  AFTER `user_id` ;

ALTER TABLE `atk_survey` ADD COLUMN `php_experience` VARCHAR(255) NULL DEFAULT NULL  AFTER `created_dts` , ADD COLUMN `frameworks` VARCHAR(255) NULL DEFAULT NULL  AFTER `php_experience` , ADD COLUMN `languages` VARCHAR(255) NULL DEFAULT NULL  AFTER `frameworks` , ADD COLUMN `oop_level` VARCHAR(255) NULL DEFAULT NULL  AFTER `languages` ;


ALTER TABLE `atk_survey` ADD COLUMN `background` VARCHAR(255) NULL DEFAULT NULL  AFTER `created_dts` ;

ALTER TABLE `atk_survey` ADD COLUMN `atk_progress` VARCHAR(255) NULL DEFAULT NULL  AFTER `oop_level` , ADD COLUMN `atk_continue` VARCHAR(255) NULL DEFAULT NULL  AFTER `atk_progress` , ADD COLUMN `atk_stop_why` VARCHAR(255) NULL DEFAULT NULL  AFTER `atk_continue` , ADD COLUMN `atk_stop_descr` TEXT NULL DEFAULT NULL  AFTER `atk_stop_why` , ADD COLUMN `atk_time` VARCHAR(255) NULL DEFAULT NULL  AFTER `atk_stop_descr` , ADD COLUMN `atk_improve_doc` VARCHAR(255) NULL DEFAULT NULL  AFTER `atk_time` , ADD COLUMN `atk_improve_license` VARCHAR(255) NULL DEFAULT NULL  AFTER `atk_improve_doc` , ADD COLUMN `atk_improve_license_descr` TEXT NULL DEFAULT NULL  AFTER `atk_improve_license` , ADD COLUMN `atk_features` VARCHAR(255) NULL DEFAULT NULL  AFTER `atk_improve_license_descr` , ADD COLUMN `prof_ui` VARCHAR(255) NULL DEFAULT NULL  AFTER `atk_features` , ADD COLUMN `prof_js` VARCHAR(255) NULL DEFAULT NULL  AFTER `prof_ui` , ADD COLUMN `prof_ajax` VARCHAR(255) NULL DEFAULT NULL  AFTER `prof_js` , ADD COLUMN `prof_models` VARCHAR(255) NULL DEFAULT NULL  AFTER `prof_ajax` , ADD COLUMN `prof_views` VARCHAR(255) NULL DEFAULT NULL  AFTER `prof_models` , ADD COLUMN `prof_templates` VARCHAR(255) NULL DEFAULT NULL  AFTER `prof_views` , ADD COLUMN `prof_deploy` VARCHAR(255) NULL DEFAULT NULL  AFTER `prof_templates` , ADD COLUMN `prof_share` VARCHAR(255) NULL DEFAULT NULL  AFTER `prof_deploy` , ADD COLUMN `prof_educate` VARCHAR(255) NULL DEFAULT NULL  AFTER `prof_share` ;

