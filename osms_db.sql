-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.20 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table osms.academic_officer
CREATE TABLE IF NOT EXISTS `academic_officer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `contact_number` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `gender_id` int DEFAULT NULL,
  `status_id` int NOT NULL,
  `verification_status_id` int NOT NULL,
  `verification_code` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_academic_officer_gender1_idx` (`gender_id`),
  KEY `fk_academic_officer_status1_idx` (`status_id`),
  KEY `fk_academic_officer_varification_status1_idx` (`verification_status_id`),
  CONSTRAINT `fk_academic_officer_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_academic_officer_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_academic_officer_varification_status1` FOREIGN KEY (`verification_status_id`) REFERENCES `verification_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.academic_officer: ~3 rows (approximately)
/*!40000 ALTER TABLE `academic_officer` DISABLE KEYS */;
INSERT INTO `academic_officer` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `contact_number`, `gender_id`, `status_id`, `verification_status_id`, `verification_code`) VALUES
	(1, 'Hazeem', 'hazeem3427', 'hazeem3437@gmail.com', 'Mohamed', 'Hazeem', '0774451117', 1, 1, 1, '62c39f7bc1cbe'),
	(2, 'Abdullah', 'abdullah3437', 'abdullah34137@gmail.com', 'M.Z', 'Abdullah', '0773334587', 1, 1, 1, '62c3a0a46dbdf'),
	(3, 'Waseem', 'waseem3457', 'abdulrahumanmuhammedwaseem@gmail.com', 'A.R.M', 'Waseem', '0773435987', 1, 1, 1, '62c3a1094385d');
/*!40000 ALTER TABLE `academic_officer` ENABLE KEYS */;

-- Dumping structure for table osms.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admin_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_admin_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `gender_id`) VALUES
	(1, 'Kur', 'Kur3417', 'abdulrahumanmuhammedwaseem@gmail.com', 'Kur', 'Kur', 1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table osms.admin_photo
CREATE TABLE IF NOT EXISTS `admin_photo` (
  `path` varchar(120) COLLATE utf8_bin NOT NULL,
  `admin_id` int NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_admin_photo_admin1_idx` (`admin_id`),
  CONSTRAINT `fk_admin_photo_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.admin_photo: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_photo` DISABLE KEYS */;
INSERT INTO `admin_photo` (`path`, `admin_id`) VALUES
	('resources//admin_profile_photos//62c36e2c076d4Kurundugolla.jpeg', 1);
/*!40000 ALTER TABLE `admin_photo` ENABLE KEYS */;

