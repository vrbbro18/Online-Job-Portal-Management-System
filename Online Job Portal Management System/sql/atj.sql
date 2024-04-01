-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atj`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `cid` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`cid`, `name`, `email`, `message`) VALUES
(4, NULL, '', ''),
(5, NULL, '', ''),
(6, NULL, '', ''),
(7, NULL, '', ''),
(8, NULL, '', ''),
(9, NULL, '', ''),
(10, NULL, '', ''),
(11, NULL, '', ''),
(12, NULL, '', ''),
(13, NULL, '', ''),
(14, NULL, '', ''),
(15, NULL, '', ''),
(16, NULL, 'ravindulak69@gmail.com', 'ce');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `highest_degree` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `working_experience` varchar(100) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `working_hours` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `contract` varchar(20) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `name`, `email`, `highest_degree`, `contact_number`, `working_experience`, `skills`, `working_hours`, `gender`, `contract`, `job_id`, `user_id`) VALUES
(1, 'devid smith', 'smithdevid@gmail.com', 'GCE A/L ', '+94778252567', '1 year', 'php', '36', 'male', 'Temporary', 1, 2),
(2, 'Sandya Kumari', 'ravindulak69@gmail.com', 'm', '0716596231', 'jn', 'nb', '8', 'male', 'Permanent', 3, 2),
(3, 'Sandya Kumari', 'ravindulak69@gmail.com', 'm', '0716596231', 'jn', 'nb', '8', 'male', 'Temporary', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_list`
--

CREATE TABLE `job_list` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_list`
--

INSERT INTO `job_list` (`id`, `job_title`, `salary`, `location`, `description`) VALUES
(2, 'Software Engineer', 0.00, 'Malabe', 'An IT professional who designs, develops and maintains computer software at a company.'),
(3, 'Database Manager', 50000.00, 'Colombo 07', 'Responsible for developing and maintaining an organizations\' systems that store and organize data for companies.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(45) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$F1GGJAZIo9Ac2n0yqVsmqutqsbkRhac5FX/gF6XZuMfprD.iYYyKe', 'admin'),
(2, 'user', 'user@gmail.com', '$2y$10$cW0zOKssZS2diB2zNfzHtOSRxMmYOo1zEib9OyIf8ea8bApH2asoS', 'admin'),
(4, 'asd', 'ravindulak69@gmail.com', '$2y$10$bTnez08Bwyhl1N6cs/Q7oOs9eX.mu6V2yloRx6dBh.sO30nXMy6r2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_list`
--
ALTER TABLE `job_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_list`
--
ALTER TABLE `job_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;







SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_seeker`
--

-- --------------------------------------------------------

--
-- Table structure for table `creat_a_gig`
--

CREATE TABLE `creat_a_gig` (
  `id` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(35) NOT NULL,
  `description` varchar(500) NOT NULL,
  `delivery_time` varchar(15) NOT NULL,
  `number_of_revisions` int(5) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `gig_extras` varchar(50) NOT NULL,
  `basic_price` varchar(10) NOT NULL,
  `standered_price` varchar(10) NOT NULL,
  `premium_price` varchar(10) NOT NULL,
  `is_deleted` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creat_a_gig`
--

INSERT INTO `creat_a_gig` (`id`, `title`, `category`, `description`, `delivery_time`, `number_of_revisions`, `tags`, `gig_extras`, `basic_price`, `standered_price`, `premium_price`, `is_deleted`) VALUES
(1, 'I will create any kind of graphic design with your idea in 24 hours', 'Graphic Design and Illustration', 'My SERVICES:\r\n\r\nLogo\r\nT-shirt design or modification\r\nFlyer/Brochure\r\nBanner/Poster\r\nDecals\r\nProduct Labels\r\nReal Estate Flyer/Brochure\r\nPrint/Digital Ads\r\nNFT design\r\nSocial media ads and Banner\r\nBusiness card\r\nAdobe Photoshop\r\nAdobe Illustrator\r\nAnd more', '4 Business Days', 3, 'graphic design, photoshop, illustrator, ', 'Illustrate photo of yours.', '$5.00', '$10.00', '$15.00', 0),
(2, 'I will translate english to dutch as a native speaker and experienced writer', 'Writing and Translation', 'Hi there, I\'m Paris and I\'m here to help with all your Dutch to English or English to Dutch language needs. As a native speaker of both languages, I\'ve got the skills and experience to deliver high-quality translations that will accurately convey your message.', '2 Business Days', 4, 'translate, dutch, english, native speaker', 'none', '$1.00', '$3.00', '$5.00', 0),
(4, 'I will do excel data entry and web research, admin support, emails', 'Data Entry and Admin', 'My Services:-\r\nAny typing & Copy/ Paste work on Excel/ Word Document\r\nWebsite/ Online research (Contact, Emails, Phone & URL) \r\nLead Generations Real Estate/property data\r\nManual/ Scanned PDF Image to WORD/EXCEL &PP\r\nPdf to Excel/Ms Word\r\nManually Pdf Editing \r\nManually Data Typing\r\nExcel Charts, Pivot Table, Vlookup, Indexing etc\r\nData Scrapping & Data mining   \r\nBusiness Cards Data Into Excel\r\nData Capturing from the Websites\r\nJPG,PNG, Scanned Pages To Excel/Word\r\nAll types of admin work', '2 Business Days', 2, 'typing, data entry, email, messages, website data entry', 'none', '$1.00', '$3.00', '$5.00', 0),
(5, 'I will build digital marketing strategy plan', 'Digital Marketing', 'We got you covered with:\r\n\r\nI. Marketing consultation.\r\nYou\'ll get answers to your marketing questions via Zoom or in a written format.\r\n\r\nII. Marketing Strategy\r\nIf you are not getting the results you want. Well be setting the direction of a product/service. Develop the strategy tailored to a specific goal.\r\n\r\nWe strengthen the strategy with:\r\nCredible market research\r\nAudience insights\r\nEnsuring your brand is strong and stands out with the right positioning\r\n\r\nIII. Marketing Plan\r\nA comprehens', '2 Business Days', 2, 'marketing, business, marketing stragy', 'motivation speech for you', '$20.00', '$30.00', '$50.00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creat_a_gig`
--
ALTER TABLE `creat_a_gig`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creat_a_gig`
--
ALTER TABLE `creat_a_gig`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;