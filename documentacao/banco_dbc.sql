SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
CREATE SCHEMA IF NOT EXISTS `bdc` DEFAULT CHARACTER SET latin1 ;
USE `mydb` ;
USE `bdc` ;

-- -----------------------------------------------------
-- Table `bdc`.`cargos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`cargos` (
  `id_cargo` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome_cargo` VARCHAR(50) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_cargo`) )
ENGINE = MyISAM
AUTO_INCREMENT = 71
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`usuarios` (
  `id_usuario` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `permissao` INT(1) NULL DEFAULT NULL ,
  `usuario` VARCHAR(25) NULL DEFAULT NULL ,
  `senha` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_usuario`) ,
  UNIQUE INDEX `usuarios_index` (`usuario` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 36
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`colaboradores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`colaboradores` (
  `id_colaborador` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `link_lattes` VARCHAR(150) NOT NULL ,
  `nome_colaborador` VARCHAR(40) NULL DEFAULT NULL ,
  `email` VARCHAR(40) NULL DEFAULT NULL ,
  `telefone` INT(8) NULL DEFAULT NULL ,
  `data_admissao` DATE NULL DEFAULT NULL ,
  `status_colaborador` INT(1) NULL DEFAULT NULL ,
  `matricula` BIGINT(10) NULL DEFAULT NULL ,
  `cargos_id_cargo` INT(10) UNSIGNED NOT NULL ,
  `usuarios_id_usuario` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id_colaborador`) ,
  UNIQUE INDEX `colaboradores_matricula_index` (`matricula` ASC) ,
  INDEX `colaboradores_nome_index` (`nome_colaborador` ASC) ,
  INDEX `fk_colaboradores_cargos1_idx` (`cargos_id_cargo` ASC) ,
  INDEX `fk_colaboradores_usuarios1_idx` (`usuarios_id_usuario` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 35
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`competencias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`competencias` (
  `id_competencia` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome_competencia` VARCHAR(50) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_competencia`) ,
  UNIQUE INDEX `competencias_unique` (`nome_competencia` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 29
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`curso_formacoes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`curso_formacoes` (
  `id_curso_formacao` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome_curso` VARCHAR(65) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_curso_formacao`) )
ENGINE = MyISAM
AUTO_INCREMENT = 273
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`fotos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`fotos` (
  `id_foto` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `diretorio_foto` VARCHAR(255) NULL DEFAULT NULL ,
  `colaboradores_id_colaborador1` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id_foto`, `colaboradores_id_colaborador1`) ,
  INDEX `fk_fotos_colaboradores1_idx` (`colaboradores_id_colaborador1` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 114
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`qualificacoes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`qualificacoes` (
  `id_qualificacao` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome_qualificacao` VARCHAR(65) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_qualificacao`) )
ENGINE = MyISAM
AUTO_INCREMENT = 46
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`tipos_formacoes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`tipos_formacoes` (
  `id_tipo_formacao` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `tipo_formacao` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_tipo_formacao`) )
ENGINE = MyISAM
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`instituicao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`instituicao` (
  `id_instituicao` INT NOT NULL ,
  `nome_instituicao` VARCHAR(200) NULL ,
  `endereco` VARCHAR(45) NULL ,
  `cidade` VARCHAR(45) NULL ,
  `estado` CHAR(2) NULL ,
  `telefone` VARCHAR(10) NULL ,
  `logomarca_diretorio` VARCHAR(45) NULL ,
  `cnpj` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_instituicao`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdc`.`formacoes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`formacoes` (
  `tipos_formacoes_id_tipo_formacao` INT(10) UNSIGNED NOT NULL ,
  `curso_formacoes_id_curso_formacao` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`tipos_formacoes_id_tipo_formacao`, `curso_formacoes_id_curso_formacao`) ,
  INDEX `fk_tipos_formacoes_has_curso_formacoes_curso_formacoes1_idx` (`curso_formacoes_id_curso_formacao` ASC) ,
  INDEX `fk_tipos_formacoes_has_curso_formacoes_tipos_formacoes_idx` (`tipos_formacoes_id_tipo_formacao` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`competencias_colaboradores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`competencias_colaboradores` (
  `id_competencias_colaboradores` INT NOT NULL AUTO_INCREMENT ,
  `competencias_id_competencia` INT(10) UNSIGNED NOT NULL ,
  `colaboradores_id_colaborador` INT(10) UNSIGNED NOT NULL ,
  `data_inserida` DATETIME NULL ,
  PRIMARY KEY (`id_competencias_colaboradores`, `competencias_id_competencia`, `colaboradores_id_colaborador`) ,
  INDEX `fk_competencias_has_colaboradores_colaboradores1_idx` (`colaboradores_id_colaborador` ASC) ,
  INDEX `fk_competencias_has_colaboradores_competencias1_idx` (`competencias_id_competencia` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`colaboradores_qualificacoes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`colaboradores_qualificacoes` (
  `id_colaboradores_qualificacoes` INT NOT NULL AUTO_INCREMENT ,
  `colaboradores_id_colaborador` INT(10) UNSIGNED NOT NULL ,
  `qualificacoes_id_qualificacao` INT(10) UNSIGNED NOT NULL ,
  `data_inserida` DATETIME NULL ,
  PRIMARY KEY (`id_colaboradores_qualificacoes`, `colaboradores_id_colaborador`, `qualificacoes_id_qualificacao`) ,
  INDEX `fk_colaboradores_has_qualificacoes_qualificacoes1_idx` (`qualificacoes_id_qualificacao` ASC) ,
  INDEX `fk_colaboradores_has_qualificacoes_colaboradores1_idx` (`colaboradores_id_colaborador` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bdc`.`formacoes_colaboradores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdc`.`formacoes_colaboradores` (
  `id_formacoes_colaboradores` INT NOT NULL AUTO_INCREMENT ,
  `formacoes_tipos_formacoes_id_tipo_formacao` INT(10) UNSIGNED NOT NULL ,
  `formacoes_curso_formacoes_id_curso_formacao` INT(10) UNSIGNED NOT NULL ,
  `colaboradores_id_colaborador` INT(10) UNSIGNED NOT NULL ,
  `data_inserida` DATETIME NULL ,
  PRIMARY KEY (`id_formacoes_colaboradores`, `formacoes_tipos_formacoes_id_tipo_formacao`, `formacoes_curso_formacoes_id_curso_formacao`, `colaboradores_id_colaborador`) ,
  INDEX `fk_formacoes_has_colaboradores_colaboradores1_idx` (`colaboradores_id_colaborador` ASC) ,
  INDEX `fk_formacoes_has_colaboradores_formacoes1_idx` (`formacoes_tipos_formacoes_id_tipo_formacao` ASC, `formacoes_curso_formacoes_id_curso_formacao` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
