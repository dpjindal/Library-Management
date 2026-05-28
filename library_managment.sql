-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2026 at 11:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `author_name`, `barcode`, `quantity`, `price`) VALUES
(3, 'PHP MySql', 'D P Jindal', 'LIB001', 4, 499),
(4, 'Learn PHP MYSql', 'D P Jindal', 'LIB172654', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Issued',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`id`, `student_id`, `student_name`, `book_id`, `issue_date`, `return_date`, `status`, `created_at`) VALUES
(1, 2, 'Priya Verma', 1, '2026-05-24', NULL, 'Issued', '2026-05-24 13:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `roll_number` varchar(50) NOT NULL,
  `class` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `roll_number`, `class`, `mobile`, `email`, `address`, `created_at`) VALUES
(1, 'Rahul Sharma', '101', 'BCA 1st Year', '9876543210', 'rahul@gmail.com', 'Faridabad', '2026-05-24 09:35:34'),
(2, 'Priya Verma', '102', 'BCA 1st Year', '9876543211', 'priya@gmail.com', 'Delhi', '2026-05-24 09:35:34'),
(3, 'Amit Kumar', '103', 'BCA 2nd Year', '9876543212', 'amit@gmail.com', 'Gurgaon', '2026-05-24 09:35:34'),
(4, 's_name', '12', 'V-A', '7845124578', 'raghu@gmail.com', '4215, Budh Nagar, Lwrence Road, Delhi', '2026-05-26 14:02:46'),
(5, 'Raj Rani', '15', 'VI-B', '8745124578', 'RAJRANI@GMAIL.COM', '115, Anand Lok, Inderlok, Delhi', '2026-05-26 14:06:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
