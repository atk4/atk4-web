ALTER TABLE `atk_user` 
    ADD COLUMN `created_dts` DATETIME NULL DEFAULT NULL  AFTER `token_email` , 
    ADD COLUMN `logged_dts` DATETIME NULL DEFAULT NULL  AFTER `created_dts` ;
