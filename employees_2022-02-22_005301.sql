-- MySQL dump 10.13  Distrib 8.0.28, for macos12.0 (x86_64)
--
-- Host: 127.0.0.1    Database: employees
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2022-02-19-051854','App\\Database\\Migrations\\AddUser','default','App',1645252385,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `rol` enum('ADMINISTRADOR','USUARIO') NOT NULL DEFAULT 'USUARIO',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Domingo Wisoky','Lesch','mckayla.schroeder@oreilly.info','$2y$10$97h57lmT9Jmm1mlccdgB5uQF0Ok0tssG5YsmevWIteSgMStE2pon.','ACTIVO','USUARIO',NULL,'2022-02-19 00:39:00'),(2,'Prof. Joan Kihn','Greenfelder','medhurst.eldon@schamberger.com','$2y$10$Hlu8CZXKQh2T24I5Ii.td.9LumJeZMR3XXg/rvTpPOPvjsVC1gAua','ACTIVO','USUARIO',NULL,'2022-02-19 00:39:00'),(3,'Dr. Marc Friesen','Goldner','emmanuelle.lowe@hudson.info','$2y$10$8T4vqKhW5MFeYouBsn7nIeA7cbRotTaQs0tp25.Nf5umx6etfbwIW','ACTIVO','USUARIO',NULL,'2022-02-19 00:39:00'),(5,'Jevon Von','Jast','vkunde@gmail.com','$2y$10$z4A7lKLZLA/GoVz/fr5LBOjfLOSOCYiCc97uzY0kDZiM/TgJj86cq','ACTIVO','USUARIO',NULL,'2022-02-19 00:39:00'),(7,'Axel Mayert','Leffler','adella.hill@gleichner.biz','$2y$10$HfzP1JCgPf5HcDBsMQCN5eKTaPdQXbb46FXPwGwV0hamecUHJ10Cu','INACTIVO','USUARIO',NULL,'2022-02-19 00:39:00'),(8,'Christiana Graham','Kulas','shields.lue@towne.com','$2y$10$Q.OskQemts2wrBVRYkPVheKTcCOfmwM5ismNxMvp86PsZorw3eZB6','ACTIVO','USUARIO',NULL,'2022-02-19 00:39:00'),(9,'Prof. August Wiza','Hermann','mac29@hotmail.com','$2y$10$b/ue2o.tIKdUfs/F0Q1ll.qvKQsnaqX3pVu1/GBeXzIK4MO4TQg/S','ACTIVO','USUARIO',NULL,'2022-02-19 00:39:00'),(11,'Edwin','Melara Landaverde','melara0606@gmail.com','$2y$10$NbqqWJD6iIAd5fl8TZezZeQMee4IIj91LOLvK/.17oemYgeEtchru','ACTIVO','ADMINISTRADOR',NULL,'2022-02-19 02:27:51'),(20,'Mr. Murl McLaughlin DDS','Weissnat','vrunte@gmail.com','$2y$10$nipxFJjlhMDD7YbJ66adYOLbFEpQVXxz1YAxu/zsbW.Nb8d15YeS.','ACTIVO','USUARIO',NULL,'2022-02-21 22:01:47'),(21,'Madaline Farrell','Stracke','herzog.natalie@schmitt.com','$2y$10$H.tzaOYhkU0TN.NHUvKSbuU4JVVNAToaeRS7frNCTiUakGta6/iEW','ACTIVO','USUARIO',NULL,'2022-02-21 22:01:47'),(22,'Maximo Huels DVM','White','ludie.kulas@stiedemann.biz','$2y$10$/EcY.bX7VIyDvGQt77sQHuHpXVj1z/IAqR50rW1ZPUU9iZrp4jX6a','ACTIVO','USUARIO',NULL,'2022-02-21 22:01:47'),(23,'Mr. Dayne Huels DDS','Feil','erolfson@yahoo.com','$2y$10$LHNbjYspIRblx8otMprIh.t77bhT8oXP5liUIOgfhxuQgyGGn1GYm','ACTIVO','USUARIO',NULL,'2022-02-21 22:01:47'),(24,'Rosalyn Blick PhD','Gutmann','edwina86@bosco.com','$2y$10$oIUw05CHjXWvCd3rBM/36OS7h4RJqv62eKd.vPvv/LwyfgijD44SG','ACTIVO','USUARIO',NULL,'2022-02-21 22:01:47'),(25,'Leland Prosacco III','Smith','rice.ayden@yahoo.com','$2y$10$xkzP6FF6bgDbg5U1kflmJeL6agsLgSG.KNb1N9OodCo.HQvm3USpq','ACTIVO','USUARIO',NULL,'2022-02-21 22:01:47'),(26,'Mekhi Von','Bogan','norene87@crooks.com','$2y$10$AXrhvc1i63na3Zg6MfjXBuh7DPst7rw7tzdU4FvmDbL76YQvOpot2','ACTIVO','USUARIO',NULL,'2022-02-21 22:01:47'),(27,'Ms. Marguerite Considine','Volkman','xbednar@kihn.com','$2y$10$6Ag8iUwCE7L/B24oXTd1T.zb7U4qG1E6.EeAzmFcxCx1t3aOP3YBS','INACTIVO','USUARIO',NULL,'2022-02-21 22:01:47'),(28,'Mr. Eusebio Fadel','McLaughlin','reid82@hotmail.com','$2y$10$I.cPh79qkxI9qQyvfmqKKuvOYWOaARqeKVSZHtpgLehAgzw2nvxaq','ACTIVO','USUARIO',NULL,'2022-02-21 22:01:48'),(31,'Dr. Afton Greenholt Jr.','Daniel','velma86@gmail.com','$2y$10$qLqJbRXoKsVfWIUXcWiW7.VOUX/g6MJTmANk1svuFi4ZzVbPDJFZK','ACTIVO','USUARIO',NULL,'2022-02-21 22:02:16'),(32,'Dr. Rhett Rohan V','Jerde','vhoeger@padberg.info','$2y$10$lOytvYDhn..w.FgWPjxWJu8JA/vT8P.i09ZpODTiVJq8Xixam0yUa','ACTIVO','USUARIO',NULL,'2022-02-21 22:02:16'),(33,'Nolan Moen','Conroy','tbruen@yahoo.com','$2y$10$bkq8FU2XjadOGlwARe0dlOAYV0gss9IZXbAOjTKq9tp3llvYAVY/m','ACTIVO','USUARIO',NULL,'2022-02-21 22:02:16'),(34,'Brenna Huels','Adams','alexys.deckow@hotmail.com','$2y$10$2MiaApWh0XqrvF0JDl8sEeXPhGvTxIuAOiMIkxAkdc38foCoXOdau','ACTIVO','USUARIO',NULL,'2022-02-21 22:02:16'),(36,'Maymie Deckow','Zieme','darrion37@schowalter.biz','$2y$10$LkfUcKHJXwv37sSC/YdcZuBr/eFOGQYoQzaaENxxGbF5W6jLDHxxK','ACTIVO','USUARIO',NULL,'2022-02-21 22:02:17'),(37,'Mr. Leonel Hahn III','Bosco','marjory99@yahoo.com','$2y$10$wzcVl1PLkp/fVSUzYf2y1eZMrxJ5erB9n5lAB50A9D7dhD5YocXDy','ACTIVO','USUARIO',NULL,'2022-02-21 22:02:17'),(38,'Prof. Vincent Schuster II','Torp','pfeffer.odell@hotmail.com','$2y$10$7Qaz6XcilwYV9rKMiK1rbe9Fk32Biop4mySc40Y1pR5D01LCaPo36','ACTIVO','USUARIO',NULL,'2022-02-21 22:02:17'),(39,'Hannah Schuppe MD','Schamberger','vincent.corkery@okuneva.biz','$2y$10$J665RYZJyhtMTWfmvmY5tO2TBg6yUNp1ps3JNwF0AUhnD4vJBSrc6','ACTIVO','USUARIO',NULL,'2022-02-21 22:02:17'),(40,'Bart Hackett','Barrows','pbaumbach@hotmail.com','$2y$10$YDgOaxfDKwbGoUlvrpP0nOhmLG9asFf9cx6AAyqoy7udi4oRphdbW','ACTIVO','USUARIO',NULL,'2022-02-21 22:02:17'),(41,'Edwin','Melara Landaverde','melara@gmail.com','$2y$10$eqGk0rqJbIuBF3oVrD00GuW1eqy2k6wjTg2JL7hT2cnTR3Tpn2JjS','ACTIVO','ADMINISTRADOR',NULL,'2022-02-21 22:02:17'),(48,'Juan Antonio','Mendoza','juan@gmail.com','$2y$10$qEHOumWM00v.bT8YyaPkxumL7ChT3RcL2i8TV2ydKzT7jXxp.xHVm','INACTIVO','USUARIO',NULL,'2022-02-22 00:35:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-22  0:53:12
