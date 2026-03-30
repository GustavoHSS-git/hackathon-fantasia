-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: fantasia
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dataCadastro` date NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `telefone_UNIQUE` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Ana','ana@etec.com','2026-03-26','5518991253156','60122306806'),(3,'Ana','ana@etec','2026-03-26','18991253156','60122306806');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fantasia`
--

DROP TABLE IF EXISTS `fantasia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fantasia` (
  `idFantasia` int NOT NULL AUTO_INCREMENT,
  `nomeFantasia` varchar(100) NOT NULL,
  `categoriaFantasia` varchar(50) DEFAULT NULL,
  `quantidadeDisponivel` int NOT NULL,
  `valorLocacao` decimal(10,2) NOT NULL,
  `descricaoFantasia` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idFantasia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fantasia`
--

LOCK TABLES `fantasia` WRITE;
/*!40000 ALTER TABLE `fantasia` DISABLE KEYS */;
INSERT INTO `fantasia` VALUES (1,'aa','2',18,99.00,'e','chaves.png'),(3,'Rengoku','Anime',20,150.00,'Traje De Festa Com Uniforme Rengoku de Demon Hunter','rengoku.png'),(4,'Branca de Neve','Princesa',10,60.00,'branca de neve','D_NQ_NP_2X_818365-MLB98423693488_112025-F-fantasia-princesa-branca-de-neve-adulto-luxo-mega-premium.png'),(5,'Ada Wong','Jogo',7,69.00,'Ada Wong - Resident Evil, acompanha um vestido vermelho, salto alto preto, peruca curta preta e uma cinta-liga','ada.png'),(6,'Anya Forger','Anime',23,59.00,'Anya Forger - The spy x family, acompanha uma peruca curta rosa, vestido, meia e o acessório da cabeça, ','anya.png'),(7,'Bob Esponja','Desenho',5,45.00,'Bob Esponja','bobesponja.png');
/*!40000 ALTER TABLE `fantasia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario` (
  `idFuncionario` int NOT NULL AUTO_INCREMENT,
  `nomeFuncionario` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idFuncionario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (2,'Gustavinho','60122306805','123456');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `idItem` int NOT NULL AUTO_INCREMENT,
  `nomeItem` varchar(100) NOT NULL,
  `categoriaItem` varchar(50) NOT NULL,
  `quantidadeTotal` int NOT NULL,
  `quantidadeDisponivel` int NOT NULL,
  `valorLocacao` decimal(2,0) NOT NULL,
  `descricaoItem` varchar(45) DEFAULT NULL,
  `Cliente_idCliente` int NOT NULL,
  PRIMARY KEY (`idItem`),
  KEY `fk_Item_Cliente_idx` (`Cliente_idCliente`),
  CONSTRAINT `fk_Item_Cliente` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locacao`
--

DROP TABLE IF EXISTS `locacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locacao` (
  `idLocacao` int NOT NULL AUTO_INCREMENT,
  `cpfCliente` varchar(14) NOT NULL,
  `idFantasia` int NOT NULL,
  `dataLocacao` date NOT NULL,
  `dataDevolucao` date NOT NULL,
  `dias` int NOT NULL,
  `formaPagamento` varchar(45) NOT NULL,
  `valorTotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idLocacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locacao`
--

LOCK TABLES `locacao` WRITE;
/*!40000 ALTER TABLE `locacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `locacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locacaoitem`
--

DROP TABLE IF EXISTS `locacaoitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locacaoitem` (
  `Item_idItem` int NOT NULL,
  `Locacao_idLocacao` int NOT NULL,
  PRIMARY KEY (`Item_idItem`,`Locacao_idLocacao`),
  KEY `fk_Item_has_Locacao_Locacao1_idx` (`Locacao_idLocacao`),
  KEY `fk_Item_has_Locacao_Item1_idx` (`Item_idItem`),
  CONSTRAINT `fk_Item_has_Locacao_Item1` FOREIGN KEY (`Item_idItem`) REFERENCES `item` (`idItem`),
  CONSTRAINT `fk_Item_has_Locacao_Locacao1` FOREIGN KEY (`Locacao_idLocacao`) REFERENCES `locacao` (`idLocacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locacaoitem`
--

LOCK TABLES `locacaoitem` WRITE;
/*!40000 ALTER TABLE `locacaoitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `locacaoitem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-27 14:25:14
