-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema gesterra
--

CREATE DATABASE IF NOT EXISTS gesterra;
USE gesterra;

--
-- Definition of table `adesao_processo`
--

DROP TABLE IF EXISTS `adesao_processo`;
CREATE TABLE `adesao_processo` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_processo` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adesao_processo`
--

/*!40000 ALTER TABLE `adesao_processo` DISABLE KEYS */;
/*!40000 ALTER TABLE `adesao_processo` ENABLE KEYS */;


--
-- Definition of table `admin_processo`
--

DROP TABLE IF EXISTS `admin_processo`;
CREATE TABLE `admin_processo` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_num_processo_admin` int(10) DEFAULT NULL,
  `_id_processo` int(10) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_processo`
--

/*!40000 ALTER TABLE `admin_processo` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_processo` ENABLE KEYS */;


--
-- Definition of table `administracao_municipal`
--

DROP TABLE IF EXISTS `administracao_municipal`;
CREATE TABLE `administracao_municipal` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_localizacao` int(11) NOT NULL,
  `_nome` varchar(100) NOT NULL,
  `_estado` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administracao_municipal`
--

/*!40000 ALTER TABLE `administracao_municipal` DISABLE KEYS */;
INSERT INTO `administracao_municipal` (`_id`,`_id_localizacao`,`_nome`,`_estado`) VALUES 
 (1,1,'Administração Municipal de Cacuaco',1),
 (2,2,'Administração Municipal de Belas',1),
 (3,3,'Administra&ccedil;&atilde;o Municipal do Sumbe',0),
 (4,4,'Administra&ccedil;&atilde;o Municipal do Ambo&iacute;m',1),
 (5,5,'Administra&ccedil;&atilde;o Municipal do Cazenga',1);
/*!40000 ALTER TABLE `administracao_municipal` ENABLE KEYS */;


--
-- Definition of table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_utilizador` int(10) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrador`
--

/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`_id`,`_id_utilizador`) VALUES 
 (1,9);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;


--
-- Definition of table `assunto`
--

DROP TABLE IF EXISTS `assunto`;
CREATE TABLE `assunto` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_assunto` varchar(30) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assunto`
--

/*!40000 ALTER TABLE `assunto` DISABLE KEYS */;
INSERT INTO `assunto` (`_id`,`_assunto`) VALUES 
 (1,'Direito de Superfície'),
 (2,'Licença de Construção'),
 (3,'Vedação e Ocupação');
/*!40000 ALTER TABLE `assunto` ENABLE KEYS */;


--
-- Definition of table `bairro`
--

DROP TABLE IF EXISTS `bairro`;
CREATE TABLE `bairro` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_nome` varchar(70) NOT NULL,
  `_id_comuna` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bairro`
--

/*!40000 ALTER TABLE `bairro` DISABLE KEYS */;
INSERT INTO `bairro` (`_id`,`_nome`,`_id_comuna`) VALUES 
 (1,'Bairro dos Pescadores',1),
 (2,'Conoco',1),
 (3,'Vidrul',1),
 (4,'Cerâmica',1),
 (5,'Boa Esperança I',2),
 (6,'Sequele',1),
 (7,'Vila',1),
 (8,'Imbondeiros',1),
 (9,'Salinas',1),
 (10,'4 de Fevereiro',1),
 (11,'Belo Monte',1),
 (12,'Pedreira',1);
/*!40000 ALTER TABLE `bairro` ENABLE KEYS */;


--
-- Definition of table `cga`
--

DROP TABLE IF EXISTS `cga`;
CREATE TABLE `cga` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_utilizador` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cga`
--

/*!40000 ALTER TABLE `cga` DISABLE KEYS */;
INSERT INTO `cga` (`_id`,`_id_utilizador`) VALUES 
 (1,8);
/*!40000 ALTER TABLE `cga` ENABLE KEYS */;


--
-- Definition of table `cidadao`
--

DROP TABLE IF EXISTS `cidadao`;
CREATE TABLE `cidadao` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_requerente` int(11) NOT NULL,
  `_num_bi` varchar(20) NOT NULL,
  `_data_emissao` date NOT NULL,
  `_data_nascimento` date NOT NULL,
  `_nacionalidade` int(11) NOT NULL,
  `_estado_civil` varchar(20) NOT NULL,
  `_genero` varchar(4) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cidadao`
--

/*!40000 ALTER TABLE `cidadao` DISABLE KEYS */;
INSERT INTO `cidadao` (`_id`,`_id_requerente`,`_num_bi`,`_data_emissao`,`_data_nascimento`,`_nacionalidade`,`_estado_civil`,`_genero`) VALUES 
 (1,1,'008239937HO834','0000-00-00','1999-12-06',6,'casado','f'),
 (2,2,'000439916UE012','0000-00-00','1960-05-09',6,'solteiro','m'),
 (3,3,'002324787LA029','0000-00-00','1999-12-01',6,'casado','m'),
 (4,3,'002324787LA029','0000-00-00','1999-12-01',6,'casado','m'),
 (5,4,'000432661ME097','0000-00-00','1981-06-17',6,'casado','m'),
 (6,5,'000323448LN001','0000-00-00','1961-03-01',6,'casado','m'),
 (7,6,'8348748','0000-00-00','1998-12-28',1,'casado','f'),
 (8,6,'003774004LN303','0000-00-00','1961-03-08',6,'casado','m');
/*!40000 ALTER TABLE `cidadao` ENABLE KEYS */;


--
-- Definition of table `comuna`
--

DROP TABLE IF EXISTS `comuna`;
CREATE TABLE `comuna` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_nome` varchar(80) NOT NULL,
  `_id_municipio` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comuna`
--

/*!40000 ALTER TABLE `comuna` DISABLE KEYS */;
INSERT INTO `comuna` (`_id`,`_nome`,`_id_municipio`) VALUES 
 (1,'Cacuaco',1),
 (2,'Quicolo',1),
 (3,'Funda',1),
 (4,'Gabela',2),
 (5,'Cabinda',29),
 (6,'Malembo',29),
 (7,'Tando-Zinze',29),
 (8,'Viana',17),
 (9,'Calumbo',17),
 (10,'Cazenga',13),
 (11,'Tala Hady',13),
 (12,'Cazombo',58),
 (13,'Kavungo',58),
 (14,'Kaianda',58),
 (15,'Lóvua',58),
 (16,'Kalunda',58),
 (17,'Macondo',58),
 (18,'Lumbala-Kakengue',58),
 (19,'Gabela',2),
 (20,'Assango',2),
 (21,'Nova Caipenba',130),
 (22,'Quipedro',130),
 (23,'Bailundo',68),
 (24,'Lunge',68),
 (25,'Luvemba',68),
 (26,'Bimbe',68),
 (27,'Hengue.',68),
 (28,'Balombo',18),
 (29,'  Chindumbo',18),
 (30,'Chingongo',18),
 (31,'Maka Mombolo',18),
 (32,'Bembe',131),
 (33,'Mabaia',131),
 (34,'Lukunga',131),
 (35,'Zona A',20),
 (36,'Zona B',20),
 (37,', Zona C',20),
 (38,'Zona D',20),
 (39,' Zona E',20),
 (40,'Zona F',20),
 (41,'Bibala-Sede',10),
 (42,'Caitou',10),
 (43,'Lola',10),
 (44,'Kapagombe',10),
 (45,' Terreiro',43),
 (46,'Terreiro Kiquiemba',43),
 (47,'Cuilo Cambozo',132),
 (48,'Nova Esperança ',132),
 (49,'Quimbianda',132),
 (50,'Lumbala Nguimbo',51),
 (51,'Luvuei',51),
 (52,'Lutembo',51),
 (53,'Sessa',51),
 (54,'Mussuma',51),
 (55,'Ninda',51),
 (56,'Chiume',51),
 (57,'Cacolo',86),
 (58,'Alto Chicapa',86),
 (59,'Xassengue',86),
 (60,'Cucumbi',86),
 (61,'Caconda',101),
 (62,'Gungui',101),
 (63,'Uaba',101),
 (64,'Cusse',101),
 (65,'Capelo ',30),
 (66,' Dinge',30),
 (67,'Massabi.',30),
 (68,'Kacuso',147),
 (69,'Lombe',147),
 (70,'Quizenga ',147),
 (71,'Pungo-Andongo',147),
 (72,'Cahama ',119),
 (73,'Otchindjau',119),
 (74,'Canhamela',22),
 (75,'Catengue',22),
 (76,'Cayave',22),
 (77,'Wiyangombe',22);
