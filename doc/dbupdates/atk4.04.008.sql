ALTER TABLE `atk_survey_1` ADD COLUMN `user_survey_id` INT(11) NULL DEFAULT NULL  AFTER `user_id` , 
  ADD CONSTRAINT `fk_atk_survey_1_atk_user_survey1`
  FOREIGN KEY (`user_survey_id` )
  REFERENCES `atk_user_survey` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_atk_survey_1_atk_user_survey1` (`user_survey_id` ASC) ;

ALTER TABLE `atk_survey` ADD COLUMN `model` VARCHAR(255) NULL DEFAULT NULL  AFTER `is_public` ;

CREATE  TABLE IF NOT EXISTS `atk_user_survey` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) NOT NULL ,
  `survey_id` INT(11) NOT NULL ,
  `is_completed` ENUM('Y','N') NULL DEFAULT NULL ,
  `is_invited` ENUM('Y','N') NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_atk_user_survey_atk_user1` (`user_id` ASC) ,
  INDEX `fk_atk_user_survey_atk_survey1` (`survey_id` ASC) ,
  CONSTRAINT `fk_atk_user_survey_atk_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `atk_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atk_user_survey_atk_survey1`
    FOREIGN KEY (`survey_id` )
    REFERENCES `atk_survey` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `atk_survey_1` DROP FOREIGN KEY `fk_atk_survey_atk_user1` ;

ALTER TABLE `atk_survey_1` 
  ADD CONSTRAINT `fk_atk_survey_atk_user1`
  FOREIGN KEY (`user_id` )
  REFERENCES `atk_user` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `atk_user_survey` CHANGE COLUMN `is_completed` `is_completed` ENUM('Y','N') NULL DEFAULT 'N'  , CHANGE COLUMN `is_invited` `is_invited` ENUM('Y','N') NULL DEFAULT 'N'  ;

