-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 01:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roles` int(11) NOT NULL,
  `cerate_AT` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `roles`, `cerate_AT`, `image`) VALUES
(3, 'mohamed', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '2023-03-19 11:06:58', 'profile.png'),
(4, 'khalaf', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, '2023-03-19 11:07:10', '22203p2.jpeg'),
(11, 'toma', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '2023-03-19 13:32:03', 'profile.png'),
(12, 'taha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, '2023-03-19 14:00:21', '84530563824@2x.jpg'),
(13, 't3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, '0000-00-00 00:00:00', 'profile.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminsalldata`
-- (See below for the actual view)
--
CREATE TABLE `adminsalldata` (
`id` int(11)
,`username` varchar(20)
,`image` varchar(100)
,`cerate_AT` datetime
,`desciption` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminsroyles`
-- (See below for the actual view)
--
CREATE TABLE `adminsroyles` (
`id` int(11)
,`password` varchar(50)
,`username` varchar(20)
,`roles_id` int(11)
,`desciption` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `created_at`) VALUES
(1, 'IT', '2023-02-28 23:08:14'),
(2, 'HR', '2023-02-28 23:12:04'),
(3, 'SALSE', '2023-02-28 23:18:05'),
(16, 'Marketingg', '2023-03-17 18:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `image` text NOT NULL,
  `departmentID` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `salary`, `image`, `departmentID`, `createAt`) VALUES
(50, 'sara', 9000, '887134FB_IMG_1655219707537.jpg', 1, '2023-03-03 22:24:34'),
(53, 'mohamed', 5465, '183FB_IMG_1649701337731.jpg', 1, '2023-03-03 23:58:53'),
(55, 'motaz', 6567, '617FB_IMG_1650792910326.jpg', 2, '2023-03-05 02:38:01'),
(56, 'fady', 3000, '86FB_IMG_1655219660562.jpg', 2, '2023-03-17 22:36:07'),
(58, ' Tamem', 5467, '868p1.jpg', 3, '2023-03-17 22:39:29'),
(67, 'mona', 5000, '903FB_IMG_1654642358041.jpg', 2, '2023-03-19 19:20:56'),
(73, 'nader', 5465790, '688FB_IMG_1653846630952.jpg', 3, '2023-03-19 19:28:22'),
(79, 'mom', 546, '634FB_IMG_1649701351192.jpg', 2, '2023-03-19 21:59:13');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeeswithdepartment`
-- (See below for the actual view)
--
CREATE TABLE `employeeswithdepartment` (
`id` int(11)
,`NameEmployees` varchar(50)
,`salary` float
,`image` text
,`NameDepartment` varchar(50)
,`depID` int(11)
,`createAt` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `desciption` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `desciption`) VALUES
(1, 'Super Admin For All App'),
(2, 'Access employees and Department'),
(3, 'Ony Department');

-- --------------------------------------------------------

--
-- Structure for view `adminsalldata`
--
DROP TABLE IF EXISTS `adminsalldata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminsalldata`  AS SELECT `admins`.`id` AS `id`, `admins`.`username` AS `username`, `admins`.`image` AS `image`, `admins`.`cerate_AT` AS `cerate_AT`, `roles`.`desciption` AS `desciption` FROM (`admins` join `roles` on(`admins`.`roles` = `roles`.`id`)) ORDER BY `admins`.`id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `adminsroyles`
--
DROP TABLE IF EXISTS `adminsroyles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminsroyles`  AS SELECT `admins`.`id` AS `id`, `admins`.`password` AS `password`, `admins`.`username` AS `username`, `roles`.`id` AS `roles_id`, `roles`.`desciption` AS `desciption` FROM (`admins` join `roles` on(`admins`.`roles` = `roles`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `employeeswithdepartment`
--
DROP TABLE IF EXISTS `employeeswithdepartment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeswithdepartment`  AS SELECT `employees`.`id` AS `id`, `employees`.`name` AS `NameEmployees`, `employees`.`salary` AS `salary`, `employees`.`image` AS `image`, `department`.`name` AS `NameDepartment`, `department`.`id` AS `depID`, `employees`.`createAt` AS `createAt` FROM (`employees` join `department` on(`employees`.`departmentID` = `department`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `roles` (`roles`),
  ADD KEY `imageId` (`image`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`roles`) REFERENCES `roles` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `department` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
