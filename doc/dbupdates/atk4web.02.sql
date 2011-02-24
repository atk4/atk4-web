CREATE TABLE `example_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suggestion` text,
  `posted` date DEFAULT NULL,
  `deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

