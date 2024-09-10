-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: kazem
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `kz_antecedente`
--

DROP TABLE IF EXISTS `kz_antecedente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_antecedente` (
  `id_antecedente` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_antecedente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_antecedente`
--

LOCK TABLES `kz_antecedente` WRITE;
/*!40000 ALTER TABLE `kz_antecedente` DISABLE KEYS */;
INSERT INTO `kz_antecedente` VALUES (1,'Acólito',NULL,'2024-09-06 16:33:04','2024-09-06 19:33:40');
/*!40000 ALTER TABLE `kz_antecedente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_arma`
--

DROP TABLE IF EXISTS `kz_arma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_arma` (
  `id_arma` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `valor` int NOT NULL,
  `Unidade` enum('PL','PO','PP','PC') DEFAULT NULL,
  `Dano` varchar(45) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `propriedades` varchar(255) DEFAULT NULL,
  `descricao` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_arma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_arma`
--

LOCK TABLES `kz_arma` WRITE;
/*!40000 ALTER TABLE `kz_arma` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_arma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_armadura`
--

DROP TABLE IF EXISTS `kz_armadura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_armadura` (
  `id_armadura` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `valor` int NOT NULL,
  `unidade` enum('PL','PO','PP','PC') NOT NULL,
  `ca` varchar(255) DEFAULT '0',
  `forca_necessaria` int NOT NULL DEFAULT '0',
  `desv_furtividade` enum('S','N') NOT NULL DEFAULT 'N',
  `peso` double DEFAULT NULL,
  `creates_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_armadura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_armadura`
--

LOCK TABLES `kz_armadura` WRITE;
/*!40000 ALTER TABLE `kz_armadura` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_armadura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_cidade`
--

DROP TABLE IF EXISTS `kz_cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_cidade` (
  `id_cidade` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text,
  `id_continente` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cidade`),
  KEY `fk_kz_cidade_kz_continente_idx` (`id_continente`),
  CONSTRAINT `fk_kz_cidade_kz_continente` FOREIGN KEY (`id_continente`) REFERENCES `kz_continente` (`id_continente`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_cidade`
--

LOCK TABLES `kz_cidade` WRITE;
/*!40000 ALTER TABLE `kz_cidade` DISABLE KEYS */;
INSERT INTO `kz_cidade` VALUES (1,'Kazem',NULL,1,'2024-09-06 14:01:36',NULL),(2,'Rikishi','Teste',1,'2024-09-06 17:05:11','2024-09-06 17:05:11'),(3,'Agraim','Capital do continente e residência do imperador Caius Tiberian e suas esposas. Abriga o Alcácer do Voto Sagrado.',2,'2024-09-08 19:06:47','2024-09-08 19:06:47'),(4,'Zimnakrev','Feudo agrícola e pecuarista próximo a Agraim, sede da guilda Vanguarda Zimnakrev.',2,'2024-09-08 19:07:06','2024-09-08 19:07:06'),(5,'Uganora','Metrópole comercial e cultural, crescida devido ao portal principal da grande escola de magia.',2,'2024-09-08 19:07:38','2024-09-08 19:07:38'),(6,'Prucorana','Grande monastério no meio da floresta, habitado por clérigos, monges e paladinos.',2,'2024-09-08 19:07:52','2024-09-08 19:07:52'),(7,'Império Heskill','Centro de magia e ladinagem, atraindo magos, bardos, ladrões e assassinos.',2,'2024-09-08 19:08:10','2024-09-08 19:08:10'),(8,'Cirtdam','Antiga cidade portuária destruída em guerra, agora um polo de ruínas.',2,'2024-09-08 19:08:24','2024-09-08 19:08:24'),(9,'Nova Cirtdam','Cidade criada pelo pai do imperador atual como novo lar para os gnomos, após a destruição de Cirtdam.',2,'2024-09-08 19:08:40','2024-09-08 19:08:40'),(10,'Malatok','Cidade de origem de Uther, atraindo principalmente usuários da luz e afastando aqueles das artes das trevas.',2,'2024-09-08 19:08:58','2024-09-08 19:08:58');
/*!40000 ALTER TABLE `kz_cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_classe`
--

DROP TABLE IF EXISTS `kz_classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_classe` (
  `id_classe` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text,
  `somente_npc` enum('S','N') NOT NULL DEFAULT 'N',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_classe`
--

LOCK TABLES `kz_classe` WRITE;
/*!40000 ALTER TABLE `kz_classe` DISABLE KEYS */;
INSERT INTO `kz_classe` VALUES (1,'Ártifice','testes','N','2024-09-06 13:18:02','2024-09-06 16:34:22'),(2,'Bárbaro','Teste','N','2024-09-06 16:33:37','2024-09-06 16:33:37');
/*!40000 ALTER TABLE `kz_classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_continente`
--

DROP TABLE IF EXISTS `kz_continente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_continente` (
  `id_continente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_continente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_continente`
--

LOCK TABLES `kz_continente` WRITE;
/*!40000 ALTER TABLE `kz_continente` DISABLE KEYS */;
INSERT INTO `kz_continente` VALUES (1,'Yuron','2024-09-06 13:10:50',NULL),(2,'Sangala','2024-09-06 16:10:54','2024-09-06 16:10:54'),(3,'Amaryllis','2024-09-06 16:11:04','2024-09-06 16:11:04');
/*!40000 ALTER TABLE `kz_continente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_equipamento`
--

DROP TABLE IF EXISTS `kz_equipamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_equipamento` (
  `id_equipamento` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `custo` double NOT NULL,
  `Unidade` enum('PO','PP','PC') NOT NULL,
  `peso` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_equipamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_equipamento`
--

LOCK TABLES `kz_equipamento` WRITE;
/*!40000 ALTER TABLE `kz_equipamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_equipamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_escola_magia`
--

DROP TABLE IF EXISTS `kz_escola_magia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_escola_magia` (
  `id_escola_magia` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_escola_magia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_escola_magia`
--

LOCK TABLES `kz_escola_magia` WRITE;
/*!40000 ALTER TABLE `kz_escola_magia` DISABLE KEYS */;
INSERT INTO `kz_escola_magia` VALUES (1,'Abjuração',NULL,'2024-09-08 16:48:06','2024-09-08 19:51:03'),(2,'Encantamento',NULL,'2024-09-08 17:00:37',NULL);
/*!40000 ALTER TABLE `kz_escola_magia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_idioma`
--

DROP TABLE IF EXISTS `kz_idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_idioma` (
  `id_idioma` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_idioma`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_idioma`
--

LOCK TABLES `kz_idioma` WRITE;
/*!40000 ALTER TABLE `kz_idioma` DISABLE KEYS */;
INSERT INTO `kz_idioma` VALUES (1,'Comum','Conhecido por todas as criaturas do plano material.','2024-09-08 15:02:59',NULL),(2,'Élfico','Idioma conhecido por ser utilizado por elfos e suas variações.','2024-09-08 18:06:41','2024-09-08 18:06:41');
/*!40000 ALTER TABLE `kz_idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_jogador`
--

DROP TABLE IF EXISTS `kz_jogador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_jogador` (
  `id_jogador` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_jogador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_jogador`
--

LOCK TABLES `kz_jogador` WRITE;
/*!40000 ALTER TABLE `kz_jogador` DISABLE KEYS */;
INSERT INTO `kz_jogador` VALUES (1,'Filipe','2024-09-06 16:18:36',NULL,'A'),(2,'Gustavo','2024-09-06 19:22:51','2024-09-06 19:24:42','I');
/*!40000 ALTER TABLE `kz_jogador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_magia`
--

DROP TABLE IF EXISTS `kz_magia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_magia` (
  `id_magia` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `componentes` varchar(255) DEFAULT NULL,
  `ritual` enum('S','N') DEFAULT 'N',
  `id_escola_magia` int DEFAULT NULL,
  `tipo_magia` enum('A','D','S') NOT NULL DEFAULT 'A',
  `nivel` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duracao` varchar(45) DEFAULT NULL,
  `alcance` varchar(45) DEFAULT NULL,
  `acao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_magia`),
  KEY `fk_kz_magia_kz_escola_magia1_idx` (`id_escola_magia`),
  CONSTRAINT `fk_kz_magia_kz_escola_magia1` FOREIGN KEY (`id_escola_magia`) REFERENCES `kz_escola_magia` (`id_escola_magia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_magia`
--

LOCK TABLES `kz_magia` WRITE;
/*!40000 ALTER TABLE `kz_magia` DISABLE KEYS */;
INSERT INTO `kz_magia` VALUES (1,'Amizade','Material: uma pequena quantidade de maquiagem aplicada ao rosto durante a conjuração da magia.\r\n\r\nPela duração, você terá vantagem em todos os testes de Carisma direcionados a uma criatura, à sua escolha, que não seja hostil a você. Quando a magia acabar, a criatura perceberá que você usou maia para influenciar o humor dela, e ficará hostil a você. Uma criatura propensa a violência irá atacar você. Outra criatura pode buscar outras formas de retaliação (a critério do Mestre), dependendo da natureza da sua interação com ela.','S, M','S',2,'A',0,'2024-09-08 16:58:44','2024-09-08 20:32:07','até 1 minuto','Pessoal','1 ação');
/*!40000 ALTER TABLE `kz_magia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_organizacao`
--

DROP TABLE IF EXISTS `kz_organizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_organizacao` (
  `id_organizacao` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text,
  `id_cidade` int NOT NULL,
  `id_tipo_organizacao` int NOT NULL,
  `bandeira` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_organizacao`),
  KEY `fk_kz_organizacao_kz_cidade1_idx` (`id_cidade`),
  KEY `fk_kz_organizacao_kz_tipo_organizacao1_idx` (`id_tipo_organizacao`),
  CONSTRAINT `fk_kz_organizacao_kz_cidade1` FOREIGN KEY (`id_cidade`) REFERENCES `kz_cidade` (`id_cidade`),
  CONSTRAINT `fk_kz_organizacao_kz_tipo_organizacao1` FOREIGN KEY (`id_tipo_organizacao`) REFERENCES `kz_tipo_organizacao` (`id_tipo_organizacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_organizacao`
--

LOCK TABLES `kz_organizacao` WRITE;
/*!40000 ALTER TABLE `kz_organizacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_organizacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_personagem`
--

DROP TABLE IF EXISTS `kz_personagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_personagem` (
  `id_personagem` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `kz_raca_id_raca` int NOT NULL,
  `id_antecedente` int NOT NULL,
  `id_jogador` int DEFAULT NULL,
  `id_cidade` int NOT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_personagem`),
  KEY `fk_kz_personagem_kz_raca1_idx` (`kz_raca_id_raca`),
  KEY `fk_kz_personagem_kz_antecedente1_idx` (`id_antecedente`),
  KEY `fk_kz_personagem_kz_jogador1_idx` (`id_jogador`),
  KEY `fk_kz_personagem_kz_cidade1_idx` (`id_cidade`),
  CONSTRAINT `fk_kz_personagem_kz_antecedente1` FOREIGN KEY (`id_antecedente`) REFERENCES `kz_antecedente` (`id_antecedente`),
  CONSTRAINT `fk_kz_personagem_kz_cidade1` FOREIGN KEY (`id_cidade`) REFERENCES `kz_cidade` (`id_cidade`),
  CONSTRAINT `fk_kz_personagem_kz_jogador1` FOREIGN KEY (`id_jogador`) REFERENCES `kz_jogador` (`id_jogador`),
  CONSTRAINT `fk_kz_personagem_kz_raca1` FOREIGN KEY (`kz_raca_id_raca`) REFERENCES `kz_raca` (`id_raca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_personagem`
--

LOCK TABLES `kz_personagem` WRITE;
/*!40000 ALTER TABLE `kz_personagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_personagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_personagem_arma`
--

DROP TABLE IF EXISTS `kz_personagem_arma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_personagem_arma` (
  `id_personagem` int NOT NULL,
  `id_arma` int NOT NULL,
  `equipado` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_personagem`,`id_arma`),
  KEY `fk_kz_personagem_has_kz_arma_kz_arma1_idx` (`id_arma`),
  KEY `fk_kz_personagem_has_kz_arma_kz_personagem1_idx` (`id_personagem`),
  CONSTRAINT `fk_kz_personagem_has_kz_arma_kz_arma1` FOREIGN KEY (`id_arma`) REFERENCES `kz_arma` (`id_arma`),
  CONSTRAINT `fk_kz_personagem_has_kz_arma_kz_personagem1` FOREIGN KEY (`id_personagem`) REFERENCES `kz_personagem` (`id_personagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_personagem_arma`
--

LOCK TABLES `kz_personagem_arma` WRITE;
/*!40000 ALTER TABLE `kz_personagem_arma` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_personagem_arma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_personagem_armadura`
--

DROP TABLE IF EXISTS `kz_personagem_armadura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_personagem_armadura` (
  `kz_personagem_id_personagem` int NOT NULL,
  `kz_armadura_id_armadura` int NOT NULL,
  `status` enum('A','I') DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kz_personagem_id_personagem`,`kz_armadura_id_armadura`),
  KEY `fk_kz_personagem_has_kz_armadura_kz_armadura1_idx` (`kz_armadura_id_armadura`),
  KEY `fk_kz_personagem_has_kz_armadura_kz_personagem1_idx` (`kz_personagem_id_personagem`),
  CONSTRAINT `fk_kz_personagem_has_kz_armadura_kz_armadura1` FOREIGN KEY (`kz_armadura_id_armadura`) REFERENCES `kz_armadura` (`id_armadura`),
  CONSTRAINT `fk_kz_personagem_has_kz_armadura_kz_personagem1` FOREIGN KEY (`kz_personagem_id_personagem`) REFERENCES `kz_personagem` (`id_personagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_personagem_armadura`
--

LOCK TABLES `kz_personagem_armadura` WRITE;
/*!40000 ALTER TABLE `kz_personagem_armadura` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_personagem_armadura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_personagem_classe`
--

DROP TABLE IF EXISTS `kz_personagem_classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_personagem_classe` (
  `id_classe` int NOT NULL,
  `id_personagem` int NOT NULL,
  `nivel` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_classe`,`id_personagem`,`nivel`),
  KEY `fk_kz_classe_has_kz_personagem_kz_personagem1_idx` (`id_personagem`),
  KEY `fk_kz_classe_has_kz_personagem_kz_classe1_idx` (`id_classe`),
  CONSTRAINT `fk_kz_classe_has_kz_personagem_kz_classe1` FOREIGN KEY (`id_classe`) REFERENCES `kz_classe` (`id_classe`),
  CONSTRAINT `fk_kz_classe_has_kz_personagem_kz_personagem1` FOREIGN KEY (`id_personagem`) REFERENCES `kz_personagem` (`id_personagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_personagem_classe`
--

LOCK TABLES `kz_personagem_classe` WRITE;
/*!40000 ALTER TABLE `kz_personagem_classe` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_personagem_classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_personagem_equipamento`
--

DROP TABLE IF EXISTS `kz_personagem_equipamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_personagem_equipamento` (
  `id_personagem` int NOT NULL,
  `id_equipamento` int NOT NULL,
  `quantidade` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_personagem`,`id_equipamento`),
  KEY `fk_kz_personagem_has_kz_equipamento_kz_equipamento1_idx` (`id_equipamento`),
  KEY `fk_kz_personagem_has_kz_equipamento_kz_personagem1_idx` (`id_personagem`),
  CONSTRAINT `fk_kz_personagem_has_kz_equipamento_kz_equipamento1` FOREIGN KEY (`id_equipamento`) REFERENCES `kz_equipamento` (`id_equipamento`),
  CONSTRAINT `fk_kz_personagem_has_kz_equipamento_kz_personagem1` FOREIGN KEY (`id_personagem`) REFERENCES `kz_personagem` (`id_personagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_personagem_equipamento`
--

LOCK TABLES `kz_personagem_equipamento` WRITE;
/*!40000 ALTER TABLE `kz_personagem_equipamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_personagem_equipamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_personagem_idioma`
--

DROP TABLE IF EXISTS `kz_personagem_idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_personagem_idioma` (
  `id_personagem` int NOT NULL,
  `id_idioma` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_personagem`,`id_idioma`),
  KEY `fk_kz_personagem_has_kz_idioma_kz_idioma1_idx` (`id_idioma`),
  KEY `fk_kz_personagem_has_kz_idioma_kz_personagem1_idx` (`id_personagem`),
  CONSTRAINT `fk_kz_personagem_has_kz_idioma_kz_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `kz_idioma` (`id_idioma`),
  CONSTRAINT `fk_kz_personagem_has_kz_idioma_kz_personagem1` FOREIGN KEY (`id_personagem`) REFERENCES `kz_personagem` (`id_personagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_personagem_idioma`
--

LOCK TABLES `kz_personagem_idioma` WRITE;
/*!40000 ALTER TABLE `kz_personagem_idioma` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_personagem_idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_personagem_magia`
--

DROP TABLE IF EXISTS `kz_personagem_magia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_personagem_magia` (
  `id_personagem` int NOT NULL,
  `id_magia` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_personagem`,`id_magia`),
  KEY `fk_kz_personagem_has_kz_magia_kz_magia1_idx` (`id_magia`),
  KEY `fk_kz_personagem_has_kz_magia_kz_personagem1_idx` (`id_personagem`),
  CONSTRAINT `fk_kz_personagem_has_kz_magia_kz_magia1` FOREIGN KEY (`id_magia`) REFERENCES `kz_magia` (`id_magia`),
  CONSTRAINT `fk_kz_personagem_has_kz_magia_kz_personagem1` FOREIGN KEY (`id_personagem`) REFERENCES `kz_personagem` (`id_personagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_personagem_magia`
--

LOCK TABLES `kz_personagem_magia` WRITE;
/*!40000 ALTER TABLE `kz_personagem_magia` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_personagem_magia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_personagem_organizacao`
--

DROP TABLE IF EXISTS `kz_personagem_organizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_personagem_organizacao` (
  `id_personagem` int NOT NULL,
  `id_organizacao` int NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_personagem`,`id_organizacao`),
  KEY `fk_kz_personagem_has_kz_organizacao_kz_organizacao1_idx` (`id_organizacao`),
  KEY `fk_kz_personagem_has_kz_organizacao_kz_personagem1_idx` (`id_personagem`),
  CONSTRAINT `fk_kz_personagem_has_kz_organizacao_kz_organizacao1` FOREIGN KEY (`id_organizacao`) REFERENCES `kz_organizacao` (`id_organizacao`),
  CONSTRAINT `fk_kz_personagem_has_kz_organizacao_kz_personagem1` FOREIGN KEY (`id_personagem`) REFERENCES `kz_personagem` (`id_personagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_personagem_organizacao`
--

LOCK TABLES `kz_personagem_organizacao` WRITE;
/*!40000 ALTER TABLE `kz_personagem_organizacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_personagem_organizacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_personagem_talento`
--

DROP TABLE IF EXISTS `kz_personagem_talento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_personagem_talento` (
  `id_personagem` int NOT NULL,
  `id_talento` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_personagem`,`id_talento`),
  KEY `fk_kz_personagem_has_kz_talento_kz_talento1_idx` (`id_talento`),
  KEY `fk_kz_personagem_has_kz_talento_kz_personagem1_idx` (`id_personagem`),
  CONSTRAINT `fk_kz_personagem_has_kz_talento_kz_personagem1` FOREIGN KEY (`id_personagem`) REFERENCES `kz_personagem` (`id_personagem`),
  CONSTRAINT `fk_kz_personagem_has_kz_talento_kz_talento1` FOREIGN KEY (`id_talento`) REFERENCES `kz_talento` (`id_talento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_personagem_talento`
--

LOCK TABLES `kz_personagem_talento` WRITE;
/*!40000 ALTER TABLE `kz_personagem_talento` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_personagem_talento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_raca`
--

DROP TABLE IF EXISTS `kz_raca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_raca` (
  `id_raca` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_raca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_raca`
--

LOCK TABLES `kz_raca` WRITE;
/*!40000 ALTER TABLE `kz_raca` DISABLE KEYS */;
INSERT INTO `kz_raca` VALUES (1,'Humano','2024-09-06 12:51:36',NULL),(2,'Elfo','2024-09-06 12:51:36',NULL),(3,'Anão','2024-09-06 12:51:36',NULL),(4,'Meio-Elfo','2024-09-06 12:51:36',NULL),(5,'Draconato','2024-09-06 16:00:02','2024-09-06 16:01:37');
/*!40000 ALTER TABLE `kz_raca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_slots_magia_personagem`
--

DROP TABLE IF EXISTS `kz_slots_magia_personagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_slots_magia_personagem` (
  `nivel` int NOT NULL,
  `quantidade` int NOT NULL,
  `id_personagem` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nivel`,`quantidade`,`id_personagem`),
  KEY `fk_kz_slots_magia_personagem_kz_personagem1_idx` (`id_personagem`),
  CONSTRAINT `fk_kz_slots_magia_personagem_kz_personagem1` FOREIGN KEY (`id_personagem`) REFERENCES `kz_personagem` (`id_personagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_slots_magia_personagem`
--

LOCK TABLES `kz_slots_magia_personagem` WRITE;
/*!40000 ALTER TABLE `kz_slots_magia_personagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_slots_magia_personagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_talento`
--

DROP TABLE IF EXISTS `kz_talento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_talento` (
  `id_talento` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text,
  `pre_requisito` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_talento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_talento`
--

LOCK TABLES `kz_talento` WRITE;
/*!40000 ALTER TABLE `kz_talento` DISABLE KEYS */;
INSERT INTO `kz_talento` VALUES (1,'Adepto Marcial','Você tem treinamento marcial que permite a você realizar manobras de combate especiais. Você ganha os seguintes benefícios:\r\n\r\n Você aprende duas manobras, à sua escolha, das que estão disponíveis ao arquétipo Mestre de Batalha na classe guerreiro. Se a manobra que você usar obrigar um alvo a realizar um teste de resistência, a CD do teste de resistência será igual a 8 + seu bônus de proficiência + seu modificador de Força ou Destreza (à sua escolha).\r\n\r\n Se você já tiver dados de superioridade, você ganha um adicional; do contrário, você terá um dado de superioridade, que é um d6. Esse dado é usado para abastecer suas manobras. Um dado de superioridade é gasto quando você o usa. Você recupera seus dados de superioridade gastos quando termina um descanso curto ou longo.',NULL,'2024-09-08 14:21:31','2024-09-08 17:43:58'),(2,'Adepto Elemental','Quando você ganha esse talento, escolha um dos tipos de dano a seguir: ácido, elétrico, fogo, frio ou trovão.\r\n\r\nAs magias que você conjurar ignoram resistência a dano do tipo escolhido. Além disso, quando você rola o dano para uma magia que você conjurar que causar dano desse tipo, você pode tratar qualquer 1 num dado de dano como um 2.\r\n\r\nVocê pode escolher esse talento diversas vezes. A cada vez que o fizer, você deve escolher um tipo diferente de dano.','Capacidade de conjurar pelo menos uma magia','2024-09-08 17:32:03','2024-09-08 17:40:44');
/*!40000 ALTER TABLE `kz_talento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kz_tipo_organizacao`
--

DROP TABLE IF EXISTS `kz_tipo_organizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kz_tipo_organizacao` (
  `id_tipo_organizacao` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_organizacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kz_tipo_organizacao`
--

LOCK TABLES `kz_tipo_organizacao` WRITE;
/*!40000 ALTER TABLE `kz_tipo_organizacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `kz_tipo_organizacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-09 22:19:23
