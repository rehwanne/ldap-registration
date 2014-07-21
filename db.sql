

CREATE TABLE IF NOT EXISTS `regs` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
