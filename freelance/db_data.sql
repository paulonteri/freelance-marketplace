-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2022 at 09:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelance`
--
CREATE DATABASE IF NOT EXISTS `freelance` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `freelance`;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `user_id`, `image`, `title`, `description`, `time_created`, `is_active`) VALUES
(2, 11, '/uploads/ClientImageTueMar2220227:05amazon.png', 'Nakuru Mattress', 'A homegrown supermarket established in 2006 with our first branch in Nakuru town. We\'ve later grown and so far have a total of 46 branches in 12 counties across Kenya.\n\nWe pride ourselves with delivering an exceptional customer experience every time while providing our shopper with variety of goods at an affordable price!\n\nVisit any of our branches today and enjoy delectable pastries from our Bakery, sumptuous meals at our Deli, fresh cuts at the Butchery and so much more!\n\nUnique Value Proposition:\n\nFresh & Easy. Price Guarantee!', '2022-03-22 07:05:12', 1),
(3, 13, '/uploads/ClientImageTueMar2220229:371628513616264.jpeg', 'Ut mollitia excepteu', 'Est facilis maxime a', '2022-03-22 09:06:43', 1);

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`id`, `title`, `description`, `user_id`, `years_of_experience`, `time_created`, `is_active`) VALUES
(9, 'Best Programmer', 'Hard-working listing programmer with a flair for creating elegant solutions in the least amount of time. As a freelance programmer, created SAS datasets of clinical data and developed macro programs to improve efficiency and quality of data management for Takeda Pharmaceuticals. Looking to use my programming skills to help boost Piper Companies’ data management efficiency.', 11, 1994, '2022-03-22 07:15:41', 1),
(10, 'Creative Graphic Designer', 'Highly experienced, creative, and multitalented Graphic Designer with an extensive background in web, marketing multimedia, and print design. Exceptional collaborative and interpersonal skills; very strong team player with well-developed written and verbal communication abilities. Experienced at producing high-end business-to-business and consumer-facing designs; talented at building and maintaining partnerships. Passionate and accustomed to performing in deadline-driven environments.', 12, 5, '2022-03-22 07:54:52', 1),
(11, 'Freelancer 1', 'Descrpt', 13, 2, '2022-03-22 09:02:23', 1);

--
-- Dumping data for table `freelancer_skill`
--

INSERT INTO `freelancer_skill` (`id`, `freelancer_id`, `skill_id`) VALUES
(1, 9, 1),
(2, 9, 2),
(3, 10, 2),
(4, 10, 4),
(5, 11, 2),
(6, 11, 3);

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `client_id`, `title`, `description`, `image`, `pay_rate_per_hour`, `expected_duration_in_hours`, `receive_job_proposals_deadline`, `time_created`, `is_active`) VALUES
(5, 2, 'Social media posts', 'Person responsible for overseeing a company’s interactions with the public by implementing social media platforms’ content strategies. Their duties include analyzing engagement data, identifying trends in customer interactions and planning digital campaigns to build community online.', '/uploads/ClientJobImageWedMar2320227:56images.png', 20, 5, '2022-03-29 15:07:00', '2022-03-23 07:56:09', 1),
(6, 2, 'Flutter App developer', 'Looking for a flutter app developer to assist in updating and correcting a few bugs on an existing App, Should be able to code and understand best practices in Flutter and Dart and can deploy IOS and Android on the Play Store and Appstore. An Understanding of Firebase, Git, and API interaction with the backend and app testing too is key. &bull; Developed 2+ iOS/Android apps with Flutter, either deployed on the AppStore/Google Play or available on Github', '/uploads/ClientJobImageThuMar2420226:14images.png', 2000, 20, '2022-04-30 09:11:00', '2022-03-24 06:14:02', 1);

--
-- Dumping data for table `job_proposal`
--

INSERT INTO `job_proposal` (`id`, `status`, `title`, `description`, `job_id`, `freelancer_id`, `client_comment`, `time_work_starts`, `time_work_ends`, `time_created`, `is_active`) VALUES
(1, 'sent', 'Sunt nulla non accu', 'Nemo doloribus volup', 6, 10, NULL, NULL, NULL, '2022-03-24 08:36:04', 1);

--
-- Dumping data for table `job_skill`
--

INSERT INTO `job_skill` (`id`, `job_id`, `skill_id`) VALUES
(7, 5, 8),
(8, 6, 1);

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `name`) VALUES
(11, 'Accounting'),
(9, 'DataEntry'),
(4, 'GraphicDesign'),
(5, 'ITSupport'),
(7, 'LegalAssistant'),
(1, 'Programming'),
(8, 'SocialMediaManager'),
(12, 'Transcribing'),
(6, 'Translator'),
(2, 'UI/UX'),
(10, 'UsabilityTesting'),
(3, 'Writing');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `phone`, `password`, `first_name`, `middle_name`, `last_name`, `image`, `country`, `county`, `city`, `street`, `postal_code`, `is_admin`, `is_active`, `time_created`) VALUES
(11, 'byfixusaki', 'client@test.com', '+254718578833', '$2y$10$5QzsfhuROuvDUYtQ4Zv3ZuKkVEfaW1txv/553xBCTunpQvc/bpIsK', 'Daniele', NULL, 'Moi', '/uploads/profile.avif', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-03-22 06:52:13'),
(12, 'mutuvor', 'freelancer@test.com', '+254762307628', '$2y$10$zL2K68YBS7rwMSGIyQ5R.egPQYy43zMaPokgHtOA01j4ylacVCRPu', 'Sharon', NULL, 'Kemunto', '/uploads/profile-female.avif', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-03-22 07:53:28'),
(13, 'wyjaqe', 'giferuqa@mailinator.com', '+254793395484', '$2y$10$uohjjRXWHVnduYxpyyUuq.e1yNBkS2BZfXI4SvZzRUWCS.DJbXkS6', 'Amity', NULL, 'Bean', '/uploads/ProfileImageTueMar2220229:241628513616264.jpeg', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-03-22 08:53:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
