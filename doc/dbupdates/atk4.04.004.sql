ALTER TABLE `atk_purchase` 
    ADD COLUMN `expires_dts` VARCHAR(255) NULL DEFAULT NULL  AFTER `domain` , 
    ADD COLUMN `cost` DECIMAL(8,2) NULL DEFAULT NULL  AFTER `expires_dts` ;
ALTER TABLE `atk_purchase` 
    DROP COLUMN `license` , 
    ADD COLUMN `purchase_ref` VARCHAR(255) NULL DEFAULT NULL  AFTER `cost` , 
    CHANGE COLUMN `atk_user_id` `atk_user_id` INT(11) NULL DEFAULT NULL  AFTER `id` , 
    CHANGE COLUMN `datetime` `purchased_dts` DATETIME NULL DEFAULT NULL  AFTER `expires_dts` , 
    CHANGE COLUMN `name` `type` VARCHAR(255) NULL DEFAULT NULL  , 
    CHANGE COLUMN `expires_dts` `expires_dts` DATETIME NULL DEFAULT NULL  ;

ALTER TABLE `atk_purchase` ADD COLUMN `is_paid` ENUM('Y','N') NULL DEFAULT 'N'  AFTER `atk_user_id` ;


