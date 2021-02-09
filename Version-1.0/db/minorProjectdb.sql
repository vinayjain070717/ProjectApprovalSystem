-- MySQL dump 10.13  Distrib 5.7.25, for Win64 (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	5.7.25-log

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
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(25) NOT NULL,
  `last_name` char(25) NOT NULL,
  `email_id` char(30) NOT NULL,
  `password` char(100) NOT NULL,
  `password_key` char(100) NOT NULL,
  `image` blob,
  `group_code` int(11) DEFAULT NULL,
  `mobile_number` char(20) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `faculty_student_group_relationship` (`group_code`),
  CONSTRAINT `faculty_student_group_relationship` FOREIGN KEY (`group_code`) REFERENCES `student_group` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (12,'Dinesh','Patel','dinesh1011@gmail.com','dineshpatel','afafadfadfads',NULL,NULL,'9834567214'),(13,'Jitendra','sharma','jitendrasharma@gmail.com','jitendrasharma','afafadfadfads',NULL,NULL,'9409864316'),(14,'Anurag','Golwalkar','anuraggolwalkar@gmail.com','anuraggolwalkar','afafadfadfads',NULL,NULL,'9998643568'),(15,'Anurag','Golwalkar','anuraggolwalkar@gmail.com','anuraggolwalkar','afafadfadfads',NULL,NULL,'9998643568'),(16,'Aruna','Patidar','arunapatidar@gmail.com','arunapatidar','afafadfadfads',NULL,NULL,'7776432578');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty_approval`
--

DROP TABLE IF EXISTS `faculty_approval`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty_approval` (
  `code` int(11) NOT NULL,
  `is_approved` char(1) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `date_of_creation` date NOT NULL,
  `time_of_creation` time NOT NULL,
  `faculty_code` int(11) NOT NULL,
  `student_group_code` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `faculty_approval_relationship` (`faculty_code`),
  KEY `faculty_approval_relationship2` (`student_group_code`),
  CONSTRAINT `faculty_approval_relationship` FOREIGN KEY (`faculty_code`) REFERENCES `faculty` (`code`),
  CONSTRAINT `faculty_approval_relationship2` FOREIGN KEY (`student_group_code`) REFERENCES `student_group` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty_approval`
--

LOCK TABLES `faculty_approval` WRITE;
/*!40000 ALTER TABLE `faculty_approval` DISABLE KEYS */;
/*!40000 ALTER TABLE `faculty_approval` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(25) NOT NULL,
  `last_name` char(25) NOT NULL,
  `year` int(1) NOT NULL,
  `section` char(1) NOT NULL,
  `roll_number` char(30) NOT NULL,
  `mobile_number` char(15) NOT NULL,
  `semester` int(2) NOT NULL,
  `department` char(30) NOT NULL,
  `profile_picture` blob,
  `group_code` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `group_relationship` (`group_code`),
  CONSTRAINT `group_relationship` FOREIGN KEY (`group_code`) REFERENCES `student_group` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (61,'Ashutosh','porwal',3,'A','1601BTIT00876','9876262626',6,'IT',NULL,33),(62,'Shreya','Jain',3,'A','1601DMTIT00881','7654282726',6,'IT',NULL,33),(63,'Shray','jaiswal',3,'A','1601BTIT009867','775435468976',6,'IT',NULL,33),(64,'Bhaskar','sharma',3,'A','1601BTIT00767','8976543256',6,'IT',NULL,33);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_file`
--

DROP TABLE IF EXISTS `student_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_file` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `comment` varchar(400) DEFAULT NULL,
  `title` char(20) NOT NULL,
  `date_of_creation` date NOT NULL,
  `time_of_creation` time NOT NULL,
  `file_type` char(30) NOT NULL,
  `group_code` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `student_file_relationship` (`group_code`),
  CONSTRAINT `student_file_relationship` FOREIGN KEY (`group_code`) REFERENCES `student_group` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_file`
--

LOCK TABLES `student_file` WRITE;
/*!40000 ALTER TABLE `student_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_group`
--

DROP TABLE IF EXISTS `student_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_group` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` char(50) NOT NULL,
  `password` char(100) NOT NULL,
  `number_of_student` int(1) NOT NULL,
  `is_email_verified` char(1) NOT NULL,
  `faculty_code` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `group_relationship2` (`faculty_code`),
  CONSTRAINT `group_relationship2` FOREIGN KEY (`faculty_code`) REFERENCES `faculty` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_group`
--

LOCK TABLES `student_group` WRITE;
/*!40000 ALTER TABLE `student_group` DISABLE KEYS */;
INSERT INTO `student_group` VALUES (33,'ashutoshpr123@gmail.com','ashutoshporwal',4,'Y',12);
/*!40000 ALTER TABLE `student_group` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-16 12:37:09