-- Dumping structure for table osms.ao_photo
CREATE TABLE IF NOT EXISTS `ao_photo` (
  `path` varchar(120) COLLATE utf8_bin NOT NULL,
  `academic_officer_id` int NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_ao_photo_academic_officer1_idx` (`academic_officer_id`),
  CONSTRAINT `fk_ao_photo_academic_officer1` FOREIGN KEY (`academic_officer_id`) REFERENCES `academic_officer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.ao_photo: ~0 rows (approximately)
/*!40000 ALTER TABLE `ao_photo` DISABLE KEYS */;
INSERT INTO `ao_photo` (`path`, `academic_officer_id`) VALUES
	('resources//profile_photos//62c5e06ff41d1teacher7.png', 1);
/*!40000 ALTER TABLE `ao_photo` ENABLE KEYS */;

-- Dumping structure for table osms.assignments
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `teacher_has_subject_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assignments_teacher_has_subject1_idx` (`teacher_has_subject_id`),
  CONSTRAINT `fk_assignments_teacher_has_subject1` FOREIGN KEY (`teacher_has_subject_id`) REFERENCES `teacher_has_subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.assignments: ~2 rows (approximately)
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
INSERT INTO `assignments` (`id`, `path`, `date_time`, `teacher_has_subject_id`) VALUES
	(1, 'resources//assignments//62c48c9d42b5cA.R.M.Waseem_200112502120_Pegasus1.pdf', '2022-07-06 00:40:21', 5),
	(2, 'resources//assignments//62c71c3ae44ec4.Logic and Truth Tables.pdf', '2022-07-07 23:17:39', 7);
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;

-- Dumping structure for table osms.assignment_marks
CREATE TABLE IF NOT EXISTS `assignment_marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `assignments_id` int NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `path` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `marks` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assignment_marks_student1_idx` (`student_id`),
  KEY `fk_assignment_marks_assignments1_idx` (`assignments_id`),
  CONSTRAINT `fk_assignment_marks_assignments1` FOREIGN KEY (`assignments_id`) REFERENCES `assignments` (`id`),
  CONSTRAINT `fk_assignment_marks_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.assignment_marks: ~3 rows (approximately)
/*!40000 ALTER TABLE `assignment_marks` DISABLE KEYS */;
INSERT INTO `assignment_marks` (`id`, `student_id`, `assignments_id`, `date_time`, `path`, `marks`) VALUES
	(1, 1, 1, '2021-07-06 00:57:40', 'resources//assignments//62c48c9d42b5cA.R.M.Waseem_200112502120_Pegasus1.pdf', 90),
	(2, 2, 1, '2022-07-06 02:44:10', 'Resources//Results//62c4a9a22a3fbMathematics for Computer Science 1 - Paper II.pdf', 80),
	(3, 1, 1, '2022-07-07 23:21:08', 'Resources//Results//62c4a9a22a3fbMathematics for Computer Science 1 - Paper II.pdf', NULL);
/*!40000 ALTER TABLE `assignment_marks` ENABLE KEYS */;

-- Dumping structure for table osms.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.gender: ~2 rows (approximately)
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'Male'),
	(2, 'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for table osms.grade
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.grade: ~5 rows (approximately)
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` (`id`, `name`) VALUES
	(1, '1'),
	(2, '2'),
	(3, '3'),
	(4, '4'),
	(5, '5');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;

-- Dumping structure for table osms.lesson_notes
CREATE TABLE IF NOT EXISTS `lesson_notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_has_subject_id` int NOT NULL,
  `path` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lesson_notes_teacher_has_subject1_idx` (`teacher_has_subject_id`),
  CONSTRAINT `fk_lesson_notes_teacher_has_subject1` FOREIGN KEY (`teacher_has_subject_id`) REFERENCES `teacher_has_subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.lesson_notes: ~4 rows (approximately)
/*!40000 ALTER TABLE `lesson_notes` DISABLE KEYS */;
INSERT INTO `lesson_notes` (`id`, `teacher_has_subject_id`, `path`, `date_time`) VALUES
	(1, 5, 'resources//lesson_notes//62c4866237c30Mathematics for Computer Science 1 - Paper II.pdf', '2022-07-06 00:13:46'),
	(2, 7, 'resources//lesson_notes//62c63f72655761.Number System.pdf', '2022-07-07 07:35:38'),
	(3, 7, 'resources//lesson_notes//62c647f2b6d6a2.Computer Codes.pdf', '2022-07-07 08:11:54'),
	(4, 7, 'resources//lesson_notes//62c648a6dfddf4.Logic and Truth Tables.pdf', '2022-07-07 08:14:54');
/*!40000 ALTER TABLE `lesson_notes` ENABLE KEYS */;

-- Dumping structure for table osms.released_marks
CREATE TABLE IF NOT EXISTS `released_marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `assignment_marks_id` int NOT NULL,
  `date_time` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_released_marks_assignment_marks1_idx` (`assignment_marks_id`),
  CONSTRAINT `fk_released_marks_assignment_marks1` FOREIGN KEY (`assignment_marks_id`) REFERENCES `assignment_marks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.released_marks: ~2 rows (approximately)
/*!40000 ALTER TABLE `released_marks` DISABLE KEYS */;
INSERT INTO `released_marks` (`id`, `assignment_marks_id`, `date_time`) VALUES
	(1, 1, '2022-07-06 01:51:49'),
	(2, 2, '2022-07-06 01:51:49');
/*!40000 ALTER TABLE `released_marks` ENABLE KEYS */;

-- Dumping structure for table osms.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table osms.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `grade_id` int NOT NULL,
  `contact_number` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `gender_id` int DEFAULT NULL,
  `status_id` int NOT NULL,
  `verification_status_id` int NOT NULL,
  `verification_code` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_grade1_idx` (`grade_id`),
  KEY `fk_student_gender1_idx` (`gender_id`),
  KEY `fk_student_status1_idx` (`status_id`),
  KEY `fk_student_varification_status1_idx` (`verification_status_id`),
  CONSTRAINT `fk_student_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_student_grade1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`),
  CONSTRAINT `fk_student_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_student_varification_status1` FOREIGN KEY (`verification_status_id`) REFERENCES `verification_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.student: ~3 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `grade_id`, `contact_number`, `gender_id`, `status_id`, `verification_status_id`, `verification_code`) VALUES
	(1, 'Abc', 'abc3417', 'abc@gmail.com', 'Abc', 'Abc', 1, '0777123123', 1, 1, 1, '12345612'),
	(2, 'Def', 'def3427', 'def@gmail.com', 'Def', 'Def', 1, '0781672772', 1, 1, 1, '62c4a0f34f4ed'),
	(3, 'Jkl', 'jkl3457', 'jkl@gmail.com', NULL, NULL, 4, NULL, NULL, 1, 2, '62c4a199e80e0');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table osms.student_photo
