-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Out-2017 às 19:22
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gesterra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adesao_processo`
--

CREATE TABLE `adesao_processo` (
  `_id` int(11) NOT NULL,
  `_id_processo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administracao_municipal`
--

CREATE TABLE `administracao_municipal` (
  `_id` int(11) NOT NULL,
  `_id_localizacao` int(11) NOT NULL,
  `_nome` varchar(100) NOT NULL,
  `_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administracao_municipal`
--

INSERT INTO `administracao_municipal` (`_id`, `_id_localizacao`, `_nome`, `_estado`) VALUES
(1, 1, 'Administração Municipal de Cacuaco', 1),
(2, 2, 'Administração Municipal de Belas', 1),
(3, 3, 'Administra&ccedil;&atilde;o Municipal do Sumbe', 0),
(4, 4, 'Administra&ccedil;&atilde;o Municipal do Ambo&iacute;m', 1),
(5, 5, 'Administra&ccedil;&atilde;o Municipal do Cazenga', 1),
(6, 6, 'kilamba Kiaxi', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `_id` int(10) NOT NULL,
  `_id_utilizador` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`_id`, `_id_utilizador`) VALUES
(1, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_processo`
--

CREATE TABLE `admin_processo` (
  `_id` int(10) NOT NULL,
  `_num_processo_admin` int(10) DEFAULT NULL,
  `_id_processo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto`
--

CREATE TABLE `assunto` (
  `_id` int(11) NOT NULL,
  `_assunto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `assunto`
--

INSERT INTO `assunto` (`_id`, `_assunto`) VALUES
(1, 'Direito de Superfície'),
(2, 'Licença de Construção'),
(3, 'Vedação e Ocupação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `_id` int(11) NOT NULL,
  `_nome` varchar(70) NOT NULL,
  `_id_comuna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`_id`, `_nome`, `_id_comuna`) VALUES
(1, 'Bairro dos Pescadores', 1),
(2, 'Conoco', 1),
(3, 'Vidrul', 1),
(4, 'Cerâmica', 1),
(5, 'Boa Esperança I', 2),
(6, 'Sequele', 1),
(7, 'Vila', 1),
(8, 'Imbondeiros', 1),
(9, 'Salinas', 1),
(10, '4 de Fevereiro', 1),
(11, 'Belo Monte', 1),
(12, 'Pedreira', 1),
(13, 'Mukulo', 3),
(14, 'Kilanda', 3),
(15, 'Hengue', 3),
(16, 'Kuta', 3),
(17, 'Terra Branca', 3),
(18, 'Casulo Estrada', 3),
(19, 'Casulo Sede', 3),
(20, 'Havemos de Voltar', 3),
(21, 'Cowboy', 3),
(22, 'Camicuto II', 0),
(23, 'Fazenda Experimental', 3),
(24, 'Cepa', 3),
(25, 'Caop Nova', 3),
(26, 'Caop Velha', 3),
(27, 'Macedonia', 3),
(28, 'Quifangondo', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro_distrito`
--

CREATE TABLE `bairro_distrito` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_nome` varchar(50) DEFAULT '',
  `_id_distrito` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairro_distrito`
--

INSERT INTO `bairro_distrito` (`_id`, `_nome`, `_id_distrito`) VALUES
(1, 'Augusto Ngangula', 1),
(2, 'Boa Esperança', 1),
(3, 'Motanganga', 1),
(4, 'Salinas Kikolo', 1),
(5, 'Trinta', 2),
(6, 'Maye-Maye', 2),
(7, 'Vila das ideias', 2),
(8, 'Ponto II', 2),
(9, 'Paquete ', 2),
(10, 'Mulundo', 2),
(11, 'Industrial do Sequele, Ponto III', 2),
(12, 'Vila Verde Kativa', 2),
(13, 'Portin', 2),
(14, 'Caulongue', 2),
(15, 'Alto Paixão', 2),
(16, 'Centralidade do Sequele', 2),
(17, 'Catondo', 2),
(18, 'Camicuto I', 2),
(19, 'Policia', 3),
(20, 'Salinas Sede', 3),
(21, 'Porno do Cal', 3),
(22, 'Pescadores', 3),
(23, 'Barra do Bengo', 3),
(24, 'Garcia', 3),
(25, 'Quipangondo', 3),
(26, 'Vidrul', 3),
(27, '17 de Dezembro', 3),
(28, 'Ecocampo', 3),
(29, 'Chapas', 3),
(30, 'Ceramica', 3),
(31, '04 de Fevereiro ', 3),
(32, '22 de Janeiroi', 3),
(33, 'Industrial Sequele, Ponto III', 3),
(34, 'Zeka Velha', 3),
(35, 'Caop Velha', 3),
(36, 'Belo Monte', 4),
(37, 'Pedreira', 4),
(38, 'Pedreira Hidro Porto', 4),
(39, 'Paraiso', 4),
(40, 'Comandante Bula', 4),
(41, 'Mulenvos de Baixos', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cga`
--

CREATE TABLE `cga` (
  `_id` int(11) NOT NULL,
  `_id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cga`
--

INSERT INTO `cga` (`_id`, `_id_utilizador`) VALUES
(1, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidadao`
--

CREATE TABLE `cidadao` (
  `_id` int(11) NOT NULL,
  `_id_requerente` int(11) NOT NULL,
  `_num_bi` varchar(20) NOT NULL,
  `_data_emissao` date NOT NULL,
  `_data_nascimento` date NOT NULL,
  `_nacionalidade` int(11) NOT NULL,
  `_estado_civil` varchar(20) NOT NULL,
  `_genero` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidadao`
--

INSERT INTO `cidadao` (`_id`, `_id_requerente`, `_num_bi`, `_data_emissao`, `_data_nascimento`, `_nacionalidade`, `_estado_civil`, `_genero`) VALUES
(1, 1, '008239937HO834', '0000-00-00', '1999-12-06', 6, 'casado', 'f'),
(2, 2, '000439916UE012', '0000-00-00', '1960-05-09', 6, 'solteiro', 'm'),
(3, 3, '002324787LA029', '0000-00-00', '1999-12-01', 6, 'casado', 'm'),
(4, 3, '002324787LA029', '0000-00-00', '1999-12-01', 6, 'casado', 'm'),
(5, 4, '000432661ME097', '0000-00-00', '1981-06-17', 6, 'casado', 'm'),
(6, 5, '000323448LN001', '0000-00-00', '1961-03-01', 6, 'casado', 'm'),
(7, 6, '8348748', '0000-00-00', '1998-12-28', 1, 'casado', 'f'),
(8, 6, '003774004LN303', '0000-00-00', '1961-03-08', 6, 'casado', 'm'),
(9, 6, '32545676768', '0000-00-00', '1999-12-20', 5, 'casado', 'm'),
(10, 6, '009712234ME006', '0000-00-00', '1990-05-21', 6, 'solteiro', 'f'),
(11, 6, '009371233ME007', '0000-00-00', '1980-06-17', 6, 'solteiro', 'f'),
(12, 6, '002217650KK043', '0000-00-00', '1999-11-28', 6, 'solteiro', 'm'),
(13, 11, '008167266MO777', '0000-00-00', '1999-12-09', 6, 'casado', 'm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comuna`
--

CREATE TABLE `comuna` (
  `_id` int(11) NOT NULL,
  `_nome` varchar(80) NOT NULL,
  `_id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comuna`
--

INSERT INTO `comuna` (`_id`, `_nome`, `_id_municipio`) VALUES
(1, 'Cacuaco', 1),
(2, 'Quicolo', 1),
(3, 'Funda', 1),
(4, 'Gabela', 2),
(5, 'Cabinda', 29),
(6, 'Malembo', 29),
(7, 'Tando-Zinze', 29),
(8, 'Viana', 17),
(9, 'Calumbo', 17),
(10, 'Cazenga', 13),
(11, 'Tala Hady', 13),
(12, 'Cazombo', 58),
(13, 'Kavungo', 58),
(14, 'Kaianda', 58),
(15, 'Lóvua', 58),
(16, 'Kalunda', 58),
(17, 'Macondo', 58),
(18, 'Lumbala-Kakengue', 58),
(19, 'Gabela', 2),
(20, 'Assango', 2),
(21, 'Nova Caipenba', 130),
(22, 'Quipedro', 130),
(23, 'Bailundo', 68),
(24, 'Lunge', 68),
(25, 'Luvemba', 68),
(26, 'Bimbe', 68),
(27, 'Hengue.', 68),
(28, 'Balombo', 18),
(29, '  Chindumbo', 18),
(30, 'Chingongo', 18),
(31, 'Maka Mombolo', 18),
(32, 'Bembe', 131),
(33, 'Mabaia', 131),
(34, 'Lukunga', 131),
(35, 'Zona A', 20),
(36, 'Zona B', 20),
(37, ', Zona C', 20),
(38, 'Zona D', 20),
(39, ' Zona E', 20),
(40, 'Zona F', 20),
(41, 'Bibala-Sede', 10),
(42, 'Caitou', 10),
(43, 'Lola', 10),
(44, 'Kapagombe', 10),
(45, ' Terreiro', 43),
(46, 'Terreiro Kiquiemba', 43),
(47, 'Cuilo Cambozo', 132),
(48, 'Nova Esperança ', 132),
(49, 'Quimbianda', 132),
(50, 'Lumbala Nguimbo', 51),
(51, 'Luvuei', 51),
(52, 'Lutembo', 51),
(53, 'Sessa', 51),
(54, 'Mussuma', 51),
(55, 'Ninda', 51),
(56, 'Chiume', 51),
(57, 'Cacolo', 86),
(58, 'Alto Chicapa', 86),
(59, 'Xassengue', 86),
(60, 'Cucumbi', 86),
(61, 'Caconda', 101),
(62, 'Gungui', 101),
(63, 'Uaba', 101),
(64, 'Cusse', 101),
(65, 'Capelo ', 30),
(66, ' Dinge', 30),
(67, 'Massabi.', 30),
(68, 'Kacuso', 147),
(69, 'Lombe', 147),
(70, 'Quizenga ', 147),
(71, 'Pungo-Andongo', 147),
(72, 'Cahama ', 119),
(73, 'Otchindjau', 119),
(74, 'Canhamela', 22),
(75, 'Catengue', 22),
(76, 'Cayave', 22),
(77, 'Wiyangombe', 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `confronto`
--

CREATE TABLE `confronto` (
  `_id` int(11) NOT NULL,
  `_id_relatorio` int(11) NOT NULL,
  `_nordeste` longtext NOT NULL,
  `_sudeste` longtext NOT NULL,
  `_sudoeste` longtext NOT NULL,
  `_noroeste` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `confronto`
--

INSERT INTO `confronto` (`_id`, `_id_relatorio`, `_nordeste`, `_sudeste`, `_sudoeste`, `_noroeste`) VALUES
(1, 1, '2+ tendo o ponto +A +32 / 323+ e o ponto +B +76 / 767. +gffffffffgf', '435+ tendo o ponto +B +434 / 443+ e o ponto +C +43 / 545. +68798', '34+ tendo o ponto +C +434 / 22+ e o ponto +D +23 / 09. +sdfdsfsd', '232+ tendo o ponto +D +232 / 232+ e o ponto +A +5456 / 767. +fgdghfd'),
(2, 2, 'Talhão nº 08+ tendo o ponto +D +12899 / 27189+ e o ponto +A +12122 / 12122. +Cokfjv jfvkf', 'foldkv+ tendo o ponto +A +2234 / 453+ e o ponto +B +55 / 454. +fbfbf', 'dfdfdf+ tendo o ponto +B +3535 / 535+ e o ponto +C +3535 / 333. +bnbgn', 'dffg+ tendo o ponto +A +535 / 5332+ e o ponto +B +442 / 353. +vcbcfbv');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `_id` int(11) NOT NULL,
  `_telefone` varchar(50) DEFAULT NULL,
  `_utilizador` varchar(50) DEFAULT NULL,
  `_senha` varchar(50) DEFAULT NULL,
  `_estado` int(11) DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`_id`, `_telefone`, `_utilizador`, `_senha`, `_estado`, `_id_utilizador`) VALUES
(1, '+244 996 198 371', 'matondo.quela', 'b6a604ed117a24697b0a89e2e2950d88', 1, 1),
(2, '+244 937 653 100', 'edson.viegas', 'b6a604ed117a24697b0a89e2e2950d88', 1, 2),
(3, '+244 923 734 384', 'joao.olli', 'b6a604ed117a24697b0a89e2e2950d88', 1, 3),
(4, '+244 923 839 208', 'elvio.sousa', 'b6a604ed117a24697b0a89e2e2950d88', 1, 4),
(5, '+244 922 081 036', 'jorge.campos', 'b6a604ed117a24697b0a89e2e2950d88', 1, 5),
(6, '+244 937 283 239', 'osvaldo.jeronimo', 'b6a604ed117a24697b0a89e2e2950d88', 1, 6),
(7, '+244 023 832 823', 'joao.baptista', 'b6a604ed117a24697b0a89e2e2950d88', 1, 7),
(8, '+244 934 700 124', 'lukau.garcia', 'b6a604ed117a24697b0a89e2e2950d88', 1, 8),
(9, '+244 923 766 125', 'jorge.coelho', 'b6a604ed117a24697b0a89e2e2950d88', 1, 9),
(10, '+244 455 555 555', 'sadoc.sousa', 'b6a604ed117a24697b0a89e2e2950d88', 1, 10),
(11, '+244 923 435 560', 'alice.coelho', 'b6a604ed117a24697b0a89e2e2950d88', 1, 11),
(12, '+244 992 344 567', 'paulo.miguel', 'b6a604ed117a24697b0a89e2e2950d88', 1, 12),
(13, '+244 927 443 399', 'maria.joao', 'b6a604ed117a24697b0a89e2e2950d88', 1, 13),
(14, '+244 919 273 648', 'joao.tecnico', 'b6a604ed117a24697b0a89e2e2950d88', 1, 14),
(15, '+244 992 345 887', 'miguel.tecnico', 'b6a604ed117a24697b0a89e2e2950d88', 1, 15),
(16, '+244 923 444 098', 'dayse.braganca', 'b6a604ed117a24697b0a89e2e2950d88', 1, 16),
(17, '+244 919 180 604', 'manuel.secretario', 'b6a604ed117a24697b0a89e2e2950d88', 1, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `control_cred`
--

CREATE TABLE `control_cred` (
  `_id` int(11) NOT NULL,
  `_id_utilizador` int(11) NOT NULL,
  `_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `control_cred`
--

INSERT INTO `control_cred` (`_id`, `_id_utilizador`, `_estado`) VALUES
(1, 1, 1),
(2, 2, 0),
(3, 3, 1),
(4, 4, 1),
(5, 5, 0),
(6, 6, 0),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 0),
(12, 12, 0),
(13, 13, 1),
(14, 13, 1),
(15, 13, 1),
(16, 13, 1),
(17, 13, 1),
(18, 14, 0),
(19, 15, 0),
(20, 16, 1),
(21, 19, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `crguuc`
--

CREATE TABLE `crguuc` (
  `_id` int(10) NOT NULL,
  `_id_utilizador` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `crguuc`
--

INSERT INTO `crguuc` (`_id`, `_id_utilizador`) VALUES
(1, 10),
(2, 10),
(3, 10),
(4, 10),
(5, 10),
(6, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `crop`
--

CREATE TABLE `crop` (
  `_id` int(10) NOT NULL,
  `_id_utilizador` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `_id` int(11) NOT NULL,
  `_perfil` varchar(255) NOT NULL,
  `_descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`_id`, `_perfil`, `_descricao`) VALUES
(1, 'Reparticao das Obras Publicas', 'Teste descricao'),
(2, 'Reparticao de Urbanismo e Cadastro', 'Teste descricao'),
(3, 'Reparticao de Gestao de Imobiliario', 'Teste descricao'),
(4, 'Secretaria Geral', 'Teste descricao'),
(5, 'Administracao Municipal', 'Teste descricao'),
(6, 'DMGUUC', 'Teste descricao'),
(7, 'Tecnologia e Informação', 'Teste descricao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `distrito`
--

CREATE TABLE `distrito` (
  `_id` int(10) UNSIGNED NOT NULL,
  `_nome` varchar(50) DEFAULT '',
  `_id_municipio` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `distrito`
--

INSERT INTO `distrito` (`_id`, `_nome`, `_id_municipio`) VALUES
(1, 'Kikolo', 1),
(2, 'Cacuaco Sede ', 1),
(3, 'Sequele', 1),
(4, 'Mulenvos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `divisao_terreno`
--

CREATE TABLE `divisao_terreno` (
  `_id` int(11) NOT NULL,
  `_id_mudanc_ter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dmguuc`
--

CREATE TABLE `dmguuc` (
  `_id` int(10) NOT NULL,
  `_id_utilizador` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dmguuc`
--

INSERT INTO `dmguuc` (`_id`, `_id_utilizador`) VALUES
(1, 10),
(2, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `_id` int(11) NOT NULL,
  `_nome` varchar(50) DEFAULT NULL,
  `_descricao` varchar(255) NOT NULL,
  `_status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `documento`
--

INSERT INTO `documento` (`_id`, `_nome`, `_descricao`, `_status`) VALUES
(1, 'Requerimento', 'Teste de inserção', '1'),
(2, 'Croqu&iacute;s de Localização', 'Teste de inserção', '1'),
(3, 'Bilhete de Identidade', 'Documento de Identificação', '1'),
(4, 'Fotografia', 'Teste de inserção', '1'),
(5, 'Certid&atilde;o', 'Teste de inserção', '1'),
(6, 'Di&aacute;rio da Rep&uacute;blica', 'Teste de inserção', '1'),
(7, 'Cart&atilde;o de Contribuinte', 'Teste de inserção', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento_processo`
--

CREATE TABLE `documento_processo` (
  `_id` int(11) NOT NULL,
  `_id_documento` int(11) NOT NULL,
  `_id_processo` int(11) NOT NULL,
  `_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `documento_processo`
--

INSERT INTO `documento_processo` (`_id`, `_id_documento`, `_id_processo`, `_foto`) VALUES
(1, 1, 1, 'onyx-d7408feb88a624ec3ef3958f8f5618c0.jpg'),
(2, 2, 1, 'onyx-37700ca66159698c503373328fae28ba.jpg'),
(3, 3, 1, 'onyx-4c9a799fcffd0566a2ef4ff4a2662a26.jpg'),
(4, 4, 1, 'onyx-f8d7d650beb2fe53cbb6f107f423ffb8.jpg'),
(5, 1, 2, 'onyx-cc38b26dd826ede9d4c09deb3d23b962.jpg'),
(6, 2, 2, 'onyx-90f09dd9d9b2625eaca4c5b5de457730.jpg'),
(7, 3, 2, 'onyx-60cc260a905fa1cde9d11f2a60eb292b.jpg'),
(8, 4, 2, 'onyx-c1e7ea33f9a412b36b28029d5d4b795c.jpg'),
(9, 1, 3, 'onyx-1d00d5182739b3290a6352b39073e729.jpg'),
(10, 2, 3, 'onyx-e9cdd871d5316693a4f88aeab2a6e831.jpg'),
(11, 3, 3, 'onyx-f1ad2373e263140a8c675169b07f44ee.jpg'),
(12, 4, 3, 'onyx-d634212b459c38b209db949bae84de0e.jpg'),
(13, 1, 4, 'onyx-bf44a07c807149df07157ff62d56596f.jpg'),
(14, 2, 4, 'onyx-1bf7630961177ec91673db41399ed501.jpg'),
(15, 3, 4, 'onyx-e12d76bc0219cfea8192bcd92268210f.jpg'),
(16, 4, 4, 'onyx-24eaf6e6436fa27f259ea6f4ffcd0984.jpg'),
(17, 1, 5, 'onyx-1cb0052037d1f0d35374f8c42b723b6a.jpg'),
(18, 2, 5, 'onyx-4c8a65d34976cf39e47fcb3eab8c87aa.jpg'),
(19, 3, 5, 'onyx-db773bef99659a84f69de1df6b7e3a1f.jpg'),
(20, 4, 5, 'onyx-6309fa2b1c4dbfb91d1164cf82d0a20a.jpg'),
(21, 1, 6, 'onyx-eb3b7ff2516027cce4bd15345060c1d0.jpg'),
(22, 1, 7, 'onyx-7f2d3c5628a1e93ccc3e8038434fef67.jpg'),
(23, 2, 7, 'onyx-690e2b9e5b6ca817b9ba2de3e434c5e4.jpg'),
(24, 3, 7, 'onyx-acc24150064edb131e046a7783c36206.jpg'),
(25, 4, 7, 'onyx-fc784418012dc928f77b2c883f8265ab.jpg'),
(26, 1, 8, 'onyx-4ad9ca897a2e9f2cb1d51bcb81746009.jpg'),
(27, 3, 8, 'onyx-969cedac6a045021158ea1b226379314.jpg'),
(28, 4, 8, 'onyx-d8f95908097e03bf1cec7092d3777565.jpg'),
(29, 1, 9, 'onyx-2fa0d6c1b6c1e047e72ba72027c61ad5.jpg'),
(30, 2, 9, 'onyx-909d4a56e2319c6b5bb3de22e5765df4.jpg'),
(31, 3, 9, 'onyx-d7252005222fcca71264c63632e1067c.jpg'),
(32, 4, 9, 'onyx-0318e14b083073eb3596e8a7a755cc58.jpg'),
(33, 1, 10, 'onyx-8710499868f142229c74cab46140f90e.jpg'),
(34, 2, 10, 'onyx-dcfb5196fbe40ca5910c071b3a273031.jpg'),
(35, 3, 10, 'onyx-006ac171648b0da9deb3865b637e1ef2.jpg'),
(36, 4, 10, 'onyx-adf38b9beb82c554cbe691b0eab7d985.jpg'),
(37, 1, 11, 'onyx-580eea45565cdcfd9c88c649343b3e29.jpg'),
(38, 2, 11, 'onyx-4204082dfca48774284543eee6a43c28.jpg'),
(39, 3, 11, 'onyx-b2878e02a5921021aedcebe0f9966939.jpg'),
(40, 4, 11, 'onyx-695bb3f7676698c7845292d511fb8433.jpg'),
(41, 1, 12, 'onyx-905dfdac69e19e26f1439c76d1794fae.jpg'),
(42, 2, 12, 'onyx-359620492f376132ebc06bb87fcf82f7.jpg'),
(43, 3, 12, 'onyx-a3e97baab0afdf8bcb1122a77fd831dc.jpg'),
(44, 4, 12, 'onyx-5fc7a5074bc313628a6ade07378126c6.jpg'),
(45, 1, 13, 'onyx-57f40af526f6b9685b65f1ded7823039.jpg'),
(46, 2, 13, 'onyx-6c6ceb815910b030bed58e626a686be1.jpg'),
(47, 3, 13, 'onyx-54c715ca01fef66f194090662f0a654b.jpg'),
(48, 4, 13, 'onyx-7809b67f3dce5dcab279704f453f0bc0.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `elemento_mac`
--

CREATE TABLE `elemento_mac` (
  `_id` int(11) NOT NULL,
  `_objecto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradasaida`
--

CREATE TABLE `entradasaida` (
  `_id` int(11) NOT NULL,
  `_data` date NOT NULL,
  `_descOrg` varchar(15) NOT NULL,
  `_idOrg` int(11) NOT NULL,
  `_descDest` varchar(15) NOT NULL,
  `_idDest` int(11) NOT NULL,
  `_id_processo` int(11) NOT NULL,
  `_estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entradasaida`
--

INSERT INTO `entradasaida` (`_id`, `_data`, `_descOrg`, `_idOrg`, `_descDest`, `_idDest`, `_id_processo`, `_estado`) VALUES
(1, '2017-08-20', 'saida', 3, 'entrada', 8, 2, '0'),
(2, '2017-09-03', 'saida', 3, 'entrada', 8, 3, '0'),
(3, '2017-09-03', 'saida', 3, 'entrada', 8, 4, '0'),
(4, '2017-09-03', 'saida', 8, 'entrada', 9, 3, '0'),
(5, '2017-09-03', 'saida', 9, 'entrada', 8, 3, '0'),
(6, '2017-09-03', 'saida', 8, 'entrada', 10, 3, '0'),
(7, '2017-09-04', 'saida', 10, 'entrada', 11, 3, '0'),
(8, '2017-09-04', 'saida', 11, 'entrada', 12, 3, '0'),
(9, '2017-09-08', 'saida', 3, 'entrada', 8, 5, '0'),
(10, '2017-09-11', 'saida', 3, 'entrada', 8, 6, '0'),
(11, '2017-09-11', 'saida', 3, 'entrada', 8, 7, '0'),
(12, '2017-09-11', 'saida', 3, 'entrada', 8, 8, '0'),
(13, '2017-09-11', 'saida', 12, 'entrada', 11, 3, '0'),
(14, '2017-09-11', 'saida', 8, 'entrada', 9, 6, '0'),
(15, '2017-09-11', 'saida', 9, 'entrada', 8, 6, '0'),
(16, '2017-09-11', 'saida', 8, 'entrada', 10, 6, '0'),
(17, '2017-09-11', 'saida', 10, 'entrada', 11, 6, '0'),
(18, '2017-09-11', 'saida', 11, 'entrada', 12, 6, '0'),
(19, '2017-09-11', 'saida', 11, 'entrada', 15, 3, '0'),
(20, '2017-09-13', 'saida', 8, 'entrada', 9, 5, '0'),
(21, '2017-09-13', 'saida', 9, 'entrada', 8, 5, '0'),
(22, '2017-09-13', 'saida', 8, 'entrada', 9, 7, '0'),
(23, '2017-09-13', 'saida', 8, 'entrada', 9, 2, '0'),
(24, '2017-09-13', 'saida', 9, 'entrada', 8, 2, '0'),
(25, '2017-09-13', 'saida', 9, 'entrada', 8, 5, '0'),
(26, '2017-09-13', 'saida', 8, 'entrada', 10, 2, '0'),
(27, '2017-09-13', 'saida', 9, 'entrada', 8, 7, '0'),
(28, '2017-09-13', 'saida', 8, 'entrada', 10, 7, '0'),
(29, '2017-09-13', 'saida', 10, 'entrada', 11, 2, '0'),
(30, '2017-09-13', 'saida', 11, 'entrada', 12, 2, '0'),
(31, '2017-09-13', 'saida', 12, 'entrada', 11, 2, '0'),
(32, '2017-09-18', 'saida', 3, 'entrada', 8, 9, '0'),
(33, '2017-09-19', 'saida', 8, 'entrada', 9, 9, '0'),
(34, '2017-09-19', 'saida', 8, 'entrada', 9, 8, '0'),
(35, '2017-09-19', 'saida', 8, 'entrada', 9, 4, '0'),
(36, '2017-09-19', 'saida', 3, 'entrada', 8, 10, '0'),
(37, '2017-09-19', 'saida', 3, 'entrada', 8, 11, '0'),
(38, '2017-09-22', 'saida', 3, 'entrada', 8, 12, '0'),
(39, '2017-09-22', 'saida', 11, 'entrada', 12, 3, '0'),
(40, '2017-09-22', 'saida', 10, 'entrada', 11, 7, '0'),
(41, '2017-09-22', 'saida', 11, 'entrada', 12, 7, '0'),
(42, '2017-09-24', 'saida', 19, 'entrada', 8, 13, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase`
--

CREATE TABLE `fase` (
  `_id` int(11) NOT NULL,
  `_fase` int(11) NOT NULL,
  `_descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fase`
--

INSERT INTO `fase` (`_id`, `_fase`, `_descricao`) VALUES
(1, 1, 'Conhecimento'),
(2, 2, 'Andamento'),
(3, 3, 'Final');

-- --------------------------------------------------------

--
-- Estrutura da tabela `file_relatorio`
--

CREATE TABLE `file_relatorio` (
  `_id` int(11) NOT NULL,
  `_id_relatorio` int(11) NOT NULL,
  `_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `file_relatorio`
--

INSERT INTO `file_relatorio` (`_id`, `_id_relatorio`, `_path`) VALUES
(1, 1, 'onyx-47b339773a8dc2041f1945a7c4d98773.pdf'),
(2, 2, 'onyx-f702b92bce40cd3072abe190b5a37665.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `_id` int(11) NOT NULL,
  `_perfil` varchar(255) NOT NULL,
  `_id_departamento` int(11) NOT NULL,
  `_sigla` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`_id`, `_perfil`, `_id_departamento`, `_sigla`) VALUES
(1, 'Tecnico', 1, 'TROP'),
(2, 'Tecnico', 3, 'TRGI'),
(3, 'Tecnico', 2, 'TRUC'),
(4, 'Secretario', 4, 'SSG'),
(5, 'Chefe', 1, 'CROP'),
(6, 'Chefe', 3, 'CRGI'),
(7, 'Chefe', 2, 'CRUC'),
(8, 'Director', 6, 'DDMGUUC'),
(9, 'Administrador', 5, 'AAM'),
(10, 'Chefe do Gabinete', 5, 'CAM'),
(11, 'Admin TI', 7, 'AT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `legalizacao_processo`
--

CREATE TABLE `legalizacao_processo` (
  `_id` int(11) NOT NULL,
  `_id_processo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ligacao`
--

CREATE TABLE `ligacao` (
  `_id` int(10) NOT NULL,
  `_data` date DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  `_id_utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `_id` int(10) NOT NULL,
  `_id_provincia` int(11) DEFAULT NULL,
  `_id_municipio` int(11) DEFAULT NULL,
  `_id_comuna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao_municipio`
--

CREATE TABLE `localizacao_municipio` (
  `_id` int(11) NOT NULL,
  `_id_provincia` int(11) NOT NULL,
  `_id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `localizacao_municipio`
--

INSERT INTO `localizacao_municipio` (`_id`, `_id_provincia`, `_id_municipio`) VALUES
(1, 1, 1),
(2, 1, 12),
(3, 2, 40),
(4, 2, 2),
(5, 1, 13),
(6, 1, 157);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mac`
--

CREATE TABLE `mac` (
  `_Id` int(11) NOT NULL,
  `_sujeito` varchar(50) DEFAULT NULL,
  `_objecto` varchar(50) DEFAULT NULL,
  `_accao` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mac_area`
--

CREATE TABLE `mac_area` (
  `_id` int(11) NOT NULL,
  `_area` varchar(50) DEFAULT NULL,
  `_accao` varchar(10) DEFAULT NULL,
  `_id_mac` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `master_admin`
--

CREATE TABLE `master_admin` (
  `_id` int(11) NOT NULL,
  `_id_utilizador` int(11) NOT NULL,
  `_id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `master_admin`
--

INSERT INTO `master_admin` (`_id`, `_id_utilizador`, `_id_admin`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 4, 4),
(4, 6, 5),
(5, 16, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `morada`
--

CREATE TABLE `morada` (
  `_id` int(10) NOT NULL,
  `_id_provincia` int(11) DEFAULT NULL,
  `_id_municipio` int(11) DEFAULT NULL,
  `_id_comuna` int(11) DEFAULT NULL,
  `_id_bairro` int(11) DEFAULT NULL,
  `_id_rua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `morada`
--

INSERT INTO `morada` (`_id`, `_id_provincia`, `_id_municipio`, `_id_comuna`, `_id_bairro`, `_id_rua`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 1),
(3, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 6, 3),
(5, 1, 1, 2, 5, 2),
(6, 1, 1, 1, 6, 4),
(7, 1, 1, 1, 1, 1),
(8, 1, 1, 1, 1, 1),
(9, 1, 1, 1, 1, 1),
(10, 1, 1, 2, 5, 2),
(11, 1, 1, 2, 5, 5),
(12, 1, 1, 1, 6, 4),
(13, 1, 1, 2, 5, 5),
(14, 1, 1, 1, 6, 3),
(23, 1, 1, 1, 6, 3),
(24, 1, 1, 2, 5, 2),
(25, 1, 1, 1, 6, 3),
(26, 1, 1, 2, 5, 2),
(27, 1, 1, 1, 1, 1),
(28, 1, 1, 2, 5, 5),
(29, 1, 1, 2, 5, 2),
(30, 1, 1, 1, 1, 1),
(31, 1, 1, 2, 5, 5),
(32, 1, 1, 2, 5, 2),
(33, 1, 1, 2, 5, 5),
(34, 1, 1, 1, 1, 1),
(35, 1, 1, 2, 5, 2),
(36, 1, 1, 2, 5, 2),
(37, 1, 1, 1, 1, 1),
(38, 1, 1, 1, 1, 1),
(39, 1, 1, 1, 1, 1),
(40, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mudanca_processo`
--

CREATE TABLE `mudanca_processo` (
  `_id` int(11) NOT NULL,
  `_id_processo` int(11) NOT NULL,
  `_id_proc_legal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

CREATE TABLE `municipio` (
  `_id` int(11) NOT NULL,
  `_nome` varchar(50) DEFAULT NULL,
  `_id_provincia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `municipio`
--

INSERT INTO `municipio` (`_id`, `_nome`, `_id_provincia`) VALUES
(1, 'Cacuaco', 1),
(2, 'Amboím', 2),
(3, 'Andulo', 14),
(4, 'Camacupa', 14),
(5, 'Catabola', 14),
(6, 'Chinguar', 14),
(7, 'Chitembo', 14),
(8, 'Cuemba', 14),
(9, 'Cuito', 14),
(10, 'Cunhinga', 14),
(11, 'Nharêa', 14),
(12, 'Belas', 1),
(13, 'Cazenga', 1),
(14, 'Icolo e Bengo', 1),
(15, 'Luanda', 1),
(16, 'Quissama', 1),
(17, 'Viana', 1),
(18, 'Balombo', 4),
(19, 'Baía Farta', 4),
(20, 'Benguela', 4),
(21, 'Bocoio', 4),
(22, 'Caimbambo', 4),
(23, 'Chongorói', 4),
(24, 'Cubal', 4),
(25, 'Lobito', 4),
(26, 'Ganda', 4),
(27, ' Belize', 13),
(28, 'Buco-Zau', 13),
(29, 'Cabinda', 13),
(30, 'Cacongo', 13),
(31, 'Cassongue', 2),
(32, 'Cela', 2),
(33, 'Conda', 2),
(34, 'Ebo', 2),
(35, 'Libolo', 2),
(36, 'Mussende', 2),
(37, 'Quibala', 2),
(38, 'Quilenda', 2),
(39, 'Seles', 2),
(40, 'Sumbe', 2),
(41, 'Ambaca', 3),
(42, 'Banga', 3),
(43, 'Bolongongo', 3),
(44, 'Cambambe', 3),
(45, 'Golungo Alto', 3),
(46, 'Gonguembo', 3),
(47, 'Lucala', 3),
(49, 'Quiculungo', 3),
(50, 'Samba Caju', 3),
(51, 'Bundas', 5),
(52, 'Camanongue', 5),
(53, 'Luacano', 5),
(54, 'Luau', 5),
(55, 'Luchazes', 5),
(56, 'Leua', 5),
(57, 'Moxico', 5),
(58, 'Alto Zambeze', 3),
(59, 'Catchiungo', 6),
(60, 'Caála', 6),
(61, 'Ekunha', 6),
(62, 'Huambo', 6),
(63, 'Londuimbale', 6),
(64, 'Mungo', 6),
(65, 'Tchicala-Tcholoanga', 6),
(66, 'Ucuma', 6),
(67, 'Tchindjenje', 6),
(68, 'Bailundo', 6),
(69, 'Calai', 7),
(70, 'Cuangar', 7),
(71, 'Cuchi', 7),
(72, 'Cuito Cuanavale', 7),
(73, 'Dirico', 7),
(74, 'Longa', 7),
(75, 'Mavinga', 7),
(76, 'Menongue', 7),
(77, 'Rivungo', 7),
(78, 'Cambulo', 8),
(79, 'Capenda-Camulemba', 8),
(80, 'Caungula', 8),
(81, 'Chitato', 8),
(82, 'Cuango', 8),
(83, 'Cuilo', 8),
(84, 'Lubalo', 8),
(85, 'Xá-Muteba', 8),
(86, 'Cacolo', 9),
(87, 'Dala', 9),
(88, 'Muconda', 9),
(89, 'Saurimo', 9),
(90, 'Namibe', 10),
(91, 'Virei', 10),
(92, 'Tômbua', 10),
(93, 'Bibala', 10),
(94, 'Camucuio', 10),
(95, 'Ambriz', 11),
(96, 'Bula Atumba', 11),
(97, 'Dande', 11),
(98, 'Dembos', 11),
(99, 'Nambuangongo', 11),
(100, 'Pango Aluquém', 11),
(101, 'Caconda', 12),
(102, 'Caluquembe', 12),
(103, 'Chiange', 12),
(104, 'Chibia', 12),
(105, 'Chicomba', 12),
(106, 'Chipindo', 12),
(107, 'Cuvango', 12),
(108, 'Humpata', 12),
(109, 'Jamba', 12),
(110, 'Lubango', 12),
(111, 'Matala', 12),
(112, 'Quilengues', 12),
(113, 'Quipungo', 12),
(114, 'Cuanhama', 15),
(115, 'Curoca', 15),
(116, 'Cuvelai', 15),
(117, 'Namacunde', 15),
(118, 'Ombadja', 15),
(119, 'Cahama', 13),
(120, 'Mucaba', 16),
(121, 'Negage', 16),
(122, 'Puri', 16),
(123, 'Quimbele', 16),
(124, 'Quitexe', 16),
(125, 'Sanza Pombo', 16),
(126, 'Songo', 16),
(127, 'Uíge', 16),
(128, 'Zombo', 16),
(129, 'Alto Cauale', 16),
(130, 'Ambuila', 16),
(131, 'Bembe', 16),
(132, 'Buengas', 16),
(133, 'Damba', 16),
(134, 'Macocola', 16),
(135, 'Soyo', 17),
(138, 'Cuimba', 17),
(139, 'M''Banza Kongo', 17),
(140, 'Noqui', 17),
(141, 'N´zeto', 17),
(142, 'Marimba', 18),
(143, 'Massango', 18),
(144, 'Mucari', 18),
(145, 'Quela', 18),
(146, 'Quirima', 18),
(147, 'Cacuso', 18),
(148, 'Calandula', 18),
(149, 'Cambundi-Catembo', 18),
(150, 'Cangandala', 18),
(151, 'Caombo', 18),
(152, 'Cuaba Nzogo', 18),
(153, 'Cunda-Dia-Baze', 18),
(154, 'Luquembo', 18),
(155, 'Malanje', 18),
(156, 'Talatona', 1),
(157, 'Kilamba-kiaxi', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `objecto_area`
--

CREATE TABLE `objecto_area` (
  `_id` int(11) NOT NULL,
  `_area` varchar(255) DEFAULT NULL,
  `_id_objecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `organizacao`
--

CREATE TABLE `organizacao` (
  `_id` int(11) NOT NULL,
  `_id_requerente` int(11) NOT NULL,
  `_nif` varchar(30) DEFAULT NULL,
  `_decreto` varchar(15) NOT NULL,
  `_tipo_organizacao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `_id` int(10) NOT NULL,
  `_codigo` varchar(50) DEFAULT NULL,
  `_data` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_valor` varchar(50) DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  `_id_processo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `_id` int(11) NOT NULL,
  `_sigla` varchar(3) NOT NULL,
  `_nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`_id`, `_sigla`, `_nome`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua And Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas The'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CD', 'Congo The Democratic Republic Of The'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'CI', 'Cote D''Ivoire (Ivory Coast)'),
(54, 'HR', 'Croatia (Hrvatska)'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CZ', 'Czech Republic'),
(58, 'DK', 'Denmark'),
(59, 'DJ', 'Djibouti'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'TP', 'East Timor'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'XA', 'External Territories of Australia'),
(71, 'FK', 'Falkland Islands'),
(72, 'FO', 'Faroe Islands'),
(73, 'FJ', 'Fiji Islands'),
(74, 'FI', 'Finland'),
(75, 'FR', 'France'),
(76, 'GF', 'French Guiana'),
(77, 'PF', 'French Polynesia'),
(78, 'TF', 'French Southern Territories'),
(79, 'GA', 'Gabon'),
(80, 'GM', 'Gambia The'),
(81, 'GE', 'Georgia'),
(82, 'DE', 'Germany'),
(83, 'GH', 'Ghana'),
(84, 'GI', 'Gibraltar'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'XU', 'Guernsey and Alderney'),
(92, 'GN', 'Guinea'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HT', 'Haiti'),
(96, 'HM', 'Heard and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong S.A.R.'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'JM', 'Jamaica'),
(109, 'JP', 'Japan'),
(110, 'XJ', 'Jersey'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea North'),
(116, 'KR', 'Korea South'),
(117, 'KW', 'Kuwait'),
(118, 'KG', 'Kyrgyzstan'),
(119, 'LA', 'Laos'),
(120, 'LV', 'Latvia'),
(121, 'LB', 'Lebanon'),
(122, 'LS', 'Lesotho'),
(123, 'LR', 'Liberia'),
(124, 'LY', 'Libya'),
(125, 'LI', 'Liechtenstein'),
(126, 'LT', 'Lithuania'),
(127, 'LU', 'Luxembourg'),
(128, 'MO', 'Macau S.A.R.'),
(129, 'MK', 'Macedonia'),
(130, 'MG', 'Madagascar'),
(131, 'MW', 'Malawi'),
(132, 'MY', 'Malaysia'),
(133, 'MV', 'Maldives'),
(134, 'ML', 'Mali'),
(135, 'MT', 'Malta'),
(136, 'XM', 'Man (Isle of)'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'YT', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia'),
(144, 'MD', 'Moldova'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'MS', 'Montserrat'),
(148, 'MA', 'Morocco'),
(149, 'MZ', 'Mozambique'),
(150, 'MM', 'Myanmar'),
(151, 'NA', 'Namibia'),
(152, 'NR', 'Nauru'),
(153, 'NP', 'Nepal'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NL', 'Netherlands The'),
(156, 'NC', 'New Caledonia'),
(157, 'NZ', 'New Zealand'),
(158, 'NI', 'Nicaragua'),
(159, 'NE', 'Niger'),
(160, 'NG', 'Nigeria'),
(161, 'NU', 'Niue'),
(162, 'NF', 'Norfolk Island'),
(163, 'MP', 'Northern Mariana Islands'),
(164, 'NO', 'Norway'),
(165, 'OM', 'Oman'),
(166, 'PK', 'Pakistan'),
(167, 'PW', 'Palau'),
(168, 'PS', 'Palestinian Territory Occupied'),
(169, 'PA', 'Panama'),
(170, 'PG', 'Papua new Guinea'),
(171, 'PY', 'Paraguay'),
(172, 'PE', 'Peru'),
(173, 'PH', 'Philippines'),
(174, 'PN', 'Pitcairn Island'),
(175, 'PL', 'Poland'),
(176, 'PT', 'Portugal'),
(177, 'PR', 'Puerto Rico'),
(178, 'QA', 'Qatar'),
(179, 'RE', 'Reunion'),
(180, 'RO', 'Romania'),
(181, 'RU', 'Russia'),
(182, 'RW', 'Rwanda'),
(183, 'SH', 'Saint Helena'),
(184, 'KN', 'Saint Kitts And Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'PM', 'Saint Pierre and Miquelon'),
(187, 'VC', 'Saint Vincent And The Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'XG', 'Smaller Territories of the UK'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia'),
(204, 'SS', 'South Sudan'),
(205, 'ES', 'Spain'),
(206, 'LK', 'Sri Lanka'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syria'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad And Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks And Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States Minor Outlying Islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State (Holy See)'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (US)'),
(241, 'WF', 'Wallis And Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'YU', 'Yugoslavia'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parecer`
--

CREATE TABLE `parecer` (
  `_id` int(11) NOT NULL,
  `_descricao` longtext,
  `_data` date DEFAULT NULL,
  `_destino` int(11) DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  `_id_processo` int(11) DEFAULT NULL,
  `_id_fase` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parecer`
--

INSERT INTO `parecer` (`_id`, `_descricao`, `_data`, `_destino`, `_id_utilizador`, `_id_processo`, `_id_fase`) VALUES
(1, 'Para DMGUUC do Anersio', '2017-09-03', 10, 9, 3, 1),
(2, 'Dar o devido tratamento.', '2017-09-04', 11, 10, 3, 1),
(3, 'trata disso.', '2017-09-04', 12, 11, 3, 1),
(4, 'default', '2017-09-11', 11, 12, 3, 2),
(5, 'Ver o que fazer.', '2017-09-11', 10, 9, 6, 1),
(6, 'Dar o melhor tratamento.', '2017-09-11', 11, 10, 6, 1),
(7, 'Trata de ir ao terreno para cadastra-lo.', '2017-09-11', 12, 11, 6, 1),
(8, 'Fazer a informação espelho.', '2017-09-11', 15, 11, 3, 1),
(9, 'T.C', '2017-09-13', 10, 9, 2, 1),
(10, 'T.C', '2017-09-13', 10, 9, 5, 1),
(11, 'T.C', '2017-09-13', 10, 9, 7, 1),
(12, 'Vistoria e informação.', '2017-09-13', 11, 10, 2, 1),
(13, 'Cuidar do processo.', '2017-09-13', 12, 11, 2, 1),
(14, 'default', '2017-09-13', 11, 12, 2, 2),
(15, 'Cuidar do caso em questão - 22.09.2017', '2017-09-22', 11, 10, 7, 1),
(16, 'Cuidar do caso em questão - 22.09.2017', '2017-09-22', 12, 11, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE `processo` (
  `_id` int(10) NOT NULL,
  `_num_processoGeral` varchar(60) DEFAULT NULL,
  `_assunto` varchar(50) DEFAULT NULL,
  `_id_utilizador` int(11) DEFAULT NULL,
  `_id_requerente` int(11) DEFAULT NULL,
  `_id_distrito` int(11) NOT NULL,
  `_id_administracao` int(11) NOT NULL,
  `_id_prioridade` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `processo`
--

INSERT INTO `processo` (`_id`, `_num_processoGeral`, `_assunto`, `_id_utilizador`, `_id_requerente`, `_id_distrito`, `_id_administracao`, `_id_prioridade`) VALUES
(1, '001/LT/17', 'Vedação e Ocupação', 5, 1, 1, 4, 1),
(2, '002/LT/17', 'Vedação e Ocupação', 3, 2, 1, 1, 4),
(3, '003/LT/17', 'Direito de Superfície', 3, 3, 1, 1, 1),
(4, '003/LT/17', 'Direito de Superfície', 3, 3, 1, 1, 1),
(5, '004/LT/17', 'Licença de Construção', 3, 4, 1, 1, 1),
(6, '005/LT/17', 'Direito de Superfície', 3, 5, 1, 1, 1),
(7, '006/LT/17', 'Direito de Superfície', 3, 6, 1, 1, 3),
(8, '006/LT/17', 'Direito de Superfície', 3, 6, 1, 1, 1),
(9, '006/LT/17', 'Direito de Superfície', 3, 6, 1, 1, 2),
(10, '006/LT/17', 'Vedação e Ocupação', 3, 6, 1, 1, NULL),
(11, '006/LT/17', 'Vedação e Ocupação', 3, 6, 2, 1, NULL),
(12, '006/LT/17', 'Vedação e Ocupação', 3, 6, 4, 1, 1),
(13, '011/LT/17', 'Direito de Superfície', 19, 11, 0, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projecto`
--

CREATE TABLE `projecto` (
  `_id` int(11) NOT NULL,
  `_id_localizacao` int(11) NOT NULL,
  `_coordenador` int(11) NOT NULL,
  `_nome` varchar(100) NOT NULL,
  `_data_criacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario_org`
--

CREATE TABLE `proprietario_org` (
  `_id` int(11) NOT NULL,
  `_id_organizacao` int(11) NOT NULL,
  `_nome` varchar(70) NOT NULL,
  `_telefone` varchar(20) NOT NULL,
  `_pais` varchar(30) NOT NULL,
  `_numDI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincia`
--

CREATE TABLE `provincia` (
  `_id` int(11) NOT NULL,
  `_nome` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `_sigla` varchar(2) COLLATE utf8_general_mysql500_ci NOT NULL,
  `_longitude` float NOT NULL,
  `_latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `provincia`
--

INSERT INTO `provincia` (`_id`, `_nome`, `_sigla`, `_longitude`, `_latitude`) VALUES
(1, 'Luanda', 'LA', -8.1933, 13.1933),
(2, 'Cuanza Sul', 'KS', -8.1933, 13.1933),
(3, 'Cuanza Norte', 'KN', -8.1933, 13.1933),
(4, 'Benguela', 'BG', -8.1933, 13.1933),
(5, 'Moxico', 'MO', -8.1933, 13.1933),
(6, 'Huambo', 'HO', -8.1933, 13.1933),
(7, 'Cuando Cubango', 'KK', -8.1933, 13.1933),
(8, 'Lunda Norte', 'LN', -8.1933, 13.1933),
(9, 'Lunda Sul', 'LS', -8.1933, 13.1933),
(10, 'Namibe', 'NE', -8.1933, 13.1933),
(11, 'Bengo', 'BO', -8.1933, 13.1933),
(12, 'Huila', 'HA', -8.1933, 13.1933),
(13, 'Cabinda', 'CA', -8.1933, 13.1933),
(14, 'Bie', 'BE', -8.1933, 13.1933),
(15, 'Cunene', 'CE', -8.1933, 13.1933),
(16, 'Uige', 'UE', -8.1933, 13.1933),
(17, 'Zaire', 'ZE', -8.1933, 13.1933),
(18, 'Malanje', 'ME', -8.1933, 13.1933);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `_id` int(10) NOT NULL,
  `_observacao` text,
  `_id_pocesso` int(11) NOT NULL,
  `_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`_id`, `_observacao`, `_id_pocesso`, `_data`) VALUES
(1, 'Este eh  o relatório técnico.', 3, '2017-09-11'),
(2, 'xckljvlsdkm', 2, '2017-09-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requerente`
--

CREATE TABLE `requerente` (
  `_id` int(10) NOT NULL,
  `_nome` varchar(255) DEFAULT NULL,
  `_telefone` varchar(50) DEFAULT NULL,
  `_email` varchar(100) NOT NULL,
  `_id_morada` int(11) DEFAULT NULL,
  `_tipo` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requerente`
--

INSERT INTO `requerente` (`_id`, `_nome`, `_telefone`, `_email`, `_id_morada`, `_tipo`) VALUES
(1, 'Ana Maria', '+244 934 659 982', 'ana_maria@gmail.com', 8, 'cidadao'),
(2, 'Mendes Joaquim Pereira', '+244 912 443 012', 'mendes@onyx.ao', 13, 'cidadao'),
(3, 'Anesio Jorge Bandeira Coelho', '+244 923 550 977', 'jorge.coelho@gmail.com', 14, 'cidadao'),
(4, 'Alberto Jos&eacute;', '+244 923 550 567', '', 25, 'cidadao'),
(5, 'Paulo Xavier', '+244 943 777 432', 'xavier@onyx.ao', 27, 'cidadao'),
(6, 'ana Bela', '+244 932 873 833', 'ana@onyx.ao', 28, 'cidadao'),
(11, 'Teste mais teste', '+244 998 767 676', 'teste2017@gmail.com', 40, 'cidadao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rua`
--

CREATE TABLE `rua` (
  `_id` int(11) NOT NULL,
  `_nome` varchar(60) NOT NULL,
  `_id_bairro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rua`
--

INSERT INTO `rua` (`_id`, `_nome`, `_id_bairro`) VALUES
(1, 'Rua da Paz', 1),
(2, 'Missão', 5),
(3, 'Rua 1', 6),
(4, 'Rua 2', 6),
(5, 'Rua da Conduta', 5),
(6, 'Rua 1', 13),
(7, 'Rua 1', 14),
(8, 'Rua 1', 15),
(9, 'Rua 1', 16),
(10, 'Rua 1', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretariageral`
--

CREATE TABLE `secretariageral` (
  `_id` int(10) NOT NULL,
  `_id_utilizador` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `secretariageral`
--

INSERT INTO `secretariageral` (`_id`, `_id_utilizador`) VALUES
(1, 3),
(2, 5),
(3, 7),
(4, 13),
(5, 16),
(6, 16),
(7, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `substituicao_terreno`
--

CREATE TABLE `substituicao_terreno` (
  `_id` int(11) NOT NULL,
  `_id_mudanc_ter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `_id` int(10) NOT NULL,
  `_id_utilizador` int(10) DEFAULT NULL,
  `_tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tecnico`
--

INSERT INTO `tecnico` (`_id`, `_id_utilizador`, `_tipo`) VALUES
(1, 12, 'tect_campo'),
(2, 14, 'tect_admin'),
(3, 15, 'tect_admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnicorelatorio`
--

CREATE TABLE `tecnicorelatorio` (
  `_id` int(10) NOT NULL,
  `_id_tecnico` int(10) DEFAULT NULL,
  `_id_relatorio` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terreno`
--

CREATE TABLE `terreno` (
  `_id` int(10) NOT NULL,
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
  `_id_utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `terreno`
--

INSERT INTO `terreno` (`_id`, `_codigoterreno`, `_area`, `_largura`, `_comprimento`, `_quateirao`, `_bloco`, `_lote`, `_numVert`, `_id_zona`, `_id_utilizador`, `_id_utente`) VALUES
(1, '66767', 60, 30, 30, 'Q2', 'B24', '9', 4, 2, 12, 3),
(2, '323', 40, 20, 20, 'Q12', 'B4', '23', 4, 1, 12, 5),
(3, 'LACOCO00003', 900, 30, 30, 'Q12', 'B5', '22', 4, 1, 12, 2),
(4, 'LACOCO00004', 900, 30, 30, 'Q1', 'B22', '56', 4, 1, 12, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `terreno_derivado`
--

CREATE TABLE `terreno_derivado` (
  `_id` int(11) NOT NULL,
  `_id_terreno` int(11) NOT NULL,
  `_id_terreno_mae` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terreno_mae`
--

CREATE TABLE `terreno_mae` (
  `_id` int(11) NOT NULL,
  `_id_terreno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terreno_normal`
--

CREATE TABLE `terreno_normal` (
  `_id` int(11) NOT NULL,
  `_id_terreno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_terreno`
--

CREATE TABLE `tipo_terreno` (
  `_id` int(11) NOT NULL,
  `_id_terreno` int(11) NOT NULL,
  `tipo` varchar(40) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `_id` int(10) NOT NULL,
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
  `_data_valida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`_id`, `_id_administracao`, `_nome`, `_apelido`, `_num_bi`, `_data_nascimento`, `_genero`, `_telefone`, `_email`, `_nivel_escolar`, `_morada`, `_id_grupo`, `_foto`, `_proveniencia`, `_data_emissao`, `_data_valida`) VALUES
(1, 1, 'Matondo Vicente', 'Quela', '000273823LA287', '1999-12-06', 'm', '+244 996 198 371', 'mavipela@gmail.com', 'Tecnico Superior', 3, 11, 'padrao.jpg', 1, '2017-06-23', '0000-00-00'),
(2, 2, 'Edson Filomena', 'Viegas', '008875657LA676', '1999-12-07', 'm', '+244 937 653 100', 'homolibero@gmail.com', 'Tecnico Superior', 4, 11, 'padrao.jpg', 1, '2017-06-14', '0000-00-00'),
(3, 1, 'Jo&atilde;o Fontes', 'Olli', '009232372LA837', '1999-12-06', 'm', '+244 923 734 384', 'joao_fontes@gmail.com', 'Tecnico Superior', 5, 4, 'padrao.jpg', 1, '2017-06-23', '0000-00-00'),
(4, 4, 'Elvio Sadoc da Silva e Sousa', 'Sousa', '002831985KS039', '1988-10-30', 'm', '+244 923 839 208', 'hackerxp33@gmail.com', 'Tecnico Superior', 6, 11, 'onyx-d7f122a4fac3220201fbae535646e39f.jpg', 2, '2014-10-28', '2019-12-04'),
(6, 5, 'Osvaldo Avelino', 'Jeronimo', '002832398LA392', '1999-12-06', 'm', '+244 937 283 239', 'osvaldo_avelino@gmail.com', 'Tecnico Superior', 9, 11, 'padrao.jpg', 1, '2017-07-11', '0000-00-00'),
(7, 5, 'Jo&atilde;o Firmino', 'Baptista', '989382323LA232', '1999-12-14', 'm', '+244 023 832 823', 'joaobaptista@gmail.com', 'Tecnico Superior', 10, 4, 'padrao.jpg', 1, '2017-07-30', '0000-00-00'),
(8, 1, 'Lukau', 'Garcia', '000256258UE012', '1993-04-11', 'm', '+244 934 700 124', 'lukau@gesterra.ao', 'Bacharel', 11, 10, 'padrao.jpg', 16, '2014-12-01', '2019-11-29'),
(9, 1, 'Jorge', 'Coelho', '008653221LA074', '1985-02-06', 'm', '+244 923 766 125', 'jorge@onyx.ao', 'Doutor', 12, 9, 'onyx-09612a52305fae343d7fc611a449c133.jpg', 1, '2014-12-01', '2019-11-29'),
(10, 1, 'Sadoc', 'Sousa', '323200000LA003', '1999-12-31', 'm', '+244 455 555 555', 'sadoc@onyx.ao', NULL, 14, 8, 'padrao.jpg', 1, '2014-12-01', '2017-11-29'),
(11, 1, 'Alice djacira', 'Coelho', '000344221KN054', '1980-02-12', 'f', '+244 923 435 560', 'alice@onyx.ao', 'null', 23, 7, 'padrao.jpg', 3, '2015-06-22', '2020-10-28'),
(12, 1, 'Paulo', 'Miguel', '038003445KN300', '1984-06-19', 'm', '+244 992 344 567', 'paulo@onyx.ao', 'null', 24, 3, 'padrao.jpg', 3, '2012-01-09', '0000-00-00'),
(13, 1, 'Maria', 'Joao', '000876522LA100', '1969-03-18', 'm', '+244 927 443 399', 'maria@onyx.ao', 'Tecnico Medio', 26, 4, 'padrao.jpg', 1, '2014-06-23', '2019-11-26'),
(14, 1, 'Joao', 'Tecnico', '003566523BE023', '1989-05-15', 'm', '+244 919 273 648', 'joao@onyx.ao', 'Tecnico de Base', 30, 1, 'padrao.jpg', 14, '2016-05-23', '2021-06-23'),
(15, 1, 'Miguel', 'tecnico', '003883229BO009', '1981-05-17', 'm', '+244 992 345 887', '', 'Bacharel', 31, 3, 'padrao.jpg', 11, '2017-08-27', '2019-12-05'),
(16, 6, 'Dayse', 'Bragan&ccedil;a', '004734330LA023', '1988-12-12', 'm', '+244 923 444 098', 'dayse@onyx.ao', 'Tecnico Superior', 36, 11, 'padrao.jpg', 1, '2014-02-11', '2020-03-12'),
(19, 6, 'Manuel', 'Secretario', '004389834BE440', '1999-12-20', 'm', '+244 919 180 604', '', 'Mestre', 39, 4, 'padrao.jpg', 14, '2014-06-23', '2019-05-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vertice`
--

CREATE TABLE `vertice` (
  `_id` int(10) NOT NULL,
  `_longitude` double DEFAULT NULL,
  `_latitude` double DEFAULT NULL,
  `_id_terreno` varchar(50) DEFAULT NULL,
  `_p_front` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vertice`
--

INSERT INTO `vertice` (`_id`, `_longitude`, `_latitude`, `_id_terreno`, `_p_front`) VALUES
(1, 1, 1, '1', '0'),
(2, 1, 2, '1', '0'),
(3, 2, 1, '1', '0'),
(4, 2, 2, '1', '0'),
(5, 3, 5, '2', 'n'),
(6, 5, 5, '2', 'n'),
(7, 5, 3, '2', 'n'),
(8, 3, 3, '2', 'n'),
(9, 3, 5, '3', 's'),
(10, 2, 5, '3', 'n'),
(11, 2, 4, '3', 'n'),
(12, 3, 4, '3', 'n'),
(13, 2, 4, '4', 's'),
(14, 3, 4, '4', 's'),
(15, 3, 3, '4', 's'),
(16, 2, 3, '4', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `zona`
--

CREATE TABLE `zona` (
  `_id` int(11) NOT NULL,
  `_nome` varchar(40) NOT NULL,
  `_id_provincia` int(11) NOT NULL,
  `_id_municipio` int(11) NOT NULL,
  `_id_comuna` int(11) NOT NULL,
  `_id_bairro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `zona`
--

INSERT INTO `zona` (`_id`, `_nome`, `_id_provincia`, `_id_municipio`, `_id_comuna`, `_id_bairro`) VALUES
(1, 'Vila Kativa', 1, 1, 1, 1),
(2, 'Vila Verde', 1, 1, 2, 5),
(3, 'Bairro Novo', 1, 1, 1, 3),
(4, 'Zona 3', 1, 1, 1, 5),
(5, 'Nova Urbanização', 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adesao_processo`
--
ALTER TABLE `adesao_processo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `administracao_municipal`
--
ALTER TABLE `administracao_municipal`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `admin_processo`
--
ALTER TABLE `admin_processo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `assunto`
--
ALTER TABLE `assunto`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `bairro_distrito`
--
ALTER TABLE `bairro_distrito`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `cga`
--
ALTER TABLE `cga`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `cidadao`
--
ALTER TABLE `cidadao`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `confronto`
--
ALTER TABLE `confronto`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `uq_conta_fone` (`_telefone`),
  ADD UNIQUE KEY `uq_conta_user` (`_utilizador`);

--
-- Indexes for table `control_cred`
--
ALTER TABLE `control_cred`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `crguuc`
--
ALTER TABLE `crguuc`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `uq_grupo` (`_perfil`);

--
-- Indexes for table `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `divisao_terreno`
--
ALTER TABLE `divisao_terreno`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `dmguuc`
--
ALTER TABLE `dmguuc`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `documento_processo`
--
ALTER TABLE `documento_processo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `elemento_mac`
--
ALTER TABLE `elemento_mac`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `entradasaida`
--
ALTER TABLE `entradasaida`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `file_relatorio`
--
ALTER TABLE `file_relatorio`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `legalizacao_processo`
--
ALTER TABLE `legalizacao_processo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `ligacao`
--
ALTER TABLE `ligacao`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `localizacao_municipio`
--
ALTER TABLE `localizacao_municipio`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `mac`
--
ALTER TABLE `mac`
  ADD PRIMARY KEY (`_Id`);

--
-- Indexes for table `mac_area`
--
ALTER TABLE `mac_area`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `_id_mac` (`_id_mac`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `morada`
--
ALTER TABLE `morada`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `mudanca_processo`
--
ALTER TABLE `mudanca_processo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `objecto_area`
--
ALTER TABLE `objecto_area`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `_id_objecto` (`_id_objecto`);

--
-- Indexes for table `organizacao`
--
ALTER TABLE `organizacao`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `parecer`
--
ALTER TABLE `parecer`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `proprietario_org`
--
ALTER TABLE `proprietario_org`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `requerente`
--
ALTER TABLE `requerente`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `uq_requerenteEmail` (`_email`),
  ADD UNIQUE KEY `uq_requerenteTelefone` (`_telefone`);

--
-- Indexes for table `rua`
--
ALTER TABLE `rua`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `secretariageral`
--
ALTER TABLE `secretariageral`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `substituicao_terreno`
--
ALTER TABLE `substituicao_terreno`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tecnicorelatorio`
--
ALTER TABLE `tecnicorelatorio`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `terreno`
--
ALTER TABLE `terreno`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `terreno_derivado`
--
ALTER TABLE `terreno_derivado`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `terreno_mae`
--
ALTER TABLE `terreno_mae`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tipo_terreno`
--
ALTER TABLE `tipo_terreno`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `uq_utliza_bi` (`_num_bi`),
  ADD UNIQUE KEY `uq_utliza_fone` (`_telefone`);

--
-- Indexes for table `vertice`
--
ALTER TABLE `vertice`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adesao_processo`
--
ALTER TABLE `adesao_processo`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `administracao_municipal`
--
ALTER TABLE `administracao_municipal`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_processo`
--
ALTER TABLE `admin_processo`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assunto`
--
ALTER TABLE `assunto`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bairro`
--
ALTER TABLE `bairro`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `bairro_distrito`
--
ALTER TABLE `bairro_distrito`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `cga`
--
ALTER TABLE `cga`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cidadao`
--
ALTER TABLE `cidadao`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comuna`
--
ALTER TABLE `comuna`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `confronto`
--
ALTER TABLE `confronto`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `control_cred`
--
ALTER TABLE `control_cred`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `crguuc`
--
ALTER TABLE `crguuc`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `distrito`
--
ALTER TABLE `distrito`
  MODIFY `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `divisao_terreno`
--
ALTER TABLE `divisao_terreno`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmguuc`
--
ALTER TABLE `dmguuc`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `documento_processo`
--
ALTER TABLE `documento_processo`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `elemento_mac`
--
ALTER TABLE `elemento_mac`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entradasaida`
--
ALTER TABLE `entradasaida`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `fase`
--
ALTER TABLE `fase`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `file_relatorio`
--
ALTER TABLE `file_relatorio`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `legalizacao_processo`
--
ALTER TABLE `legalizacao_processo`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ligacao`
--
ALTER TABLE `ligacao`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `localizacao`
--
ALTER TABLE `localizacao`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `localizacao_municipio`
--
ALTER TABLE `localizacao_municipio`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mac`
--
ALTER TABLE `mac`
  MODIFY `_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mac_area`
--
ALTER TABLE `mac_area`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `morada`
--
ALTER TABLE `morada`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `mudanca_processo`
--
ALTER TABLE `mudanca_processo`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `objecto_area`
--
ALTER TABLE `objecto_area`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organizacao`
--
ALTER TABLE `organizacao`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `parecer`
--
ALTER TABLE `parecer`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `processo`
--
ALTER TABLE `processo`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `proprietario_org`
--
ALTER TABLE `proprietario_org`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provincia`
--
ALTER TABLE `provincia`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `requerente`
--
ALTER TABLE `requerente`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `rua`
--
ALTER TABLE `rua`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `secretariageral`
--
ALTER TABLE `secretariageral`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `substituicao_terreno`
--
ALTER TABLE `substituicao_terreno`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tecnicorelatorio`
--
ALTER TABLE `tecnicorelatorio`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terreno`
--
ALTER TABLE `terreno`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `terreno_derivado`
--
ALTER TABLE `terreno_derivado`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terreno_mae`
--
ALTER TABLE `terreno_mae`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_terreno`
--
ALTER TABLE `tipo_terreno`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `vertice`
--
ALTER TABLE `vertice`
  MODIFY `_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `zona`
--
ALTER TABLE `zona`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `mac_area`
--
ALTER TABLE `mac_area`
  ADD CONSTRAINT `mac_area_ibfk_1` FOREIGN KEY (`_id_mac`) REFERENCES `mac` (`_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `objecto_area`
--
ALTER TABLE `objecto_area`
  ADD CONSTRAINT `objecto_area_ibfk_1` FOREIGN KEY (`_id_objecto`) REFERENCES `elemento_mac` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
