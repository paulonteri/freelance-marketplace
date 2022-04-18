-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2022 at 05:49 PM
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

INSERT INTO `client` (`id`, `user_id`, `image`, `title`, `description`, `type`, `time_created`, `is_active`) VALUES
(2, 11, '/uploads/ClientImageTueMar2220227:05amazon.png', 'Nakuru Mattress', 'A homegrown supermarket established in 2006 with our first branch in Nakuru town. We\'ve later grown and so far have a total of 46 branches in 12 counties across Kenya.\n\nWe pride ourselves with delivering an exceptional customer experience every time while providing our shopper with variety of goods at an affordable price!\n\nVisit any of our branches today and enjoy delectable pastries from our Bakery, sumptuous meals at our Deli, fresh cuts at the Butchery and so much more!\n\nUnique Value Proposition:\n\nFresh & Easy. Price Guarantee!', 'company', '2022-03-22 07:05:12', 1),
(3, 13, '/uploads/ClientImageTueMar2220229:371628513616264.jpeg', 'Ut mollitia excepteu', 'Est facilis maxime a', 'company', '2022-03-22 09:06:43', 1);

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
(6, 2, 'Flutter App developer', 'Looking for a flutter app developer to assist in updating and correcting a few bugs on an existing App, Should be able to code and understand best practices in Flutter and Dart and can deploy IOS and Android on the Play Store and Appstore. An Understanding of Firebase, Git, and API interaction with the backend and app testing too is key. &bull; Developed 2+ iOS/Android apps with Flutter, either deployed on the AppStore/Google Play or available on Github', '/uploads/ClientJobImageThuMar2420226:14images.png', 2000, 20, '2022-04-30 09:11:00', '2022-03-24 06:14:02', 1),
(7, 2, 'Python Django Developer Needed', 'A full-stack developer is needed. Strong knowledge of Python and Django is needed.\r\n\r\nRequirements:\r\n- Strong knowledge and experience with Python and Django.\r\n- Intermediate knowledge and experience with Vue and Nuxt js.\r\n- Intermediate knowledge and experience with HTML/CSS/JavaScript.\r\n- Attention to detail.\r\n- The developer should create several apis using Django framework.\r\n- AWS experience as well.\r\n- Previous experience with building websites and portals that consist of customer and admin pages.\r\n- Experience working with asynchronous celery tasks\r\n- Comfortable working with multiple 3rd party services\r\n\r\n\r\nIf the work is completed on time and in a satisfactory manner, additional work will be given.', '/uploads/ClientJobImageMonApr18202210:09555.jpg', 3000, 168, '2022-05-31 13:08:00', '2022-04-18 10:09:00', 1);

--
-- Dumping data for table `job_proposal`
--

INSERT INTO `job_proposal` (`id`, `status`, `title`, `description`, `job_id`, `freelancer_id`, `submission_description`, `submission_attachment`, `client_comment`, `time_work_starts`, `time_work_ends`, `time_created`, `is_active`) VALUES
(1, 'work submitted', 'Flutter Developer & UI/UX Designer', 'I have mastered the art of states and widgets in Flutter, making it my preferred UI tool. I have vast experience working with Flutter, coupled with other technologies to create full-scale apps.\r\nSuch as both SQL(PostgreSQL,Mysql) and NoSQL(MongoDB) databases and python(flask,DRF,fastapi) or Js(Node) for backend Solutions. Open to working with you.', 6, 10, 'I have completed the task', '/uploads/FreelancerWorkCompleteFileMonApr18202215:47work.zip', NULL, NULL, NULL, '2022-03-24 08:36:04', 1),
(2, 'withdrawn', 'I am an experienced social media manager', 'I would like to express my strong interest in the Social Media Manager position for the stated time. I am confident that my previous success as a social media manager, as well as my strong communication and collaboration skills, make me an ideal candidate for the position.\r\n\r\nI have ten years of experience in marketing, and I have spent the last five of those years as a Social Media Manager. My most recent campaign for Acme Corp. led to an increase of over 35% in inbound traffic for Acme’s website. Through a combination of creative social media marketing strategies and thorough monitoring of success through media analytics, KPIs, and dashboards, I can assure you of a similar rate of success.\r\n\r\nI am confident that my experience as well as my ability to collaborate and communicate, make me a strong candidate for the Social Media Manager.  Thank you so much for your time and consideration.', 5, 10, NULL, NULL, NULL, NULL, NULL, '2022-03-27 11:17:58', 1),
(4, 'sent', 'Tenetur magna verita', 'Sint autem accusamus', 7, 10, NULL, NULL, NULL, NULL, NULL, '2022-04-18 10:24:26', 1);

--
-- Dumping data for table `job_skill`
--

INSERT INTO `job_skill` (`id`, `job_id`, `skill_id`) VALUES
(7, 5, 8),
(8, 6, 1),
(9, 7, 1);

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
