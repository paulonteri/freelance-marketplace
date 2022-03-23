-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2022 at 06:22 AM
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
(2, 11, '/uploads/ClientImageTueMar2220227:05amazon.png', 'Recusandae Impedit', 'Dolor animi aut qui', '2022-03-22 07:05:12', 1),
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
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `name`) VALUES
(4, 'Graphic Design'),
(1, 'Programming'),
(2, 'UI/UX'),
(3, 'Writing');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `phone`, `password`, `first_name`, `middle_name`, `last_name`, `image`, `country`, `county`, `city`, `street`, `postal_code`, `is_admin`, `is_active`, `time_created`) VALUES
(11, 'byfixusaki', 'cemetugyci@mailinator.com', '+254718578833', '$2y$10$5QzsfhuROuvDUYtQ4Zv3ZuKkVEfaW1txv/553xBCTunpQvc/bpIsK', 'Daniele', NULL, 'Moi', '/uploads/profile.avif', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-03-22 06:52:13'),
(12, 'mutuvor', 'kefegi@mailinator.com', '+254762307628', '$2y$10$zL2K68YBS7rwMSGIyQ5R.egPQYy43zMaPokgHtOA01j4ylacVCRPu', 'Sharon', NULL, 'Kemunto', '/uploads/profile-female.avif', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-03-22 07:53:28'),
(13, 'wyjaqe', 'giferuqa@mailinator.com', '+254793395484', '$2y$10$uohjjRXWHVnduYxpyyUuq.e1yNBkS2BZfXI4SvZzRUWCS.DJbXkS6', 'Amity', NULL, 'Bean', '/uploads/ProfileImageTueMar2220229:241628513616264.jpeg', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-03-22 08:53:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
