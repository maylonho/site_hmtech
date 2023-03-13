-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para meu_cardapio
CREATE DATABASE IF NOT EXISTS `meu_cardapio` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `meu_cardapio`;

-- Copiando estrutura para tabela meu_cardapio.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(50) DEFAULT NULL,
  `telefone_empresa` varchar(15) DEFAULT NULL,
  `cnpj_empresa` varchar(15) DEFAULT NULL,
  `email_empresa` varchar(50) DEFAULT NULL,
  `senha_empresa` varchar(50) DEFAULT NULL,
  `url_empresa` varchar(50) DEFAULT NULL,
  `imagem_empresa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela meu_cardapio.empresa: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `telefone_empresa`, `cnpj_empresa`, `email_empresa`, `senha_empresa`, `url_empresa`, `imagem_empresa`) VALUES
	(1, 'Kabuloso', '1338541319', '413123434', 'kabu@hotmail.com', '123', 'kabuloso', 'clientes_kabuloso.png'),
	(2, 'Tia Bete', '1399999999', '87676768', 'tiabete@uol.com.br', '1234', 'tiabete', 'clientes_tiabete.png'),
	(51, 'Beto Lanches', '1390909090', '03123808', 'beto@uol.com.br', '1234', 'betolanches', 'clientes_beto.png');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Copiando estrutura para tabela meu_cardapio.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id_sequencial` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `produto_menu` varchar(30) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `descricao_menu` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `valor_menu` double DEFAULT NULL,
  `secao_menu` varchar(10) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_sequencial`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela meu_cardapio.menu: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id_sequencial`, `id_menu`, `id_empresa`, `produto_menu`, `descricao_menu`, `valor_menu`, `secao_menu`) VALUES
	(8, 19, 2, 'Frango', 'frango assado com arroz e feijao', 21.6, 'Pratos'),
	(9, 20, 1, 'Hot Dog', 'Pao salsicha, maionese, batata palha', 8.5, 'Lanches'),
	(10, 12, 1, 'Hot Duplo', 'Pao salsicha, maionese, batata palha', 21.6, 'Lanches'),
	(11, 11, 2, 'Prato Comercial', 'Arroz, Feijao, bife acebolado, e pure de batata', 26.9, 'Pratos'),
	(12, 10, 1, 'X-Frango', 'X-Salado so que com frango no lugar do hamburgue', 13, 'Lanches'),
	(14, 3, 1, 'CARRO', 'frango assado com arroz e feijao', 50.5, 'Bebidas'),
	(15, 4, 1, 'X-Barbudo', 'Pao de Brioche, calabresa, batata palha, e alface', 15.65, 'Lanches'),
	(16, 5, 51, 'hkjhnkj', 'nknkjbn jhblkh', 78, 'Lanches'),
	(17, 6, 51, 'hjkh', 'njnkj', 8, 'Lanches'),
	(18, 7, 1, 'Frango a', 'ARROZ E FRANGO', 24, 'Pratos'),
	(19, 8, 51, 'kkkkk', 'kmkmkmk', 89, 'Lanches'),
	(21, 21, 51, 'Guarana', 'Lata de 350ml', 5, 'Bebidas'),
	(22, 21, 51, 'Comercial + Bife', 'Arroz, feijao, e carne assada', 23, 'Pratos'),
	(23, 6, 51, 'Fritas Media', 'Porcao de fritas com bacon e cheddar', 10, 'Porcoes'),
	(27, 112, 1, 'Comercial + Bife', 'nlknlnl klnl', 21.6, 'Porcoes'),
	(40, 12, 1, 'tipográçãoxxxxx', 'Os operadores gráficos e tipográficos ferramenta de geração tipográção', 12.43, 'Porcoes');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
