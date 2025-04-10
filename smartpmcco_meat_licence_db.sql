-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 06:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartpmcco_meat_licence_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `department_mst`
--

CREATE TABLE `department_mst` (
  `id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `dept_name` text NOT NULL,
  `inserted_dt` datetime DEFAULT NULL,
  `inserted_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_mst`
--

INSERT INTO `department_mst` (`id`, `ward_id`, `dept_name`, `inserted_dt`, `inserted_by`, `modified_dt`, `modified_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'Department - A', '2022-12-08 12:22:41', 1, '2022-12-08 12:23:28', 1, NULL, NULL),
(2, 1, 'Department - B', '2022-12-08 12:23:44', 1, NULL, NULL, NULL, NULL),
(3, 1, 'Department - C', '2022-12-08 12:24:01', 1, NULL, NULL, NULL, NULL),
(4, 1, 'Department - D', '2022-12-08 12:24:14', 1, NULL, NULL, NULL, NULL),
(5, 2, 'Department - ( A1 )', '2022-12-08 12:25:04', 1, NULL, NULL, NULL, NULL),
(6, 2, 'Department - ( A2 )', '2022-12-08 12:25:26', 1, NULL, NULL, NULL, NULL),
(7, 2, 'Department - ( A3 )', '2022-12-08 12:25:47', 1, NULL, NULL, NULL, NULL),
(8, 3, 'Department - ( B1 )', '2022-12-08 12:26:08', 1, NULL, NULL, NULL, NULL),
(9, 3, 'Department - ( B2 )', '2022-12-08 12:26:23', 1, NULL, NULL, NULL, NULL),
(10, 3, 'Department - ( B3 )', '2022-12-08 12:26:36', 1, NULL, NULL, NULL, NULL),
(11, 4, 'Department - ( C1 )', '2022-12-08 12:26:53', 1, NULL, NULL, NULL, NULL),
(12, 4, 'Department - ( C2 )', '2022-12-08 12:27:04', 1, NULL, NULL, NULL, NULL),
(13, 4, 'HO department1', '2022-12-17 12:31:26', 1, '2022-12-17 12:33:14', 1, '2022-12-17 12:33:21', 1),
(14, 6, 'Test Department', '2022-12-17 12:33:44', 1, NULL, NULL, NULL, NULL),
(15, 7, 'asdfg', '2023-07-01 10:55:40', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meatregistered_users`
--

CREATE TABLE `meatregistered_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `remember_token` varchar(500) DEFAULT NULL,
  `inserted_dt` datetime DEFAULT NULL,
  `inserted_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_dt` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meatregistered_users`
--

INSERT INTO `meatregistered_users` (`id`, `name`, `email`, `mobile`, `password`, `remember_token`, `inserted_dt`, `inserted_by`, `modified_dt`, `modified_by`, `deleted_dt`, `deleted_by`) VALUES
(1, 'pradnya', 'test@gmail.com', '8989898989', '$2y$10$jI/VVq1bqOAbZP5Jw/2E/eCUYuAKpxeDtmOQepaC66KCkUn4a7isS', NULL, '2023-07-04 16:08:08', 1, NULL, NULL, NULL, NULL),
(2, 'test', 'tt@gmail.com', '7878787878', '$2y$10$H1pXPGeaxEUY5yYAmPmyXO2TZegZJUE76YXxdKQogVNe/kTnHzGCi', NULL, '2023-07-04 16:27:09', 2, NULL, NULL, NULL, NULL),
(3, 'OMKAR', 'omkar@gmal.com', '9833937714', '$2y$10$02BFQ.iPMzpaevDaScMwvuXW9yoes6VUw.9CPmAlSHegBFbDiq/uy', NULL, '2023-07-04 17:49:17', 3, NULL, NULL, NULL, NULL),
(4, 'OMKAR', 'omkar@gmail.com', '9833937714', '$2y$10$ZOvGIpX7OhNbWksL6aTpVeUSLgJ0MqnzVj6tdQreezTuaZBxsvG1.', NULL, '2023-07-04 18:00:05', 4, NULL, NULL, NULL, NULL),
(5, 'abcd', 'abc123@gmail.com', '9632587410', '$2y$10$h5YRnPVRLQ2sAV9LoGA0lOioAn6UtH//bWgOhoGZSUeY21//MfXm6', NULL, '2023-07-05 10:16:10', 5, NULL, NULL, NULL, NULL),
(6, 'pradnya', 'pradnya@gmail.com', '7878787878', '$2y$10$Pp5lKBPrbfNc9RPeZozGEuuxJR2UAOIXE8.Fcw7LOCanyXj/wqwlK', NULL, '2023-07-13 09:58:10', 6, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meat_registration_tbl`
--

CREATE TABLE `meat_registration_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `meat_pplication_no` varchar(250) DEFAULT NULL,
  `applicant_title_id` int(11) NOT NULL,
  `applicant_fname` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `applicant_mname` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `applicant_lname` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `appl_dob` varchar(250) DEFAULT NULL,
  `appl_age` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `mobile_number` varchar(250) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `aadhar_number` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `house_number` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `house_name` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `street_1` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `street_2` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `area_1` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `area_2` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `taluka_id` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `business_name` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `business_type` int(11) NOT NULL,
  `meat_type` int(11) NOT NULL,
  `per_day_capacity` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `provision_water` int(11) NOT NULL COMMENT '1 : Yes 2 : No',
  `provision_electricty` int(11) NOT NULL COMMENT '1 : Yes 2 : No',
  `business_address` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `sewerage_disposing` int(11) NOT NULL COMMENT '1 : Yes 2 : No',
  `prcision_dispose_id` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `place_id` int(11) NOT NULL COMMENT '1 : Yes 2 : No',
  `regi_authority_name` varchar(250) DEFAULT NULL,
  `register_number` varchar(250) DEFAULT NULL,
  `valid_till` varchar(250) DEFAULT NULL,
  `areaof_business_place` varchar(250) DEFAULT NULL,
  `business_place` varchar(250) DEFAULT NULL,
  `business_place_other` varchar(250) DEFAULT NULL,
  `meat_license_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fee_receipt_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `adharcard_doc` varchar(250) DEFAULT NULL,
  `authority_letter_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `residitional_proof_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `legal_business_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `business_registration_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `agreement_owner_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `noc_owner_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `property_tax_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `paid_water_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `paid_receipt_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `treatment_authorized_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fitness_certificate_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `issued_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `registration_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `slaughter_letter_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `applicant_signature` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `profile_photo` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 : Pending 1 : Approve 2 : Reject	',
  `type` varchar(250) NOT NULL DEFAULT 'Meat_Registration',
  `approve_date` date DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `reject_date` datetime DEFAULT NULL,
  `reject_by` int(11) DEFAULT NULL,
  `self_decleration` int(250) NOT NULL DEFAULT 0,
  `inserted_dt` datetime DEFAULT NULL,
  `inserted_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_registration_tbl`
--

INSERT INTO `meat_registration_tbl` (`id`, `meat_pplication_no`, `applicant_title_id`, `applicant_fname`, `applicant_mname`, `applicant_lname`, `appl_dob`, `appl_age`, `mobile_number`, `email`, `gender`, `aadhar_number`, `house_number`, `house_name`, `street_1`, `street_2`, `area_1`, `area_2`, `country_id`, `state_id`, `district_id`, `taluka_id`, `zipcode`, `business_name`, `business_type`, `meat_type`, `per_day_capacity`, `provision_water`, `provision_electricty`, `business_address`, `sewerage_disposing`, `prcision_dispose_id`, `place_id`, `regi_authority_name`, `register_number`, `valid_till`, `areaof_business_place`, `business_place`, `business_place_other`, `meat_license_doc`, `fee_receipt_doc`, `adharcard_doc`, `authority_letter_doc`, `residitional_proof_doc`, `legal_business_doc`, `business_registration_doc`, `agreement_owner_doc`, `noc_owner_doc`, `property_tax_doc`, `paid_water_doc`, `paid_receipt_doc`, `treatment_authorized_doc`, `fitness_certificate_doc`, `issued_doc`, `registration_doc`, `slaughter_letter_doc`, `applicant_signature`, `profile_photo`, `status`, `type`, `approve_date`, `approve_by`, `reject_date`, `reject_by`, `self_decleration`, `inserted_dt`, `inserted_by`, `modified_dt`, `modified_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'PMC-MET32234741', 1, 'omkar', 'p', 'n', '13-08-1996', '27', '9833937714', 'o123@gmail.com', 1, '123456789012', '10a', 'abc1', 'xyz1', '-', 'Thane', NULL, 1, 1, 33, 321, 400153, 'Meat shop', 1, 6, '100', 1, 1, 'qwerty', 1, '-', 1, NULL, NULL, NULL, NULL, NULL, NULL, '1688187702288.pdf', '1688187702287.pdf', NULL, '1688187702952.pdf', '1688187702146.pdf', '1688187702185.pdf', '1688187702758.pdf', '1688187702167.pdf', '1688187702411.pdf', '1688187702421.pdf', '168818770289.pdf', '1688187702731.pdf', '1688187702366.pdf', '1688187702414.pdf', '168818770285.pdf', '168818770293.pdf', '1688187702446.pdf', '168818770261.pdf', '1688187702656.pdf', 1, 'Meat_Registration', '2023-07-01', 2, NULL, NULL, 0, '2023-07-01 10:31:42', 1, NULL, NULL, NULL, NULL),
(2, 'PMC-MET87581572', 1, 'omkar', 'j', 'n', '10-01-2000', '23', '7896655412', 'add@gmail.com', 1, '745218963522', '5465', 'dadc', 'thane', NULL, 'thane', '-', 1, 1, 33, 321, 464561, 'Meat shop', 1, 6, '10', 1, 1, 'adsd', 1, 'dd', 1, NULL, NULL, NULL, NULL, NULL, NULL, '1688207193404.pdf', '1688207193127.pdf', NULL, '1688207193142.pdf', '1688207193291.pdf', '1688207193614.pdf', '1688207193302.pdf', '1688207193774.pdf', '1688207193329.pdf', '1688207193926.pdf', '1688207193565.pdf', '1688207193775.pdf', '1688207193852.pdf', '1688207193364.pdf', '1688207193507.pdf', '1688207193196.pdf', '1688207193625.pdf', '168820719389.pdf', '1688207193905.pdf', 2, 'Meat_Registration', '2023-07-01', 2, '2023-07-01 15:58:23', 2, 1, '2023-07-01 15:56:33', 2, NULL, NULL, NULL, NULL),
(3, 'PMC-MET8930783', 1, 'omkar', 'p', 'namdas', NULL, NULL, '9833937714', 'omkar@gmail.com', NULL, '987456321010', '101', '-', 'Thane', '-', 'Thane', '-', 1, 1, 33, 321, 420012, 'Fish shop', 1, 6, '10', 1, 1, 'Test', 1, '-', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1688474193557.pdf', NULL, '1688474193965.pdf', '1688474193217.pdf', '1688474193717.pdf', NULL, NULL, '1688474193545.pdf', '168847419379.pdf', NULL, '1688474193414.pdf', '1688474193921.pdf', '1688474193540.pdf', NULL, '1688474193420.pdf', '1688474193458.pdf', '1688474193711.pdf', 2, 'Meat_Registration', '2023-07-04', 2, '2023-07-04 18:09:38', 2, 0, '2023-07-04 18:06:33', 3, NULL, NULL, NULL, NULL),
(4, 'PMC-MET38107554', 5, 'abc', 'a', 'xyz', NULL, NULL, '9632587410', 'abc123@gmail.com', NULL, '789856974521', '456', 'casa grande', 'Mumbai', '-', 'mumbai', '-', 1, 1, 17, 164, 459338, 'Meat', 1, 3, '10', 1, 2, 'abcd house , kurla , mumbai', 1, '-', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1688532825424.pdf', NULL, '1688532825789.pdf', '1688532825371.pdf', '1688532825111.pdf', NULL, NULL, '1688532825873.pdf', '1688532825217.pdf', NULL, '168853282510.png', '1688532825333.pdf', '1688532825599.pdf', NULL, '1688532825716.png', '1688532825334.png', '168853282530.png', 1, 'Meat_Registration', '2023-07-05', 2, NULL, NULL, 0, '2023-07-05 10:23:45', 4, NULL, NULL, NULL, NULL),
(5, 'PMC-MET53117535', 2, 'test', 'test', 'test', NULL, NULL, '6545454545', 'test@gmail.com', NULL, '234556786656', '2', 'NA', 'NA', 'q', 'sss', '1', 1, 1, 37, 354, 400088, 'test', 4, 6, '6', 1, 1, 'Asdsd', 1, 'zxxvxcv', 1, 'sss', '33333', '2023-07-19', 'test', '2', NULL, NULL, NULL, '1688640398317.pdf', NULL, '1688640398708.pdf', '1688640398973.pdf', '1688640398759.pdf', NULL, NULL, '1688640398644.pdf', '1688640398452.pdf', NULL, '1688640398543.pdf', '1688640398968.pdf', '1688640398497.pdf', NULL, '1688640398803.pdf', '1688640398348.pdf', '1688640398534.pdf', 0, 'Meat_Registration', NULL, NULL, NULL, NULL, 0, '2023-07-06 16:16:38', 5, NULL, NULL, NULL, NULL),
(6, 'PMC-MET89187966', 6, 'Pradnya', 'Dikshit', 'khetam', NULL, NULL, '7878787878', 'pradnya@gmail.com', NULL, '234556786656', '441', 'pradnya nivas', 'maharastra nagar', 'NA', 'mankhurd', 'NA', 1, 1, 33, 323, 400088, 'pradnya Meat Center', 2, 3, '2', 1, 2, '232 sho nu, mhada colony, mhankhurd east', 1, 'NA', 1, 'dikshit khetam', 'AM8765568999', '2025-07-31', 'pradnya Meat Center', '2', NULL, NULL, NULL, '1689223136393.pdf', NULL, '1689223136529.pdf', '1689223136537.pdf', '1689223136193.pdf', NULL, NULL, '1689223136267.pdf', '1689223136242.pdf', NULL, '1689223136513.pdf', '1689223136792.pdf', '1689223136378.pdf', NULL, '1689223136718.pdf', '1689223136139.pdf', '1689223136701.pdf', 1, 'Meat_Registration', '2023-07-13', 2, NULL, NULL, 1, '2023-07-13 10:08:56', 6, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meat_renewal_license_tbl`
--

CREATE TABLE `meat_renewal_license_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `renwal_liceans_no` varchar(250) DEFAULT NULL,
  `meat_register_oldid` int(250) DEFAULT NULL,
  `applicant_title_id` int(11) NOT NULL,
  `applicant_fname` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `applicant_mname` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `applicant_lname` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `appl_dob` varchar(250) DEFAULT NULL,
  `appl_age` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `mobile_number` varchar(250) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `aadhar_number` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `house_number` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `house_name` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `street_1` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `street_2` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `area_1` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `area_2` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `taluka_id` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `business_name` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `business_type` int(11) NOT NULL,
  `meat_type` int(11) NOT NULL,
  `per_day_capacity` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `provision_water` int(11) NOT NULL COMMENT '1 : Yes 2 : No',
  `provision_electricty` int(11) NOT NULL COMMENT '1 : Yes 2 : No',
  `business_address` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `sewerage_disposing` int(11) NOT NULL COMMENT '1 : Yes 2 : No',
  `prcision_dispose_id` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `place_id` int(11) NOT NULL COMMENT '1 : Yes 2 : No',
  `regi_authority_name` varchar(250) DEFAULT NULL,
  `register_number` varchar(250) DEFAULT NULL,
  `valid_till` varchar(250) DEFAULT NULL,
  `areaof_business_place` varchar(250) DEFAULT NULL,
  `business_place` varchar(250) DEFAULT NULL,
  `business_place_other` varchar(250) DEFAULT NULL,
  `meat_license_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fee_receipt_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `authority_letter_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `residitional_proof_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `legal_business_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `business_registration_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `agreement_owner_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `noc_owner_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `property_tax_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `paid_water_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `paid_receipt_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `treatment_authorized_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fitness_certificate_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `issued_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `registration_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `slaughter_letter_doc` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `applicant_signature` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `profile_photo` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `old_licence` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 : Pending 1 : Approve 2 : Reject	',
  `type` varchar(250) NOT NULL DEFAULT 'Meat_Registration',
  `approve_date` datetime DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `reject_date` datetime DEFAULT NULL,
  `reject_by` int(11) DEFAULT NULL,
  `self_decleration` int(250) NOT NULL DEFAULT 0,
  `inserted_dt` datetime DEFAULT NULL,
  `inserted_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_renewal_license_tbl`
--

INSERT INTO `meat_renewal_license_tbl` (`id`, `renwal_liceans_no`, `meat_register_oldid`, `applicant_title_id`, `applicant_fname`, `applicant_mname`, `applicant_lname`, `appl_dob`, `appl_age`, `mobile_number`, `email`, `gender`, `aadhar_number`, `house_number`, `house_name`, `street_1`, `street_2`, `area_1`, `area_2`, `country_id`, `state_id`, `district_id`, `taluka_id`, `zipcode`, `business_name`, `business_type`, `meat_type`, `per_day_capacity`, `provision_water`, `provision_electricty`, `business_address`, `sewerage_disposing`, `prcision_dispose_id`, `place_id`, `regi_authority_name`, `register_number`, `valid_till`, `areaof_business_place`, `business_place`, `business_place_other`, `meat_license_doc`, `fee_receipt_doc`, `authority_letter_doc`, `residitional_proof_doc`, `legal_business_doc`, `business_registration_doc`, `agreement_owner_doc`, `noc_owner_doc`, `property_tax_doc`, `paid_water_doc`, `paid_receipt_doc`, `treatment_authorized_doc`, `fitness_certificate_doc`, `issued_doc`, `registration_doc`, `slaughter_letter_doc`, `applicant_signature`, `profile_photo`, `old_licence`, `status`, `type`, `approve_date`, `approve_by`, `reject_date`, `reject_by`, `self_decleration`, `inserted_dt`, `inserted_by`, `modified_dt`, `modified_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'PMC-MET7386291', 6, 6, 'Pradnya', 'Dikshit', 'khetam', NULL, NULL, '7878787878', 'pradnya@gmail.com', NULL, '234556786656', '601', 'pradnya nivas', 'maharastra nagar', 'NA', 'mankhurd', 'NA', 1, 1, 33, 323, 400088, 'pradnya Meat Center', 2, 3, '2', 1, 2, '232 sho nu, mhada colony, mhankhurd east', 1, 'NA', 1, 'dikshit khetam', 'PD8765568999', '2025-07-31', 'pradnya Meat Center', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1689235414674.pdf', 1, 'Meat_Registration', '2023-07-13 16:27:25', 2, '2023-07-13 16:29:15', 2, 0, '2023-07-13 13:33:34', 6, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meat_type_mst`
--

CREATE TABLE `meat_type_mst` (
  `id` int(11) NOT NULL,
  `meat_name` text CHARACTER SET utf8 NOT NULL,
  `inserted_dt` datetime DEFAULT NULL,
  `inserted_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_type_mst`
--

INSERT INTO `meat_type_mst` (`id`, `meat_name`, `inserted_dt`, `inserted_by`, `modified_dt`, `modified_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Beef ( बीफ  )', '2023-01-17 17:01:50', 1, '2023-01-17 17:15:13', 1, NULL, NULL),
(2, 'Mutton ( मटन )', '2023-01-17 17:04:32', 1, NULL, NULL, NULL, NULL),
(3, 'Chicken ( चिकन )', '2023-01-17 17:05:27', 1, NULL, NULL, NULL, NULL),
(4, 'Chevon ( मेंढयाचे मांस )', '2023-01-17 17:05:53', 1, NULL, NULL, NULL, NULL),
(5, 'Pork ( पोर्क डुकराचे  )', '2023-01-17 17:06:00', 1, NULL, NULL, NULL, NULL),
(6, 'Fish ( मासे )', '2023-01-17 17:06:17', 1, NULL, NULL, NULL, NULL),
(7, 'Egg ( अंडी )', '2023-01-17 17:06:31', 1, NULL, NULL, '2023-07-01 13:25:53', 2),
(8, 'Other ( इतर )', '2023-01-17 17:06:45', 1, NULL, NULL, '2023-07-01 13:25:33', 2),
(9, 'fishe', '2023-07-01 10:56:01', 2, NULL, NULL, '2023-07-01 13:25:37', 2),
(10, 'fishes', '2023-07-04 16:25:41', 2, NULL, NULL, '2023-07-04 16:26:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `meat_user_password_resets`
--

CREATE TABLE `meat_user_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_dist`
--

CREATE TABLE `mst_dist` (
  `id` int(11) NOT NULL,
  `dist_name` varchar(500) NOT NULL,
  `inserted_dt` datetime DEFAULT NULL,
  `inserted_by` int(11) DEFAULT NULL,
  `modify_dt` datetime DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_dist`
--

INSERT INTO `mst_dist` (`id`, `dist_name`, `inserted_dt`, `inserted_by`, `modify_dt`, `modify_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Ahmednagar', '2022-04-21 13:19:18', 8, NULL, NULL, NULL, NULL),
(2, 'Akola', '2022-04-21 13:19:18', 8, NULL, NULL, NULL, NULL),
(3, 'Amravati', '2022-04-21 13:19:18', 8, NULL, NULL, NULL, NULL),
(4, 'Aurangabad', '2022-04-21 13:23:43', 8, NULL, NULL, NULL, NULL),
(5, 'Beed', '2022-04-21 13:23:43', 8, NULL, NULL, NULL, NULL),
(6, 'Bhandara', '2022-04-21 13:26:51', 8, NULL, NULL, NULL, NULL),
(7, 'Buldhana', '2022-04-21 13:26:51', 8, NULL, NULL, NULL, NULL),
(8, 'Chandrapur', '2022-04-21 13:27:25', 8, NULL, NULL, NULL, NULL),
(9, 'Dhule', '2022-04-21 13:27:25', 8, NULL, NULL, NULL, NULL),
(10, 'Gadchiroli', '2022-04-21 13:30:04', 8, NULL, NULL, NULL, NULL),
(11, 'Gondia', '2022-04-21 13:31:09', 8, NULL, NULL, NULL, NULL),
(12, 'Hingoli', '2022-04-21 13:31:27', 8, NULL, NULL, NULL, NULL),
(13, 'Jalgaon', '2022-04-21 13:31:27', 8, NULL, NULL, NULL, NULL),
(14, 'Jalna', '2022-04-21 13:32:37', 8, NULL, NULL, NULL, NULL),
(15, 'Kolhapur', '2022-04-21 13:32:37', 8, NULL, NULL, NULL, NULL),
(16, 'Latur', '2022-04-21 13:34:26', 8, NULL, NULL, NULL, NULL),
(17, 'Mumbai City', '2022-04-21 13:34:26', 8, NULL, NULL, NULL, NULL),
(18, 'Mumbai Suburban', '2022-04-21 13:36:04', 8, NULL, NULL, NULL, NULL),
(19, 'Nagpur', '2022-04-21 13:36:04', 8, NULL, NULL, NULL, NULL),
(20, 'Nanded', '2022-04-21 13:37:05', 8, NULL, NULL, NULL, NULL),
(21, 'Nandurbar', '2022-04-21 13:37:05', 8, NULL, NULL, NULL, NULL),
(22, 'Nashik', '2022-04-21 13:38:35', 8, NULL, NULL, NULL, NULL),
(23, 'Osmanabad', '2022-04-21 13:38:35', 8, NULL, NULL, NULL, NULL),
(24, 'Palghar', '2022-04-21 13:39:26', 8, NULL, NULL, NULL, NULL),
(25, 'Parbhani', '2022-04-21 13:39:26', 8, NULL, NULL, NULL, NULL),
(26, 'Pune', '2022-04-21 13:39:59', 8, NULL, NULL, NULL, NULL),
(27, 'Raigad', '2022-04-21 13:39:59', 8, NULL, NULL, NULL, NULL),
(28, 'Ratnagiri', '2022-04-21 13:43:26', 8, NULL, NULL, NULL, NULL),
(29, 'Sangli', '2022-04-21 13:44:27', 8, NULL, NULL, NULL, NULL),
(30, 'Satara', '2022-04-21 13:44:27', 8, NULL, NULL, NULL, NULL),
(31, 'Sindhudurg', '2022-04-21 13:45:04', 8, NULL, NULL, NULL, NULL),
(32, 'Solapur', '2022-04-21 13:45:04', 8, NULL, NULL, NULL, NULL),
(33, 'Thane', '2022-04-21 13:45:45', 8, NULL, NULL, NULL, NULL),
(34, 'Wardha', '2022-04-21 13:45:45', 8, NULL, NULL, NULL, NULL),
(36, 'Washim', '2022-04-21 13:46:29', 8, NULL, NULL, NULL, NULL),
(37, 'Yavatmal', '2022-04-21 13:46:29', 8, NULL, NULL, NULL, NULL),
(39, 'dsadfgfdgf', '2022-10-07 11:39:17', 2, '2022-10-07 11:40:23', 2, '2022-10-07 11:40:42', 2),
(40, 'Test District', '2022-11-22 14:23:59', 2, '2022-11-22 14:24:22', 2, '2022-11-22 14:24:29', 2),
(41, 'Test District', '2022-11-22 14:24:36', 2, NULL, NULL, '2022-12-07 16:54:54', 1),
(42, 'Test District', '2022-12-17 12:13:41', 1, '2022-12-17 12:15:59', 1, '2022-12-17 12:16:05', 1),
(43, 'Test District', '2022-12-17 12:16:23', 1, NULL, NULL, NULL, NULL),
(44, 'Test', '2023-07-01 10:53:44', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_taluka`
--

CREATE TABLE `mst_taluka` (
  `id` int(11) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `taluka_name` varchar(500) NOT NULL,
  `inserted_dt` datetime DEFAULT current_timestamp(),
  `inserted_by` int(11) DEFAULT NULL,
  `modify_dt` datetime DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_taluka`
--

INSERT INTO `mst_taluka` (`id`, `dist_id`, `taluka_name`, `inserted_dt`, `inserted_by`, `modify_dt`, `modify_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'Nagar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(2, 1, 'Shevgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(3, 1, 'Pathardi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(4, 1, 'Parner', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(5, 1, 'Sangamner', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(6, 1, 'Kopargaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(7, 1, 'Akole', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(8, 1, 'Shrirampur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(9, 1, 'Nevasa', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(10, 1, 'Rahata', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(11, 1, 'Rahuri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(12, 1, 'Shrigonda', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(13, 1, 'Karjat', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(14, 1, 'Jamkhed', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(15, 2, 'Akola', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(16, 2, 'Akot', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(17, 2, 'Telhara', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(18, 2, 'Balapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(19, 2, 'Patur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(20, 2, 'Murtajapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(21, 2, 'Barshitakli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(22, 3, 'Amravati', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(23, 3, 'Bhatukali', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(24, 3, 'Nandgaon Khandeshwar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(25, 3, 'Dharni (Amravati)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(26, 3, 'Chikhaldara', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(27, 3, 'Achalpur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(28, 3, 'Chandurbazar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(29, 3, 'Morshi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(30, 3, 'Warud', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(31, 3, 'Daryapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(32, 3, 'Anjangaon-Surji', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(33, 3, 'Chandur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(34, 3, 'Dhamangaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(35, 3, 'Tiosa', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(36, 4, 'Aurangabad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(37, 4, 'Kannad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(38, 4, 'Soegaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(39, 4, 'Sillod', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(40, 4, 'Phulambri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(41, 4, 'Khuldabad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(42, 4, 'Vaijapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(43, 4, 'Gangapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(44, 4, 'Paithan', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(45, 5, 'Beed', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(46, 5, 'Ashti', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(47, 5, 'Patoda', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(48, 5, 'Shirur-Kasar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(49, 5, 'Georai', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(50, 5, 'Majalgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(51, 5, 'Wadwani', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(52, 5, 'Kaij', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(53, 5, 'Dharur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(54, 5, 'Parli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(55, 5, 'Ambejogai', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(56, 6, 'Bhandara', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(57, 6, 'Tumsar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(58, 6, 'Pauni', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(59, 6, 'Mohadi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(60, 6, 'Sakoli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(61, 6, 'Lakhni', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(62, 6, 'Lakhandur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(63, 7, 'Buldhana', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(64, 7, 'Chikhli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(65, 7, 'Deulgaon Raja', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(66, 7, 'Jalgaon Jamod', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(67, 7, 'Sangrampur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(68, 7, 'Malkapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(69, 7, 'Motala', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(70, 7, 'Nandura', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(71, 7, 'Khamgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(72, 7, 'Shegaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(73, 7, 'Mehkar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(74, 7, 'Sindkhed Raja', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(75, 7, 'Lonar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(76, 8, 'Chandrapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(77, 8, 'Saoli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(78, 8, 'Mul', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(79, 8, 'Ballarpur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(80, 8, 'Pombhurna', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(81, 8, 'Gondpimpri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(82, 8, 'Warora', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(83, 8, 'Chimur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(84, 8, 'Bhadravati', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(85, 8, 'Bramhapuri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(86, 8, 'Nagbhid', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(87, 8, 'Sindewahi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(88, 8, 'Rajura', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(89, 8, 'Korpana', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(90, 8, 'Jivati', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(91, 9, 'Dhule', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(92, 9, 'Sakri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(93, 9, 'Sindkheda', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(94, 9, 'Shirpur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(95, 10, 'Gadchiroli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(96, 10, 'Dhanora', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(97, 10, 'Chamorshi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(98, 10, 'Mulchera', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(99, 10, 'Desaiganj (Vadasa)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(100, 10, 'Armori', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(101, 10, 'Kurkheda', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(102, 10, 'Korchi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(103, 10, 'Aheri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(104, 10, 'Bhamragad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(105, 10, 'Sironcha', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(106, 11, 'Gondia', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(107, 11, 'Tirora', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(108, 11, 'Goregaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(109, 11, 'Arjuni Morgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(110, 11, 'Amgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(111, 11, 'Salekasa', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(112, 11, 'Sadak Arjuni', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(113, 11, 'Deori', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(114, 12, 'Hingoli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(115, 12, 'Sengaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(116, 12, 'Kalamnuri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(117, 12, 'Basmath', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(118, 12, 'Aundha Nagnath', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(119, 13, 'Jalgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(120, 13, 'Jamner', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(121, 13, 'Erandol', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(122, 13, 'Dharangaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(123, 13, 'Bhusawal', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(124, 13, 'Raver', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(125, 13, 'Muktainagar (Edalabad)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(126, 13, 'Bodwad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(127, 13, 'Yawal', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(128, 13, 'Amalner', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(129, 13, 'Parola', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(130, 13, 'Chopda', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(131, 13, 'Pachora', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(132, 13, 'Bhadgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(133, 13, 'Chalisgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(134, 14, 'Jalna', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(135, 14, 'Bhokardan', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(136, 14, 'Jafrabad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(137, 14, 'Badnapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(138, 14, 'Ambad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(139, 14, 'Ghansawangi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(140, 14, 'Partur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(141, 14, 'Mantha', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(142, 15, 'Karvir', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(143, 15, 'Panhala', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(144, 15, 'Shahuwadi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(145, 15, 'Kagal', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(146, 15, 'Hatkanangale', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(147, 15, 'Shirol', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(148, 15, 'Radhanagari', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(149, 15, 'Gaganbawada', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(150, 15, 'Bhudargad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(151, 15, 'Gadhinglaj', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(152, 15, 'Chandgad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(153, 15, 'Ajra', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(154, 16, 'Latur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(155, 16, 'Renapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(156, 16, 'Ahmedpur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(157, 16, 'Jalkot', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(158, 16, 'Chakur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(159, 16, 'Shirur Anantpal', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(160, 16, 'Ausa', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(161, 16, 'Nilanga', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(162, 16, 'Deoni', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(163, 16, 'Udgir', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(164, 17, 'Kurla', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(165, 17, 'Andheri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(166, 17, 'Borivali', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(167, 19, 'Nagpur (Urban)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(168, 19, 'Nagpur (Rural)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(169, 19, 'Kamptee', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(170, 19, 'Hingna', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(171, 19, 'Katol', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(172, 19, 'Narkhed', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(173, 19, 'Savner', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(174, 19, 'Kalameshwar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(175, 19, 'Ramtek', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(176, 19, 'Mouda', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(177, 19, 'Parseoni', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(178, 19, 'Umred', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(179, 19, 'Kuhi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(180, 19, 'Bhiwapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(181, 20, 'Nanded', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(182, 20, 'Ardhapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(183, 20, 'Mudkhed', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(184, 20, 'Bhokar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(185, 20, 'Umri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(186, 20, 'Loha', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(187, 20, 'Kandhar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(188, 20, 'Kinwat', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(189, 20, 'Himayatnagar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(190, 20, 'Hadgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(191, 20, 'Mahur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(192, 20, 'Deglur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(193, 20, 'Mukhed', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(194, 20, 'Dharmabad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(195, 20, 'Biloli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(196, 20, 'Naigaon (Khairgaon)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(197, 21, 'Nandurbar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(198, 21, 'Navapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(199, 21, 'Shahada', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(200, 21, 'Taloda', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(201, 21, 'Akkalkuwa', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(202, 21, 'Akrani (Dhadgaon)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(203, 22, 'Nashik', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(204, 22, 'Igatpuri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(205, 22, 'Dindori', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(206, 22, 'Peth', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(207, 22, 'Trimbakeshwar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(208, 22, 'Kalwan', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(209, 22, 'Deola', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(210, 22, 'Surgana', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(211, 22, 'Baglan (Satana)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(212, 22, 'Malegaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(213, 22, 'Nandgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(214, 22, 'Chandwad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(215, 22, 'Niphad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(216, 22, 'Sinnar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(217, 22, 'Yeola', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(218, 23, 'Osmanabad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(219, 23, 'Tuljapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(220, 23, 'Bhum', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(221, 23, 'Paranda', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(222, 23, 'Washi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(223, 23, 'Kalamb', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(224, 23, 'Lohara', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(225, 23, 'Umarga', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(226, 24, 'Palghar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(227, 24, 'Vasai', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(228, 24, 'Dahanu', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(229, 24, 'Talasari', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(230, 24, 'Jawhar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(231, 24, 'Mokhada', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(232, 24, 'Vada', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(233, 24, 'Vikramgad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(234, 25, 'Parbhani', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(235, 25, 'Sonpeth', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(236, 25, 'Gangakhed', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(237, 25, 'Palam', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(238, 25, 'Purna', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(239, 25, 'Sailu', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(240, 25, 'Jintur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(241, 25, 'Manwath', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(242, 25, 'Pathri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(243, 26, 'Pune City', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(244, 26, 'Haveli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(245, 26, 'Khed (Rajgurunagar)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(246, 26, 'Junnar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(247, 26, 'Ambegaon (Ghodegaon)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(248, 26, 'Maval (Vadgaon)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(249, 26, 'Mulshi (Paud)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(250, 26, 'Shirur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(251, 26, 'Purandhar (Saswad)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(252, 26, 'Velhe', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(253, 26, 'Bhor', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(254, 26, 'Baramati', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(255, 26, 'Indapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(256, 26, 'Daund', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(257, 27, 'Pen', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(258, 27, 'Alibaug', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(259, 27, 'Murud', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(260, 27, 'Panvel', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(261, 27, 'Uran', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(262, 27, 'Karjat (Matheran)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(263, 27, 'Khalapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(264, 27, 'Mangaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(265, 27, 'Tala', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(266, 27, 'Roha', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(267, 27, 'Sudhagad (Pali)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(268, 27, 'Mahad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(269, 27, 'Poladpur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(270, 27, 'Shrivardhan', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(271, 27, 'Mhasla', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(272, 28, 'Ratnagiri', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(273, 28, 'Sangameshwar (Deorukh)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(274, 28, 'Lanja', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(275, 28, 'Rajapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(276, 28, 'Chiplun', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(277, 28, 'Guhagar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(278, 28, 'Dapoli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(279, 28, 'Mandangad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(280, 28, 'Khed', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(281, 29, 'Miraj', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(282, 29, 'Kavathe-Mahankal', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(283, 29, 'Tasgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(284, 29, 'Jat', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(285, 29, 'Walwa (Islampur)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(286, 29, 'Shirala', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(287, 29, 'Khanapur-Vita', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(288, 29, 'Atpadi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(289, 29, 'Palus', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(290, 29, 'Kadegaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(291, 30, 'Satara', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(292, 30, 'Jaoli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(293, 30, 'Koregaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(294, 30, 'Wai', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(295, 30, 'Mahabaleshwar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(296, 30, 'Khandala', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(297, 30, 'Phaltan', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(298, 30, 'Maan (Dahiwadi)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(299, 30, 'Khatav (Vaduj)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(300, 30, 'Patan', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(301, 30, 'Karad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(302, 31, 'Kankavli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(303, 31, 'Vaibhavwadi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(304, 31, 'Devgad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(305, 31, 'Malwan', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(306, 31, 'Sawantwadi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(307, 31, 'Kudal', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(308, 31, 'Vengurla', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(309, 31, 'Dodamarg (Kasal)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(310, 32, 'Solapur North', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(311, 32, 'Barshi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(312, 32, 'Solapur South', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(313, 32, 'Akkalkot', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(314, 32, 'Madha', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(315, 32, 'Karmala', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(316, 32, 'Pandharpur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(317, 32, 'Mohol', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(318, 32, 'Malshiras', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(319, 32, 'Sangole', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(320, 32, 'Mangalvedhe', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(321, 33, 'Thane', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(322, 33, 'Kalyan', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(323, 33, 'Murbad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(324, 33, 'Bhiwandi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(325, 33, 'Shahapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(326, 33, 'Ulhasnagar', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(327, 33, 'Ambarnath', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(328, 34, 'Wardha', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(329, 34, 'Deoli', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(330, 34, 'Seloo', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(331, 34, 'Arvi', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(332, 34, 'Ashti', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(333, 34, 'Karanja', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(334, 34, 'Hinganghat', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(335, 34, 'Samudrapur', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(336, 36, 'Washim', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(337, 36, 'Malegaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(338, 36, 'Risod', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(339, 36, 'Mangrulpir', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(340, 36, 'Karanja', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(341, 36, 'Manora', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(342, 37, 'Yavatmal', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(343, 37, 'Arni', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(344, 37, 'Babhulgaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(345, 37, 'Kalamb', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(346, 37, 'Darwha', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(347, 37, 'Digras', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(348, 37, 'Ner', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(349, 37, 'Pusad', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(350, 37, 'Umarkhed', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(351, 37, 'Mahagaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(352, 37, 'Kelapur (Pandharkawada)', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(353, 37, 'Ralegaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(354, 37, 'Ghatanji', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(355, 37, 'Wani', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(356, 37, 'Maregaon', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(357, 37, 'Zari Jamani', '2022-04-21 16:10:27', 8, NULL, NULL, NULL, NULL),
(358, 36, 'Test Taluka1', '2022-11-22 14:27:19', 2, '2022-11-22 14:28:06', 2, '2022-11-22 14:28:13', 2),
(359, 41, 'Test Taluka', '2022-11-22 14:28:23', 2, NULL, NULL, NULL, NULL),
(360, 37, 'fsdf1', '2022-11-24 11:16:42', 2, '2022-11-24 11:17:00', 2, '2022-12-07 17:34:08', 1),
(361, 43, 'Test Taluka', '2022-12-17 12:20:03', 1, '2022-12-17 12:24:44', 1, '2022-12-17 12:25:04', 1),
(362, 43, 'Test Taluka', '2022-12-17 12:25:16', 1, NULL, NULL, NULL, NULL),
(363, 44, 'example', '2023-07-01 10:54:23', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inserted_dt` datetime DEFAULT NULL,
  `inserted_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `inserted_dt`, `inserted_by`, `modified_dt`, `modified_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Super Admin', 'admin123@gmail.com', NULL, '$2y$10$g0rRuA2doSokd2ETlt0EMezBqbkKTo58uzWLbTeSZopJ8gXkMluoe', NULL, '2023-01-23 09:46:52', 1, NULL, NULL, NULL, NULL),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$m9M5hTHT2mmLO9HYoGkjuejkI3Cvcsi7laAgiMuCC5Cz7XOVz3XnS', NULL, '2023-06-29 15:30:42', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ward_mst`
--

CREATE TABLE `ward_mst` (
  `id` int(11) NOT NULL,
  `ward_name` text NOT NULL,
  `inserted_dt` datetime DEFAULT NULL,
  `inserted_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward_mst`
--

INSERT INTO `ward_mst` (`id`, `ward_name`, `inserted_dt`, `inserted_by`, `modified_dt`, `modified_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Ward 1', '2022-12-08 11:57:20', 1, NULL, NULL, NULL, NULL),
(2, 'Ward 2', '2022-12-08 11:57:29', 1, NULL, NULL, NULL, NULL),
(3, 'Ward 3', '2022-12-08 11:57:39', 1, NULL, NULL, NULL, NULL),
(4, 'Ward 4', '2022-12-08 11:57:55', 1, NULL, NULL, NULL, NULL),
(5, 'Test ward', '2022-12-17 12:29:20', 1, '2022-12-17 12:29:51', 1, '2022-12-17 12:29:57', 1),
(6, 'Test ward', '2022-12-17 12:30:09', 1, NULL, NULL, NULL, NULL),
(7, 'qweret', '2023-07-01 10:55:06', 2, '2023-07-01 10:55:15', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_mst`
--
ALTER TABLE `department_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `meatregistered_users`
--
ALTER TABLE `meatregistered_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_registration_tbl`
--
ALTER TABLE `meat_registration_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_renewal_license_tbl`
--
ALTER TABLE `meat_renewal_license_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_type_mst`
--
ALTER TABLE `meat_type_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_dist`
--
ALTER TABLE `mst_dist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_taluka`
--
ALTER TABLE `mst_taluka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `ward_mst`
--
ALTER TABLE `ward_mst`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department_mst`
--
ALTER TABLE `department_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meatregistered_users`
--
ALTER TABLE `meatregistered_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meat_registration_tbl`
--
ALTER TABLE `meat_registration_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meat_renewal_license_tbl`
--
ALTER TABLE `meat_renewal_license_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meat_type_mst`
--
ALTER TABLE `meat_type_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
