
-- Listage de la structure de table DeckX
CREATE TABLE IF NOT EXISTS `DeckX` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `passwd` varchar(255) NOT NULL DEFAULT '',
  `img_path` varchar(255) NOT NULL DEFAULT '"',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11;

-- Listage des données de la table DeckX:
INSERT INTO `DeckX` (`id`, `name`, `passwd`, `img_path`) VALUES
	(1, 'admin', 'jqygvfysdqvfbdsbfsdfgb', '/mateo/src/img/chat.svg'),
	(3, 'Patrick', 'dfggdwsgfgf', 'patelamouche.gmail.com'),
	(4, 'FLAG', 'fghfghgfhcf', 'project/CTF.txt'),
	(5, 'Axel', 'cxbvcxbxc', 'pelote'),
	(6, 'Lorenzo', 'lolocbvcxbvx', '/mateo/src/img/chat.svg'),
	(7, 'Mateo', 'mamcvbcbvcbvat', 'script.js'),
	(8, 'Loic', 'dfgdfgd', 'event'),
	(9, 'Enzo', 'dfgdfgdfndb', '/src/layout/header.jsx'),
	(10, '', '', '"');
