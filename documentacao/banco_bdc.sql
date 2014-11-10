-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 186.202.152.240
-- Tempo de Geração: 10/11/2014 às 08:10:59
-- Versão do Servidor: 5.6.16
-- Versão do PHP: 5.3.3-7+squeeze22

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bdc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE IF NOT EXISTS `colaboradores` (
  `id_colaborador` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_lattes` varchar(150) NOT NULL,
  `nome_colaborador` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefone` int(10) DEFAULT NULL,
  `data_admissao` date DEFAULT NULL,
  `status_colaborador` int(1) DEFAULT NULL,
  `matricula` bigint(10) DEFAULT NULL,
  `usuarios_id_usuario` int(10) unsigned NOT NULL,
  `cpf` varchar(11) NOT NULL,
  PRIMARY KEY (`id_colaborador`),
  UNIQUE KEY `colaboradores_matricula_index` (`matricula`),
  KEY `colaboradores_nome_index` (`nome_colaborador`),
  KEY `fk_colaboradores_usuarios1_idx` (`usuarios_id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`id_colaborador`, `link_lattes`, `nome_colaborador`, `email`, `telefone`, `data_admissao`, `status_colaborador`, `matricula`, `usuarios_id_usuario`, `cpf`) VALUES
(47, 'http://.....', 'Luis Claudio Jr', 'suporte@dbfrete.com.br', 2147483647, '2013-05-09', 0, 11115013, 48, '09105300922'),
(48, 'http://.....', 'Reginaldo Rubens', 'Reginaldo@ifc-camboriu.edu.br', 34255678, '2014-10-31', 0, 12356890, 49, '18883437888'),
(50, 'http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4701226D5', 'André Fabiano', 'Afdmoraes@ifc-camboriu.edu.br', 231242132, '2014-01-01', 1, 122424343, 53, '54553612798'),
(51, 'http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4759783E0', 'Catia Regina', 'Catia@ifc-camboriu.edu.br', 2147483647, '2011-10-31', 0, 111150133, 54, '22584828103'),
(53, 'http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4782996D2', 'Cristian Koliver', 'Cristian@ifc-camboriu.edu.br', 2147483647, '2014-11-02', 0, 112413431, 57, '312123212'),
(54, '', 'Angelo Frozza', 'Frozza@ifc-camboriu.edu.br', 24242424, '2014-11-10', 0, 24242424, 58, '1111111111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencias`
--

CREATE TABLE IF NOT EXISTS `competencias` (
  `id_competencia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_competencia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_competencia`),
  UNIQUE KEY `competencias_unique` (`nome_competencia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Extraindo dados da tabela `competencias`
--

INSERT INTO `competencias` (`id_competencia`, `nome_competencia`) VALUES
(32, 'Desenvolvimento web'),
(31, 'Marketing digital'),
(33, 'Banco de dados I'),
(34, 'TIC'),
(35, 'Projetos'),
(37, 'Redes móveis'),
(38, 'Banco de dados 2'),
(39, 'Design patterns'),
(40, 'Empreendedorismo'),
(41, 'Desenvolvimentos Moveis'),
(42, 'Dados Semi Estruturado'),
(43, 'Administração Servidor'),
(44, 'Orientação a Objetos '),
(45, 'Tópicos Avançados'),
(46, 'Analise de requisitos'),
(47, 'INTRODUÇÃO A COMPUTAÇÃO'),
(49, 'SISTEMAS OPERACIONAIS'),
(50, 'ENGENHARIA DE REQUISITOS'),
(51, 'GESTÃO EMPRESARIAL'),
(52, 'ANÁLISE E PROJETO DE SISTEMAS'),
(53, 'GERENCIAMENTO DE PROJETOS'),
(54, 'NEGÓCIOS NA INTERNET'),
(55, 'Fundamentos de Redes de Computadores'),
(56, 'Tópicos Avançados em Programação Web');

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencias_colaboradores`
--

CREATE TABLE IF NOT EXISTS `competencias_colaboradores` (
  `id_competencias_colaboradores` int(11) NOT NULL AUTO_INCREMENT,
  `competencias_id_competencia` int(10) unsigned NOT NULL,
  `colaboradores_id_colaborador` int(10) unsigned NOT NULL,
  `data_inserida` datetime DEFAULT NULL,
  PRIMARY KEY (`id_competencias_colaboradores`,`competencias_id_competencia`,`colaboradores_id_colaborador`),
  KEY `fk_competencias_has_colaboradores_colaboradores1_idx` (`colaboradores_id_colaborador`),
  KEY `fk_competencias_has_colaboradores_competencias1_idx` (`competencias_id_competencia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=184 ;

--
-- Extraindo dados da tabela `competencias_colaboradores`
--

INSERT INTO `competencias_colaboradores` (`id_competencias_colaboradores`, `competencias_id_competencia`, `colaboradores_id_colaborador`, `data_inserida`) VALUES
(158, 33, 48, '2014-11-06 22:02:43'),
(152, 50, 51, '2014-11-06 21:55:41'),
(151, 40, 51, '2014-11-06 21:55:41'),
(153, 53, 51, '2014-11-06 21:55:41'),
(183, 41, 54, '2012-11-08 11:28:55'),
(161, 41, 48, '2014-11-06 22:02:43'),
(162, 39, 48, '2014-11-06 22:02:43'),
(116, 32, 50, '2014-10-23 19:49:45'),
(160, 32, 48, '2014-11-06 22:02:43'),
(159, 42, 48, '2014-11-06 22:02:43'),
(118, 35, 50, '2014-10-23 19:49:45'),
(119, 37, 50, '2014-10-23 19:49:45'),
(150, 52, 51, '2014-11-06 21:55:41'),
(149, 46, 51, '2014-11-06 21:55:41'),
(148, 43, 51, '2014-11-06 21:55:41'),
(157, 38, 48, '2014-11-06 22:02:43'),
(156, 35, 51, '2014-11-06 21:55:41'),
(155, 54, 51, '2014-11-06 21:55:41'),
(154, 47, 51, '2014-11-06 21:55:41'),
(163, 47, 48, '2014-11-06 22:02:43'),
(164, 44, 48, '2014-11-06 22:02:43'),
(165, 45, 48, '2014-11-06 22:02:43'),
(166, 43, 53, '2014-11-06 22:06:51'),
(167, 38, 53, '2014-11-06 22:06:51'),
(168, 33, 53, '2014-11-06 22:06:51'),
(169, 42, 53, '2014-11-06 22:06:51'),
(170, 53, 53, '2014-11-06 22:06:51'),
(171, 47, 53, '2014-11-06 22:06:51'),
(172, 37, 53, '2014-11-06 22:06:51'),
(173, 49, 53, '2014-11-06 22:06:51'),
(174, 45, 53, '2014-11-06 22:06:51'),
(175, 43, 50, '2014-11-08 09:17:54'),
(176, 38, 50, '2014-11-08 09:17:54'),
(177, 33, 50, '2014-11-08 09:17:54'),
(178, 42, 50, '2014-11-08 09:17:54'),
(179, 47, 50, '2014-11-08 09:17:54'),
(180, 49, 50, '2014-11-08 09:17:54'),
(181, 55, 50, '2014-11-08 09:24:52'),
(182, 56, 50, '2012-11-08 09:25:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=288 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`) VALUES
(273, 'Sistemas para Internet'),
(274, 'Filosofia'),
(275, 'Engenharia de sofrware'),
(276, 'Engenharia Química'),
(277, 'Matematica'),
(278, 'Educação fisica'),
(279, 'desenvolvimento java'),
(280, 'Redes Móveis'),
(281, 'Ciência da Computação'),
(282, 'Engenharia e Gestão do Conhecimento'),
(283, 'Computação'),
(284, 'Engenharia Elétrica'),
(285, 'Engenharia de produção'),
(286, 'Engenharia Civil'),
(287, 'andamento em Educação em Eng, Ciência e Tecnologia ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacoes_colaboradores`
--

CREATE TABLE IF NOT EXISTS `formacoes_colaboradores` (
  `id_formacoes_colaboradores` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_formacao` int(10) unsigned NOT NULL,
  `id_curso` int(10) unsigned NOT NULL,
  `colaboradores_id_colaborador` int(10) unsigned NOT NULL,
  `data_inserida` datetime DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_termino` date NOT NULL,
  PRIMARY KEY (`id_formacoes_colaboradores`,`id_tipo_formacao`,`id_curso`,`colaboradores_id_colaborador`),
  KEY `fk_formacoes_has_colaboradores_colaboradores1_idx` (`colaboradores_id_colaborador`),
  KEY `fk_formacoes_has_colaboradores_formacoes1_idx` (`id_tipo_formacao`,`id_curso`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Extraindo dados da tabela `formacoes_colaboradores`
--

INSERT INTO `formacoes_colaboradores` (`id_formacoes_colaboradores`, `id_tipo_formacao`, `id_curso`, `colaboradores_id_colaborador`, `data_inserida`, `data_inicio`, `data_termino`) VALUES
(34, 12, 285, 50, '2014-11-08 09:12:23', '1999-01-01', '2013-12-31'),
(35, 14, 286, 50, '2014-11-08 09:13:05', '2007-01-01', '2011-12-31'),
(32, 14, 284, 53, '2014-11-06 22:10:33', '1997-01-01', '2001-12-31'),
(27, 9, 281, 51, '2014-11-06 21:42:45', '1995-01-01', '2000-12-31'),
(28, 12, 281, 51, '2014-11-06 21:43:06', '2003-01-01', '2005-12-31'),
(31, 12, 283, 53, '2014-11-06 22:09:33', '1989-01-01', '1992-12-31'),
(29, 14, 282, 51, '2014-11-06 21:46:49', '2006-01-01', '2010-12-31'),
(33, 9, 281, 50, '2014-11-08 09:11:14', '1993-01-01', '1999-12-31'),
(30, 11, 281, 53, '2014-11-06 22:08:16', '1984-01-01', '1988-12-31'),
(36, 15, 287, 50, '2014-11-08 09:17:13', '2013-01-01', '2013-12-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE IF NOT EXISTS `instituicao` (
  `id_instituicao` int(11) NOT NULL,
  `nome_instituicao` varchar(200) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `logomarca_diretorio` varchar(45) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `tempo_sem_atualizar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_instituicao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`id_instituicao`, `nome_instituicao`, `endereco`, `cidade`, `estado`, `telefone`, `logomarca_diretorio`, `cnpj`, `tempo_sem_atualizar`) VALUES
(1, 'IFC VIDEIRA', 'RUA JOAQUIM GARCIA S/N', 'CAMBORIU', 'SC', '(47) 2104-33211212', NULL, '1245532300123', '180');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_formacoes`
--

CREATE TABLE IF NOT EXISTS `tipos_formacoes` (
  `id_tipo_formacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_formacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_formacao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `tipos_formacoes`
--

INSERT INTO `tipos_formacoes` (`id_tipo_formacao`, `tipo_formacao`) VALUES
(9, 'Graduação'),
(10, 'Pós Graduação'),
(11, 'Bacharelado'),
(12, 'Mestrado'),
(13, 'Técnologo'),
(14, 'Doutorado'),
(15, 'Especialização');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permissao` int(1) DEFAULT NULL,
  `usuario` varchar(25) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuarios_index` (`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `permissao`, `usuario`, `senha`) VALUES
(53, 1, 'Andre', '123'),
(54, 2, 'Catia', '123456'),
(49, 2, 'Teste', '123'),
(48, 0, 'Admin', '123'),
(57, 2, 'Cristian', '123'),
(58, 2, 'Angelo', '123'),
(59, 2, 'Nildo', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
