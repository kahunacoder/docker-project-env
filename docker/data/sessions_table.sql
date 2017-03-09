CREATE TABLE `php_session` (
  `session_id` varchar(32) NOT NULL default '',
  `user_id` varchar(16) default NULL,
  `date_created` datetime NOT NULL default '1970-01-01 00:00:01',
  `last_updated` datetime NOT NULL default '1970-01-01 00:00:01',
  `session_data` longtext,
  PRIMARY KEY  (`session_id`),
  KEY `last_updated` (`last_updated`)
) ENGINE=MyISAM
