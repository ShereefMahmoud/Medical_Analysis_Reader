-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 10:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(50) NOT NULL,
  `privilage` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `email`, `password`, `address`, `phone`, `privilage`) VALUES
(1, 'Shereef Mahmoud', 'shereefmahmoud3@gmail.com', '12345', 'shenbab,giza,badrashin', 1015514406, 'all'),
(5, 'Ahmed Ali mahmoud', 'ahmedali@gmail.com', '123456', 'Badrashin', 2147483647, 'admin'),
(6, 'mustafa magdy mohamed', 'mustafamagdy@gmail.com', '123456', 'giza,badrashin', 2147483, 'analysis');

-- --------------------------------------------------------

--
-- Table structure for table `analysis_imgs`
--

CREATE TABLE `analysis_imgs` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `UserId` int(11) NOT NULL,
  `analysisname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `analysis_info`
--

CREATE TABLE `analysis_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `total_analysis` int(100) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analysis_info`
--

INSERT INTO `analysis_info` (`id`, `name`, `details`, `total_analysis`, `url`) VALUES
(1, 'Arterial blood gas test', 'An arterial blood gas (ABG) test measures the amounts of arterial gases, such as oxygen and carbon dioxide. An ABG test requires that a small volume of blood be drawn from the radial artery with a syringe and a thin needle, sometimes the femoral ar', 5, 'https://en.wikipedia.org/wiki/Arterial_blood_gas_test'),
(2, 'Complete blood count', 'A complete blood count (CBC), also known as a full blood count (FBC), is a set of medical laboratory tests that provide information about the cells in a person&#39;s blood. The CBC indicates the counts of white blood cells, red blood cells and platelets,', 15, 'https://en.wikipedia.org/wiki/Complete_blood_count'),
(3, 'Comprehensive metabolic panel', 'The comprehensive metabolic panel, or chemical screen, (CMP; CPT code 80053) is a panel of 14 blood tests which serves as an initial broad medical screening tool. The CMP provides a rough check of kidney function, liver function, diabetic and parathyroid', 2, 'https://en.wikipedia.org/wiki/Comprehensive_metabolic_panel'),
(4, 'Coagulation testing', 'Blood clotting tests are the tests used for diagnostics of the hemostasis system. Coagulometer is the medical laboratory analyzer used for testing of the hemostasis system. Modern coagulometers realize different methods of activation and observation of de', 0, 'https://en.wikipedia.org/wiki/Coagulation_testing'),
(5, 'C-reactive protein', 'C-reactive protein (CRP) is an annular (ring-shaped) pentameric protein found in blood plasma, whose circulating concentrations rise in response to inflammation. It is an acute-phase protein of hepatic origin that increases following interleukin-6 secreti', 3, 'https://en.wikipedia.org/wiki/C-reactive_protein'),
(6, 'Erythrocyte sedimentation rate', 'The erythrocyte sedimentation rate (ESR or sed rate) is the rate at which red blood cells in anticoagulated whole blood descend in a standardized tube over a period of one hour. It is a common hematology test, and is a non-specific measure of inflammation', 2, 'https://en.wikipedia.org/wiki/Erythrocyte_sedimentation_rate'),
(7, 'FibroTest', 'FibroTest, known as FibroSure in the US, is a biomarker test that uses the results of six blood serum tests to generate a score that is correlated with the degree of liver damage in people with a variety of liver diseases. FibroTest has the same prognosti', 8, 'https://en.wikipedia.org/wiki/FibroTest'),
(8, 'Urea breath test', 'The urea breath test is a rapid diagnostic procedure used to identify infections by Helicobacter pylori, a spiral bacterium implicated in gastritis, gastric ulcer, and peptic ulcer disease. It is based upon the ability of H. pylori to convert urea to ammo', 9, 'https://en.wikipedia.org/wiki/Urea_breath_test'),
(9, 'Clinical urine tests', 'Clinical urine tests are examinations of the physical and chemical properties of urine and its microscopic appearance to aid in medical diagnosis.', 3, 'https://en.wikipedia.org/wiki/Clinical_urine_tests'),
(10, 'Genetic testing', 'This article is about genetic tests for disease and ancestry or biological relationships. For use in genealogy and archeology, see genealogical DNA test. For use in forensics, see DNA profiling.', 12, 'https://www.cdc.gov/genomics/gtesting/genetic_testing.htm'),
(11, 'Blood culture', 'A blood culture is a medical laboratory test used to detect bacteria or fungi in a person\'s blood. Under normal conditions, the blood does not contain microorganisms: their presence can indicate a bloodstream infection such as bacteremia or fungemia, whic', 7, 'https://en.wikipedia.org/wiki/Blood_culture'),
(12, 'ASO Test', 'The ASO test is done to determine whether the recent strep infection is group A streptococcus. Health practitioners may sometime suspect illness symptoms in patients as causes of some prior infections. This may prompt them to prescribe the ASO test. This ', 1, 'https://en.wikipedia.org/wiki/Anti-streptolysin_O'),
(13, 'COVID-19', 'Testing for COVID-19. That\'s what we\'re going to talk about in Science in 5 today. Hello, I\'m Vismita Gupta-Smith and this is WHO’s conversations in science. We are talking to Dr. Hanan Balkhy today, who’s going to explain testing for COVID-19. ', 10, 'https://en.wikipedia.org/wiki/COVID-19'),
(14, 'Drug Abuse Testing', 'Sometimes required prior to the start of a new job or insurance policy; randomly for workplace drug testing or athletic drug testing programs; as mandated when court-ordered; as indicated when ordered by a health practitioner to monitor a known or suspect', 18, 'https://en.wikipedia.org/wiki/Drug_test');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `DiseasesId` int(11) NOT NULL,
  `DiseasesName` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`DiseasesId`, `DiseasesName`, `created_date`) VALUES
(1, 'hypertensive disease', '2021-06-02 15:52:34'),
(2, 'diabetes', '2021-06-02 15:52:34'),
(3, 'COVID-19', '2021-06-02 15:52:34'),
(4, 'anemia', '2021-06-02 15:53:56'),
(5, 'bronchitis', '2021-06-02 15:57:49'),
(6, 'sickle cell anemia', '2021-06-02 15:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `FeedbackId` int(11) NOT NULL,
  `Feedback` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`FeedbackId`, `Feedback`, `subject`, `Datetime`, `UserId`) VALUES
(5, 'dawdadsacdsfdcsdcssdfcasdc', 'complai', '2021-04-10 11:13:28', 7),
(6, 'asasadscsdcasferg', 'thank', '2021-04-10 11:13:28', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(4, 'shereefmahmoud3@gmail.com', '6a8a4d1cdd93bca0', '$2y$10$soYATQhI0afgfnCmx.8TLeiXR.clAUJWV61BDZz7FzA9cLShisu.6', '1624578342'),
(5, 'shereefmahmou@gmail.com', '25fab3369cad2336', '$2y$10$c/4LJkD20j1H5E9Bi8gXducMmvrqKCtCnBDlPdVSWBvoeHmcBcoU.', '1624951605');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`name`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `SymptomsId` int(11) NOT NULL,
  `SymptomsName` varchar(255) NOT NULL,
  `diseases_Name` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`SymptomsId`, `SymptomsName`, `diseases_Name`, `created_date`) VALUES
(1, 'pain chest', 'hypertensive', '2021-06-02 16:06:44'),
(2, 'shortness of breath', 'hypertensive', '2021-06-02 16:06:44'),
(3, 'dizziness', 'hypertensive', '2021-06-02 16:06:44'),
(4, 'asthenia', 'hypertensive', '2021-06-02 16:06:44'),
(5, 'syncope', 'hypertensive', '2021-06-02 16:06:44'),
(6, 'vertigo', 'hypertensive', '2021-06-02 16:06:44'),
(7, 'sweating increased', 'hypertensive', '2021-06-02 16:06:44'),
(8, 'palpitation', 'hypertensive', '2021-06-02 16:06:44'),
(9, 'nausea', 'hypertensive', '2021-06-02 16:06:44'),
(10, 'angina pectoris', 'hypertensive', '2021-06-02 16:06:44'),
(11, 'pressure chest', 'diabetes', '2021-06-02 16:08:50'),
(12, 'polyuria', 'diabetes', '2021-06-02 16:08:50'),
(13, 'polydypsia', 'diabetes', '2021-06-02 16:08:50'),
(14, 'shortness of breath', 'diabetes', '2021-06-02 16:08:50'),
(15, 'orthopnea', 'diabetes', '2021-06-02 16:08:50'),
(16, 'rale', 'diabetes', '2021-06-01 16:08:50'),
(17, 'unresponsiveness', 'diabetes', '2021-06-01 16:08:50'),
(18, 'mental status changes', 'diabetes', '2021-06-02 16:06:44'),
(19, 'vomiting', 'diabetes', '2021-06-03 16:08:50'),
(20, 'labored breathing', 'diabetes', '2021-06-01 16:08:50'),
(21, 'Fever', 'COVID-19', '2021-06-02 16:06:44'),
(22, 'Cough', 'COVID-19', '2021-06-02 16:06:44'),
(23, 'Fatigue', 'COVID-19', '2021-06-02 16:06:44'),
(24, 'Muscle aches', 'COVID-19', '2021-06-02 16:06:44'),
(25, 'Headache', 'COVID-19', '2021-06-02 16:06:44'),
(26, 'loss of taste or smell', 'COVID-19', '2021-06-02 16:06:44'),
(27, 'Sore throat', 'COVID-19', '2021-06-02 16:06:44'),
(28, 'Congestion or runny nose', 'COVID-19', '2021-06-02 16:06:44'),
(29, 'Nausea or vomiting', 'COVID-19', '2021-06-02 16:06:44'),
(30, 'Diarrhea', 'COVID-19', '2021-06-02 16:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `Is_Active` bit(11) NOT NULL DEFAULT b'1',
  `num_of_scan` int(10) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `email`, `username`, `password`, `Is_Active`, `num_of_scan`, `last_login`, `image`) VALUES
(2, 'ahmed@gmail.com', 'ahmed', '1234', b'00000000001', 2, '2021-04-10 11:13:28', NULL),
(3, 'yousef@gmail.com', 'yousef', '1234', b'00000000001', 3, '2021-04-10 11:13:28', NULL),
(5, 'shereef@gmail.com', 'shereef', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', b'00000000001', 9, '2021-04-10 11:16:42', NULL),
(7, 'ahmed123@gmail.com', 'ahmed', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', b'00000000001', 1, '2021-04-28 23:42:13', NULL),
(8, 'hossam@gmail.com', 'hossam', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', b'00000000000', 6, '2021-04-29 16:18:25', NULL),
(9, 'hossam123@gmail.com', 'mohamed', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', b'00000000001', 2, '2021-04-29 17:25:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analysis_imgs`
--
ALTER TABLE `analysis_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analysis_imgs_ibfk_1` (`UserId`);

--
-- Indexes for table `analysis_info`
--
ALTER TABLE `analysis_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`DiseasesId`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`FeedbackId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`SymptomsId`),
  ADD KEY `diseasesID` (`diseases_Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserEmail` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `analysis_imgs`
--
ALTER TABLE `analysis_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `analysis_info`
--
ALTER TABLE `analysis_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `DiseasesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `FeedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `SymptomsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analysis_imgs`
--
ALTER TABLE `analysis_imgs`
  ADD CONSTRAINT `analysis_imgs_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
