-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2024 at 03:49 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faaruuq`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorID` int NOT NULL,
  `DoctorName` varchar(100) NOT NULL,
  `DoctorNumber` varchar(50) NOT NULL,
  `Service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorID`, `DoctorName`, `DoctorNumber`, `Service`) VALUES
(1, 'Dr. John Smith', '555-1234', 'Cardiology'),
(2, 'Dr. Emily Johnson', '555-5678', 'Pediatrics'),
(3, 'Dr. Michael Brown', '555-8765', 'Dermatology'),
(4, 'Dr. Sarah Wilson', '555-4321', 'Orthopedics'),
(5, 'Dr. Jessica Davis', '555-3456', 'Neurology');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `MedicineID` int NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`MedicineID`, `Name`, `Price`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'Paracetemol', 5.00, '2024-09-30 08:54:00', '2024-09-30 08:54:00'),
(2, 'Ibuprofen', 7.50, '2024-09-30 08:54:02', '2024-09-30 08:54:02'),
(3, 'Amoxicillin', 10.00, '2024-09-30 08:54:02', '2024-09-30 08:54:02'),
(4, 'Aspirin', 4.00, '2024-09-30 08:54:02', '2024-09-30 08:54:02'),
(5, 'Xanuun baabiiye', 9.00, '2024-09-29 08:54:00', '2024-10-03 08:54:00'),
(7, 'Kaniini', 10.00, '2024-10-06 11:14:17', '2024-10-06 11:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `PurchaseID` int NOT NULL,
  `MedicineID` int NOT NULL,
  `PurchaseDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Quantity` int NOT NULL,
  `Cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`PurchaseID`, `MedicineID`, `PurchaseDate`, `Quantity`, `Cost`) VALUES
(1, 1, '2024-08-31 21:00:00', 10, 50.00),
(2, 2, '2024-09-01 21:00:00', 5, 37.50),
(3, 3, '2024-09-02 21:00:00', 2, 20.00),
(4, 4, '2024-09-03 21:00:00', 15, 60.00),
(5, 5, '2024-09-04 21:00:00', 8, 68.00),
(8, 5, '2024-10-05 21:00:00', 2, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SaleID` int NOT NULL,
  `MedicineID` int NOT NULL,
  `DoctorID` int DEFAULT NULL,
  `SaleDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Quantity` int NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `PaymentMethod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SaleID`, `MedicineID`, `DoctorID`, `SaleDate`, `Quantity`, `TotalAmount`, `PaymentMethod`) VALUES
(1, 1, 1, '2024-08-31 21:00:00', 2, 20.00, 'Cash'),
(2, 2, 2, '2024-09-01 21:00:00', 1, 15.00, 'Credit Card'),
(3, 3, 3, '2024-09-02 21:00:00', 3, 45.00, 'Cash'),
(4, 4, 4, '2024-09-03 21:00:00', 1, 5.00, 'Debit Card'),
(5, 5, 5, '2024-09-04 21:00:00', 4, 40.00, 'Cash'),
(10, 1, NULL, '2024-10-05 21:00:00', 1, 1.00, 'Cash'),
(11, 4, NULL, '2024-10-04 21:00:00', 1, 2.00, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int NOT NULL,
  `Username` varchar(50) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `Role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ProfileImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `PasswordHash`, `Role`, `ProfileImage`) VALUES
(1, 'admin', '123', 'Administrator', 'image.jpg'),
(2, 'mohamed', '123', 'User', 'messages-1.jpg'),
(3, 'janedoe', '123', 'User', NULL),
(4, 'samsmith', '123', 'User', 'messages-2.jpg'),
(5, 'khadar', '123', 'User', 'khadar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`),
  ADD UNIQUE KEY `DoctorNumber` (`DoctorNumber`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`MedicineID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `MedicineID` (`MedicineID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SaleID`),
  ADD KEY `MedicineID` (`MedicineID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `MedicineID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `PurchaseID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`MedicineID`) REFERENCES `medicines` (`MedicineID`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`MedicineID`) REFERENCES `medicines` (`MedicineID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
