CREATE  TABLE IF NOT EXISTS `atk_maillog` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `from` VARCHAR(255) NULL DEFAULT NULL ,
  `to` VARCHAR(255) NULL DEFAULT NULL ,
  `subject` VARCHAR(255) NULL DEFAULT NULL ,
  `body` TEXT NULL DEFAULT NULL ,
  `headers` TEXT NULL DEFAULT NULL ,
  `user_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_atk_maillog_atk_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_atk_maillog_atk_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `atk_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
