-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 11:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexushealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(255) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `doctorID` varchar(255) NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `appointmentDate` varchar(255) NOT NULL,
  `patientName` varchar(255) NOT NULL,
  `patientAge` varchar(255) NOT NULL,
  `patientNumber` varchar(255) NOT NULL,
  `patientUsername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctorName`, `doctorID`, `appointmentTime`, `appointmentDate`, `patientName`, `patientAge`, `patientNumber`, `patientUsername`) VALUES
(4, 'Dr. Rahat Amin Chowdhury', '1', '7.00 - 7.30 PM', '2023-11-30', 'Abdullah Masrur', '2001-05-02', '01621030698', 'abd123'),
(6, 'Prof. Dr. Md. Manajjir Ali', '3', '6:00 - 6:30 pm', '2023-12-08', 'Abdullah Masrur', '2001-05-02', '01621030698', 'abd123'),
(9, 'Dr. Md. Shamsur Rahman', '13', '5:00 - 5:30 pm\r\n', '2023-11-30', 'Aiman Azad Khan', '2000-12-09', '01942446088', 'aiman1'),
(10, 'Prof. Dr. Madhusudan Saha', '10', '\r\n6:30 - 7:00 pm\r\n', '2023-12-01', 'Aiman Azad Khan', '2000-12-09', '01942446088', 'aiman1'),
(11, 'Dr. Rahat Amin Chowdhury', '1', '6.30 - 7.00 PM', '2023-12-07', 'Aiman Azad Khan', '2000-12-09', '01942446088', 'aiman1'),
(12, 'Prof. Dr. Md. Shahnewaz Chowdhury\r\n', '5', '6:30-7:00 pm', '2024-02-07', 'Abdullah Masrur', '2001-05-02', '01621030698', 'abd123'),
(13, 'Dr. Muhammad Alam Sikder', '7', '\r\n4:30 - 5:00 pm\r\n\r\n', '2024-01-18', 'admin admin', 'admin', 'admin', 'admin'),
(14, 'Dr. Rahat Amin Chowdhury', '1', '7.30 - 8.00 PM', '2024-02-08', 'Aiman Azad Khan', '2000-12-09', '01942446088', 'aiman1'),
(15, 'Prof. Dr. N. K. Sinha', '2', '5:00 -5:30 pm', '2024-02-08', 'Aiman Azad Khan', '2000-12-09', '01942446088', 'aiman1'),
(17, 'Dr. Rahat Amin Chowdhury', '1', '6.00 - 6.30 PM', '2024-02-29', 'admin admin', 'admin', 'admin', 'admin'),
(18, 'Dr. Rahat Amin Chowdhury', '1', '7.00 - 7.30 PM', '2024-02-22', 'admin admin', 'admin', 'admin', 'admin'),
(19, 'Dr. Muhammad Alam Sikder', '7', '6:00 - 6:30 pm\r\n', '2024-02-29', 'admin admin', 'admin', 'admin', 'admin'),
(20, 'Dr. Muhammad Alam Sikder', '7', '\r\n5:00 - 5:30 pm\r\n\r\n', '2024-02-29', 'admin admin', '', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `doctorlist`
--

CREATE TABLE `doctorlist` (
  `id` int(255) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `hospital/chamber` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `time1` varchar(255) NOT NULL,
  `time2` varchar(255) NOT NULL,
  `time3` varchar(255) NOT NULL,
  `time4` varchar(255) NOT NULL,
  `doctorPhoto` varchar(255) NOT NULL DEFAULT '../DoctorPhotos/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctorlist`
--

INSERT INTO `doctorlist` (`id`, `doctorName`, `department`, `hospital/chamber`, `qualification`, `phoneNumber`, `time1`, `time2`, `time3`, `time4`, `doctorPhoto`) VALUES
(1, 'Dr. Rahat Amin Chowdhury', 'Neurology', 'Al-Haramain Hospital, Sylhet', 'MBBS, MD (Neurology)', '+8801931225555', '6.00 - 6.30 PM', '6.30 - 7.00 PM', '7.00 - 7.30 PM', '7.30 - 8.00 PM', '../DoctorPhotos/rahatAmin.jpg'),
(2, 'Prof. Dr. N. K. Sinha', 'ENT ', 'Sylhet MAG Osmani Medical College & Hospital', 'MBBS, FCPS (ENT), MS (ENT), DLO', '+8801766662727', '4:00 - 4:30 pm', '4:30 - 5:00 pm', '5:00 -5:30 pm', '5:30 - 6:00 pm', '../DoctorPhotos/ProfDrNKSinha.jpg'),
(3, 'Prof. Dr. Md. Manajjir Ali', 'Pediatrics', 'Sylhet MAG Osmani Medical College & Hospital\nPopular Medical Center, Sylhet\nMount Adora Hospital, Akhalia, Sylhet', 'MBBS, FCPS (CHILD), DMEd (UK), FRCP (EDIN, UK)\r\nNewborn & Child Diseases Specialist\r\nFormer Professor, Pediatrics', '+8801715084078\r\n+8801317310895', '6:00 - 6:30 pm', '6:30 - 7:00 pm', '7:00 - 7:30 pm', '7:30 - 8:00 pm', '../DoctorPhotos/ProfDrMdMonojjirAli.jpg'),
(4, 'Dr. Shishir Basak', 'Cardiology', 'Sylhet MAG Osmani Medical College & Hospital\r\nMount Adora Hospital, Akhalia, Sylhet', 'MBBS (DMC), MCPS (Medicine), D-CARD (DU), MD (Cardiology), MRCP (UK)', '+8801726450182', '4:30 - 5:00 pm', '5:00 - 5:30 pm', '5:30 - 6:00 pm', '6:00 - 6:30 pm', '../DoctorPhotos/ShishirBasak.jpg'),
(5, 'Prof. Dr. Md. Shahnewaz Chowdhury\r\n', 'Anesthesiology', 'Sylhet Womens Medical College & Hospital\r\nPopular Medical Center, Sylhet', 'MBBS, DA (DU), MCPS (Anesthesiology)', '+8801842995065', '5:00-5:30 pm', '5:30-6:00 pm', '6:30-7:00 pm', '7:00-7:30 pm', '../DoctorPhotos/Prof. Dr. Md. Shahnewaz Chowdhury.jpg'),
(6, 'Dr. Md. Abdus Samad Azad', 'Cardiac Surgery', 'Sylhet MAG Osmani Medical College & Hospital\r\nStadium Market, Sylhet\r\nAddress: 38, Stadium Market, Rikabi Bazar, Sylhet - 3100', 'MBBS, FCPS (Surgery), MS (Cardiovascular & Thoracic Surgery)\r\nCardiovascular & Thoracic Surgeon\r\nAssistant Professor, Cardiac Surgery', '+8801711905035', '6:00 - 6:30 pm', '6:30 - 7:00 pm\r\n', '7:00 - 7:30 pm\r\n', '7:30 - 8:00 pm', '../DoctorPhotos/Dr. Md. Abdus Samad Azad.jpg'),
(7, 'Dr. Muhammad Alam Sikder', 'Dental', 'Sylhet MAG Osmani Medical College & Hospital\r\nTrust Medical Services, Sylhet', 'BDS, DDS, BCS\r\nFellow in Oral Implantology (ICOI), Germany\r\nAssistant Professor & Head, Dental Unit', '+8801712604174', '4:00 - 4:30 pm\r\n', '\r\n4:30 - 5:00 pm\r\n\r\n', '\r\n5:00 - 5:30 pm\r\n\r\n', '6:00 - 6:30 pm\r\n', '../DoctorPhotos/Dr. Muhammad Alam Sikder.jpg'),
(8, 'Dr. A.T.M. Jafor Ahmed', 'Diabetes ', 'Sylhet Diabetic Hospital, Sylhet\r\nComfort Medical Services, Sylhet', 'Dr. A.T.M. Jafor Ahmed\r\nMBBS, CCD (Diabetology), Higher Training (BIRDEM)\r\nDiabetes Specialist\r\nSenior Diabetologist, Endocrinology & Metabolism', '+8801730585050', '5:00 - 5:30 pm\r\n', '\r\n6:00 - 6:30 pm\r\n', '\r\n6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm', '../DoctorPhotos/Dr. A.T.M. Jafor Ahmed.jpg\r\n'),
(9, 'Dr. Nizam Jamil Hussain', 'Eye', 'North East Medical College & Hospital\r\nSylhet Eye Hospital & Laser Center', 'BBS, MS (EYE)\r\nEye Specialist & Phaco Surgeon\r\nRegistrar, Ophthalmology', '8801793673094', '5:00 - 5:30 pm\r\n', '\r\n6:00 - 6:30 pm\r\n', '\r\n6:30 - 7:00 pm\r\n\r\n', '\r\n7:00 - 7:30 pm\r\n', '../DoctorPhotos/Dr. Nizam Jamil Hussain.jpg'),
(10, 'Prof. Dr. Madhusudan Saha', 'Gastroenterology', 'North East Medical College & Hospital', 'MBBS, MD (Gastroenterology)\r\nGastroenterology, Liver & Pancreatic Diseases Specialist\r\nProfessor, Gastroenterology', '+8801715084078', '5:00 - 5:30 pm\r\n', '\r\n6:00 - 6:30 pm\r\n', '\r\n6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm', '../DoctorPhotos/Prof. Dr. Madhusudan Saha.jpg\r\n'),
(11, 'Dr. Monoranjan Sarkar', 'General & Laparoscopic Surgery', 'Jalalabad Ragib-Rabeya Medical College & Hospital\r\nSylhet Imperial Hospital Ltd', 'MBBS (Dhaka), MS (Surgery)\r\nGeneral, Laparoscopic & Colorectal (Piles) Surgery Specialist\r\nAssociate Professor, Surgery', '+8801325-064701', '6:00 - 6:30 pm\r\n', '\r\n6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm\r\n', '\r\n7:30 - 8:00 pm', '../DoctorPhotos/Dr. Monoranjan Sarkar.jpg'),
(12, 'Prof. Dr. Afroza Begum Shila', 'Gynecology', 'Genome Medical College & Hospital\r\nStadium Market, Sylhet\r\nAddress: Lab De Novo, Scout Bhabon, Stadium Market, Sylhet', 'MBBS, FCPS (OBGYN)\r\nGynecology, Obstetrics Specialist & Surgeon\r\nChairman, Gynecology & Obstetrics', ' +8801711359680', '6:30 - 7:00 pm\r\n', '7:00 - 7:30 pm\r\n', '\r\n7:30 - 8:00 pm\r\n', '\r\n8:30 - 9:00 pm', '../DoctorPhotos/Prof. Dr. Afroza Begum Shila.jpg\r\n'),
(13, 'Dr. Md. Shamsur Rahman', 'Pediatric Surgery', 'Sylhet MAG Osmani Medical College & Hospital\r\nPopular Medical Center, Sylhet', 'MBBS, MS (Pediatric Surgery)\r\nHigher Training in Plastic Surgery & Pediatric Laparoscopic Surgery\r\nPediatric & Plastic Surgery Specialist\r\nAssociate Professor, Pediatric Surgery', '+8801723166595', '5:00 - 5:30 pm\r\n', '\r\n6:00 - 6:30 pm\r\n', '\r\n6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm', '../DoctorPhotos/Dr. Md. Shamsur Rahman.jpg\r\n'),
(14, 'Dr. Mohammad Nazmul Islam', 'Hematology', 'Sylhet MAG Osmani Medical College & Hospital\r\nMount Adora Hospital, Akhalia, Sylhet', 'MBBS, BCS (Health), MD (Hematology), BSMMU\r\nBlood Diseases & Cancer Specialist\r\nConsultant, Hematology', '+8801309336030', '4:30 - 5:00 pm\r\n', '\r\n5:00 - 5:30 pm\r\n', '\r\n6:00 - 6:30 pm\r\n', '\r\n6:30 - 7:00 pm', '../DoctorPhotos/Dr. Mohammad Nazmul Islam.jpg\r\n'),
(15, 'Prof. Dr. A.K.M. Daud', 'Colorectal Surgery', 'Jalalabad Ragib-Rabeya Medical College & Hospital\r\nColorectal Center, Sylhet\r\nAddress: Karim Manzil, Manikpir Road, Nayasarak, Sylhet', 'MBBS, FRCS (Edin), FRCS (Glasg), FRCS (Eng), FRCSI\r\nColorectal (Piles, Fistula, Fisher & Rectal Cancer) Specialist Surgeon\r\nProfessor & Head, Surgery', '+8801747514911', '6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm\r\n', '\r\n7:30 - 8:00 pm\r\n', '\r\n8:30 - 9:00 pm', '../DoctorPhotos/Prof. Dr. A.K.M. Daud.jpg\r\n'),
(16, 'Dr. Syed Mosharraf Hussain', 'Orthopedics', 'Jalalabad Ragib-Rabeya Medical College & Hospital\r\nNoorjahan Hospital, Sylhet\r\nAddress: Waves 1, Ritz Tower, Dargah Gate, Sylhet - 3100', 'MBBS, MS (Ortho Surgery), Member - AO Trauma (Switzerland), Fellow (India)\r\nOrthopedics Specialist & Trauma Surgeon\r\nAssistant Professor, Orthopedics', '+8801979005522', '4:00 - 4:30 pm\r\n', '\r\n4:30 - 5:00 pm\r\n', '\r\n5:00 - 5:30 pm\r\n', '\r\n5:30 - 6:00 pm', '../DoctorPhotos/Dr. Syed Mosharraf Hussain.jpg'),
(17, 'Prof. Dr. Md. Rezaul Karim', 'Psychiatry', 'Sylhet MAG Osmani Medical College & Hospital\r\nR. R. Medical Hospital\r\nAddress: Kazi Ilias Road, Zindabazar, Sylhet', 'MBBS, FCPS (Psychiatry), MS (USA)\r\nPsychiatry (Brain, Mental Diseases, Drug Addiction) Specialist\r\nFormer Professor & Head, Psychiatry', '+8801765883782', '6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm\r\n', '\r\n7:30 - 8:00 pm\r\n', '\r\n8:30 - 9:00 pm', '../DoctorPhotos/Prof. Dr. Md. Rezaul Karim.jpg\r\n'),
(18, 'Dr. Parimal Kumar Sen', 'Dermatology ', 'Sylhet MAG Osmani Medical College & Hospital\r\nPopular Medical Center, Sylhet', 'MBBS (DMC), BCS (Health), DDV, FCPS (Skin & Sex)\r\nSkin, Allergy & Sex Specialist\r\nConsultant, Dermatology & Venereology', ' +8801752234520', '\r\n6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm\r\n', '\r\n7:30 - 8:00 pm\r\n', '\r\n8:30 - 9:00 pm', '../DoctorPhotos/Dr. Parimal Kumar Sen.jpg'),
(19, 'Prof. Dr. Md. Siddiqur Rahman', 'Urology', 'Sylhet Womens Medical College & Hospital\r\nAl Haramain Hospital, Sylhet', 'MBBS, DA (BSMMU), FCPS (Surgery), MS (Urology)\r\nUrology (Kidneys, Bladder, Ureters, Prostate) Specialist & Laparoscopic Surgeon\r\nProfessor & Head, Urology', ' +8801931225555\r\n', '4:00 - 4:30 pm\r\n\r\n', '4:30 - 5:00 pm\r\n\r\n', '\r\n5:00 - 5:30 pm\r\n\r\n', '\r\n5:30 - 6:00 pm\r\n', '../DoctorPhotos/Prof. Dr. Md. Siddiqur Rahman.jpg\r\n'),
(20, 'Dr. Md. Abdul Mannan', 'Plastic Surgery', 'Sylhet MAG Osmani Medical College & Hospital\r\nMount Adora Hospital, Akhalia, Sylhet', 'Dr. Md. Abdul Mannan\r\nMBBS, MCPS (Surgery), FCPS (Surgery), FCPS (Plastic Surgery)\r\nBurn, Trauma, Plastic, Cosmetic, Hand Surgery, Micro Surgery & General Surgery Specialist\r\nAssistant Professor & Head, Plastic Surgery', '+8801737382648', '5:00 - 5:30 pm\r\n', '\r\n5:30 - 6:00 pm\r\n', '\r\n6:00 - 6:30 pm\r\n', '\r\n6:30 - 7:00 pm', '../DoctorPhotos/Dr. Md. Abdul Mannan.jpg'),
(21, 'Dr. Md. Rezaul Karim', 'Rheumatology ', 'Sylhet MAG Osmani Medical College & Hospital', 'MBBS, BCS (Health), MD (Rheumatology)\r\nRheumatology (Pain, Arthritis, Joint, Soft Tissue Problems) Specialist\r\nConsultant, Rheumatology', '+8801773378953', '6:00 - 6:30 pm\r\n', '\r\n6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm\r\n', '\r\n7:30 - 8:00 pm', '../DoctorPhotos/Dr. Md. Rezaul Karim.jpg\r\n'),
(22, 'Prof. Dr. Khawja Mohammad Moiz', 'Physical Medicine', 'Jalalabad Ragib-Rabeya Medical College & Hospital\r\nTrust Medical Services, Sylhet', 'MBBS, FCPS (Physical Medicine)\r\nPhysical Medicine (Pain, Paralysis, Sports Injury) & Rehabilitation Specialist\r\nProfessor & Head, Physical Medicine & Rehabilitation', '+8801732182679', '\r\n8:30 - 9:00 pm', '\r\n7:00 - 7:30 pm\r\n', '\r\n7:30 - 8:00 pm\r\n', '\r\n8:30 - 9:00 pm', '../DoctorPhotos/Prof. Dr. Khawja Mohammad Moiz.jpg\r\n'),
(23, 'Dr. Khandaker Abu Talha', 'Neurosurgery', 'Sylhet Womens Medical College & Hospital\r\nAl Haramain Hospital, Sylhet\r\nMount Adora Hospital, Nayasarak, Sylhet', 'MBBS, MCPS (Surgery), MPH, MS (Neurosurgery), DCR (Canada), Fellowship (Japan)\r\nNeurosurgery (Brain, Nerve, Spine, Stroke Surgery) Specialist\r\nAssociate Professor & Head, Neurosurgery', ' +8801575127225', '6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm\r\n', '\r\n7:30 - 8:00 pm\r\n', '\r\n8:30 - 9:00 pm', '../DoctorPhotos/Dr. Khandaker Abu Talha.jpg'),
(24, 'Prof. Dr. Md. Ismail Patwary', 'Medicine', 'Sylhet Womens Medical College & Hospital\r\nPopular Medical Center & Hospital, Sylhet', 'MBBS, FCPS (Medicine), MD (Medicine), FACP (USA), FRCP (Glasgow), FRCP (Edin)\r\nMedicine Specialist\r\nPrincipal, Professor & Head, Medicine', '+8801773035138', '6:00 - 6:30 pm\r\n', '6:30 - 7:00 pm\r\n', '\r\n7:00 - 7:30 pm\r\n', '\r\n7:30 - 8:00 pm', '../DoctorPhotos/Prof. Dr. Md. Ismail Patwary.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donor_list`
--

CREATE TABLE `donor_list` (
  `id` int(255) NOT NULL,
  `Name` varchar(25) DEFAULT NULL,
  `BloodGroup` varchar(255) DEFAULT NULL,
  `Phone number` varchar(15) DEFAULT NULL,
  `Address` varchar(48) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donor_list`
--

INSERT INTO `donor_list` (`id`, `Name`, `BloodGroup`, `Phone number`, `Address`, `status`) VALUES
(1, 'Mahbub Khandakar', 'B+', '01872210075', 'PathanTula , Sylhet', 'Available'),
(2, 'md abdus salam shanto', 'O+', '01715930563', '27/1 Chowkidekhi, sylhet , Bangladesh', 'Available'),
(3, 'Syed Tanzim Ahmed', 'A-', '01745583607', NULL, 'Available'),
(4, 'Tasnim Tabassum Fahrin', 'O+', '01739735343', 'Housing state Len 2', 'Available'),
(5, 'Arifun Nobi Chowdhury', 'O+', '01612314455', 'Sagor -04 Sagor digir par', 'Available'),
(6, 'Md Ashraf Ahmed', 'O+', '01719569951', 'Shajalal Uposhahar. Road:03, block E house no:67', 'Available'),
(7, 'Radwan Rahman', 'O+', '01612082965', 'Prottoy-91/B,Doptoripara,Raynagor,Sylhet', 'Available'),
(8, 'Mahira mahjabin nowme', 'O+', '01704047150', '27/3 Jalalabad,sylhet', 'Available'),
(9, 'SB JOYNUR', 'O+', '01842484854', 'Sylhet Sadar', 'Available'),
(10, 'Rajon Talukdar', 'B+', '+8801641-215140', 'Chowkidekhi, Sylhet', 'Available'),
(11, 'Israth Chowdhury', 'O+', '01775396511', 'Dariapara,Sylhet', 'Available'),
(12, 'Jahidul Alam Khan Shaon', 'O+', '01611485253', 'Bondor Bazar, Sylhet.', 'Available'),
(13, 'Nushrath Momita Hussain', 'B+', '01741444961', 'Baluchor , Sylhet', 'Available'),
(14, 'Tushar Sinha', 'A+', '01789450891', 'Noyabazar, Baluchor', 'Available'),
(15, 'Fatheha ahmed.', 'B+', '01784424597', 'shahporan.', 'Available'),
(16, 'Meraj Tahmed', 'B+', '01641213930', 'Shibgonj,sylhet', 'Unavailable'),
(17, 'Abdur Rahman Rifat', 'A+', '01872545145', NULL, 'Available'),
(18, 'Arup Saha', 'O+', '01703889336', 'Shibganj, sylhet', 'Available'),
(19, 'Jawda Anan', 'B+', '01716965371', 'Kharadipara anando-38 korimullah house sylhet', 'Available'),
(20, 'Abhishek Chowdhury', 'A+', '01842376477', '84/A Evergreen Roynogor,Bangladesh', 'Available'),
(21, 'Argho Bhowmick', 'AB+', '01843341056', 'Kalibari,Modina Market, sylhet.', 'Available'),
(22, 'Himel kor', 'B+', '01736218074', 'Rikaibibazar,sylhet\n\n', 'Available'),
(23, 'Eyamin Ahmed Eyahan', 'B+', '+8801722131973', 'Sylhet,Nayashork', 'Available'),
(24, 'Nazmul Hasan mahady', 'AB+', '+8801875228972', 'Bateshwar,jalalabad,Sylhet', 'Available'),
(25, 'Jahed Hasan', 'A+', '01772762638', 'Focus 264 north baluchor, al islah', 'Available'),
(26, 'Joynal Abedin Quraishi', 'B+', '01772280698', 'Shemoli, Mejortila', 'Available'),
(27, 'Robin Chowdhury', 'B+', '01747275224', 'Bangladesh', 'Available'),
(28, 'ABDUN NUR', 'B+', '01903049583', 'majortila\nNurpur', 'Available'),
(29, 'Samapti', 'O+', '01727236608', 'Akhaliya sylhet', 'Available'),
(30, 'Borna Bhowmik', 'B+', '01765422841', 'Subidbazar, Sylhet', 'Available'),
(31, 'Puspo Gondha Paul', 'O+', '01624285553', 'Bahar das para, Khadim nagar, Sylhet', 'Available'),
(32, 'Amit Chandra Joy', 'B+', '01640464080', 'Sylhet', 'Available'),
(33, 'Sahnaj Sharmin Surovi', 'O+', '01763456204', 'Railway staff quater 31T/A sylhet', 'Available'),
(34, 'Turjya Bhattacharjee', 'AB+', '01761522881', 'Modina market', 'Available'),
(35, 'Muhiminul Islam Chowdhury', 'O+', '01726332440', 'Subidbazar,\nSylhet', 'Available'),
(36, 'Lingkon Paul', 'A+', NULL, NULL, 'Available'),
(37, 'Haffatun Jannat Shifa', 'A+', '01625562448', 'Chalibandar', 'Available'),
(38, 'Pallab Bagchi', 'O+', '01586085208', 'Tilaghor', 'Available'),
(39, 'Azizul Haque', 'A-', '01717297784', 'Mirboxtula', 'Available'),
(40, 'Md. Yasin Ahmed Mahi', 'B+', '+8801784305336', 'South Surma, Sylhet, Bangladesh.', 'Available'),
(41, 'Md Sumon Hossain Khan', 'AB+', '01646819343', 'House no. 1, Road no. 1, Arambag, Sylhet', 'Available'),
(42, 'Niyaz Ahmad Khan', 'A+', '01787617564', 'North Baluchor, Sylhet.', 'Available'),
(43, 'Md Abdur Rahman Salman', 'B+', '01999007169', 'Moglabazar, South Surma, Sylhet', 'Available'),
(44, 'KORON CHOWDHURY', 'O+', '01753916614', 'Korerpara, Pathantula, Sylhet.', 'Available'),
(45, 'Azuad Islam Ruhan', 'A+', '01647637157', 'Pirer bazar, Sadar,Sylhet.', 'Available'),
(46, 'Moumita Roy', 'O+', '01706367397', 'Shubanighat, Sylhet', 'Available'),
(47, 'Nazmul islam', 'O+', '01858299766', 'Biswanath Sylhet', 'Available'),
(48, 'Imran', 'O+', '01725113449', 'Boteshwar Bazar,Sylhet', 'Available'),
(49, 'Prohor Paul', 'B+', '01757028666', 'Machudighir par, Mirzajangal Road', 'Available'),
(50, 'Avijit Deb Turjo', 'O+', '01756923736', 'Bagbari, Sylhet', 'Available'),
(51, 'Tasnim Tisha', 'O+', '01816510391', 'Shahporan', 'Available'),
(52, 'Fahim Sawkat', 'AB+', '01725938558', 'Baluchar, sylhet', 'Available'),
(53, 'Sumaiya Islam Sumi', 'B+', '01328342309', 'Lamabazar, Sylhet', 'Available'),
(54, 'Nur a jannat shuchi', 'A+', '01708391808', 'Sylhet Cantonment,Sylhet', 'Available'),
(55, 'Enamul Haque', 'A+', '01704483069', 'Mirabazar,Sylhet', 'Available'),
(56, 'Jarin Akther Salvi', 'O+', '01540-084774', 'Tilagor', 'Available'),
(57, 'Mahera Moshika Chowdhury', 'O+', '01832989442', 'Fulbari,golapgonj,sylhet', 'Available'),
(58, 'Momtaj Rahman Mim', 'B+', '01837168460', 'Modhusohid medical road', 'Available'),
(59, 'Marufa Akter Humayra', 'B+', '1319388733', 'Patanthula', 'Available'),
(60, 'Arpi Akter', 'B+', '01307424622', 'Botessor sylhet', 'Available'),
(61, 'Adnan', 'O+', '01724926802', 'Tilagor Mirapara', 'Available'),
(62, 'Tashfia Hussain', 'O+', '01855770941', 'Shabok-86, Raynogor, Dorjipara, Sylhet.', 'Available'),
(63, 'Shotarupa deb nath shruti', 'O+', '01304760841', '16no.Rongdhonu,chowkideki, Sylhet', 'Available'),
(64, 'Aiman Azad Khan', 'B+', '01942446088', 'Housing State, Amberkhana', 'Available'),
(66, 'Abdullah Al Masrur', 'AB+', '01621030725', 'Sylhet', 'Available'),
(67, 'Md Jafrul Haque Rafi', 'A+', '01797224414', 'Sylhet', 'Available'),
(68, 'Devi Chowdhury', 'O+', '01704546954', 'Mejorthila', 'Available'),
(69, 'Silvi Basith', 'AB+', '01712523868', 'Shubidbazar', 'Available'),
(70, 'Shariar Abedin Jahin', 'O+', '01765794524', 'Shaplabhag, Tilaghor', 'Available'),
(97, 'Abdullah Masrur', 'AB+', '01621030698', 'Sylhet, Bnagladesh', 'Unavailable'),
(101, 'Talha alom chowdhury', 'B+', '01676214673', 'Shaplabag tilagor', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `medcorner`
--

CREATE TABLE `medcorner` (
  `id` int(255) NOT NULL,
  `medname` varchar(255) NOT NULL,
  `medgroup` varchar(255) NOT NULL,
  `medcategory` varchar(255) NOT NULL,
  `medcompany` varchar(255) NOT NULL,
  `medprice` varchar(255) NOT NULL,
  `medpic` varchar(255) NOT NULL DEFAULT '../Medphotos/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medcorner`
--

INSERT INTO `medcorner` (`id`, `medname`, `medgroup`, `medcategory`, `medcompany`, `medprice`, `medpic`) VALUES
(1, 'Napa', 'Paracetamol', 'OTC Medicine', 'Beximco Pharmaceuticals Ltd.', '10', '../Medphotos/napa.jpg'),
(2, 'Ceevit', 'vitamin c', 'OTC Medicine', 'Square Pharmaceuticals Ltd.', '10', '../Medphotos/ceevit.jpg\r\n'),
(3, 'U & ME Long Love Condoms', 'Condom\r\n', 'Sexual Wellness', 'Social Marketing Company', '50', '../Medphotos/u&me.png'),
(4, 'Cevion 1000 mg', 'vitamin c', 'OTC Medicine', 'Healthcare Pharmaceuticals Ltd.', '72', '../MedPhotos/cevion.png'),
(5, 'Freedom Heavy Flow Wings16 Pads', 'Sanitary Napkin', 'Women choice', 'ACI Limited', '190', '../MedPhotos/Freedom Heavy Flow Wings16 Pads.png'),
(6, 'NovoFine Needle3 ml', 'Pen Needle', 'Diabetic Care', 'Mundipharma (BD) Pvt. Ltd.', '12.50', '../MedPhotos/NovoFine Needle3 ml.png'),
(7, 'NeoCare Baby Wipes120', 'Wipes', 'Baby Care', 'Incepta Pharmaceuticals Ltd.', '223.25', '../MedPhotos/NeoCare Baby Wipes120.png'),
(8, 'Orostar Plus250 ml', 'Mouthwash', 'Dental Care', 'Square Pharmaceuticals Ltd.', '135.00', '../MedPhotos/Orostar Plus250 ml.png'),
(9, 'Hexisol250 ml', 'Hand Rub', 'Personal Care', 'ACI Limited', '126.00', '../MedPhotos/Hexisol250 ml.png'),
(10, 'ThermometerDigital', 'Digital', 'Devices', 'Mundipharma (BD) Pvt. Ltd.', '185.50', '../MedPhotos/ThermometerDigital.png'),
(11, 'Sergel 20 mg', 'Capsule', 'Prescription Medicine', 'Healthcare Pharmacuticals Ltd.', '6.30', '../MedPhotos/Sergel 20 mg.png'),
(12, 'Fexo', 'Tablet', 'Prescription Medicine', 'Square Pharmaceuticals Ltd.', '12', '../MedPhotos/Fexo.png');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `orderID` int(255) NOT NULL,
  `orderBuyer` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`orderID`, `orderBuyer`, `items`) VALUES
(1, 'admin', ' [{\"medName\":\"Cevion\",\"medPrice\":72,\"quantity\":1},{\"medName\":\"U\",\"medPrice\":50,\"quantity\":1}]'),
(3, 'admin', ' [{\"medName\":\"Cevion\",\"medPrice\":72,\"quantity\":1},{\"medName\":\"U\",\"medPrice\":50,\"quantity\":1}]'),
(4, 'admin', ' [{\"medName\":\"Cevion\",\"medPrice\":72,\"quantity\":1},{\"medName\":\"U\",\"medPrice\":50,\"quantity\":1}]'),
(5, 'admin', ' [{\"medName\":\"Napa\",\"medPrice\":10,\"quantity\":3}]'),
(6, 'abd123', ' [{\"medName\":\"Napa\",\"medPrice\":10,\"quantity\":3}]'),
(7, 'abd123', ' [{\"medName\":\"Napa\",\"medPrice\":10,\"quantity\":3}]'),
(8, 'abd123', ' [{\"medName\":\"Napa\",\"medPrice\":10,\"quantity\":3}]'),
(9, 'abd123', ' [{\"medName\":\"Ceevit\",\"medPrice\":10,\"quantity\":6}]'),
(10, 'admin', ' [{\"medName\":\"U\",\"medPrice\":50,\"quantity\":2}]');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `pNumber` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `bloodGroup` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `verifytoken` varchar(255) NOT NULL,
  `verifystatus` int(255) NOT NULL DEFAULT 0 COMMENT '0 = No\r\n\r\n1 = Yes',
  `profilepic` varchar(255) NOT NULL DEFAULT '../ProfilePictures/Default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstName`, `lastName`, `userName`, `email`, `pass`, `pNumber`, `dob`, `weight`, `height`, `sex`, `bloodGroup`, `address`, `city`, `verifytoken`, `verifystatus`, `profilepic`) VALUES
(7, 'Aiman', 'Azad Khan', 'aak6969', 'aak@gmail.com', '#12345Aiman', '01712345678', '2023-07-11', '69kg', '420', 'Male', 'A-', 'Syl,bd', 'Sylhet', 'bd5eac741fe1302ad0d7aaf387d5e3cc', 0, '../ProfilePictures/Default.jpg'),
(8, 'Abdullah', 'Masrur', 'abd123', 'abdullahalmasrur8@gmail.com', '12345!Abd', '01621030698', '2001-05-02', '51kg', '42', 'Male', 'AB+', 'Sylhet, Bnagladesh', 'Sylhet', '4f0e9223a606f11aeb0ad0a5fd46b401', 1, '../ProfilePictures/Default.jpg'),
(9, 'Md. Jafrul Haque', 'Rafi', 'rafibai', 'cse_2012020259@lus.ac.bd', 'Rafi!1', '01797224414', '1999-09-10', '63kg', '6', 'Male', 'A+', 'Uposhahar', 'Sylhet', '679e4094c473697ac56265c15286c3a7', 0, '../ProfilePictures/Default.jpg'),
(10, 'Md. Jafrul', 'Rafi', 'rafii', 'jafrulhaque99@gmail.com', 'Rafi!1', '01797224414', '1999-09-10', '63kg', '5ft3in', 'Male', 'A+', 'Uposhahar', 'Sylhet', 'e54765bcae069a6a2f71689644223118', 0, '../ProfilePictures/Default.jpg'),
(14, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin', '', '', '', '', 'admin', 'admin', 'admin', 'Sylhet', 'admin', 1, '../ProfilePictures/Default.jpg'),
(16, 'Aiman Azad', 'Khan', 'aiman123', 'aiman69khan@gmail.com', 'Aiman@1', '01942446088', '2024-07-24', '6kg', '6ft9in', 'Male', 'B+', 'Housing State, Amberkhana', 'Rajshahi', '3fb957a2bfd8c18c816901a90b8cc53d', 1, '../ProfilePictures/IMG-2954.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorlist`
--
ALTER TABLE `doctorlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_list`
--
ALTER TABLE `donor_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medcorner`
--
ALTER TABLE `medcorner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctorlist`
--
ALTER TABLE `doctorlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `donor_list`
--
ALTER TABLE `donor_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `medcorner`
--
ALTER TABLE `medcorner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `orderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
