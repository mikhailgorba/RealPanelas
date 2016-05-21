-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tabela_real
-- ------------------------------------------------------
-- Server version	5.6.25-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_clientes` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(10) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cnpj` varchar(17) DEFAULT NULL,
  `data_nascimento` varchar(10) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `tel1` varchar(11) DEFAULT NULL,
  `tel2` varchar(11) DEFAULT NULL,
  `tel3` varchar(11) DEFAULT NULL,
  `cliente_tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_clientes`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,1,'sandro','454997301-30',NULL,'21/08/1970','.......','','33752441','95569353','0000000','teste');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `tamanho` varchar(45) DEFAULT NULL,
  `produto_id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `fk_foto_produto1_idx` (`produto_id_produto`),
  CONSTRAINT `fk_foto_produto1` FOREIGN KEY (`produto_id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto`
--

LOCK TABLES `foto` WRITE;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linha`
--

DROP TABLE IF EXISTS `linha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linha` (
  `id_linha` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_linha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linha`
--

LOCK TABLES `linha` WRITE;
/*!40000 ALTER TABLE `linha` DISABLE KEYS */;
/*!40000 ALTER TABLE `linha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `preco` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `altura` varchar(45) DEFAULT NULL,
  `diametro` varchar(45) DEFAULT NULL,
  `cor` varchar(45) DEFAULT NULL,
  `espessura` varchar(45) DEFAULT NULL,
  `tipo_id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_produto_tipo1_idx` (`tipo_id_tipo`),
  CONSTRAINT `fk_produto_tipo1` FOREIGN KEY (`tipo_id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'CaÃ§arola Real Com asa NÂº 14','14','1',NULL,NULL,NULL,NULL,NULL,0),(2,'CaÃ§arola Real Com asa NÂº 16','R$ 20,00 sssssssss','2',NULL,NULL,NULL,NULL,NULL,0),(3,'CaÃ§arola Real Com asa NÂº 18','R$ 24,00','222',NULL,NULL,NULL,NULL,NULL,0),(4,'CaÃ§arola Real Com asa NÂº 40','R$ 180,00','222222',NULL,NULL,NULL,NULL,NULL,0),(5,'CaÃ§arola Real Com asa NÂº 20','44','129',NULL,NULL,NULL,NULL,NULL,0),(7,'CaÃ§arola Com asa NÂº 50','555555','66',NULL,NULL,NULL,NULL,NULL,0),(8,'Coca Cola','4,00','312',NULL,NULL,NULL,NULL,NULL,0),(9,'Panela de pressÃ£o Marcolar','2929','290',NULL,NULL,NULL,NULL,NULL,0),(10,'Celular','9000','990',NULL,NULL,NULL,NULL,NULL,0),(11,'Lampada','2','99',NULL,NULL,NULL,NULL,NULL,0),(13,'CaldeirÃ£o','222','22',NULL,NULL,NULL,NULL,NULL,0),(14,'Pepsi','22,00','22',NULL,NULL,NULL,NULL,NULL,0),(15,'Panela de pressÃ£o Eterna vinho','23','1010',NULL,NULL,NULL,NULL,NULL,0),(16,'312','321','321',NULL,NULL,NULL,NULL,NULL,0),(17,'fsd','sdffsdfsd','sdasda',NULL,NULL,NULL,NULL,NULL,0),(18,'dsadsadsa','2312312','dsadsa',NULL,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `linha_id_linha` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  KEY `fk_tipo_linha1_idx` (`linha_id_linha`),
  CONSTRAINT `fk_tipo_linha1` FOREIGN KEY (`linha_id_linha`) REFERENCES `linha` (`id_linha`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-21 16:49:39
