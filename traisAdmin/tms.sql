-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 06:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2024-01-10 11:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `agro_dealers`
--

CREATE TABLE `agro_dealers` (
  `id` int(11) NOT NULL,
  `agro_dealer_id` varchar(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `business_type` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `national_id_number` varchar(20) DEFAULT NULL,
  `business_registration_number` varchar(50) DEFAULT NULL,
  `tax_identification_number` varchar(20) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `business_address` text DEFAULT NULL,
  `postal_address` text DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_account_number` varchar(20) DEFAULT NULL,
  `bank_branch` varchar(100) DEFAULT NULL,
  `bank_account_type` enum('Savings','Checking') DEFAULT NULL,
  `account_holder_name` varchar(100) DEFAULT NULL,
  `iban` varchar(34) DEFAULT NULL,
  `swift_code` varchar(11) DEFAULT NULL,
  `years_in_operation` int(11) DEFAULT NULL,
  `type_of_agro_products` text DEFAULT NULL,
  `supplier_relationships` text DEFAULT NULL,
  `distribution_channels` text DEFAULT NULL,
  `previous_subsidy_claims` text DEFAULT NULL,
  `certification_details` text DEFAULT NULL,
  `regulatory_compliance` text DEFAULT NULL,
  `audit_reports` text DEFAULT NULL,
  `claim_reference_number` varchar(20) DEFAULT NULL,
  `claim_submission_date` date DEFAULT NULL,
  `claim_amount` decimal(15,2) DEFAULT NULL,
  `claim_status` enum('Pending','Approved','Rejected') DEFAULT NULL,
  `supporting_documents` text DEFAULT NULL,
  `government_contact_person` varchar(100) DEFAULT NULL,
  `government_office_address` text DEFAULT NULL,
  `government_office_phone_number` varchar(15) DEFAULT NULL,
  `government_office_email_address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agro_dealers`
--

INSERT INTO `agro_dealers` (`id`, `agro_dealer_id`, `full_name`, `business_name`, `business_type`, `date_of_birth`, `gender`, `national_id_number`, `business_registration_number`, `tax_identification_number`, `phone_number`, `email_address`, `business_address`, `postal_address`, `bank_name`, `bank_account_number`, `bank_branch`, `bank_account_type`, `account_holder_name`, `iban`, `swift_code`, `years_in_operation`, `type_of_agro_products`, `supplier_relationships`, `distribution_channels`, `previous_subsidy_claims`, `certification_details`, `regulatory_compliance`, `audit_reports`, `claim_reference_number`, `claim_submission_date`, `claim_amount`, `claim_status`, `supporting_documents`, `government_contact_person`, `government_office_address`, `government_office_phone_number`, `government_office_email_address`) VALUES
(1, 'AG2034', 'Mukama Ives Iradukunda', 'FarmerFriend Agro Inputs', 'Agro Inputs', '1993-02-02', 'Male', '1234567890', '0003', 'TAX1003', '07900030003', 'iammukama1003@gmail.com', 'Kigali Central Market Area', 'PMB 345', 'Eco Bank, Rwanda', '0000000001', 'Kigali City', 'Savings', 'Mukama Iradukunda', '000243', 'SWFT1003', 16, 'Fertilizers, Seeds and Pesticite', 'Agro Dealer', 'Buy and Take', 'No', 'Cert003', 'Compliance', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '6580954839', 'Maria Powell', 'Grains Farmer', 'Crop Farming', '2024-09-15', 'Female', 'NIN001', '0003', 'TAX1003', '07900030003', 'iammukama1003@gmail.com', 'Kigali Central Market Area', 'PMB 345', 'Eco Bank, Rwanda', '0000000001', 'Kigali City', 'Savings', 'Mukama Iradukunda', '2333', 'SWFT1003', 8, 'Fertilizers, Seeds and Pesticite', 'Agro Dealer', 'Buy and Take', 'No', 'Cert003', 'Compliance', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subsidies`
--

CREATE TABLE `subsidies` (
  `subsidy_id` varchar(10) NOT NULL,
  `subsidy_type` enum('Fertilizer','Seeds','Insecticide','Herbicide','Farm Implements','Machinery') NOT NULL,
  `subsidy_value` decimal(5,2) NOT NULL,
  `date_given` date NOT NULL,
  `date_taken` date DEFAULT NULL,
  `subsidy_beneficiary` varchar(100) NOT NULL,
  `beneficiary_identity` varchar(10) NOT NULL,
  `last_benefits` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subsidies`
--

INSERT INTO `subsidies` (`subsidy_id`, `subsidy_type`, `subsidy_value`, `date_given`, `date_taken`, `subsidy_beneficiary`, `beneficiary_identity`, `last_benefits`) VALUES
('SUB002', 'Fertilizer', 60.00, '2024-09-12', '0000-00-00', 'Smallholder', '00000', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `Comment` mediumtext DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(1, 1, 'test@gmail.com', '2020-07-11', '2020-07-18', 'I want this package.', '2024-01-16 06:38:36', 2, 'u', '2024-01-30 05:18:29'),
(2, 2, 'test@gmail.com', '2020-07-10', '2020-07-13', 'There is some discount', '2024-01-17 06:43:25', 1, NULL, '2024-01-31 01:21:17'),
(3, 4, 'abir@gmail.com', '2020-07-11', '2020-07-15', 'When I get conformation', '2024-01-17 06:44:39', 2, 'a', '2024-01-30 05:18:52'),
(4, 2, 'test@gmail.com', '2024-02-02', '2024-02-08', 'NA', '2024-01-31 02:03:27', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`id`, `FullName`, `EmailId`, `MobileNumber`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(1, 'Jone Paaire', 'jone@gmail.com', '4646464646', 'Enquiry for Manali Trip', 'Kindly provide me more offer.', '2024-01-16 06:30:32', 1),
(2, 'Kishan Twaerea', 'kishan@gmail.com', '6797947987', 'Enquiry', 'Any Offer for North Trip', '2024-01-18 06:31:38', 1),
(3, 'Jacaob', 'Jai@gmail.com', '1646689721', 'Any offer for North', 'Any Offer for north', '2024-01-19 06:32:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfarmers`
--

CREATE TABLE `tblfarmers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `DisabilityStatus` enum('Yes','No') DEFAULT NULL,
  `NationalIDNumber` varchar(20) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `FarmAddress` text DEFAULT NULL,
  `Village` varchar(100) DEFAULT NULL,
  `County` varchar(100) DEFAULT NULL,
  `LandSize` decimal(10,2) DEFAULT NULL,
  `CropType` varchar(100) DEFAULT NULL,
  `CooperativeMembership` enum('Yes','No') DEFAULT NULL,
  `InputUsage` text DEFAULT NULL,
  `YieldInfo` text DEFAULT NULL,
  `HouseholdSize` int(11) DEFAULT NULL,
  `IncomeLevel` varchar(50) DEFAULT NULL,
  `IrrigationAccess` enum('Yes','No') DEFAULT NULL,
  `MarketAccess` enum('Yes','No') DEFAULT NULL,
  `VulnerabilityStatus` varchar(100) DEFAULT NULL,
  `DisasterProneArea` enum('Yes','No') DEFAULT NULL,
  `ResourcesAccess` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfarmers`
--

INSERT INTO `tblfarmers` (`id`, `FullName`, `Gender`, `DateOfBirth`, `DisabilityStatus`, `NationalIDNumber`, `PhoneNumber`, `FarmAddress`, `Village`, `County`, `LandSize`, `CropType`, `CooperativeMembership`, `InputUsage`, `YieldInfo`, `HouseholdSize`, `IncomeLevel`, `IrrigationAccess`, `MarketAccess`, `VulnerabilityStatus`, `DisasterProneArea`, `ResourcesAccess`, `RegDate`, `UpdationDate`) VALUES
(1, 'Nasiru Iliya', 'Male', '1992-10-06', 'Yes', '91919191', '08032083634', 'Kicukiro, Kenya Road, Kaduna, Nigeria', 'Kicukiro', 'Rwanda', 1.00, 'maize', 'No', '3 Bags', '5 Bags', 4, 'Low', 'Yes', 'Yes', 'Orphaned', 'Yes', 'Fertilizer', '2024-09-09 22:15:44', '2024-09-09 22:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `tblissues`
--

CREATE TABLE `tblissues` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `Issue` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminremarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblissues`
--

INSERT INTO `tblissues` (`id`, `UserEmail`, `Issue`, `Description`, `PostingDate`, `AdminRemark`, `AdminremarkDate`) VALUES
(6, 'test@gmail.com', 'Booking Issues', 'I am not able to book package', '2024-01-20 06:36:03', 'Ok, We will fix the issue asap', '2024-01-30 05:20:03'),
(7, 'test@gmail.com', 'Refund', 'I want my refund', '2024-01-25 06:56:29', NULL, '2024-01-30 05:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`) VALUES
(1, 'terms', '																				<p align=\"justify\"><font size=\"2\"><strong><font color=\"#990000\">ACCEPTANCE OF TERMS</font><br></strong></font><br></p><p align=\"justify\"><span style=\"font-size: small;\">TRAIS Terms and Condition Applied</span></p>\r\n										\r\n										'),
(2, 'privacy', '<div><span style=\"font-weight: bold;\">User Privacy And Policy</span></div><div><br></div><div>The privacy and confidentiality is respected in accordance with regulations such as GDRP</div>'),
(3, 'aboutus', '																				<div><span style=\"color: rgb(0, 0, 0); font-family: Georgia; font-size: 15px; text-align: justify; font-weight: bold;\">Smart TRAIS Application</span></div><div><span style=\"color: rgb(0, 0, 0); font-family: Georgia; font-size: 15px; text-align: justify; font-weight: bold;\"><br></span></div><div style=\"text-align: justify;\">For more Information about the system, contact the following;</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\">Nasiru Iliya</div><div style=\"text-align: justify;\">Afsanah Ineza</div><div style=\"text-align: justify;\">Thompson Kaisi</div>'),
(11, 'contact', '																														<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Contact</span><div><br></div><div>Smart TRAIS Tools for more information</div>');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(3, 'Ant - Killer Pesticides', 'Farm Spraying Pesticide', 'Kigali', 230, 'Liquids and Herbicites', 'Ant-Killer is an organophosphate based termiticide/insecticide with outstanding and versatile control of a wide range of insect and arthropods pests', 'hebisite1.jpg', '2024-07-15 05:21:58', '2024-09-12 12:59:44'),
(4, 'Centipede Lawn Fertilizer 15-0-15 (16 lbs)', 'Fertilizer', 'Uganda', 220, 'Free Wi-fi, Free pick up and drop facility,', 'NPK fertilizer represents the primary product used for supplementing the nutritional requirements of flowers, trees, grasses, and agricultural crops.', 'fetilizer11.jpg', '2024-07-15 05:21:58', '2024-09-12 13:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(1, 'Manju Srivatav', '4456464654', 'manju@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-16 06:33:20', '2024-01-31 02:00:40'),
(2, 'Kishan', '9871987979', 'kishan@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-16 06:33:20', '2024-01-31 02:00:48'),
(3, 'Salvi Chandra', '1398756416', 'salvi@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-16 06:33:20', '2024-01-31 02:00:48'),
(4, 'Abir', '4789756456', 'abir@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-16 06:33:20', '2024-01-31 02:00:48'),
(5, 'Test', '1987894654', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-01-16 06:33:20', '2024-01-31 02:00:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agro_dealers`
--
ALTER TABLE `agro_dealers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agro_dealer_id` (`agro_dealer_id`);

--
-- Indexes for table `subsidies`
--
ALTER TABLE `subsidies`
  ADD PRIMARY KEY (`subsidy_id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfarmers`
--
ALTER TABLE `tblfarmers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissues`
--
ALTER TABLE `tblissues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agro_dealers`
--
ALTER TABLE `agro_dealers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblfarmers`
--
ALTER TABLE `tblfarmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblissues`
--
ALTER TABLE `tblissues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
