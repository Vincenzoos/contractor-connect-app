-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 10:55 AM
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
-- Database: `fit2104_a5`
--

-- --------------------------------------------------------


-- DROP TABLE (to be deleted when finalised)
DROP TABLE IF EXISTS `contacts`;
DROP TABLE IF EXISTS `contractors`;
DROP TABLE IF EXISTS `contractors_skills`;
DROP TABLE IF EXISTS `organisations`;
DROP TABLE IF EXISTS `projects`;
DROP TABLE IF EXISTS `projects_skills`;
DROP TABLE IF EXISTS `skills`;
DROP TABLE IF EXISTS `users`;

--
-- Table structure for table `contacts`
--
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `message` text DEFAULT NULL,
  `replied` tinyint(1) NOT NULL DEFAULT 0,
  `date_sent` date default CURRENT_TIMESTAMP,
  `organisation_id` int(11) DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--
CREATE TABLE `contractors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contractors_skills`
--

CREATE TABLE `contractors_skills` (
  `contractor_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--
CREATE TABLE `organisations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_first_name` varchar(255) NOT NULL,
  `contact_last_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `current_website` varchar(500) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `deadline` date NOT NULL,
  `management_tool_link` varchar(500) DEFAULT NULL,
  `last_checked_date` date NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `organisation_id` int(11) NOT NULL,
  `contractor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects_skills`
--

CREATE TABLE `projects_skills` (
  `project_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(96) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `message`, `replied`, `date_sent`, `organisation_id`, `contractor_id`) VALUES
(1, 'Alice', 'Johnson', 'alice.johnson@example.com', '0452 452 234', 'Looking for project details.', 0, '2024-10-01', 10, 5),
(2, 'Bob', 'Smith', 'bob.smith@example.com', '0452 123 456', 'Inquiry about collaboration.', 1, '2024-10-02', 15, 2),
(3, 'Charlie', 'Brown', 'charlie.brown@example.com', '0452 654 321', 'Request for proposal.', 0, '2024-10-03', 20, 3),
(4, 'Diana', 'Prince', 'diana.prince@example.com', '0452 987 654', 'Interested in partnership opportunities.', 1, '2024-10-04', 5, 10),
(5, 'Edward', 'Norton', 'edward.norton@example.com', '0452 321 987', 'Follow up on previous conversation.', 0, '2024-10-05', 30, 15),
(6, 'Fiona', 'Gordon', 'fiona.gordon@example.com', '0452 456 789', 'Looking for more information.', 1, '2024-10-06', 25, 20),
(7, 'George', 'Miller', 'george.miller@example.com', '0452 789 012', 'Inquiring about pricing.', 0, '2024-10-07', 35, 1),
(8, 'Hannah', 'Stewart', 'hannah.stewart@example.com', '0452 234 567', 'Feedback on recent project.', 1, '2024-10-08', 40, 3),
(9, 'Ian', 'Hawkins', 'ian.hawkins@example.com', '0452 678 901', 'Looking for a contract.', 0, '2024-10-09', 50, 5),
(10, 'Julia', 'Adams', 'julia.adams@example.com', '0452 345 678', 'General inquiry.', 1, '2024-10-10', 45, 20),
(11, 'Kevin', 'Smith', 'kevin.smith@example.com', '0452 987 123', 'Requesting further details.', 0, '2024-10-11', 2, 10),
(12, 'Laura', 'Johnson', 'laura.johnson@example.com', '0452 432 123', 'Interested in scheduling a meeting.', 1, '2024-10-12', 12, 5),
(13, 'Mark', 'White', 'mark.white@example.com', '0452 876 543', 'Looking for support.', 0, '2024-10-13', 22, 25),
(14, 'Nina', 'Taylor', 'nina.taylor@example.com', '0452 765 432', 'Follow up on a recent project.', 1, '2024-10-14', 33, 30),
(15, 'Oscar', 'Garcia', 'oscar.garcia@example.com', '0452 654 321', 'Proposal submission.', 0, '2024-10-15', 44, 20),
(16, 'Paula', 'Hernandez', 'paula.hernandez@example.com', '0452 543 210', 'Looking for feedback.', 1, '2024-10-16', 1, 15),
(17, 'Quinn', 'Lee', 'quinn.lee@example.com', '0452 432 109', 'Inquiring about new services.', 0, '2024-10-17', 8, 40),
(18, 'Rachel', 'Kim', 'rachel.kim@example.com', '0452 321 098', 'Request for partnership.', 1, '2024-10-18', 6, 10),
(19, 'Sam', 'Walker', 'sam.walker@example.com', '0452 210 987', 'Follow-up on contract terms.', 0, '2024-10-19', 39, 25),
(20, 'Tina', 'Lewis', 'tina.lewis@example.com', '0452 109 876', 'General feedback.', 1, '2024-10-20', 48, 35),
(21, 'Ursula', 'Hall', 'ursula.hall@example.com', '0452 098 765', 'Interested in future projects.', 0, '2024-10-21', 20, 15),
(22, 'Victor', 'Young', 'victor.young@example.com', '0452 987 654', 'Looking for clarification.', 1, '2024-10-22', 10, 10),
(23, 'Wendy', 'King', 'wendy.king@example.com', '0452 876 543', 'Request for additional info.', 0, '2024-10-23', 33, 20),
(24, 'Xander', 'Scott', 'xander.scott@example.com', '0452 765 432', 'Proposal inquiry.', 1, '2024-10-24', 14, 30),
(25, 'Yvonne', 'Green', 'yvonne.green@example.com', '0452 654 321', 'Looking for new contracts.', 0, '2024-10-25', 9, 25),
(26, 'Zach', 'Adams', 'zach.adams@example.com', '0452 543 210', 'Feedback on services.', 1, '2024-10-26', 2, 40),
(27, 'Aaron', 'Edwards', 'aaron.edwards@example.com', '0452 432 109', 'Looking for partnership opportunities.', 0, '2024-10-27', 5, 10),
(28, 'Bella', 'Baker', 'bella.baker@example.com', '0452 321 098', 'Inquiry about services.', 1, '2024-10-28', 15, 15),
(29, 'Chris', 'Harris', 'chris.harris@example.com', '0452 210 987', 'Looking for collaboration.', 0, '2024-10-29', 25, 25),
(30, 'Derek', 'Mitchell', 'derek.mitchell@example.com', '0452 109 876', 'Feedback on recent project.', 1, '2024-10-30', 30, 35),
(31, 'Eleanor', 'Wood', 'eleanor.wood@example.com', '0452 098 765', 'General inquiry about services.', 0, '2024-10-31', 20, 10),
(32, 'Felix', 'Barnes', 'felix.barnes@example.com', '0452 987 654', 'Looking for further details.', 1, '2024-11-01', 25, 20),
(33, 'Gina', 'Harrison', 'gina.harrison@example.com', '0452 876 543', 'Inquiring about future projects.', 0, '2024-11-02', 12, 30),
(34, 'Hugo', 'Kelley', 'hugo.kelley@example.com', '0452 765 432', 'Looking for partnership info.', 1, '2024-11-03', 2, 15),
(35, 'Ivy', 'Long', 'ivy.long@example.com', '0452 654 321', 'Feedback on recent collaboration.', 0, '2024-11-04', 8, 20),
(36, 'Jack', 'Ross', 'jack.ross@example.com', '0452 543 210', 'Inquiry about support.', 1, '2024-11-05', 35, 25),
(37, 'Kim', 'Ward', 'kim.ward@example.com', '0452 432 109', 'Looking for pricing info.', 0, '2024-11-06', 40, 10),
(38, 'Liam', 'Ramirez', 'liam.ramirez@example.com', '0452 321 098', 'Request for a meeting.', 1, '2024-11-07', 3, 5),
(39, 'Mona', 'Perry', 'mona.perry@example.com', '0452 210 987', 'General feedback.', 0, '2024-11-08', 27, 15),
(40, 'Nate', 'Foster', 'nate.foster@example.com', '0452 109 876', 'Inquiry about service options.', 1, '2024-11-09', 11, 35),
(41, 'Olivia', 'Simmons', 'olivia.simmons@example.com', '0452 098 765', 'Looking for collaboration opportunities.', 0, '2024-11-10', 19, 20),
(42, 'Paul', 'Hunt', 'paul.hunt@example.com', '0452 987 654', 'Follow-up on a project.', 1, '2024-11-11', 5, 10),
(43, 'Quinn', 'Bishop', 'quinn.bishop@example.com', '0452 876 543', 'Request for information.', 0, '2024-11-12', 15, 25),
(44, 'Rachel', 'Hansen', 'rachel.hansen@example.com', '0452 765 432', 'Looking for partnership opportunities.', 1, '2024-11-13', 29, 35),
(45, 'Steve', 'Wright', 'steve.wright@example.com', '0452 654 321', 'Inquiry about pricing.', 0, '2024-11-14', 7, 40),
(46, 'Tina', 'Howard', 'tina.howard@example.com', '0452 543 210', 'Looking for a contract.', 1, '2024-11-15', 8, 10),
(47, 'Uma', 'Rivers', 'uma.rivers@example.com', '0452 432 109', 'Feedback on services.', 0, '2024-11-16', 17, 20),
(48, 'Victor', 'Stevens', 'victor.stevens@example.com', '0452 321 098', 'General inquiry about projects.', 1, '2024-11-17', 20, 15),
(49, 'Wendy', 'Holt', 'wendy.holt@example.com', '0452 210 987', 'Looking for support.', 0, '2024-11-18', 5, 5),
(50, 'Xena', 'Ray', 'xena.ray@example.com', '0452 109 876', 'Inquiring about future contracts.', 1, '2024-11-19', 12, 30);



--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `contact_first_name`, `contact_last_name`, `contact_email`, `current_website`, `industry`, `description`)
VALUES
(1, 'Tech Innovators', 'John', 'Smith', 'john.smith@techinnovators.com', 'http://techinnovators.com', 'Technology', ''),
(2, 'Green Solutions', 'Emily', 'Johnson', 'emily.johnson@greensolutions.com', 'http://greensolutions.com', 'Environmental', ''),
(3, 'Future Enterprises', 'Michael', 'Brown', 'michael.brown@futureenterprises.com', 'http://futureenterprises.com', 'Consulting', ''),
(4, 'Health Hub', 'Sarah', 'Wilson', 'sarah.wilson@healthhub.com', 'http://healthhub.com', 'Healthcare', ''),
(5, 'FinServe Group', 'David', 'Clark', 'david.clark@finservegroup.com', 'http://finservegroup.com', 'Finance', ''),
(6, 'Smart Design', 'Laura', 'Martinez', 'laura.martinez@smartdesign.com', 'http://smartdesign.com', 'Design', ''),
(7, 'Auto Solutions', 'Robert', 'Lee', 'robert.lee@autosolutions.com', 'http://autosolutions.com', 'Automotive', ''),
(8, 'Urban Living', 'Michelle', 'Harris', 'michelle.harris@urbanliving.com', 'http://urbanliving.com', 'Real Estate', ''),
(9, 'Code Wizards', 'William', 'Walker', 'william.walker@codewizards.com', 'http://codewizards.com', 'Software', ''),
(10, 'Creative Minds', 'Jessica', 'Adams', 'jessica.adams@creativeminds.com', 'http://creativeminds.com', 'Marketing', ''),
(11, 'Secure IT', 'Brian', 'Mitchell', 'brian.mitchell@secureit.com', 'http://secureit.com', 'IT Security', ''),
(12, 'Global Trade', 'Olivia', 'Roberts', 'olivia.roberts@globaltrade.com', 'http://globaltrade.com', 'Logistics', ''),
(13, 'Elite Partners', 'James', 'Turner', 'james.turner@elitepartners.com', 'http://elitepartners.com', 'Partnerships', ''),
(14, 'Innovate Health', 'Isabella', 'Scott', 'isabella.scott@innovatehealth.com', 'http://innovatehealth.com', 'Healthcare', ''),
(15, 'NextGen Tech', 'Daniel', 'Carter', 'daniel.carter@nextgentech.com', 'http://nextgentech.com', 'Technology', ''),
(16, 'Bright Future', 'Ava', 'Wright', 'ava.wright@brightfuture.com', 'http://brightfuture.com', 'Education', ''),
(17, 'Green Earth', 'Mia', 'Young', 'mia.young@greenearth.com', 'http://greenearth.com', 'Environmental', ''),
(18, 'Finance Experts', 'Matthew', 'King', 'matthew.king@financeexperts.com', 'http://financeexperts.com', 'Finance', ''),
(19, 'Tech Pioneers', 'Sophie', 'Evans', 'sophie.evans@techpioneers.com', 'http://techpioneers.com', 'Technology', ''),
(20, 'HealthFirst', 'Andrew', 'Green', 'andrew.green@healthfirst.com', 'http://healthfirst.com', 'Healthcare', ''),
(21, 'Market Leaders', 'Chloe', 'Hall', 'chloe.hall@marketleaders.com', 'http://marketleaders.com', 'Marketing', ''),
(22, 'Visionary Designs', 'Ethan', 'Adams', 'ethan.adams@visionarydesigns.com', 'http://visionarydesigns.com', 'Design', ''),
(23, 'Auto Vision', 'Lily', 'Mitchell', 'lily.mitchell@autovision.com', 'http://autovision.com', 'Automotive', ''),
(24, 'Urban Tech', 'Jacob', 'Bennett', 'jacob.bennett@urbantech.com', 'http://urbantech.com', 'Technology', ''),
(25, 'Pro Health', 'Charlotte', 'Collins', 'charlotte.collins@prohealth.com', 'http://prohealth.com', 'Healthcare', ''),
(26, 'Innovative Solutions', 'Ryan', 'Wood', 'ryan.wood@innovativesolutions.com', 'http://innovativesolutions.com', 'Consulting', ''),
(27, 'NextGen Designs', 'Amelia', 'Stewart', 'amelia.stewart@nextgendesigns.com', 'http://nextgendesigns.com', 'Design', ''),
(28, 'Smart Living', 'Lucas', 'Young', 'lucas.young@smartliving.com', 'http://smartliving.com', 'Real Estate', ''),
(29, 'Elite Tech', 'Emma', 'Rogers', 'emma.rogers@elitetech.com', 'http://elitetech.com', 'Technology', ''),
(30, 'Global Solutions', 'Alexander', 'Price', 'alexander.price@globalsolutions.com', 'http://globalsolutions.com', 'Logistics', ''),
(31, 'FinTech Partners', 'Grace', 'Cooper', 'grace.cooper@fintechpartners.com', 'http://fintechpartners.com', 'Finance', ''),
(32, 'Tech Advance', 'Noah', 'Walker', 'noah.walker@techadvance.com', 'http://techadvance.com', 'Technology', ''),
(33, 'Creative Tech', 'Harper', 'James', 'harper.james@creativetech.com', 'http://creativetech.com', 'Design', ''),
(34, 'Health Innovators', 'James', 'Harris', 'james.harris@healthinnovators.com', 'http://healthinnovators.com', 'Healthcare', ''),
(35, 'Tech Savvy', 'Ella', 'Nelson', 'ella.nelson@techsavvy.com', 'http://techsavvy.com', 'Technology', ''),
(36, 'Smart Solutions', 'Zoe', 'Clark', 'zoe.clark@smartsolutions.com', 'http://smartsolutions.com', 'Consulting', ''),
(37, 'Future Health', 'Elijah', 'Scott', 'elijah.scott@futurehealth.com', 'http://futurehealth.com', 'Healthcare', ''),
(38, 'Finance Future', 'Scarlett', 'Green', 'scarlett.green@financefuture.com', 'http://financefuture.com', 'Finance', ''),
(39, 'Urban Innovators', 'Matthew', 'Lee', 'matthew.lee@urbaninnovators.com', 'http://urbaninnovators.com', 'Real Estate', ''),
(40, 'Tech Experts', 'Evelyn', 'Walker', 'evelyn.walker@techexperts.com', 'http://techexperts.com', 'Technology', ''),
(41, 'Global Ventures', 'Jack', 'Martinez', 'jack.martinez@globalventures.com', 'http://globalventures.com', 'Logistics', ''),
(42, 'Elite Finance', 'Emily', 'Roberts', 'emily.roberts@elitefinance.com', 'http://elitefinance.com', 'Finance', ''),
(43, 'Health Solutions', 'Benjamin', 'Adams', 'benjamin.adams@healthsolutions.com', 'http://healthsolutions.com', 'Healthcare', ''),
(44, 'Innovative Designs', 'Lily', 'Smith', 'lily.smith@innovative-designs.com', 'http://innovative-designs.com', 'Design', ''),
(45, 'Auto Experts', 'Mason', 'Brown', 'mason.brown@autoexperts.com', 'http://autoexperts.com', 'Automotive', ''),
(46, 'Tech Innovators', 'Aria', 'Green', 'aria.green@techinnovators.com', 'http://techinnovators.com', 'Technology', ''),
(47, 'NextGen Solutions', 'James', 'Wright', 'james.wright@nextgensolutions.com', 'http://nextgensolutions.com', 'Consulting', ''),
(48, 'Smart Health', 'Lily', 'Young', 'lily.young@smarthealth.com', 'http://smarthealth.com', 'Healthcare', ''),
(49, 'Finance Innovators', 'Jack', 'Evans', 'jack.evans@financeinnovators.com', 'http://financeinnovators.com', 'Finance', ''),
(50, 'Urban Future', 'Grace', 'Baker', 'grace.baker@urbanfuture.com', 'http://urbanfuture.com', 'Real Estate', '');


--
-- Dumping data for table `contractors`
--
INSERT INTO `contractors` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `profile_picture`) VALUES
(1, 'John', 'Doe', '0412 345 678', 'john.doe@example.com', NULL),
(2, 'Jane', 'Smith', '0412 678 901', 'jane.smith@example.com', NULL),
(3, 'Michael', 'Brown', '0412 234 567', 'michael.brown@example.com', NULL),
(4, 'Emily', 'Davis', '0412 987 654', 'emily.davis@example.com', NULL),
(5, 'Sarah', 'Wilson', '0412 345 987', 'sarah.wilson@example.com', NULL),
(6, 'David', 'Johnson', '0412 567 890', 'david.johnson@example.com', NULL),
(7, 'Laura', 'Martinez', '0412 678 234', 'laura.martinez@example.com', NULL),
(8, 'Robert', 'Lee', '0412 789 345', 'robert.lee@example.com', NULL),
(9, 'Michelle', 'Harris', '0412 890 456', 'michelle.harris@example.com', NULL),
(10, 'William', 'Clark', '0412 901 567', 'william.clark@example.com', NULL),
(11, 'Jessica', 'Lewis', '0412 123 456', 'jessica.lewis@example.com', NULL),
(12, 'Brian', 'Walker', '0412 234 678', 'brian.walker@example.com', NULL),
(13, 'Olivia', 'Hall', '0412 345 789', 'olivia.hall@example.com', NULL),
(14, 'James', 'Allen', '0412 456 890', 'james.allen@example.com', NULL),
(15, 'Isabella', 'Young', '0412 567 901', 'isabella.young@example.com', NULL),
(16, 'Daniel', 'Wright', '0412 678 012', 'daniel.wright@example.com', NULL),
(17, 'Ava', 'Scott', '0412 789 123', 'ava.scott@example.com', NULL),
(18, 'Matthew', 'Adams', '0412 890 234', 'matthew.adams@example.com', NULL),
(19, 'Sophie', 'Nelson', '0412 901 345', 'sophie.nelson@example.com', NULL),
(20, 'Andrew', 'Carter', '0412 123 567', 'andrew.carter@example.com', NULL),
(21, 'Chloe', 'Mitchell', '0412 234 678', 'chloe.mitchell@example.com', NULL),
(22, 'Ethan', 'Roberts', '0412 345 789', 'ethan.roberts@example.com', NULL),
(23, 'Mia', 'Turner', '0412 456 890', 'mia.turner@example.com', NULL),
(24, 'Lucas', 'Phillips', '0412 567 901', 'lucas.phillips@example.com', NULL),
(25, 'Emma', 'Campbell', '0412 678 012', 'emma.campbell@example.com', NULL),
(26, 'Alexander', 'Parker', '0412 789 123', 'alexander.parker@example.com', NULL),
(27, 'Lily', 'Evans', '0412 890 234', 'lily.evans@example.com', NULL),
(28, 'Jacob', 'Edwards', '0412 901 345', 'jacob.edwards@example.com', NULL),
(29, 'Charlotte', 'Collins', '0412 123 456', 'charlotte.collins@example.com', NULL),
(30, 'Ryan', 'Stewart', '0412 234 567', 'ryan.stewart@example.com', NULL),
(31, 'Amelia', 'Morris', '0412 345 678', 'amelia.morris@example.com', NULL),
(32, 'Aiden', 'Rogers', '0412 456 789', 'aiden.rogers@example.com', NULL),
(33, 'Grace', 'Reed', '0412 567 890', 'grace.reed@example.com', NULL),
(34, 'Noah', 'Cook', '0412 678 901', 'noah.cook@example.com', NULL),
(35, 'Mia', 'Bell', '0412 789 012', 'mia.bell@example.com', NULL),
(36, 'Jack', 'Murphy', '0412 890 123', 'jack.murphy@example.com', NULL),
(37, 'Ella', 'Bailey', '0412 901 234', 'ella.bailey@example.com', NULL),
(38, 'Lucas', 'Rivera', '0412 123 345', 'lucas.rivera@example.com', NULL),
(39, 'Harper', 'Cooper', '0412 234 456', 'harper.cooper@example.com', NULL),
(40, 'Benjamin', 'Richardson', '0412 345 567', 'benjamin.richardson@example.com', NULL),
(41, 'Lily', 'Wood', '0412 456 678', 'lily.wood@example.com', NULL),
(42, 'Mason', 'Cox', '0412 567 789', 'mason.cox@example.com', NULL),
(43, 'Aria', 'Ward', '0412 678 890', 'aria.ward@example.com', NULL),
(44, 'James', 'Foster', '0412 789 901', 'james.foster@example.com', NULL),
(45, 'Zoe', 'James', '0412 890 012', 'zoe.james@example.com', NULL),
(46, 'Elijah', 'Bennett', '0412 901 123', 'elijah.bennett@example.com', NULL),
(47, 'Scarlett', 'Gray', '0412 123 234', 'scarlett.gray@example.com', NULL),
(48, 'Matthew', 'Simmons', '0412 234 345', 'matthew.simmons@example.com', NULL),
(49, 'Evelyn', 'Hayes', '0412 345 456', 'evelyn.hayes@example.com', NULL),
(50, 'Jack', 'Brooks', '0412 456 567', 'jack.brooks@example.com', NULL);

--
-- Dumping data for table `projects`
--
INSERT INTO projects (id, name, description, management_tool_link, deadline, last_checked_date, is_completed, contractor_id, organisation_id) VALUES
(1, 'Alpha Initiative', 'First phase of the new system development', 'http://pmtool.example.com/alpha', '2024-10-15', '2024-09-01', 0, 7, 3),
(2, 'Beta Rollout', 'Second phase implementation', 'http://pmtool.example.com/beta', '2024-11-01', '2024-09-05', 0, 15, 6),
(3, 'Client Migration', 'Migrate clients to the new platform', 'http://pmtool.example.com/migration', '2024-12-01', '2024-09-10', 0, 12, 2),
(4, 'Data Analytics', 'Develop data analytics tools', 'http://pmtool.example.com/analytics', '2024-10-30', '2024-09-12', 1, 5, 1),
(5, 'Employee Training', 'Training for new system users', 'http://pmtool.example.com/training', '2024-11-15', '2024-09-15', 0, 19, 8),
(6, 'Feature Update', 'Update key features in the application', 'http://pmtool.example.com/feature-update', '2024-12-15', '2024-09-18', 0, 9, 4),
(7, 'Security Audit', 'Conduct a security audit', 'http://pmtool.example.com/security', '2024-10-20', '2024-09-20', 1, 1, 12),
(8, 'Infrastructure Upgrade', 'Upgrade server infrastructure', 'http://pmtool.example.com/infrastructure', '2024-11-30', '2024-09-22', 0, 14, 7),
(9, 'Market Research', 'Research for new market opportunities', 'http://pmtool.example.com/market-research', '2024-12-10', '2024-09-25', 0, 6, 11),
(10, 'Customer Feedback', 'Analyze customer feedback and make improvements', 'http://pmtool.example.com/feedback', '2024-10-25', '2024-09-27', 1, 11, 16),
(11, 'Sales Dashboard', 'Create a new sales dashboard', 'http://pmtool.example.com/sales-dashboard', '2024-10-05', '2024-09-28', 0, 3, 19),
(12, 'Product Launch', 'Launch the new product', 'http://pmtool.example.com/product-launch', '2024-11-10', '2024-09-30', 0, 2, 5),
(13, 'User Experience', 'Improve user experience based on feedback', 'http://pmtool.example.com/ux-improvement', '2024-12-05', '2024-10-01', 0, 20, 9),
(14, 'Tech Support', 'Enhance tech support services', 'http://pmtool.example.com/tech-support', '2024-10-15', '2024-10-02', 0, 13, 14),
(15, 'Data Migration', 'Migrate historical data to new system', 'http://pmtool.example.com/data-migration', '2024-11-05', '2024-10-04', 0, 10, 18),
(16, 'API Integration', 'Integrate new APIs', 'http://pmtool.example.com/api-integration', '2024-12-01', '2024-10-07', 0, 8, 20),
(17, 'Client Onboarding', 'Onboard new clients', 'http://pmtool.example.com/client-onboarding', '2024-10-20', '2024-10-10', 1, 18, 15),
(18, 'Performance Tuning', 'Tune application performance', 'http://pmtool.example.com/performance-tuning', '2024-11-20', '2024-10-12', 0, 4, 2),
(19, 'Backup System', 'Implement new backup system', 'http://pmtool.example.com/backup-system', '2024-12-20', '2024-10-15', 0, 16, 6),
(20, 'Compliance Check', 'Ensure compliance with new regulations', 'http://pmtool.example.com/compliance', '2024-10-25', '2024-10-17', 1, 17, 4),
(21, 'Mobile App', 'Develop a mobile application', 'http://pmtool.example.com/mobile-app', '2024-11-30', '2024-10-20', 0, 22, 10),
(22, 'Customer Portal', 'Build a new customer portal', 'http://pmtool.example.com/customer-portal', '2024-12-15', '2024-10-22', 0, 21, 7),
(23, 'Internal Audit', 'Conduct an internal audit', 'http://pmtool.example.com/internal-audit', '2024-10-10', '2024-10-25', 1, 15, 11),
(24, 'Website Redesign', 'Redesign the company website', 'http://pmtool.example.com/website-redesign', '2024-11-10', '2024-10-27', 0, 9, 12),
(25, 'Vendor Management', 'Improve vendor management processes', 'http://pmtool.example.com/vendor-management', '2024-12-01', '2024-10-30', 0, 4, 13),
(26, 'Staff Recruitment', 'Recruit new staff members', 'http://pmtool.example.com/staff-recruitment', '2024-10-15', '2024-11-01', 0, 6, 18),
(27, 'Product Update', 'Update existing products', 'http://pmtool.example.com/product-update', '2024-11-20', '2024-11-03', 0, 13, 14),
(28, 'Client Feedback', 'Collect and analyze client feedback', 'http://pmtool.example.com/client-feedback', '2024-12-10', '2024-11-05', 0, 11, 6),
(29, 'Server Maintenance', 'Perform server maintenance', 'http://pmtool.example.com/server-maintenance', '2024-10-30', '2024-11-07', 1, 20, 9),
(30, 'Software Upgrade', 'Upgrade the core software', 'http://pmtool.example.com/software-upgrade', '2024-11-15', '2024-11-10', 0, 7, 3),
(31, 'HR System', 'Implement new HR system', 'http://pmtool.example.com/hr-system', '2024-12-01', '2024-11-12', 0, 15, 1),
(32, 'Data Analysis', 'Analyze current data trends', 'http://pmtool.example.com/data-analysis', '2024-10-25', '2024-11-15', 1, 19, 8),
(33, 'CRM Integration', 'Integrate with new CRM', 'http://pmtool.example.com/crm-integration', '2024-11-30', '2024-11-18', 0, 8, 13),
(34, 'Event Planning', 'Plan and execute company events', 'http://pmtool.example.com/event-planning', '2024-12-10', '2024-11-20', 0, 14, 17),
(35, 'Employee Wellness', 'Develop employee wellness programs', 'http://pmtool.example.com/wellness', '2024-10-15', '2024-11-22', 0, 2, 12),
(36, 'Data Security', 'Enhance data security measures', 'http://pmtool.example.com/data-security', '2024-11-05', '2024-11-25', 1, 10, 4),
(37, 'API Development', 'Develop new APIs', 'http://pmtool.example.com/api-development', '2024-12-15', '2024-11-27', 0, 16, 7),
(38, 'Client Support', 'Improve client support services', 'http://pmtool.example.com/client-support', '2024-10-20', '2024-12-01', 0, 21, 18),
(39, 'Training Materials', 'Create training materials', 'http://pmtool.example.com/training-materials', '2024-11-10', '2024-12-05', 1, 6, 16),
(40, 'Employee Onboarding', 'Improve employee onboarding process', 'http://pmtool.example.com/employee-onboarding', '2024-12-01', '2024-12-07', 0, 12, 2),
(41, 'IT Infrastructure', 'Upgrade the entire IT infrastructure to improve system efficiency', 'http://pmtool.example.com/it-infrastructure', '2024-11-15', '2024-12-10', 0, 13, 5),
(42, 'Customer Support', 'Enhance customer support capabilities', 'http://pmtool.example.com/customer-support', '2024-11-25', '2024-12-12', 1, 17, 10),
(43, 'Product Documentation', 'Update product documentation to reflect recent changes', 'http://pmtool.example.com/product-docs', '2024-12-10', '2024-12-15', 0, 9, 12),
(44, 'Vendor Integration', 'Integrate with new vendors to expand business partnerships', 'http://pmtool.example.com/vendor-integration', '2024-12-05', '2024-12-18', 0, 14, 19),
(45, 'Compliance Training', 'Provide compliance training for staff', 'http://pmtool.example.com/compliance-training', '2024-11-15', '2024-12-20', 0, 20, 6),
(46, 'Website Maintenance', 'Perform routine website maintenance and updates', 'http://pmtool.example.com/website-maintenance', '2024-12-01', '2024-12-22', 1, 11, 13),
(47, 'Marketing Campaign', 'Execute new marketing campaign for product launch', 'http://pmtool.example.com/marketing-campaign', '2024-11-01', '2024-12-25', 0, 15, 2),
(48, 'Client Retention', 'Develop strategies for improving client retention', 'http://pmtool.example.com/client-retention', '2024-12-01', '2024-12-27', 0, 18, 9),
(49, 'Technology Assessment', 'Assess new technology trends and their impact on the business', 'http://pmtool.example.com/technology-assessment', '2024-12-05', '2024-12-30', 0, 5, 16),
(50, 'Strategic Planning', 'Plan for the next fiscal year and set company goals', 'http://pmtool.example.com/strategic-planning', '2024-11-01', '2024-12-31', 1, 2, 11);


--
-- Dumping data for table `skills`
--
INSERT INTO skills (id, name) VALUES
(1, 'Java Spring Boot Development'),
(2, 'Software Assurance'),
(3, 'Cloud Computing'),
(4, 'Data Analysis and Visualization'),
(5, 'Mobile App Development'),
(6, 'Cybersecurity Management'),
(7, 'Project Management'),
(8, 'DevOps Engineering'),
(9, 'Agile Methodologies'),
(10, 'Logistics and Supply Chain Optimization'),
(11, 'Human-Computer Interaction'),
(12, 'Quality Assurance and Testing'),
(13, 'IT Recruitment and Talent Acquisition'),
(14, 'Financial Technology (FinTech)'),
(15, 'Legal Compliance in IT'),
(16, 'Business Intelligence Solutions'),
(17, 'Software Sales Consulting'),
(18, 'E-commerce Platform Development'),
(19, 'Customer Relationship Management (CRM) Systems'),
(20, 'IT Event Planning and Coordination');

--
-- Dumping data for table `contractors_skills`
--
INSERT INTO contractors_skills (contractor_id, skill_id) VALUES
(1,1),
(2,2),
(3,3),
(4,4),
(5,5),
(6,6),
(7,7),
(8,8),
(9,9),
(10,10),
(11,11),
(12,12),
(13,13),
(14,14),
(15,15),
(16,16),
(17,17),
(18,18),
(19,19),
(20,20),
(21,1),
(22,2),
(23,3),
(24,4),
(25,5),
(26,6),
(27,7),
(28,8),
(29,9),
(30,10),
(31,11),
(32,12),
(33,13),
(34,14),
(35,15),
(36,16),
(37,17),
(38,18),
(39,19),
(40,20),
(41,1),
(42,2),
(43,3),
(44,4),
(45,5),
(46,6),
(47,7),
(48,8),
(49,9),
(50,10);


--
-- Dumping data for table `projects_skills`
--
INSERT INTO projects_skills (project_id, skill_id) VALUES
(1,1),
(2,2),
(3,3),
(4,4),
(5,5),
(6,6),
(7,7),
(8,8),
(9,9),
(10,10),
(11,11),
(12,12),
(13,13),
(14,14),
(15,15),
(16,16),
(17,17),
(18,18),
(19,19),
(20,20),
(21,1),
(22,2),
(23,3),
(24,4),
(25,5),
(26,6),
(27,7),
(28,8),
(29,9),
(30,10),
(31,11),
(32,12),
(33,13),
(34,14),
(35,15),
(36,16),
(37,17),
(38,18),
(39,19),
(40,20),
(41,1),
(42,2),
(43,3),
(44,4),
(45,5),
(46,6),
(47,7),
(48,8),
(49,9),
(50,10);

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `password`, `email`, `first_name`, `last_name`) VALUES
    (1, '$2y$10$pDXX2i8118Xgq5yam14KoOrjwhe8EG0C8SRpir5fgsm.EUDRfctb.', 'nathan.recruiter@example.com', 'Nathan', 'Jims');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisations_contacts_fk` (`organisation_id`),
  ADD KEY `contractors_contacts_id` (`contractor_id`);

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractors_skills`
--
ALTER TABLE `contractors_skills`
  ADD PRIMARY KEY (`contractor_id`,`skill_id`),
  ADD KEY `contractors_contractors_skills_fk` (`contractor_id`),
  ADD KEY `skills_contractors_skills_fk` (`skill_id`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisations_projects_fk` (`organisation_id`),
  ADD KEY `contractors_projects_fk` (`contractor_id`);

--
-- Indexes for table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD PRIMARY KEY (`project_id`,`skill_id`),
  ADD KEY `projects_projects_skills_fk` (`project_id`),
  ADD KEY `skills_projects_skills_fk` (`skill_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`);


-- Constraints for table `contacts`
ALTER TABLE `contacts`
  ADD CONSTRAINT `contractors_contacts_fk` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `organisations_contacts_fk` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contractors_skills`
--
ALTER TABLE `contractors_skills`
  ADD CONSTRAINT `contractors_contractors_skills_fk` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skills_contractors_skills_fk` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`)  ON DELETE CASCADE;


--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `contractors_projects_fk` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `organisations_projects_fk` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE;


--
-- Constraints for table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD CONSTRAINT `projects_projects_skills_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skills_projects_skills_fk` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`)  ON DELETE CASCADE;


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contractors`
--
ALTER TABLE `contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
