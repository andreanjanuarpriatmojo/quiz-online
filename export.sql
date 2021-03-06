-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: quiz
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `jadwal_ujians`
--

DROP TABLE IF EXISTS `jadwal_ujians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_ujians` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pelajaran_id` int(11) NOT NULL,
  `paket_soal_id` int(11) NOT NULL,
  `nama_ujian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_ujians`
--

LOCK TABLES `jadwal_ujians` WRITE;
/*!40000 ALTER TABLE `jadwal_ujians` DISABLE KEYS */;
INSERT INTO `jadwal_ujians` VALUES (1,1,1,'Ujian Akhir Semester','2019-01-21 06:28:19','2019-09-22 09:00:00','2019-05-21 11:28:33','2019-05-21 11:50:03');
/*!40000 ALTER TABLE `jadwal_ujians` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'PBKK','2019-05-21 11:27:05','2019-05-21 11:27:05');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(18,'2019_05_07_211319_create_pelajarans_table',2),(19,'2019_05_07_212549_create_paket_soals_table',2),(20,'2019_05_07_215110_create_jadwal_ujians_table',2),(21,'2019_05_07_222437_create_soals_table',2),(22,'2019_05_19_150422_create_kelas_table',2),(23,'2019_05_19_152101_create_user_kelas',2),(24,'2019_05_20_041908_create_ujian_kelas_table',2),(25,'2019_05_20_062439_create_ujian_siswas_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paket_soals`
--

DROP TABLE IF EXISTS `paket_soals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paket_soals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paket_soals`
--

LOCK TABLES `paket_soals` WRITE;
/*!40000 ALTER TABLE `paket_soals` DISABLE KEYS */;
INSERT INTO `paket_soals` VALUES (1,'Paket A',1,'2019-05-21 11:27:45','2019-05-21 11:27:45');
/*!40000 ALTER TABLE `paket_soals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelajarans`
--

DROP TABLE IF EXISTS `pelajarans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelajarans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pelajaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelajarans`
--

LOCK TABLES `pelajarans` WRITE;
/*!40000 ALTER TABLE `pelajarans` DISABLE KEYS */;
INSERT INTO `pelajarans` VALUES (1,'PBKK','2019-05-21 11:27:27','2019-05-21 11:27:27');
/*!40000 ALTER TABLE `pelajarans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soals`
--

DROP TABLE IF EXISTS `soals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paket_soal_id` int(11) NOT NULL,
  `deskripsi_soal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_3` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_4` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soals`
--

LOCK TABLES `soals` WRITE;
/*!40000 ALTER TABLE `soals` DISABLE KEYS */;
INSERT INTO `soals` VALUES (1,1,'<p>Masukan Deskripsi Soal</p>','<p>Masukan Pilihan 1</p>','<p>Masukan Pilihan 2</p>','<p>Masukan Pilihan 3</p>','<p>Masukan Pilihan 4</p>','1','2019-05-21 11:28:01','2019-05-21 11:28:01');
/*!40000 ALTER TABLE `soals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ujian_kelas`
--

DROP TABLE IF EXISTS `ujian_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ujian_kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jadwal_ujian_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ujian_kelas`
--

LOCK TABLES `ujian_kelas` WRITE;
/*!40000 ALTER TABLE `ujian_kelas` DISABLE KEYS */;
INSERT INTO `ujian_kelas` VALUES (2,1,1,NULL,NULL);
/*!40000 ALTER TABLE `ujian_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ujian_siswas`
--

DROP TABLE IF EXISTS `ujian_siswas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ujian_siswas` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `random_soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `random_jawaban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_siswa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `jadwal_ujian_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Created',
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `jumlah_benar` int(11) DEFAULT NULL,
  `nilai` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ujian_siswas`
--

LOCK TABLES `ujian_siswas` WRITE;
/*!40000 ALTER TABLE `ujian_siswas` DISABLE KEYS */;
INSERT INTO `ujian_siswas` VALUES ('294de1a0-7bbe-11e9-a875-4304ab4b82ba','[1]','[2,4,3,1]','[\"1\"]',2,1,'Finished','2019-01-21 06:28:19','2019-09-22 09:00:00',NULL,NULL,'2019-05-21 11:47:07','2019-05-21 11:51:31');
/*!40000 ALTER TABLE `ujian_siswas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_kelas`
--

DROP TABLE IF EXISTS `user_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_kelas`
--

LOCK TABLES `user_kelas` WRITE;
/*!40000 ALTER TABLE `user_kelas` DISABLE KEYS */;
INSERT INTO `user_kelas` VALUES (1,2,1,NULL,NULL);
/*!40000 ALTER TABLE `user_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$eDQPhJyW2.MONqz/DQshfucCel/yOictHsoAo8lA/UxgqZYiYId6e','admin','admin','xdOQ6nfAxWXb6TvsEO1WOlURtOOZvhg2nu9cKsktdSEIOatXF01G1KMywlMF','2019-05-07 01:33:40','2019-05-07 01:33:40'),(2,'5115100094','$2y$10$wcQZ6nyd38sV5id0D.rYx.2uCbwZsfY44/hRKBYDj1HvPv8vW/AK6','siswa','Achmadaniar Anindya Rhosady','Nd4uGMh64CQyCfv6oQgrnyqHbZoEa2T2IjzxFHRQwoGhhhEpdl68YcPrdhac','2019-05-19 08:52:53','2019-05-19 08:52:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-21 19:22:51
