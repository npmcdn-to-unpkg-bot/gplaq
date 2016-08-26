-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para gplac
CREATE DATABASE IF NOT EXISTS `gplac` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gplac`;


-- Copiando estrutura para tabela gplac.objeto
CREATE TABLE IF NOT EXISTS `objeto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(14) NOT NULL,
  `identificador` char(3) DEFAULT NULL,
  `recebido` enum('SIM','NAO') DEFAULT 'NAO',
  `data_lancamento` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_baixa` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela gplac.objeto: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
INSERT INTO `objeto` (`id`, `codigo`, `identificador`, `recebido`, `data_lancamento`, `data_baixa`) VALUES
	(1, '8GBF7269841SU1', 'SU1', 'SIM', '2016-05-29 23:06:27', NULL),
	(2, '8GBF2269908QC1', 'QC1', 'SIM', '2016-05-29 23:06:47', NULL),
	(3, '8GBF3269700UJ1', 'UJ1', 'SIM', '2016-05-30 09:49:07', '2016-06-02 04:06:59'),
	(4, '8GBF6269804SU1', 'SU1', 'SIM', '2016-05-30 09:49:07', '2016-06-02 04:08:39'),
	(5, '8GBF6269703UJ1', 'UJ1', 'SIM', '2016-05-30 09:49:07', '2016-06-02 05:04:56'),
	(6, '8GBF3269504YD1', 'YD1', 'SIM', '2016-05-30 09:49:07', '2016-06-02 05:04:57'),
	(7, '8GBF6269606XP1', 'XP1', 'SIM', '2016-05-30 09:49:07', '2016-06-02 05:04:57'),
	(8, '8GBF8269763FU1', 'FU1', 'SIM', '2016-05-30 09:49:08', '2016-06-02 05:04:57'),
	(9, '8GBF5269493YD1', 'YD1', 'SIM', '2016-05-30 09:49:08', '2016-06-02 05:04:57'),
	(10, '8GBF5269623XP1', 'XP1', 'SIM', '2016-05-30 09:49:08', '2016-06-02 05:04:57'),
	(11, '8GBF1269855DC1', 'DC1', 'SIM', '2016-05-30 09:49:08', '2016-06-02 05:08:50'),
	(12, '8GBF4269750FU1', 'FU1', 'SIM', '2016-05-30 09:49:08', '2016-06-02 05:08:50'),
	(13, '8GBF4269739UJ1', 'UJ1', 'SIM', '2016-05-30 09:49:08', '2016-06-02 05:08:50'),
	(14, '8GBF2269908QC1', 'QC1', 'SIM', '2016-05-30 09:49:08', NULL),
	(15, '8GBF7269841SU1', 'SU1', 'SIM', '2016-05-30 09:49:08', NULL),
	(16, '8GBF2269737UJ1', 'UJ1', 'SIM', '2016-05-30 09:49:08', '2016-06-02 05:08:50'),
	(17, '8GBF7269481YD1', 'YD1', 'NAO', '2016-05-30 09:49:08', NULL),
	(18, '8GBF8269723UJ1', 'UJ1', 'NAO', '2016-05-30 09:49:08', NULL),
	(19, '8GBF1269718UJ1', 'UJ1', 'NAO', '2016-05-30 09:49:08', NULL),
	(20, '8GBF9669763FU1', 'FU1', 'NAO', '2016-06-01 23:18:06', NULL),
	(21, '8GBF9668863FU1', 'FU1', 'NAO', '2016-06-01 23:19:08', NULL),
	(22, '8GBF9678863SU1', 'SU1', 'NAO', '2016-06-01 23:20:19', NULL);
/*!40000 ALTER TABLE `objeto` ENABLE KEYS */;


-- Copiando estrutura para tabela gplac.unidade
CREATE TABLE IF NOT EXISTS `unidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeunidade` varchar(50) NOT NULL,
  `identificador` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela gplac.unidade: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `unidade` DISABLE KEYS */;
INSERT INTO `unidade` (`id`, `nomeunidade`, `identificador`) VALUES
	(1, 'Adrianópolis', 'UJ1'),
	(2, 'Aleixo', 'XXX'),
	(3, 'Cachoeirinha', 'FU1'),
	(4, 'Cidade Nova', 'QC1'),
	(5, 'Flores', 'YD1'),
	(6, 'Manaus', 'XP1'),
	(7, 'Rio Negro', 'SU1'),
	(8, 'São Jose', 'YYY'),
	(9, 'Zona Norte', 'DC1');
/*!40000 ALTER TABLE `unidade` ENABLE KEYS */;


-- Copiando estrutura para tabela gplac.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(8) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela gplac.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
