CREATE TABLE IF NOT EXISTS `prezenta_user` (
`id` int(11) NOT NULL,
  `id_prezenta` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
)

CREATE TABLE IF NOT EXISTS `prezenta` (
`id` int(11) NOT NULL,
  `id_materie` int(11) NOT NULL,
  `data` date NOT NULL,
  `tip_prezenta` varchar(15) NOT NULL
)