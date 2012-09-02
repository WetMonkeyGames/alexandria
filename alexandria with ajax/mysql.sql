CREATE TABLE IF NOT EXISTS `bookCatalog` (
  `id` int(12) NOT NULL,
  `fileName` text NOT NULL,
  `link` text NOT NULL,
  `bookName` text NOT NULL,
  `authorName` text NOT NULL,
  `yearPublished` text NOT NULL,
  `category` text NOT NULL,
  `isbn` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `bookComment` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `link` int(25) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `nickname` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
