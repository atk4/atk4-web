ALTER TABLE `atk_purchase`
    ADD COLUMN `project_type` VARCHAR(10) NULL DEFAULT NULL  AFTER `purchase_ref` , 
    ADD COLUMN `project_info` TEXT NULL DEFAULT NULL  AFTER `project_type` ;