/*!40000 ALTER TABLE `comuna` ENABLE KEYS */;


--
-- Definition of table `confronto`
--

DROP TABLE IF EXISTS `confronto`;
CREATE TABLE `confronto` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_relatorio` int(11) NOT NULL,
  `_nordeste` longtext NOT NULL,
  `_sudeste` longtext NOT NULL,
  `_sudoeste` longtext NOT NULL,
  `_noroeste` longtext NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confronto`
--

/*!40000 ALTER TABLE `confronto` DISABLE KEYS */;
INSERT INTO `confronto` (`_id`,`_id_relatorio`,`_nordeste`,`_sudeste`,`_sudoeste`,`_noroeste`) VALUES 
 (1,1,'2+ tendo o ponto +A +32 / 323+ e o ponto +B +76 / 767. +gffffffffgf','435+ tendo o ponto +B +434 / 443+ e o ponto +C +43 / 545. +68798','34+ tendo o ponto +C +434 / 22+ e o ponto +D +23 / 09. +sdfdsfsd','232+ tendo o ponto +D +232 / 232+ e o ponto +A +5456 / 767. +fgdghfd');
/*!40000 ALTER TABLE `confronto` ENABLE KEYS */;


--
-- Definition of table `conta`
--

DROP TABLE IF EXISTS `conta`;
CREATE TABLE `conta` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_telefone` varchar(50) DEFAULT NULL,
  `_utilizador` varchar(50) DEFAULT NULL,
  `_senha` varchar(50) DEFAULT NULL,
  `_estado` int(11) DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `uq_conta_fone` (`_telefone`),
  UNIQUE KEY `uq_conta_user` (`_utilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conta`
--

/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
INSERT INTO `conta` (`_id`,`_telefone`,`_utilizador`,`_senha`,`_estado`,`_id_utilizador`) VALUES 
 (1,'+244 996 198 371','matondo.quela','b6a604ed117a24697b0a89e2e2950d88',1,1),
 (2,'+244 937 653 100','edson.viegas','b6a604ed117a24697b0a89e2e2950d88',1,2),
 (3,'+244 923 734 384','joao.olli','b6a604ed117a24697b0a89e2e2950d88',1,3),
 (4,'+244 923 839 208','elvio.sousa','b6a604ed117a24697b0a89e2e2950d88',1,4),
 (5,'+244 922 081 036','jorge.campos','b6a604ed117a24697b0a89e2e2950d88',1,5),
 (6,'+244 937 283 239','osvaldo.jeronimo','b6a604ed117a24697b0a89e2e2950d88',1,6),
 (7,'+244 023 832 823','joao.baptista','b6a604ed117a24697b0a89e2e2950d88',1,7),
 (8,'+244 934 700 124','lukau.garcia','b6a604ed117a24697b0a89e2e2950d88',1,8),
 (9,'+244 923 766 125','jorge.coelho','b6a604ed117a24697b0a89e2e2950d88',1,9),
 (10,'+244 455 555 555','sadoc.sousa','b6a604ed117a24697b0a89e2e2950d88',1,10),
 (11,'+244 923 435 560','alice.coelho','b6a604ed117a24697b0a89e2e2950d88',1,11),
 (12,'+244 992 344 567','paulo.miguel','b6a604ed117a24697b0a89e2e2950d88',1,12),
 (13,'+244 927 443 399','maria.joao','b6a604ed117a24697b0a89e2e2950d88',1,13),
 (14,'+244 919 273 648','joao.tecnico','b6a604ed117a24697b0a89e2e2950d88',1,14),
 (15,'+244 992 345 887','miguel.tecnico','b6a604ed117a24697b0a89e2e2950d88',1,15);
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;


--
-- Definition of table `control_cred`
--

DROP TABLE IF EXISTS `control_cred`;
CREATE TABLE `control_cred` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_utilizador` int(11) NOT NULL,
  `_estado` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `control_cred`
--

/*!40000 ALTER TABLE `control_cred` DISABLE KEYS */;
INSERT INTO `control_cred` (`_id`,`_id_utilizador`,`_estado`) VALUES 
 (1,1,1),
 (2,2,0),
 (3,3,1),
 (4,4,1),
 (5,5,0),
 (6,6,0),
 (7,7,1),
 (8,8,0),
 (9,9,0),
 (10,10,0),
 (11,11,0),
 (12,12,0),
 (13,13,0),
 (14,13,0),
 (15,13,0),
 (16,13,0),
 (17,13,0),
 (18,14,0),
 (19,15,0);
/*!40000 ALTER TABLE `control_cred` ENABLE KEYS */;


--
-- Definition of table `crguuc`
--

DROP TABLE IF EXISTS `crguuc`;
CREATE TABLE `crguuc` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_utilizador` int(10) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crguuc`
--

/*!40000 ALTER TABLE `crguuc` DISABLE KEYS */;
INSERT INTO `crguuc` (`_id`,`_id_utilizador`) VALUES 
 (1,10),
 (2,10),
 (3,10),
 (4,10),
 (5,10),
 (6,11);
/*!40000 ALTER TABLE `crguuc` ENABLE KEYS */;


--
-- Definition of table `crop`
--

DROP TABLE IF EXISTS `crop`;
CREATE TABLE `crop` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_utilizador` int(10) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crop`
--

/*!40000 ALTER TABLE `crop` DISABLE KEYS */;
/*!40000 ALTER TABLE `crop` ENABLE KEYS */;