CREATE TABLE IF NOT EXISTS `student_photo` (
  `path` varchar(120) COLLATE utf8_bin NOT NULL,
  `student_id` int NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_student_photo_student1_idx` (`student_id`),
  CONSTRAINT `fk_student_photo_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.student_photo: ~2 rows (approximately)
/*!40000 ALTER TABLE `student_photo` DISABLE KEYS */;
INSERT INTO `student_photo` (`path`, `student_id`) VALUES
	('resources//profile_photos//62c65dc6a987bteacher7.png', 1),
	('resources//profile_photos//62c60fb0bda14teacher8.png', 2);
/*!40000 ALTER TABLE `student_photo` ENABLE KEYS */;

-- Dumping structure for table osms.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.subject: ~4 rows (approximately)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`id`, `name`) VALUES
	(1, 'Islam'),
	(2, 'Arabic'),
	(3, 'Maths'),
	(4, 'Science');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;

-- Dumping structure for table osms.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `contact_number` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `gender_id` int DEFAULT NULL,
  `status_id` int NOT NULL,
  `verification_status_id` int NOT NULL,
  `verification_code` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_gender1_idx` (`gender_id`),
  KEY `fk_teacher_status1_idx` (`status_id`),
  KEY `fk_teacher_varification_status1_idx` (`verification_status_id`),
  CONSTRAINT `fk_teacher_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_teacher_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_teacher_varification_status1` FOREIGN KEY (`verification_status_id`) REFERENCES `verification_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.teacher: ~4 rows (approximately)
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `contact_number`, `gender_id`, `status_id`, `verification_status_id`, `verification_code`) VALUES
	(1, 'Waseem', 'rawaseem37', 'abdulrahumanmuhammedwaseem@gmail.com', 'A.R.M', 'Waseem', '0763256487', 1, 1, 1, NULL),
	(2, 'Nizar', 'nizar34', 'nizar347@gmail.com', NULL, NULL, NULL, NULL, 1, 1, '62b326294e306'),
	(3, 'Abdullah', 'abdullah374', 'abdullah3427@gmail.com', 'M.Z', 'Abdullah', '0781672882', 1, 1, 1, '62c0e21d23da0'),
	(4, 'Hazeem', 'hazeem3743', 'hazeem3417@gmail.com', 'A.R.M', 'Hazeem', '0761238457', 1, 1, 1, '62c0fc4f8991a');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;

-- Dumping structure for table osms.teacher_has_subject
CREATE TABLE IF NOT EXISTS `teacher_has_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `grade_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_has_subject_teacher1_idx` (`teacher_id`),
  KEY `fk_teacher_has_subject_subject1_idx` (`subject_id`),
  KEY `fk_teacher_has_subject_grade1_idx` (`grade_id`),
  CONSTRAINT `fk_teacher_has_subject_grade1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`),
  CONSTRAINT `fk_teacher_has_subject_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  CONSTRAINT `fk_teacher_has_subject_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.teacher_has_subject: ~4 rows (approximately)
/*!40000 ALTER TABLE `teacher_has_subject` DISABLE KEYS */;
INSERT INTO `teacher_has_subject` (`id`, `teacher_id`, `subject_id`, `grade_id`) VALUES
	(4, 2, 4, 1),
	(5, 3, 2, 1),
	(6, 4, 1, 1),
	(7, 1, 3, 1);
/*!40000 ALTER TABLE `teacher_has_subject` ENABLE KEYS */;

-- Dumping structure for table osms.teacher_photo
CREATE TABLE IF NOT EXISTS `teacher_photo` (
  `path` varchar(120) COLLATE utf8_bin NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_teacher_photo_teacher1_idx` (`teacher_id`),
  CONSTRAINT `fk_teacher_photo_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.teacher_photo: ~3 rows (approximately)
/*!40000 ALTER TABLE `teacher_photo` DISABLE KEYS */;
INSERT INTO `teacher_photo` (`path`, `teacher_id`) VALUES
	('resources//profile_photos//62c5bc907e849teacher9.png', 1),
	('resources//profile_photos//62c60e0765c5eteacher8.png', 3),
	('resources//profile_photos//62c5b83228df5teacher7.png', 4);
/*!40000 ALTER TABLE `teacher_photo` ENABLE KEYS */;

-- Dumping structure for table osms.verification_status
CREATE TABLE IF NOT EXISTS `verification_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table osms.verification_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `verification_status` DISABLE KEYS */;
INSERT INTO `verification_status` (`id`, `name`) VALUES
	(1, 'Verified'),
	(2, 'Unverified');
/*!40000 ALTER TABLE `verification_status` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
