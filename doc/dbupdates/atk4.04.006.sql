CREATE  TABLE IF NOT EXISTS `atk_video` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `is_public` ENUM('Y','N') NULL DEFAULT NULL ,
  `src` VARCHAR(255) NULL DEFAULT NULL ,
  `descr` TEXT NULL DEFAULT NULL ,
  `type` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `type` (`type` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `atk_video` 
    ADD COLUMN `atk_version` VARCHAR(45) NULL DEFAULT NULL  AFTER `type` , 
    ADD COLUMN `complexity` VARCHAR(45) NULL DEFAULT NULL  AFTER `atk_version` ;

ALTER TABLE `atk_video`
    ADD COLUMN `ord` INT(11) NULL DEFAULT NULL  AFTER `id` ;


INSERT INTO `atk_video` (`id`, `ord`, `name`, `is_public`, `src`, `descr`, `type`, `atk_version`, `complexity`)
VALUES
	(1,3,'Introduction to Agile Toolkit (part 1)','Y','http://files.agiletech.ie/atk4-gita-1.mov','Brief introduction to Agile Toolkit by Romans and Gita.','screencast','4.1','Intro'),
	(2,6,'Introduction to Pages and Multiple Pages','Y','http://files.agiletech.ie/atk4-gita-pages.mov','Introduction to how create linked pages such as those used with Multi-step wizard or multi-tabbed pages.','screencast','4.1','Intro'),
	(3,7,'Project from Zero (Older screencast) Part 1','Y','http://files.agiletech.ie/atk4-zero-start/movie.f4v','Explains how Agile Toolkit execute. Introduces to routing, database use, Models and Controllers.','screencast','4.0','Learner'),
	(5,8,'Project from Zero (Older screencast) Part 2','Y','http://files.agiletech.ie/atk4-zero-start/movie.f4v','Explains how Agile Toolkit execute. Introduces to routing, database use, Models and Controllers.','screencast','4.0','Learner');
    
