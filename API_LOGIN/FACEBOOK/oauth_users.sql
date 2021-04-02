CREATE TABLE IF NOT EXISTS `oauth_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(50) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `modified_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

