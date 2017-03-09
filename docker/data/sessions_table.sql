CREATE TABLE `php_session` (
  `session_id` varchar(32) NOT NULL default '',
  `user_id` varchar(16) default NULL,
  `date_created` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_updated` datetime NOT NULL default '0000-00-00 00:00:00',
  `session_data` longtext,
  PRIMARY KEY  (`session_id`),
  KEY `last_updated` (`last_updated`)
) ENGINE=MyISAM
