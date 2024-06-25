-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: final_project
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `學號` varchar(8) NOT NULL,
  `班級` varchar(20) NOT NULL,
  `姓名` varchar(50) NOT NULL,
  `信箱` varchar(100) NOT NULL,
  `日期` varchar(11) NOT NULL,
  `節數` varchar(45) NOT NULL,
  `問題描述` varchar(300) NOT NULL,
  `狀態` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conference`
--

DROP TABLE IF EXISTS `conference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conference` (
  `id` int NOT NULL AUTO_INCREMENT,
  `作者` varchar(500) NOT NULL,
  `論文名稱` varchar(500) NOT NULL,
  `會議名稱` varchar(500) NOT NULL,
  `會期及頁數` varchar(500) NOT NULL,
  `日期` varchar(7) NOT NULL COMMENT 'yyyy-dd',
  `地點` varchar(100) NOT NULL,
  `教授編號` varchar(8) NOT NULL,
  PRIMARY KEY (`id`,`論文名稱`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conference`
--

LOCK TABLES `conference` WRITE;
/*!40000 ALTER TABLE `conference` DISABLE KEYS */;
INSERT INTO `conference` VALUES (1,'Chung-Wei Kuo*, Chun-Chang Lin, Yu-Yi Hong, Jia-Ruei Liu, Chun-Hsiu Yeh, and Kuo-Yu Tsai','Research and Analysis of the Effects of Different Shielding Materials on Resisting Side-Channel Attacks on IoT Device Microcontroller','2024 8th International Conference on Cryptography, Security and Privacy (CSP 2024)','CSP 2024 conference proceedings','2024-04','Ritsumeikan University Osaka campus','T113001'),(2,'ChunHsiu Yeh; Wei-Cheng Shen; Chi-Wei Ma; Qiu-Tong Yeh; Chung-Wei Kuo; Jong-Shin Chen','Real time Human Movement Recognition and Interaction in Virtual Fitness using Image Recognition and Motion Analysis','2023 12th International Conference on Awareness Science and Technology (iCAST)','21 December 2023','2023-11','Chaoyang University of Technology','T113001'),(3,'ChunHsiu Yeh; Wei-Cheng Shen; Hung-Yu Chi; Chin-En Lin; Jong-Shin Chen','Enhancing Online Learning Monitoring with Novel Image Recognition Method Using Dlib for Eye Feature Detection ','2023 12th International Conference on Awareness Science and Technology (iCAST)','pp. 340-345','2023-11','朝陽科技大學','T113001');
/*!40000 ALTER TABLE `conference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `課程名稱` varchar(45) NOT NULL,
  `教室地點` varchar(45) NOT NULL,
  `星期` varchar(45) NOT NULL,
  `開始節數` varchar(45) NOT NULL,
  `結束節數` varchar(45) NOT NULL,
  `教授編號` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'資料庫系統','資電404','星期一','第八節 15:10~16:00','第九節 16:10~17:00','T113001'),(2,'請益時間','資電239','星期一','第四節 11:10~12:00','第四節 11:10~12:00','T113001'),(3,'請益時間','資電239','星期二','第四節 11:10~12:00','第四節 11:10~12:00','T113001'),(4,'專題研究(一)','資訊三丁','星期二','第五節 12:10~13:00','第五節 12:10~13:00','T113001'),(5,'專題研究(一)','資訊三丙','星期二','第五節 12:10~13:00','第五節 12:10~13:00','T113001'),(6,'專題研究(一)','資訊三乙','星期二','第五節 12:10~13:00','第五節 12:10~13:00','T113001'),(7,'專題研究(一)','資訊三甲','星期二','第五節 12:10~13:00','第五節 12:10~13:00','T113001'),(8,'多媒體系統','資訊二合','星期二','第六節 13:10~14:00','第八節 15:10~16:00','T113001'),(9,'班級活動','資訊二丁','星期二','第九節 16:10~17:00','第九節 16:10~17:00','T113001'),(10,'專題研究(一)','資訊三丁','星期三','第五節 12:10~13:00','第五節 12:10~13:00','T113001'),(11,'專題研究(一)','資訊三乙','星期三','第五節 12:10~13:00','第五節 12:10~13:00','T113001'),(12,'請益時間','資電239','星期四','第三節 10:10~11:00','第四節 11:10~12:00','T113001'),(13,'程式設計與問題解決','資訊四合','星期四','第六節 13:10~14:00','第七節 14:10~15:00','T113001'),(14,'資料庫系統','資訊二丁','星期五','第六節 13:10~14:00','第六節 13:10~14:00','T113001'),(15,'請益時間','資電239','星期五','第七節 14:10~15:00','第八節 15:10~16:00','T113001');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educations`
--

DROP TABLE IF EXISTS `educations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `educations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `學校` varchar(100) DEFAULT NULL,
  `系所` varchar(100) DEFAULT NULL,
  `學位` varchar(100) DEFAULT NULL,
  `專長` varchar(100) DEFAULT NULL,
  `專長英文` varchar(100) DEFAULT NULL,
  `分類` varchar(45) NOT NULL,
  `教授編號` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educations`
--

LOCK TABLES `educations` WRITE;
/*!40000 ALTER TABLE `educations` DISABLE KEYS */;
INSERT INTO `educations` VALUES (1,'國立中興大學','資訊科學與工程研究所','博士','',NULL,'學歷','T113001'),(2,'','','','影像處理','Image processing','專長','T113001'),(3,'','','','智能製造','Smart manufacturing','專長','T113001'),(4,'','','','專案管理','project management','專長','T113001'),(5,'','','','物件導向','object-oriented','專長','T113001');
/*!40000 ALTER TABLE `educations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `experience` (
  `id` int NOT NULL AUTO_INCREMENT,
  `區域` varchar(10) NOT NULL,
  `單位名稱` varchar(100) NOT NULL,
  `科系名稱` varchar(45) DEFAULT NULL,
  `職位` varchar(50) NOT NULL,
  `教授編號` varchar(8) NOT NULL,
  PRIMARY KEY (`id`,`單位名稱`,`職位`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,'校外','中州科技大學','多媒體與遊戲科學系','副教授','T113001'),(2,'校外','中州科技大學','資訊管理系','副教授','T113001'),(3,'校外','中州科技大學','資訊管理系','助理教授','T113001'),(4,'校外','朝陽科技大學','資訊管理系','講師','T113001'),(5,'','','','',''),(6,'校內','蘋果公司區域教育培訓中心','','教學組組長','T113001'),(7,'校內','資訊工程學系','','副教授','T113001'),(8,'校內','資訊工程學系','','兼任副教授','T113001');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industry`
--

DROP TABLE IF EXISTS `industry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `industry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `產學名稱` varchar(500) NOT NULL,
  `開始日期` varchar(7) NOT NULL,
  `結束日期` varchar(7) NOT NULL,
  `身分類別` varchar(50) NOT NULL,
  `計畫代號` varchar(45) NOT NULL,
  `教授編號` varchar(8) NOT NULL,
  PRIMARY KEY (`id`,`產學名稱`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industry`
--

LOCK TABLES `industry` WRITE;
/*!40000 ALTER TABLE `industry` DISABLE KEYS */;
INSERT INTO `industry` VALUES (1,'歐印精品(All-En Boutique)網站數據分析系統','2023-12','2024-05','主持人','C1120003','T113001'),(2,'歐印精品(All-En Boutique)網站系統建置 ','2023-08','2024-03','主持人','C1120001','T113001'),(3,'設計與實作具抵抗旁通道攻擊之物聯網微控制器加密傳輸機制','2023-10','2024-07','共同主持人','C1120002','T113001');
/*!40000 ALTER TABLE `industry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `introduction`
--

DROP TABLE IF EXISTS `introduction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `introduction` (
  `照片` varchar(200) NOT NULL,
  `姓名` varchar(45) NOT NULL,
  `英文姓名` varchar(45) NOT NULL,
  `職稱` varchar(45) NOT NULL,
  `簡介` varchar(200) NOT NULL,
  `分機` varchar(45) NOT NULL,
  `信箱` varchar(45) NOT NULL,
  `辦公室` varchar(45) NOT NULL,
  PRIMARY KEY (`分機`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `introduction`
--

LOCK TABLES `introduction` WRITE;
/*!40000 ALTER TABLE `introduction` DISABLE KEYS */;
INSERT INTO `introduction` VALUES ('yei2-2.jpg','葉春秀','YE,CHUN-XIU','副教授','葉春秀老師畢業於國立中興大學資訊科學與工程研究所，1992年至2023年期間任職於中州科技大學資管系與多遊系擔任專任副教授。在教學上，曾榮獲優良導師、典範導師；帶領學生參與校內外專題競賽以及國內APP競賽獲獎多次。著作發表包括以影像處理技術應用於影像縮放技術與影像辨識、物件導向專案管理的技術開發，並曾獲ICAIT研討會最佳論文獎。主要的研究方向為專案管理、物件導向、影像辨識、智能製造。','3736','chunhyeh@fcu.edu.tw','資電239');
/*!40000 ALTER TABLE `introduction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journal`
--

DROP TABLE IF EXISTS `journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `journal` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `作者` varchar(500) NOT NULL,
  `期刊名稱` varchar(500) NOT NULL,
  `刊別` varchar(100) NOT NULL,
  `刊期及頁數` varchar(100) NOT NULL,
  `日期` varchar(7) NOT NULL COMMENT 'yyyy-dd',
  `領域` varchar(45) NOT NULL,
  `教授編號` varchar(8) NOT NULL,
  PRIMARY KEY (`id`,`期刊名稱`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal`
--

LOCK TABLES `journal` WRITE;
/*!40000 ALTER TABLE `journal` DISABLE KEYS */;
INSERT INTO `journal` VALUES (1,'Shuchih Ernest Chang, Wei-Cheng Shen, and Chun-Hsiu Yeh','A Comparative Study of User Intention to Recommend Content on Mobile Social Networks','Multimedia tools and applications (MTAD)','Vol. 76, No. 4, Feb 2017','2017-02','(SCIE)','T113001'),(2,'Yung-Chen Chou, Chun-Hsiu Yeh*, Jau-Ji Shen, and Jinn-Ke Jan','A New Blind Image Authentication for Image Tampering Detection and Recovery Based on Block-wise Feature Classification','Journal of Internet Technology','vol. 19, no. 6 , pp. 1907-1917','2018-11','(SCIE)','T113001'),(3,'Jau-Ji Shen, Chun-Hsiu Yeh*, and Jinn-Ke Jan','A New Approach of Lossy Image Compression Based on Hybrid Image Resizing Techniques','The International Arab Journal of Information Technology','Vol. 16, No. 2, pp.226-235','2019-03','(SCIE)','T113001');
/*!40000 ALTER TABLE `journal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outaward`
--

DROP TABLE IF EXISTS `outaward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `outaward` (
  `id` int NOT NULL AUTO_INCREMENT,
  `年度` varchar(3) NOT NULL,
  `獎項名稱` varchar(200) NOT NULL,
  `承辦組織` varchar(200) NOT NULL,
  `日期` varchar(11) NOT NULL,
  `教授編號` varchar(8) NOT NULL,
  `補充說明` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`,`獎項名稱`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outaward`
--

LOCK TABLES `outaward` WRITE;
/*!40000 ALTER TABLE `outaward` DISABLE KEYS */;
INSERT INTO `outaward` VALUES (1,'112','2024系統性創新研討會與專案競賽-專案競賽組銀牌(第二名) ','中華系統性創新學會','2024-01-20','T113001',''),(2,'112','2023全民資訊競賽-資訊概論組第四名 ','中華民國電腦教育發展協會','2023-12-11','T113001',''),(3,'112','2023全民資訊競賽-雲端APP程式組第四名','中華民國電腦教育發展協會','2023-12-11','T113001',''),(4,'111','2023全民資訊競賽-資訊安全組第一名','中華民國電腦教育發展協會','2023-05-08','T113001','');
/*!40000 ALTER TABLE `outaward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quota`
--

DROP TABLE IF EXISTS `quota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quota` (
  `id` int NOT NULL AUTO_INCREMENT,
  `大專生總名額` int NOT NULL,
  `目前大專生名額` int NOT NULL,
  `專題總名額` int NOT NULL,
  `目前專題名額` int NOT NULL,
  `補充說明` varchar(200) DEFAULT NULL,
  `教授編號` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quota`
--

LOCK TABLES `quota` WRITE;
/*!40000 ALTER TABLE `quota` DISABLE KEYS */;
INSERT INTO `quota` VALUES (10,2,2,5,2,'','T113001');
/*!40000 ALTER TABLE `quota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seniorproject`
--

DROP TABLE IF EXISTS `seniorproject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seniorproject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `年度` varchar(4) NOT NULL,
  `專題題目` varchar(200) NOT NULL,
  `需求人數` varchar(10) NOT NULL,
  `具備能力` varchar(200) NOT NULL,
  `專題說明` varchar(200) NOT NULL,
  `狀態` varchar(10) DEFAULT NULL,
  `教授編號` varchar(8) NOT NULL,
  PRIMARY KEY (`id`,`專題題目`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seniorproject`
--

LOCK TABLES `seniorproject` WRITE;
/*!40000 ALTER TABLE `seniorproject` DISABLE KEYS */;
INSERT INTO `seniorproject` VALUES (1,'113','智能道路交通違規偵測與自動舉發系統','4','python','面談','已分配','T113001'),(2,'113','AOI智能檢測','4','python','面談','已分配','T113001'),(3,'113','智能導盲手機APP','4','python','面談','已分配','T113001'),(4,'113','體態健身智慧系統','4','python','面談','已分配','T113001');
/*!40000 ALTER TABLE `seniorproject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` varchar(8) NOT NULL,
  `name` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('T113001','葉春秀','資訊工程系','t113001@o365.fuc.edu.tw','$2y$10$nQQ1JyJc212NLA1PNI/TwOgpU69.d/qF7tcFSKqqr9M3DToXOTQNG');
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

-- Dump completed on 2024-05-26 22:51:37
