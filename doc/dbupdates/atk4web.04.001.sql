CREATE  TABLE IF NOT EXISTS `atk_user` (
  `id` INT(11) NOT NULL ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `twitter_token` VARCHAR(255) NULL DEFAULT NULL ,
  `google_token` VARCHAR(255) NULL DEFAULT NULL ,
  `facebook_token` VARCHAR(255) NULL DEFAULT NULL ,
  `is_admin` ENUM('Y','N') NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
;