--
-- Definition of table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_perfil` varchar(255) NOT NULL,
  `_descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `uq_grupo` (`_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamento`
--

/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` (`_id`,`_perfil`,`_descricao`) VALUES 
 (1,'Reparticao das Obras Publicas','Teste descricao'),
 (2,'Reparticao de Urbanismo e Cadastro','Teste descricao'),
 (3,'Reparticao de Gestao de Imobiliario','Teste descricao'),
 (4,'Secretaria Geral','Teste descricao'),
 (5,'Administracao Municipal','Teste descricao'),
 (6,'DMGUUC','Teste descricao'),
 (7,'Tecnologia e Informação','Teste descricao');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;


--
-- Definition of table `divisao_terreno`
--

DROP TABLE IF EXISTS `divisao_terreno`;
CREATE TABLE `divisao_terreno` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_mudanc_ter` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisao_terreno`
--

/*!40000 ALTER TABLE `divisao_terreno` DISABLE KEYS */;
/*!40000 ALTER TABLE `divisao_terreno` ENABLE KEYS */;


--
-- Definition of table `dmguuc`
--

DROP TABLE IF EXISTS `dmguuc`;
CREATE TABLE `dmguuc` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_utilizador` int(10) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dmguuc`
--

/*!40000 ALTER TABLE `dmguuc` DISABLE KEYS */;
INSERT INTO `dmguuc` (`_id`,`_id_utilizador`) VALUES 
 (1,10),
 (2,10);
/*!40000 ALTER TABLE `dmguuc` ENABLE KEYS */;


--
-- Definition of table `documento`
--

DROP TABLE IF EXISTS `documento`;
CREATE TABLE `documento` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_nome` varchar(50) DEFAULT NULL,
  `_descricao` varchar(255) NOT NULL,
  `_status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documento`
--

/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` (`_id`,`_nome`,`_descricao`,`_status`) VALUES 
 (1,'Requerimento','Teste de inserção','1'),
 (2,'Croqu&iacute;s de Localização','Teste de inserção','1'),
 (3,'Bilhete de Identidade','Documento de Identificação','1'),
 (4,'Fotografia','Teste de inserção','1'),
 (5,'Certid&atilde;o','Teste de inserção','1'),
 (6,'Di&aacute;rio da Rep&uacute;blica','Teste de inserção','1'),
 (7,'Cart&atilde;o de Contribuinte','Teste de inserção','1');
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;


--
-- Definition of table `documento_processo`
--

DROP TABLE IF EXISTS `documento_processo`;
CREATE TABLE `documento_processo` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_documento` int(11) NOT NULL,
  `_id_processo` int(11) NOT NULL,
  `_foto` varchar(100) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documento_processo`
--

/*!40000 ALTER TABLE `documento_processo` DISABLE KEYS */;
INSERT INTO `documento_processo` (`_id`,`_id_documento`,`_id_processo`,`_foto`) VALUES 
 (1,1,1,'onyx-d7408feb88a624ec3ef3958f8f5618c0.jpg'),
 (2,2,1,'onyx-37700ca66159698c503373328fae28ba.jpg'),
 (3,3,1,'onyx-4c9a799fcffd0566a2ef4ff4a2662a26.jpg'),
 (4,4,1,'onyx-f8d7d650beb2fe53cbb6f107f423ffb8.jpg'),
 (5,1,2,'onyx-cc38b26dd826ede9d4c09deb3d23b962.jpg'),
 (6,2,2,'onyx-90f09dd9d9b2625eaca4c5b5de457730.jpg'),
 (7,3,2,'onyx-60cc260a905fa1cde9d11f2a60eb292b.jpg'),
 (8,4,2,'onyx-c1e7ea33f9a412b36b28029d5d4b795c.jpg'),
 (9,1,3,'onyx-1d00d5182739b3290a6352b39073e729.jpg'),
 (10,2,3,'onyx-e9cdd871d5316693a4f88aeab2a6e831.jpg'),
 (11,3,3,'onyx-f1ad2373e263140a8c675169b07f44ee.jpg'),
 (12,4,3,'onyx-d634212b459c38b209db949bae84de0e.jpg'),
 (13,1,4,'onyx-bf44a07c807149df07157ff62d56596f.jpg'),
 (14,2,4,'onyx-1bf7630961177ec91673db41399ed501.jpg'),
 (15,3,4,'onyx-e12d76bc0219cfea8192bcd92268210f.jpg'),
 (16,4,4,'onyx-24eaf6e6436fa27f259ea6f4ffcd0984.jpg'),
 (17,1,5,'onyx-1cb0052037d1f0d35374f8c42b723b6a.jpg'),
 (18,2,5,'onyx-4c8a65d34976cf39e47fcb3eab8c87aa.jpg'),
 (19,3,5,'onyx-db773bef99659a84f69de1df6b7e3a1f.jpg'),
 (20,4,5,'onyx-6309fa2b1c4dbfb91d1164cf82d0a20a.jpg'),
 (21,1,6,'onyx-eb3b7ff2516027cce4bd15345060c1d0.jpg'),
 (22,1,7,'onyx-7f2d3c5628a1e93ccc3e8038434fef67.jpg'),
 (23,2,7,'onyx-690e2b9e5b6ca817b9ba2de3e434c5e4.jpg'),
 (24,3,7,'onyx-acc24150064edb131e046a7783c36206.jpg'),
 (25,4,7,'onyx-fc784418012dc928f77b2c883f8265ab.jpg'),
 (26,1,8,'onyx-4ad9ca897a2e9f2cb1d51bcb81746009.jpg'),
 (27,3,8,'onyx-969cedac6a045021158ea1b226379314.jpg'),
 (28,4,8,'onyx-d8f95908097e03bf1cec7092d3777565.jpg');
/*!40000 ALTER TABLE `documento_processo` ENABLE KEYS */;


--
-- Definition of table `elemento_mac`
--

DROP TABLE IF EXISTS `elemento_mac`;
CREATE TABLE `elemento_mac` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_objecto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elemento_mac`
--

/*!40000 ALTER TABLE `elemento_mac` DISABLE KEYS */;
/*!40000 ALTER TABLE `elemento_mac` ENABLE KEYS */;


--
-- Definition of table `entradasaida`
--

DROP TABLE IF EXISTS `entradasaida`;
CREATE TABLE `entradasaida` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_data` date NOT NULL,
  `_descOrg` varchar(15) NOT NULL,
  `_idOrg` int(11) NOT NULL,
  `_descDest` varchar(15) NOT NULL,
  `_idDest` int(11) NOT NULL,
  `_id_processo` int(11) NOT NULL,
  `_estado` varchar(15) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entradasaida`
--

/*!40000 ALTER TABLE `entradasaida` DISABLE KEYS */;
INSERT INTO `entradasaida` (`_id`,`_data`,`_descOrg`,`_idOrg`,`_descDest`,`_idDest`,`_id_processo`,`_estado`) VALUES 
 (1,'2017-08-20','saida',3,'entrada',8,2,'0'),
 (2,'2017-09-03','saida',3,'entrada',8,3,'0'),
 (3,'2017-09-03','saida',3,'entrada',8,4,'0'),
 (4,'2017-09-03','saida',8,'entrada',9,3,'0'),
 (5,'2017-09-03','saida',9,'entrada',8,3,'0'),
 (6,'2017-09-03','saida',8,'entrada',10,3,'0'),
 (7,'2017-09-04','saida',10,'entrada',11,3,'0'),
 (8,'2017-09-04','saida',11,'entrada',12,3,'0'),
 (9,'2017-09-08','saida',3,'entrada',8,5,'0'),
 (10,'2017-09-11','saida',3,'entrada',8,6,'0'),
 (11,'2017-09-11','saida',3,'entrada',8,7,'0'),
 (12,'2017-09-11','saida',3,'entrada',8,8,'0'),
 (13,'2017-09-11','saida',12,'entrada',11,3,'0'),
 (14,'2017-09-11','saida',8,'entrada',9,6,'0'),
 (15,'2017-09-11','saida',9,'entrada',8,6,'0'),
 (16,'2017-09-11','saida',8,'entrada',10,6,'0'),
 (17,'2017-09-11','saida',10,'entrada',11,6,'0'),
 (18,'2017-09-11','saida',11,'entrada',12,6,'0'),
 (19,'2017-09-11','saida',11,'entrada',15,3,'0');
/*!40000 ALTER TABLE `entradasaida` ENABLE KEYS */;


--
-- Definition of table `fase`
--

DROP TABLE IF EXISTS `fase`;
CREATE TABLE `fase` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_fase` int(11) NOT NULL,
  `_descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fase`
--

/*!40000 ALTER TABLE `fase` DISABLE KEYS */;
INSERT INTO `fase` (`_id`,`_fase`,`_descricao`) VALUES 
 (1,1,'Conhecimento'),
 (2,2,'Andamento'),
 (3,3,'Final');
/*!40000 ALTER TABLE `fase` ENABLE KEYS */;


--
-- Definition of table `file_relatorio`
--

DROP TABLE IF EXISTS `file_relatorio`;
CREATE TABLE `file_relatorio` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_relatorio` int(11) NOT NULL,
  `_path` varchar(500) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_relatorio`
--

/*!40000 ALTER TABLE `file_relatorio` DISABLE KEYS */;
INSERT INTO `file_relatorio` (`_id`,`_id_relatorio`,`_path`) VALUES 
 (1,1,'onyx-47b339773a8dc2041f1945a7c4d98773.pdf');
/*!40000 ALTER TABLE `file_relatorio` ENABLE KEYS */;


--
-- Definition of table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_perfil` varchar(255) NOT NULL,
  `_id_departamento` int(11) NOT NULL,
  `_sigla` varchar(14) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupo`
--

/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` (`_id`,`_perfil`,`_id_departamento`,`_sigla`) VALUES 
 (1,'Tecnico',1,'TROP'),
 (2,'Tecnico',3,'TRGI'),
 (3,'Tecnico',2,'TRUC'),
 (4,'Secretario',4,'SSG'),
 (5,'Chefe',1,'CROP'),
 (6,'Chefe',3,'CRGI'),
 (7,'Chefe',2,'CRUC'),
 (8,'Director',6,'DDMGUUC'),
 (9,'Administrador',5,'AAM'),
 (10,'Chefe do Gabinete',5,'CAM'),
 (11,'Admin TI',7,'AT');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;


--
-- Definition of table `legalizacao_processo`
--

DROP TABLE IF EXISTS `legalizacao_processo`;
CREATE TABLE `legalizacao_processo` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_processo` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legalizacao_processo`
--

/*!40000 ALTER TABLE `legalizacao_processo` DISABLE KEYS */;
/*!40000 ALTER TABLE `legalizacao_processo` ENABLE KEYS */;


--
-- Definition of table `ligacao`
--

DROP TABLE IF EXISTS `ligacao`;
CREATE TABLE `ligacao` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_data` date DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  `_id_utente` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ligacao`
--

/*!40000 ALTER TABLE `ligacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `ligacao` ENABLE KEYS */;


--
-- Definition of table `localizacao`
--

DROP TABLE IF EXISTS `localizacao`;
CREATE TABLE `localizacao` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_provincia` int(11) DEFAULT NULL,
  `_id_municipio` int(11) DEFAULT NULL,
  `_id_comuna` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localizacao`
--

/*!40000 ALTER TABLE `localizacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `localizacao` ENABLE KEYS */;


--
-- Definition of table `localizacao_municipio`
--

DROP TABLE IF EXISTS `localizacao_municipio`;
CREATE TABLE `localizacao_municipio` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_provincia` int(11) NOT NULL,
  `_id_municipio` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localizacao_municipio`
--

/*!40000 ALTER TABLE `localizacao_municipio` DISABLE KEYS */;
INSERT INTO `localizacao_municipio` (`_id`,`_id_provincia`,`_id_municipio`) VALUES 
 (1,1,1),
 (2,1,12),
 (3,2,40),
 (4,2,2),
 (5,1,13);
/*!40000 ALTER TABLE `localizacao_municipio` ENABLE KEYS */;


--
-- Definition of table `mac`
--

DROP TABLE IF EXISTS `mac`;
CREATE TABLE `mac` (
  `_Id` int(11) NOT NULL AUTO_INCREMENT,
  `_sujeito` varchar(50) DEFAULT NULL,
  `_objecto` varchar(50) DEFAULT NULL,
  `_accao` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mac`
--

/*!40000 ALTER TABLE `mac` DISABLE KEYS */;
/*!40000 ALTER TABLE `mac` ENABLE KEYS */;


--
-- Definition of table `mac_area`
--

DROP TABLE IF EXISTS `mac_area`;
CREATE TABLE `mac_area` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_area` varchar(50) DEFAULT NULL,
  `_accao` varchar(10) DEFAULT NULL,
  `_id_mac` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `_id_mac` (`_id_mac`),
  CONSTRAINT `mac_area_ibfk_1` FOREIGN KEY (`_id_mac`) REFERENCES `mac` (`_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mac_area`
--

/*!40000 ALTER TABLE `mac_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `mac_area` ENABLE KEYS */;


--
-- Definition of table `master_admin`
--

DROP TABLE IF EXISTS `master_admin`;
CREATE TABLE `master_admin` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_utilizador` int(11) NOT NULL,
  `_id_admin` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_admin`
--

/*!40000 ALTER TABLE `master_admin` DISABLE KEYS */;
INSERT INTO `master_admin` (`_id`,`_id_utilizador`,`_id_admin`) VALUES 
 (1,1,1),
 (2,2,2),
 (3,4,4),
 (4,6,5);
/*!40000 ALTER TABLE `master_admin` ENABLE KEYS */;


--
-- Definition of table `morada`
--

DROP TABLE IF EXISTS `morada`;
CREATE TABLE `morada` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_provincia` int(11) DEFAULT NULL,
  `_id_municipio` int(11) DEFAULT NULL,
  `_id_comuna` int(11) DEFAULT NULL,
  `_id_bairro` int(11) DEFAULT NULL,
  `_id_rua` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `morada`
--

/*!40000 ALTER TABLE `morada` DISABLE KEYS */;
INSERT INTO `morada` (`_id`,`_id_provincia`,`_id_municipio`,`_id_comuna`,`_id_bairro`,`_id_rua`) VALUES 
 (1,1,1,1,1,1),
 (2,1,1,1,1,1),
 (3,1,1,1,1,1),
 (4,1,1,1,6,3),
 (5,1,1,2,5,2),
 (6,1,1,1,6,4),
 (7,1,1,1,1,1),
 (8,1,1,1,1,1),
 (9,1,1,1,1,1),
 (10,1,1,2,5,2),
 (11,1,1,2,5,5),
 (12,1,1,1,6,4),
 (13,1,1,2,5,5),
 (14,1,1,1,6,3),
 (23,1,1,1,6,3),
 (24,1,1,2,5,2),
 (25,1,1,1,6,3),
 (26,1,1,2,5,2),
 (27,1,1,1,1,1),
 (28,1,1,2,5,5),
 (29,1,1,2,5,2),
 (30,1,1,1,1,1),
 (31,1,1,2,5,5);
/*!40000 ALTER TABLE `morada` ENABLE KEYS */;


--
-- Definition of table `mudanca_processo`
--

DROP TABLE IF EXISTS `mudanca_processo`;
CREATE TABLE `mudanca_processo` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_processo` int(11) NOT NULL,
  `_id_proc_legal` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mudanca_processo`
--

/*!40000 ALTER TABLE `mudanca_processo` DISABLE KEYS */;
/*!40000 ALTER TABLE `mudanca_processo` ENABLE KEYS */;


--
-- Definition of table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE `municipio` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_nome` varchar(50) DEFAULT NULL,
  `_id_provincia` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipio`
--

/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` (`_id`,`_nome`,`_id_provincia`) VALUES 
 (1,'Cacuaco',1),
 (2,'Amboím',2),
 (3,'Andulo',14),
 (4,'Camacupa',14),
 (5,'Catabola',14),
 (6,'Chinguar',14),
 (7,'Chitembo',14),
 (8,'Cuemba',14),
 (9,'Cuito',14),
 (10,'Cunhinga',14),
 (11,'Nharêa',14),
 (12,'Belas',1),
 (13,'Cazenga',1),
 (14,'Icolo e Bengo',1),
 (15,'Luanda',1),
 (16,'Quissama',1),
 (17,'Viana',1),
 (18,'Balombo',4),
 (19,'Baía Farta',4),
 (20,'Benguela',4),
 (21,'Bocoio',4),
 (22,'Caimbambo',4),
 (23,'Chongorói',4),
 (24,'Cubal',4),
 (25,'Lobito',4),
 (26,'Ganda',4),
 (27,' Belize',13),
 (28,'Buco-Zau',13),
 (29,'Cabinda',13),
 (30,'Cacongo',13),
 (31,'Cassongue',2),
 (32,'Cela',2),
 (33,'Conda',2),
 (34,'Ebo',2),
 (35,'Libolo',2),
 (36,'Mussende',2),
 (37,'Quibala',2),
 (38,'Quilenda',2),
 (39,'Seles',2),
 (40,'Sumbe',2),
 (41,'Ambaca',3),
 (42,'Banga',3),
 (43,'Bolongongo',3),
 (44,'Cambambe',3),
 (45,'Golungo Alto',3),
 (46,'Gonguembo',3),
 (47,'Lucala',3),
 (49,'Quiculungo',3),
 (50,'Samba Caju',3),
 (51,'Bundas',5),
 (52,'Camanongue',5),
 (53,'Luacano',5),
 (54,'Luau',5),
 (55,'Luchazes',5),
 (56,'Leua',5),
 (57,'Moxico',5),
 (58,'Alto Zambeze',3),
 (59,'Catchiungo',6),
 (60,'Caála',6),
 (61,'Ekunha',6),
 (62,'Huambo',6),
 (63,'Londuimbale',6),
 (64,'Mungo',6),
 (65,'Tchicala-Tcholoanga',6),
 (66,'Ucuma',6),
 (67,'Tchindjenje',6),
 (68,'Bailundo',6),
 (69,'Calai',7),
 (70,'Cuangar',7),
 (71,'Cuchi',7),
 (72,'Cuito Cuanavale',7),
 (73,'Dirico',7),
 (74,'Longa',7),
 (75,'Mavinga',7),
 (76,'Menongue',7),
 (77,'Rivungo',7),
 (78,'Cambulo',8),
 (79,'Capenda-Camulemba',8),
 (80,'Caungula',8),
 (81,'Chitato',8),
 (82,'Cuango',8),
 (83,'Cuilo',8),
 (84,'Lubalo',8),
 (85,'Xá-Muteba',8),
 (86,'Cacolo',9),
 (87,'Dala',9),
 (88,'Muconda',9),
 (89,'Saurimo',9),
 (90,'Namibe',10),
 (91,'Virei',10),
 (92,'Tômbua',10),
 (93,'Bibala',10),
 (94,'Camucuio',10),
 (95,'Ambriz',11),
 (96,'Bula Atumba',11),
 (97,'Dande',11),
 (98,'Dembos',11),
 (99,'Nambuangongo',11),
 (100,'Pango Aluquém',11),
 (101,'Caconda',12),
 (102,'Caluquembe',12),
 (103,'Chiange',12),
 (104,'Chibia',12),
 (105,'Chicomba',12),
 (106,'Chipindo',12),
 (107,'Cuvango',12),
 (108,'Humpata',12),
 (109,'Jamba',12),
 (110,'Lubango',12),
 (111,'Matala',12),
 (112,'Quilengues',12),
 (113,'Quipungo',12),
 (114,'Cuanhama',15),
 (115,'Curoca',15),
 (116,'Cuvelai',15),
 (117,'Namacunde',15),
 (118,'Ombadja',15),
 (119,'Cahama',13),
 (120,'Mucaba',16),
 (121,'Negage',16),
 (122,'Puri',16),
 (123,'Quimbele',16),
 (124,'Quitexe',16),
 (125,'Sanza Pombo',16),
 (126,'Songo',16),
 (127,'Uíge',16),
 (128,'Zombo',16),
 (129,'Alto Cauale',16),
 (130,'Ambuila',16),
 (131,'Bembe',16),
 (132,'Buengas',16),
 (133,'Damba',16),
 (134,'Macocola',16),
 (135,'Soyo',17),
 (138,'Cuimba',17),
 (139,'M\'Banza Kongo',17),
 (140,'Noqui',17),
 (141,'N´zeto',17),
 (142,'Marimba',18),
 (143,'Massango',18),
 (144,'Mucari',18),
 (145,'Quela',18),
 (146,'Quirima',18),
 (147,'Cacuso',18),
 (148,'Calandula',18),
 (149,'Cambundi-Catembo',18),
 (150,'Cangandala',18),
 (151,'Caombo',18),
 (152,'Cuaba Nzogo',18),
 (153,'Cunda-Dia-Baze',18),
 (154,'Luquembo',18),
 (155,'Malanje',18);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;


--
-- Definition of table `objecto_area`
--

DROP TABLE IF EXISTS `objecto_area`;
CREATE TABLE `objecto_area` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_area` varchar(255) DEFAULT NULL,
  `_id_objecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `_id_objecto` (`_id_objecto`),
  CONSTRAINT `objecto_area_ibfk_1` FOREIGN KEY (`_id_objecto`) REFERENCES `elemento_mac` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `objecto_area`
--

/*!40000 ALTER TABLE `objecto_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `objecto_area` ENABLE KEYS */;


--
-- Definition of table `organizacao`
--

DROP TABLE IF EXISTS `organizacao`;
CREATE TABLE `organizacao` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_requerente` int(11) NOT NULL,
  `_nif` varchar(30) DEFAULT NULL,
  `_decreto` varchar(15) NOT NULL,
  `_tipo_organizacao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizacao`
--

/*!40000 ALTER TABLE `organizacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizacao` ENABLE KEYS */;


--
-- Definition of table `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE `pagamento` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_codigo` varchar(50) DEFAULT NULL,
  `_data` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_valor` varchar(50) DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  `_id_processo` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagamento`
--

/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;


--
-- Definition of table `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_sigla` varchar(3) NOT NULL,
  `_nome` varchar(150) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pais`
--

/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` (`_id`,`_sigla`,`_nome`) VALUES 
 (1,'AF','Afghanistan'),
 (2,'AL','Albania'),
 (3,'DZ','Algeria'),
 (4,'AS','American Samoa'),
 (5,'AD','Andorra'),
 (6,'AO','Angola'),
 (7,'AI','Anguilla'),
 (8,'AQ','Antarctica'),
 (9,'AG','Antigua And Barbuda'),
 (10,'AR','Argentina'),
 (11,'AM','Armenia'),
 (12,'AW','Aruba'),
 (13,'AU','Australia'),
 (14,'AT','Austria'),
 (15,'AZ','Azerbaijan'),
 (16,'BS','Bahamas The'),
 (17,'BH','Bahrain'),
 (18,'BD','Bangladesh'),
 (19,'BB','Barbados'),
 (20,'BY','Belarus'),
 (21,'BE','Belgium'),
 (22,'BZ','Belize'),
 (23,'BJ','Benin'),
 (24,'BM','Bermuda'),
 (25,'BT','Bhutan'),
 (26,'BO','Bolivia'),
 (27,'BA','Bosnia and Herzegovina'),
 (28,'BW','Botswana'),
 (29,'BV','Bouvet Island'),
 (30,'BR','Brazil'),
 (31,'IO','British Indian Ocean Territory'),
 (32,'BN','Brunei'),
 (33,'BG','Bulgaria'),
 (34,'BF','Burkina Faso'),
 (35,'BI','Burundi'),
 (36,'KH','Cambodia'),
 (37,'CM','Cameroon'),
 (38,'CA','Canada'),
 (39,'CV','Cape Verde'),
 (40,'KY','Cayman Islands'),
 (41,'CF','Central African Republic'),
 (42,'TD','Chad'),
 (43,'CL','Chile'),
 (44,'CN','China'),
 (45,'CX','Christmas Island'),
 (46,'CC','Cocos (Keeling) Islands'),
 (47,'CO','Colombia'),
 (48,'KM','Comoros'),
 (49,'CG','Congo'),
 (50,'CD','Congo The Democratic Republic Of The'),
 (51,'CK','Cook Islands'),
 (52,'CR','Costa Rica'),
 (53,'CI','Cote D\'Ivoire (Ivory Coast)'),
 (54,'HR','Croatia (Hrvatska)'),
 (55,'CU','Cuba'),
 (56,'CY','Cyprus'),
 (57,'CZ','Czech Republic'),
 (58,'DK','Denmark'),
 (59,'DJ','Djibouti'),
 (60,'DM','Dominica'),
 (61,'DO','Dominican Republic'),
 (62,'TP','East Timor'),
 (63,'EC','Ecuador'),
 (64,'EG','Egypt'),
 (65,'SV','El Salvador'),
 (66,'GQ','Equatorial Guinea'),
 (67,'ER','Eritrea'),
 (68,'EE','Estonia'),
 (69,'ET','Ethiopia'),
 (70,'XA','External Territories of Australia'),
 (71,'FK','Falkland Islands'),
 (72,'FO','Faroe Islands'),
 (73,'FJ','Fiji Islands'),
 (74,'FI','Finland'),
 (75,'FR','France'),
 (76,'GF','French Guiana'),
 (77,'PF','French Polynesia'),
 (78,'TF','French Southern Territories'),
 (79,'GA','Gabon'),
 (80,'GM','Gambia The'),
 (81,'GE','Georgia'),
 (82,'DE','Germany'),
 (83,'GH','Ghana'),
 (84,'GI','Gibraltar'),
 (85,'GR','Greece'),
 (86,'GL','Greenland'),
 (87,'GD','Grenada'),
 (88,'GP','Guadeloupe'),
 (89,'GU','Guam'),
 (90,'GT','Guatemala'),
 (91,'XU','Guernsey and Alderney'),
 (92,'GN','Guinea'),
 (93,'GW','Guinea-Bissau'),
 (94,'GY','Guyana'),
 (95,'HT','Haiti'),
 (96,'HM','Heard and McDonald Islands'),
 (97,'HN','Honduras'),
 (98,'HK','Hong Kong S.A.R.'),
 (99,'HU','Hungary'),
 (100,'IS','Iceland'),
 (101,'IN','India'),
 (102,'ID','Indonesia'),
 (103,'IR','Iran'),
 (104,'IQ','Iraq'),
 (105,'IE','Ireland'),
 (106,'IL','Israel'),
 (107,'IT','Italy'),
 (108,'JM','Jamaica'),
 (109,'JP','Japan'),
 (110,'XJ','Jersey'),
 (111,'JO','Jordan'),
 (112,'KZ','Kazakhstan'),
 (113,'KE','Kenya'),
 (114,'KI','Kiribati'),
 (115,'KP','Korea North'),
 (116,'KR','Korea South'),
 (117,'KW','Kuwait'),
 (118,'KG','Kyrgyzstan'),
 (119,'LA','Laos'),
 (120,'LV','Latvia'),
 (121,'LB','Lebanon'),
 (122,'LS','Lesotho'),
 (123,'LR','Liberia'),
 (124,'LY','Libya'),
 (125,'LI','Liechtenstein'),
 (126,'LT','Lithuania'),
 (127,'LU','Luxembourg'),
 (128,'MO','Macau S.A.R.'),
 (129,'MK','Macedonia'),
 (130,'MG','Madagascar'),
 (131,'MW','Malawi'),
 (132,'MY','Malaysia'),
 (133,'MV','Maldives'),
 (134,'ML','Mali'),
 (135,'MT','Malta'),
 (136,'XM','Man (Isle of)'),
 (137,'MH','Marshall Islands'),
 (138,'MQ','Martinique'),
 (139,'MR','Mauritania'),
 (140,'MU','Mauritius'),
 (141,'YT','Mayotte'),
 (142,'MX','Mexico'),
 (143,'FM','Micronesia'),
 (144,'MD','Moldova'),
 (145,'MC','Monaco'),
 (146,'MN','Mongolia'),
 (147,'MS','Montserrat'),
 (148,'MA','Morocco'),
 (149,'MZ','Mozambique'),
 (150,'MM','Myanmar'),
 (151,'NA','Namibia'),
 (152,'NR','Nauru'),
 (153,'NP','Nepal'),
 (154,'AN','Netherlands Antilles'),
 (155,'NL','Netherlands The'),
 (156,'NC','New Caledonia'),
 (157,'NZ','New Zealand'),
 (158,'NI','Nicaragua'),
 (159,'NE','Niger'),
 (160,'NG','Nigeria'),
 (161,'NU','Niue'),
 (162,'NF','Norfolk Island'),
 (163,'MP','Northern Mariana Islands'),
 (164,'NO','Norway'),
 (165,'OM','Oman'),
 (166,'PK','Pakistan'),
 (167,'PW','Palau'),
 (168,'PS','Palestinian Territory Occupied'),
 (169,'PA','Panama'),
 (170,'PG','Papua new Guinea'),
 (171,'PY','Paraguay'),
 (172,'PE','Peru'),
 (173,'PH','Philippines'),
 (174,'PN','Pitcairn Island'),
 (175,'PL','Poland'),
 (176,'PT','Portugal'),
 (177,'PR','Puerto Rico'),
 (178,'QA','Qatar'),
 (179,'RE','Reunion'),
 (180,'RO','Romania'),
 (181,'RU','Russia'),
 (182,'RW','Rwanda'),
 (183,'SH','Saint Helena'),
 (184,'KN','Saint Kitts And Nevis'),
 (185,'LC','Saint Lucia'),
 (186,'PM','Saint Pierre and Miquelon'),
 (187,'VC','Saint Vincent And The Grenadines'),
 (188,'WS','Samoa'),
 (189,'SM','San Marino'),
 (190,'ST','Sao Tome and Principe'),
 (191,'SA','Saudi Arabia'),
 (192,'SN','Senegal'),
 (193,'RS','Serbia'),
 (194,'SC','Seychelles'),
 (195,'SL','Sierra Leone'),
 (196,'SG','Singapore'),
 (197,'SK','Slovakia'),
 (198,'SI','Slovenia'),
 (199,'XG','Smaller Territories of the UK'),
 (200,'SB','Solomon Islands'),
 (201,'SO','Somalia'),
 (202,'ZA','South Africa'),
 (203,'GS','South Georgia'),
 (204,'SS','South Sudan'),
 (205,'ES','Spain'),
 (206,'LK','Sri Lanka'),
 (207,'SD','Sudan'),
 (208,'SR','Suriname'),
 (209,'SJ','Svalbard And Jan Mayen Islands'),
 (210,'SZ','Swaziland'),
 (211,'SE','Sweden'),
 (212,'CH','Switzerland'),
 (213,'SY','Syria'),
 (214,'TW','Taiwan'),
 (215,'TJ','Tajikistan'),
 (216,'TZ','Tanzania'),
 (217,'TH','Thailand'),
 (218,'TG','Togo'),
 (219,'TK','Tokelau'),
 (220,'TO','Tonga'),
 (221,'TT','Trinidad And Tobago'),
 (222,'TN','Tunisia'),
 (223,'TR','Turkey'),
 (224,'TM','Turkmenistan'),
 (225,'TC','Turks And Caicos Islands'),
 (226,'TV','Tuvalu'),
 (227,'UG','Uganda'),
 (228,'UA','Ukraine'),
 (229,'AE','United Arab Emirates'),
 (230,'GB','United Kingdom'),
 (231,'US','United States'),
 (232,'UM','United States Minor Outlying Islands'),
 (233,'UY','Uruguay'),
 (234,'UZ','Uzbekistan'),
 (235,'VU','Vanuatu'),
 (236,'VA','Vatican City State (Holy See)'),
 (237,'VE','Venezuela'),
 (238,'VN','Vietnam'),
 (239,'VG','Virgin Islands (British)'),
 (240,'VI','Virgin Islands (US)'),
 (241,'WF','Wallis And Futuna Islands'),
 (242,'EH','Western Sahara'),
 (243,'YE','Yemen'),
 (244,'YU','Yugoslavia'),
 (245,'ZM','Zambia'),
 (246,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;


--
-- Definition of table `parecer`
--

DROP TABLE IF EXISTS `parecer`;
CREATE TABLE `parecer` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_descricao` longtext,
  `_data` date DEFAULT NULL,
  `_destino` int(11) DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  `_id_processo` int(11) DEFAULT NULL,
  `_id_fase` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parecer`
--

/*!40000 ALTER TABLE `parecer` DISABLE KEYS */;
INSERT INTO `parecer` (`_id`,`_descricao`,`_data`,`_destino`,`_id_utilizador`,`_id_processo`,`_id_fase`) VALUES 
 (1,'Para DMGUUC do Anersio','2017-09-03',10,9,3,1),
 (2,'Dar o devido tratamento.','2017-09-04',11,10,3,1),
 (3,'trata disso.','2017-09-04',12,11,3,1),
 (4,'default','2017-09-11',11,12,3,2),
 (5,'Ver o que fazer.','2017-09-11',10,9,6,1),
 (6,'Dar o melhor tratamento.','2017-09-11',11,10,6,1),
 (7,'Trata de ir ao terreno para cadastra-lo.','2017-09-11',12,11,6,1),
 (8,'Fazer a informação espelho.','2017-09-11',15,11,3,1);
/*!40000 ALTER TABLE `parecer` ENABLE KEYS */;


--
-- Definition of table `processo`
--

DROP TABLE IF EXISTS `processo`;
CREATE TABLE `processo` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_num_processoGeral` varchar(60) DEFAULT NULL,
  `_assunto` varchar(50) DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  `_id_requerente` int(11) DEFAULT NULL,
  `_tipo` int(11) NOT NULL,
  `_id_administracao` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processo`
--

/*!40000 ALTER TABLE `processo` DISABLE KEYS */;
INSERT INTO `processo` (`_id`,`_num_processoGeral`,`_assunto`,`_id_utilizador`,`_id_requerente`,`_tipo`,`_id_administracao`) VALUES 
 (1,'001/LT/17','Vedação e Ocupação',5,1,1,4),
 (2,'002/LT/17','Vedação e Ocupação',3,2,1,1),
 (3,'003/LT/17','Direito de Superfície',3,3,1,1),
 (4,'003/LT/17','Direito de Superfície',3,3,1,1),
 (5,'004/LT/17','Licença de Construção',3,4,1,1),
 (6,'005/LT/17','Direito de Superfície',3,5,1,1),
 (7,'006/LT/17','Direito de Superfície',3,6,1,1),
 (8,'006/LT/17','Direito de Superfície',3,6,1,1);
/*!40000 ALTER TABLE `processo` ENABLE KEYS */;


--
-- Definition of table `projecto`
--

DROP TABLE IF EXISTS `projecto`;
CREATE TABLE `projecto` (
  `_id` int(11) NOT NULL,
  `_id_localizacao` int(11) NOT NULL,
  `_coordenador` int(11) NOT NULL,
  `_nome` varchar(100) NOT NULL,
  `_data_criacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projecto`
--

/*!40000 ALTER TABLE `projecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `projecto` ENABLE KEYS */;


--
-- Definition of table `proprietario_org`
--

DROP TABLE IF EXISTS `proprietario_org`;
CREATE TABLE `proprietario_org` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_organizacao` int(11) NOT NULL,
  `_nome` varchar(70) NOT NULL,
  `_telefone` varchar(20) NOT NULL,
  `_pais` varchar(30) NOT NULL,
  `_numDI` varchar(20) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proprietario_org`
--

/*!40000 ALTER TABLE `proprietario_org` DISABLE KEYS */;
/*!40000 ALTER TABLE `proprietario_org` ENABLE KEYS */;


--
-- Definition of table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_nome` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `_sigla` varchar(2) COLLATE utf8_general_mysql500_ci NOT NULL,
  `_longitude` float NOT NULL,
  `_latitude` float NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `provincia`
--

/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` (`_id`,`_nome`,`_sigla`,`_longitude`,`_latitude`) VALUES 
 (1,'Luanda','LA',-8.1933,13.1933),
 (2,'Cuanza Sul','KS',-8.1933,13.1933),
 (3,'Cuanza Norte','KN',-8.1933,13.1933),
 (4,'Benguela','BG',-8.1933,13.1933),
 (5,'Moxico','MO',-8.1933,13.1933),
 (6,'Huambo','HO',-8.1933,13.1933),
 (7,'Cuando Cubango','KK',-8.1933,13.1933),
 (8,'Lunda Norte','LN',-8.1933,13.1933),
 (9,'Lunda Sul','LS',-8.1933,13.1933),
 (10,'Namibe','NE',-8.1933,13.1933),
 (11,'Bengo','BO',-8.1933,13.1933),
 (12,'Huila','HA',-8.1933,13.1933),
 (13,'Cabinda','CA',-8.1933,13.1933),
 (14,'Bie','BE',-8.1933,13.1933),
 (15,'Cunene','CE',-8.1933,13.1933),
 (16,'Uige','UE',-8.1933,13.1933),
 (17,'Zaire','ZE',-8.1933,13.1933),
 (18,'Malanje','ME',-8.1933,13.1933);
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;


--
-- Definition of table `relatorio`
--

DROP TABLE IF EXISTS `relatorio`;
CREATE TABLE `relatorio` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_observacao` text,
  `_id_pocesso` int(11) NOT NULL,
  `_data` date NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relatorio`
--

/*!40000 ALTER TABLE `relatorio` DISABLE KEYS */;
INSERT INTO `relatorio` (`_id`,`_observacao`,`_id_pocesso`,`_data`) VALUES 
 (1,'Este eh  o relatório técnico.',3,'2017-09-11');
/*!40000 ALTER TABLE `relatorio` ENABLE KEYS */;


--
-- Definition of table `requerente`
--

DROP TABLE IF EXISTS `requerente`;
CREATE TABLE `requerente` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_nome` varchar(255) DEFAULT NULL,
  `_telefone` varchar(50) DEFAULT NULL,
  `_email` varchar(100) NOT NULL,
  `_id_morada` int(11) DEFAULT NULL,
  `_tipo` varchar(13) NOT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `uq_requerenteEmail` (`_email`),
  UNIQUE KEY `uq_requerenteTelefone` (`_telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requerente`
--

/*!40000 ALTER TABLE `requerente` DISABLE KEYS */;
INSERT INTO `requerente` (`_id`,`_nome`,`_telefone`,`_email`,`_id_morada`,`_tipo`) VALUES 
 (1,'Ana Maria','+244 934 659 982','ana_maria@gmail.com',8,'cidadao'),
 (2,'Mendes Joaquim Pereira','+244 912 443 012','mendes@onyx.ao',13,'cidadao'),
 (3,'Anesio Jorge Bandeira Coelho','+244 923 550 977','jorge.coelho@gmail.com',14,'cidadao'),
 (4,'Alberto Jos&eacute;','+244 923 550 567','',25,'cidadao'),
 (5,'Paulo Xavier','+244 943 777 432','xavier@onyx.ao',27,'cidadao'),
 (6,'ana Bela','+244 932 873 833','ana@onyx.ao',28,'cidadao');
/*!40000 ALTER TABLE `requerente` ENABLE KEYS */;


--
-- Definition of table `rua`
--

DROP TABLE IF EXISTS `rua`;
CREATE TABLE `rua` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_nome` varchar(60) NOT NULL,
  `_id_bairro` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rua`
--

/*!40000 ALTER TABLE `rua` DISABLE KEYS */;
INSERT INTO `rua` (`_id`,`_nome`,`_id_bairro`) VALUES 
 (1,'Rua da Paz',1),
 (2,'Missão',5),
 (3,'Rua 1',6),
 (4,'Rua 2',6),
 (5,'Rua da Conduta',5);
/*!40000 ALTER TABLE `rua` ENABLE KEYS */;


--
-- Definition of table `secretariageral`
--

DROP TABLE IF EXISTS `secretariageral`;
CREATE TABLE `secretariageral` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_utilizador` int(10) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secretariageral`
--

/*!40000 ALTER TABLE `secretariageral` DISABLE KEYS */;
INSERT INTO `secretariageral` (`_id`,`_id_utilizador`) VALUES 
 (1,3),
 (2,5),
 (3,7),
 (4,13);
/*!40000 ALTER TABLE `secretariageral` ENABLE KEYS */;


--
-- Definition of table `substituicao_terreno`
--

DROP TABLE IF EXISTS `substituicao_terreno`;
CREATE TABLE `substituicao_terreno` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_mudanc_ter` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `substituicao_terreno`
--

/*!40000 ALTER TABLE `substituicao_terreno` DISABLE KEYS */;
/*!40000 ALTER TABLE `substituicao_terreno` ENABLE KEYS */;


--
-- Definition of table `tecnico`
--

DROP TABLE IF EXISTS `tecnico`;
CREATE TABLE `tecnico` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_utilizador` int(10) DEFAULT NULL,
  `_tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tecnico`
--

/*!40000 ALTER TABLE `tecnico` DISABLE KEYS */;
INSERT INTO `tecnico` (`_id`,`_id_utilizador`,`_tipo`) VALUES 
 (1,12,'tect_campo'),
 (2,14,'tect_admin'),
 (3,15,'tect_admin');
/*!40000 ALTER TABLE `tecnico` ENABLE KEYS */;


--
-- Definition of table `tecnicorelatorio`
--

DROP TABLE IF EXISTS `tecnicorelatorio`;
CREATE TABLE `tecnicorelatorio` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_tecnico` int(10) DEFAULT NULL,
  `_id_relatorio` int(10) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tecnicorelatorio`
--

/*!40000 ALTER TABLE `tecnicorelatorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tecnicorelatorio` ENABLE KEYS */;


--
-- Definition of table `terreno`
--

DROP TABLE IF EXISTS `terreno`;
CREATE TABLE `terreno` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_codigoterreno` varchar(50) DEFAULT NULL,
  `_area` float DEFAULT NULL,
  `_largura` float DEFAULT NULL,
  `_comprimento` float DEFAULT NULL,
  `_quateirao` varchar(10) NOT NULL,
  `_bloco` varchar(10) NOT NULL,
  `_lote` varchar(10) NOT NULL,
  `_numVert` int(11) NOT NULL,
  `_id_zona` int(11) DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  `_id_utente` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terreno`
--

/*!40000 ALTER TABLE `terreno` DISABLE KEYS */;
INSERT INTO `terreno` (`_id`,`_codigoterreno`,`_area`,`_largura`,`_comprimento`,`_quateirao`,`_bloco`,`_lote`,`_numVert`,`_id_zona`,`_id_utilizador`,`_id_utente`) VALUES 
 (1,'66767',60,30,30,'Q2','B24','9',4,2,12,3),
 (2,'323',40,20,20,'Q12','B4','23',4,1,12,5);
/*!40000 ALTER TABLE `terreno` ENABLE KEYS */;


--
-- Definition of table `terreno_derivado`
--

DROP TABLE IF EXISTS `terreno_derivado`;
CREATE TABLE `terreno_derivado` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_terreno` int(11) NOT NULL,
  `_id_terreno_mae` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terreno_derivado`
--

/*!40000 ALTER TABLE `terreno_derivado` DISABLE KEYS */;
/*!40000 ALTER TABLE `terreno_derivado` ENABLE KEYS */;


--
-- Definition of table `terreno_mae`
--

DROP TABLE IF EXISTS `terreno_mae`;
CREATE TABLE `terreno_mae` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_terreno` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terreno_mae`
--

/*!40000 ALTER TABLE `terreno_mae` DISABLE KEYS */;
/*!40000 ALTER TABLE `terreno_mae` ENABLE KEYS */;


--
-- Definition of table `terreno_normal`
--

DROP TABLE IF EXISTS `terreno_normal`;
CREATE TABLE `terreno_normal` (
  `_id` int(11) NOT NULL,
  `_id_terreno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terreno_normal`
--

/*!40000 ALTER TABLE `terreno_normal` DISABLE KEYS */;
/*!40000 ALTER TABLE `terreno_normal` ENABLE KEYS */;


--
-- Definition of table `tipo_terreno`
--

DROP TABLE IF EXISTS `tipo_terreno`;
CREATE TABLE `tipo_terreno` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id_terreno` int(11) NOT NULL,
  `tipo` varchar(40) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `tipo_terreno`
--

/*!40000 ALTER TABLE `tipo_terreno` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_terreno` ENABLE KEYS */;


--
-- Definition of table `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE `utilizador` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_id_administracao` int(11) NOT NULL,
  `_nome` varchar(100) DEFAULT NULL,
  `_apelido` varchar(70) NOT NULL,
  `_num_bi` varchar(50) DEFAULT NULL,
  `_data_nascimento` date DEFAULT NULL,
  `_genero` varchar(50) DEFAULT NULL,
  `_telefone` varchar(50) DEFAULT NULL,
  `_email` varchar(50) DEFAULT NULL,
  `_nivel_escolar` varchar(50) DEFAULT NULL,
  `_morada` int(11) DEFAULT NULL,
  `_id_grupo` int(11) DEFAULT NULL,
  `_foto` varchar(100) NOT NULL,
  `_proveniencia` int(11) NOT NULL,
  `_data_emissao` date NOT NULL,
  `_data_valida` date NOT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `uq_utliza_bi` (`_num_bi`),
  UNIQUE KEY `uq_utliza_fone` (`_telefone`),
  UNIQUE KEY `uq_utliza_email` (`_email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizador`
--

/*!40000 ALTER TABLE `utilizador` DISABLE KEYS */;
INSERT INTO `utilizador` (`_id`,`_id_administracao`,`_nome`,`_apelido`,`_num_bi`,`_data_nascimento`,`_genero`,`_telefone`,`_email`,`_nivel_escolar`,`_morada`,`_id_grupo`,`_foto`,`_proveniencia`,`_data_emissao`,`_data_valida`) VALUES 
 (1,1,'Matondo Vicente','Quela','000273823LA287','1999-12-06','m','+244 996 198 371','mavipela@gmail.com','Tecnico Superior',3,11,'padrao.jpg',1,'2017-06-23','0000-00-00'),
 (2,2,'Edson Filomena','Viegas','008875657LA676','1999-12-07','m','+244 937 653 100','homolibero@gmail.com','Tecnico Superior',4,11,'padrao.jpg',1,'2017-06-14','0000-00-00'),
 (3,1,'Jo&atilde;o Fontes','Olli','009232372LA837','1999-12-06','m','+244 923 734 384','joao_fontes@gmail.com','Tecnico Superior',5,4,'padrao.jpg',1,'2017-06-23','0000-00-00'),
 (4,4,'Elvio Sadoc da Silva e Sousa','Sousa','002831985KS039','1988-10-30','m','+244 923 839 208','hackerxp33@gmail.com','Tecnico Superior',6,11,'onyx-d7f122a4fac3220201fbae535646e39f.jpg',2,'2014-10-28','2019-12-04'),
 (6,5,'Osvaldo Avelino','Jeronimo','002832398LA392','1999-12-06','m','+244 937 283 239','osvaldo_avelino@gmail.com','Tecnico Superior',9,11,'padrao.jpg',1,'2017-07-11','0000-00-00'),
 (7,5,'Jo&atilde;o Firmino','Baptista','989382323LA232','1999-12-14','m','+244 023 832 823','joaobaptista@gmail.com','Tecnico Superior',10,4,'padrao.jpg',1,'2017-07-30','0000-00-00'),
 (8,1,'Lukau','Garcia','000256258UE012','1993-04-11','m','+244 934 700 124','lukau@gesterra.ao','Bacharel',11,10,'padrao.jpg',16,'2014-12-01','2019-11-29'),
 (9,1,'Jorge','Coelho','008653221LA074','1985-02-06','m','+244 923 766 125','jorge@onyx.ao','Doutor',12,9,'padrao.jpg',1,'2014-12-01','2019-11-29'),
 (10,1,'Sadoc','Sousa','323200000LA003','1999-12-31','m','+244 455 555 555','sadoc@onyx.ao',NULL,14,8,'padrao.jpg',1,'2014-12-01','2017-11-29'),
 (11,1,'Alice djacira','Coelho','000344221KN054','1980-02-12','f','+244 923 435 560','alice@onyx.ao','null',23,7,'padrao.jpg',3,'2015-06-22','2020-10-28'),
 (12,1,'Paulo','Miguel','038003445KN300','1984-06-19','m','+244 992 344 567','paulo@onyx.ao','null',24,3,'padrao.jpg',3,'2012-01-09','0000-00-00'),
 (13,1,'Maria','Joao','000876522LA100','1969-03-18','m','+244 927 443 399','maria@onyx.ao','Tecnico Medio',26,4,'padrao.jpg',1,'2014-06-23','2019-11-26'),
 (14,1,'Joao','Tecnico','003566523BE023','1989-05-15','m','+244 919 273 648','joao@onyx.ao','Tecnico de Base',30,1,'padrao.jpg',14,'2016-05-23','2021-06-23'),
 (15,1,'Miguel','tecnico','003883229BO009','1981-05-17','m','+244 992 345 887','','Bacharel',31,3,'padrao.jpg',11,'2017-08-27','2019-12-05');
/*!40000 ALTER TABLE `utilizador` ENABLE KEYS */;


--
-- Definition of table `vertice`
--

DROP TABLE IF EXISTS `vertice`;
CREATE TABLE `vertice` (
  `_id` int(10) NOT NULL AUTO_INCREMENT,
  `_longitude` double DEFAULT NULL,
  `_latitude` double DEFAULT NULL,
  `_id_terreno` varchar(50) DEFAULT NULL,
  `_p_front` varchar(10) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vertice`
--

/*!40000 ALTER TABLE `vertice` DISABLE KEYS */;
INSERT INTO `vertice` (`_id`,`_longitude`,`_latitude`,`_id_terreno`,`_p_front`) VALUES 
 (1,1,1,'1','0'),
 (2,1,2,'1','0'),
 (3,2,1,'1','0'),
 (4,2,2,'1','0'),
 (5,3,5,'2','n'),
 (6,5,5,'2','n'),
 (7,5,3,'2','n'),
 (8,3,3,'2','n');
/*!40000 ALTER TABLE `vertice` ENABLE KEYS */;


--
-- Definition of table `zona`
--

DROP TABLE IF EXISTS `zona`;
CREATE TABLE `zona` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_nome` varchar(40) NOT NULL,
  `_id_provincia` int(11) NOT NULL,
  `_id_municipio` int(11) NOT NULL,
  `_id_comuna` int(11) NOT NULL,
  `_id_bairro` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zona`
--

/*!40000 ALTER TABLE `zona` DISABLE KEYS */;
INSERT INTO `zona` (`_id`,`_nome`,`_id_provincia`,`_id_municipio`,`_id_comuna`,`_id_bairro`) VALUES 
 (1,'Vila Kativa',1,1,1,1),
 (2,'Vila Verde',1,1,2,5),
 (3,'Bairro Novo',1,1,1,3),
 (4,'Zona 3',1,1,1,5),
 (5,'Nova Urbanização',1,1,1,1);
/*!40000 ALTER TABLE `zona` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
