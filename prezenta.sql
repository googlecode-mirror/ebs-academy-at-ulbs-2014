CREATE TABLE IF NOT EXISTS `prezenta_user` (
`id` int(11)  NULL,
  `id_prezenta` int(11)  NULL,
  `id_user` int(11) NULL
  PRIMARY KEY (`id`)
)

CREATE TABLE IF NOT EXISTS `prezenta` (
`id` int(11)  NULL,
  `id_materie` int(11)  NULL,
  `data` date  NULL,
  `tip_prezenta` varchar(15)  NULL
  PRIMARY KEY (`id`)
)