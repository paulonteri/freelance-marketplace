-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2022 at 02:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET FOREIGN_KEY_CHECKS=0;
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

INSERT INTO `client` (`id`, `user_id`, `national_id`, `image`, `title`, `description`, `type`, `time_created`, `is_active`) VALUES
(2, 11, '/uploads/national_id.webp', '/uploads/ClientImageTueMar2220227:05amazon.png', 'Nakuru Mattress LTD', 'A homegrown supermarket established in 2006 with our first branch in Nakuru town. We&#039;ve later grown and so far have a total of 46 branches in 12 counties across Kenya.\r\n\r\nWe pride ourselves with delivering an exceptional customer experience every time while providing our shopper with variety of goods at an affordable price!\r\n\r\nVisit any of our branches today and enjoy delectable pastries from our Bakery, sumptuous meals at our Deli, fresh cuts at the Butchery and so much more!\r\n\r\nUnique Value Proposition:\r\n\r\nFresh &amp; Easy. Price Guarantee!', 'company', '2022-03-22 07:05:12', 1),
(4, 14, '/uploads/national_id.webp', '/uploads/ClientImageSunMay01202212:20D9lGXtQXYAEalMK.jpeg', 'Rivatex Limited', 'Rivatext is an integrated textile factory that converts cotton lint through various processes to finished fabrics.', 'company', '2022-05-01 12:20:11', 1),
(5, 15, '/uploads/ClientIdImageThuMay1220227:31id_m.jpeg', '/uploads/ClientImageThuMay1220227:31A10.jpg.jpeg', 'Ukali Industrialists', 'Hardware', 'company', '2022-05-12 07:31:35', 1),
(6, 18, '/uploads/ClientIdImageMonMay16202211:11id_f.jpeg', '/uploads/ClientImageMonMay16202211:11office-5.jpeg', 'Tkom', 'It was among the first mobile network operators to pitch camp in Kenya, enabling Kenyans to enjoy the use of mobile phones.', 'company', '2022-05-16 08:11:32', 1),
(7, 19, '/uploads/ClientIdImageMonMay16202211:17id_f.jpeg', '/uploads/ClientImageMonMay16202211:17office2.jpeg', 'Kenya Breweries Limited', 'It specializes in the production of beer, spirits, and non-alcoholic drinks. I', 'company', '2022-05-16 08:17:06', 1),
(8, 20, '/uploads/ClientIdImageMonMay16202211:30id_m.jpeg', '/uploads/ClientImageMonMay16202211:30office.jpeg', 'Dema Sacco', 'Its intention was and still is to finance customers in the low-income bracket.', 'company', '2022-05-16 08:30:28', 1),
(9, 21, '/uploads/ClientIdImageMonMay16202211:35raise-hands.jpeg', '/uploads/ClientImageMonMay16202211:35tech.jpeg', 'Taita airways', 'The airline is owned both publicly and privately while the Kenyan government owns the largest share.', 'company', '2022-05-16 08:35:56', 1),
(10, 22, '/uploads/ClientIdImageMonMay16202211:42id_f.jpeg', '/uploads/ClientImageMonMay16202211:42lady-office.jpeg', 'Buyaki', 'My personal work', 'individual', '2022-05-16 08:42:27', 1),
(11, 23, '/uploads/ClientIdImageMonMay16202212:33id_m.jpeg', '/uploads/ClientImageMonMay16202212:33man-dark-room.jpeg', 'Personal (Juma)', 'I am a businessman', 'individual', '2022-05-16 09:33:11', 1),
(12, 24, '/uploads/ClientIdImageMonMay16202212:40id_f.jpeg', '/uploads/ClientImageMonMay16202212:40office-5.jpeg', 'Gari Tobacco Kenya Limited', 'It specializes in the manufacturing of cigarettes for both domestic and export use.\r\n\r\nIt began its operations in Kenya in 1907 and has since then experienced robust growth hence becoming the leader in cigarette manufacturing.', 'individual', '2022-05-16 09:40:24', 1),
(13, 25, '/uploads/ClientIdImageMonMay16202212:46id_m.jpeg', '/uploads/ClientImageMonMay16202212:46man-suit.jpeg', 'Sisati Cement', 'The company is based in the limestone-rich coastal region, and the company produces cement for export to other countries.', 'company', '2022-05-16 09:46:27', 1),
(14, 26, '/uploads/ClientIdImageMonMay16202212:55id_f.jpeg', '/uploads/ClientImageMonMay16202212:55lady-cuup.jpeg', 'Nyambura cyber', 'Nyambura cyber', 'individual', '2022-05-16 09:55:16', 1),
(15, 27, '/uploads/ClientIdImageMonMay16202213:01id_m.jpeg', '/uploads/ClientImageMonMay16202213:01raise-hands.jpeg', 'Kingsway Group', 'Agriculture', 'company', '2022-05-16 10:01:40', 1),
(16, 28, '/uploads/ClientIdImageMonMay16202211:11id_f.jpeg', '/uploads/ClientImageMonMay16202211:11office-5.jpeg', 'Escada America', 'It was among the first mobile network operators to pitch camp in Kenya, enabling Kenyans to enjoy the use of mobile phones.', 'company', '2022-05-16 08:11:32', 1),
(17, 29, '/uploads/ClientIdImageMonMay16202211:17id_f.jpeg', '/uploads/ClientImageMonMay16202211:17office2.jpeg', 'ABC Carpet & Home Breweries Limited', 'It specializes in the production of beer, spirits, and non-alcoholic drinks. I', 'company', '2022-05-16 08:17:06', 1),
(18, 30, '/uploads/ClientIdImageMonMay16202211:30id_m.jpeg', '/uploads/ClientImageMonMay16202211:30office.jpeg', 'Lorna Jane ', 'Its intention was and still is to finance customers in the low-income bracket.', 'company', '2022-05-16 08:30:28', 1),
(19, 31, '/uploads/ClientIdImageMonMay16202211:35raise-hands.jpeg', '/uploads/ClientImageMonMay16202211:35tech.jpeg', 'Sequential Brands Group', 'The airline is owned both publicly and privately while the Kenyan government owns the largest share.', 'company', '2022-05-16 08:35:56', 1),
(20, 32, '/uploads/ClientIdImageMonMay16202211:42id_f.jpeg', '/uploads/ClientImageMonMay16202211:42lady-office.jpeg', 'Chege & daughters', 'My personal work', 'individual', '2022-05-16 08:42:27', 1),
(21, 33, '/uploads/ClientIdImageMonMay16202212:33id_m.jpeg', '/uploads/ClientImageMonMay16202212:33man-dark-room.jpeg', 'Personal (Waweru)', 'I am a businessman', 'individual', '2022-05-16 09:33:11', 1),
(22, 34, '/uploads/ClientIdImageMonMay16202212:40id_f.jpeg', '/uploads/ClientImageMonMay16202212:40office-5.jpeg', 'Alex and Ani ', 'It specializes in the manufacturing of cigarettes for both domestic and export use.\r\n\r\nIt began its operations in Kenya in 1907 and has since then experienced robust growth hence becoming the leader in cigarette manufacturing.', 'individual', '2022-05-16 09:40:24', 1),
(23, 35, '/uploads/ClientIdImageMonMay16202212:46id_m.jpeg', '/uploads/ClientImageMonMay16202212:46man-suit.jpeg', 'Washington Prime Group', 'The company is based in the limestone-rich coastal region, and the company produces cement for export to other countries.', 'company', '2022-05-16 09:46:27', 1),
(24, 36, '/uploads/ClientIdImageMonMay16202212:55id_f.jpeg', '/uploads/ClientImageMonMay16202212:55lady-cuup.jpeg', 'The Collected Group', 'Nyambura cyber', 'individual', '2022-05-16 09:55:16', 1),
(25, 37, '/uploads/ClientIdImageMonMay16202213:01id_m.jpeg', '/uploads/ClientImageMonMay16202213:01raise-hands.jpeg', 'Paper Source', 'Agriculture', 'company', '2022-05-16 10:01:40', 1),
(26, 158, '/uploads/ClientIdImageWedMay2520228:39code.jpeg', '/uploads/ClientImageWedMay2520228:39code.jpeg', 'Maiores dolorum in u', 'Velit eiusmod non as', 'individual', '2022-05-25 05:39:09', 1);

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`id`, `user_id`, `national_id`, `title`, `description`, `years_of_experience`, `time_created`, `is_active`) VALUES
(10, 12, '/uploads/national_id.webp', 'Creative software engineer &amp; graphic designer', 'Highly experienced, creative, and multitalented Software engineer and Graphic Designer with an extensive background in web, marketing multimedia, and print design. Exceptional collaborative and interpersonal skills; very strong team player with well-developed written and verbal communication abilities. Experienced at producing high-end business-to-business and consumer-facing designs; talented at building and maintaining partnerships. Passionate and accustomed to performing in deadline-driven environments.', 5, '2022-03-22 07:54:52', 1),
(11, 13, '/uploads/national_id.webp', 'Content marketing professional', 'I am a content marketing professional at HubSpot, an inbound marketing and sales platform that helps companies attract visitors, convert leads, and close customers. \nPreviously, I worked as a marketing manager for a tech software startup. He graduated with honors from The Catholic University of Eastern Africa with a dual degree in Business Administration and Creative Writing. I am also a highly creative and multitalented Graphic Designer with extensive experience in multimedia, marketing, and print design. ', 2, '2022-03-22 09:02:23', 1),
(12, 16, '/uploads/ClientIdImageThuMay1220227:28id_f.jpeg', 'Data entry expert', 'Data entry expert', 3, '2022-05-12 07:28:39', 1),
(13, 159, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Dolore ipsum volupt', 'Voluptatem enim cum', 1972, '2022-05-25 05:48:37', 1),
(14, 46, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(15, 56, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(16, 48, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(17, 45, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(18, 55, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(19, 50, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(20, 44, '/uploads/ClientIdImageThuMay1220227:28id_f.jpeg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(21, 54, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(22, 52, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(23, 47, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(24, 57, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(25, 49, '/uploads/ClientIdImageThuMay1220227:28id_f.jpeg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(26, 53, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(27, 51, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(28, 146, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(29, 148, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(30, 145, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(31, 150, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(32, 144, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(33, 154, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(34, 152, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(35, 147, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(36, 149, '/uploads/ClientIdImageWedMay2520228:48explorers_on_the_moon.jpg', 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(37, 153, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1),
(38, 151, NULL, 'Sample title', 'Sample description', 5, '2022-06-19 12:24:01', 1);

--
-- Dumping data for table `freelancer_skill`
--

INSERT INTO `freelancer_skill` (`id`, `freelancer_id`, `skill_id`) VALUES
(40, 10, 1),
(41, 10, 2),
(38, 10, 4),
(39, 10, 5),
(44, 10, 33),
(5, 11, 2),
(6, 11, 3),
(9, 11, 4),
(10, 11, 15),
(45, 11, 33),
(11, 12, 9),
(12, 12, 10),
(46, 12, 33),
(42, 13, 15),
(43, 13, 32),
(49, 14, 33),
(59, 15, 33),
(51, 16, 33),
(48, 17, 33),
(58, 18, 33),
(53, 19, 33),
(47, 20, 33),
(57, 21, 33),
(55, 22, 33),
(50, 23, 33),
(60, 24, 33),
(52, 25, 33),
(56, 26, 33),
(54, 27, 33),
(63, 28, 33),
(65, 29, 33),
(62, 30, 33),
(67, 31, 33),
(61, 32, 33),
(64, 35, 33),
(66, 36, 33),
(68, 38, 33);

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `client_id`, `title`, `description`, `image`, `pay_rate_per_hour`, `expected_duration_in_hours`, `receive_job_proposals_deadline`, `time_created`, `is_active`) VALUES
(5, 2, 'Social media posts', 'Person responsible for overseeing a company’s interactions with the public by implementing social media platforms’ content strategies. Their duties include analyzing engagement data, identifying trends in customer interactions and planning digital campaigns to build community online.', '/uploads/ClientJobImageWedMar2320227:56images.png', 20, 5, '2022-03-29 15:07:00', '2022-03-23 07:56:09', 1),
(6, 2, 'Flutter App developer', 'Looking for a flutter app developer to assist in updating and correcting a few bugs on an existing App, Should be able to code and understand best practices in Flutter and Dart and can deploy IOS and Android on the Play Store and Appstore. An Understanding of Firebase, Git, and API interaction with the backend and app testing too is key. &bull; Developed 2+ iOS/Android apps with Flutter, either deployed on the AppStore/Google Play or available on Github', '/uploads/ClientJobImageThuMar2420226:14images.png', 2000, 20, '2022-04-30 09:11:00', '2022-03-24 06:14:02', 1),
(7, 2, 'Python Django Developer Needed', 'A full-stack developer is needed. Strong knowledge of Python and Django is needed.\r\n\r\nRequirements:\r\n- Strong knowledge and experience with Python and Django.\r\n- Intermediate knowledge and experience with Vue and Nuxt js.\r\n- Intermediate knowledge and experience with HTML/CSS/JavaScript.\r\n- Attention to detail.\r\n- The developer should create several apis using Django framework.\r\n- AWS experience as well.\r\n- Previous experience with building websites and portals that consist of customer and admin pages.\r\n- Experience working with asynchronous celery tasks\r\n- Comfortable working with multiple 3rd party services\r\n\r\n\r\nIf the work is completed on time and in a satisfactory manner, additional work will be given.', '/uploads/ClientJobImageMonApr18202210:09555.jpg', 3000, 168, '2022-05-04 13:08:00', '2022-04-18 10:09:00', 1),
(8, 2, 'I need a software engineer ( developer) to work on an ongoing project.', 'It\'s a platform that requires many microservices & functionalities built into or around it for effective use.\r\n\r\nThe development requirements are;\r\n\r\nFor frontend engineer minimum requirements:\r\nHTML, CSS, Javascript, React Js, GraphQL, Apollo GraphQL, Apollo Federation\r\n\r\nFor back-end engineer minimum requirements:\r\n\r\nPython(Django framework), PostgreSQL, GraphQL, Microservices, Docker, Apollo Federation and API design', '/uploads/ClientJobImageThuMar2420226:14images.png', 2500, 15, '2022-05-03 09:11:00', '2022-04-24 06:14:02', 1),
(9, 2, 'Freelance proof readers wanted', 'Tasks:\r\n1) Transfer data from paper formats into computer files or database systems using keyboards, data recorders or optical scanners\r\n2) Type in data provided directly from customers\r\n3) Create spreadsheets with large numbers of figures without mistakes\r\n4) Verify data by comparing it to source documents\r\n5) Update existing data\r\n6) Retrieve data from the database or electronic files as requested\r\n7) Perform regular backups to ensure data preservation\r\n8) Sort and organize paperwork after entering data to ensure it is not lost', '/uploads/ClientJobImageSunMay01202212:04silicon-valley-1.jpg', 1000, 40, '2022-05-02 15:03:00', '2022-05-01 12:04:00', 1),
(10, 4, 'Data Center IT Level 2 Support Technician', 'Position Overview and Objectives:\n&bull; Take queries from Level 1 technicians to facilitate in-depth troubleshooting and backend analysis.\n&bull; Review the work order from a Level 1 technician to determine how much support was provided, what the client issue is, and how long the client has worked with the Level 1 technician.\n&bull; Provide swift break-fix support and resolution.\n&bull; Communicate with the user for an in-depth analysis of the problem before providing a solution.\n&bull; Quickly determine if issues require communication up to Level 3 technician for SME support.\n&bull; Provide extensive troubleshooting support, as needed.\n&bull; Provide programming support associated with the software, as needed.\n&bull; Perform hardware installations (rack/stack) and cable installations (routing, terminating, structured cabling), including troubleshooting and testing. Perform hardware decommission and cable removal.\n&bull; Perform remote hands support (e.g., power cycles, physical environment, and cabling inspections, swap out failed components, hardware upgrades, testing of copper and fiber cables, handling storage media, and enter troubleshooting commands).\n&bull; Prepare and coordinate incoming/outgoing shipments. Compare packing lists with purchase details to ensure correct make, model, and quantities are received and receipted.\n&bull; Support Service Management and related processes (e.g., Service Request, Incident, Change) by creating, updating, and closing associated tickets. Oversee and support Physical access processes to maintain secure Data Center facilities.\n&bull; Play an active role in managing the execution of the Power Maintenance Events.\n&bull; Oversee, track, maintain, order adequate sparing, cabinets, and consumable levels.\n&bull; Perform physical audits and ensure the Service Management database is updated and accurate.\n&bull; Handle tape backup media and prepare for offsite storage if applicable.\n&bull; Collaborate and maintain business relationships to meet and exceed client expectations with respect to business as usual and project activities.\n&bull; Train and provide oversight to improve service levels.\n&bull; Manage projects &ndash; Build Center Solution tools, space planning, power requirements, cabling requirements. Work with CSE staff, order cables and related supplies.\n&bull; Allocate job tasks to staff. May maintain staff&rsquo;s shift scheduling and approve timecards.\n&bull; May carry out performance reviews. Ensure staff performance is of the highest standards and meets service metrics.\n&bull; Act as a point of escalation.', '/uploads/ClientJobImageSunMay01202212:25freelance-it-support-technician.jpeg', 300, 200, '2022-05-06 15:23:00', '2022-05-01 12:25:34', 1),
(11, 4, 'We need someone to upgrade our mailing server', 'Hi everyone ,\nWe have our mailing system hosted on our private dedicated server , but we have some problems building a good reputation and we need to improve our sending stability .\nOur goal is to reach a sending volume of 100k email per day and those emails must go to inbox to all mailboxes like Gmail , Outlook , Hotmail , GMX , Orange etc..\nSo please we need freelancer that can do this job for us .\n++ Additional  information ++\nIf this is required us to buy another service to improve our work please attach details and we will negotiate with the price .\nIf we find you good we may invite you to work with us daily .\nGood luck. Access the server here: https://bit.ly/3Kzf4yW', '/uploads/ClientJobImageSunMay01202212:28freelance-it-support-technician.jpeg', 5000, 10, '2022-05-05 15:28:00', '2022-05-01 12:28:56', 1),
(12, 4, 'HIGHLY SKILLED COPYWRITER/PRODUCTLlSTER', 'As the title says we are looking for a great productlister/copywriter!\r\n\r\nWe already have someone for the basic listings. Now we need someone who can make the perfect productpage in case our company has a winning product.\r\n\r\nThis means:\r\n- You&#039;re a great copywriter\r\n- You know how to make a converting productpage including GIF&#039;s , pictures etc.\r\n- You can edit GIF&#039;s and pictures yourself\r\n\r\nWe will provide you:\r\n- The previous, more simple version of the product page.\r\n- The competitors link and video\r\n- The template which you can use to make the productpage look better\r\n\r\nIf you think you are the right fit for this job, please send us a message with previous productpages you have made. In this case we are only looking for people with experience!', '/uploads/ClientJobImageMonMay0220224:32download.jpeg', 1000, 40, '2022-05-17 07:31:00', '2022-05-02 04:32:35', 1),
(13, 6, 'Accounting', 'How do I set up accounts for a tiktok marketing account?', '/uploads/ClientJobImageMonMay16202211:13office-vr.jpeg', 50, 1, '2022-05-19 11:13:00', '2022-05-16 08:13:43', 1),
(14, 6, 'Review our product', 'How does our product at paulonteri.com look like?', '/uploads/ClientJobImageMonMay16202211:14office2.jpeg', 30, 1, '2022-05-21 11:14:00', '2022-05-16 08:14:51', 1),
(15, 2, 'Send us guide', 'Send us guide on how to move from heroku to google cloud', '/uploads/ClientJobImageMonMay16202211:18tech.jpeg', 100, 1, '2022-05-24 11:17:00', '2022-05-16 08:18:19', 1),
(16, 7, 'How to quickly get work visa for employees', 'Send us tips on how to quickly get work visa for employees', '/uploads/ClientJobImageMonMay16202211:19men-suits.jpeg', 100000, 5, '2022-05-26 11:19:00', '2022-05-16 08:19:45', 1),
(17, 2, 'Create users CSV', 'Create 1000 users for us and add it to a CSV', '/uploads/ClientJobImageMonMay16202211:32raise-hands.jpeg', 1000, 40, '2022-05-24 11:31:00', '2022-05-16 08:32:13', 1),
(18, 8, 'Create logo for our website', 'Create logo for our website paulonteri.com', '/uploads/ClientJobImageMonMay16202211:33engineer.jpeg', 2000, 38, '2022-05-22 11:32:00', '2022-05-16 08:33:09', 1),
(19, 9, 'Create illustrations to show happy customers', 'Create illustrations to show happy customers', '/uploads/ClientJobImageMonMay16202211:37man-suit.jpeg', 5000, 80, '2022-05-24 11:36:00', '2022-05-16 08:37:23', 1),
(20, 9, 'Guide on how to licence 1000 windows computers', 'Guide on how to licence 1000 windows computers', '/uploads/ClientJobImageMonMay16202211:38lady-office.jpeg', 10000, 30, '2022-05-26 11:38:00', '2022-05-16 08:38:46', 1),
(21, 10, 'Help promote IG page', 'Guide on how to promote IG page https://www.instagram.com/paulonteri/', '/uploads/ClientJobImageMonMay16202211:44office-vr.jpeg', 9999, 25, '2022-05-26 11:43:00', '2022-05-16 08:44:01', 1),
(22, 10, 'How to set up LLC', 'Send me a guide on how to set up an LLC in Kenya', '/uploads/ClientJobImageMonMay16202211:45men-suits.jpeg', 5000, 5, '2022-05-25 11:44:00', '2022-05-16 08:45:08', 1),
(23, 11, 'Nairobi pictures', 'Send me Nairobi pictures', '/uploads/ClientJobImageMonMay16202212:34office-vr.jpeg', 9000, 10, '2022-05-24 12:33:00', '2022-05-16 09:34:16', 1),
(24, 11, 'Create for me a photography website in Python', 'Create for me a photography website in Python', '/uploads/ClientJobImageMonMay16202212:35tech.jpeg', 8888, 20, '2022-05-26 12:35:00', '2022-05-16 09:35:16', 1),
(25, 12, 'Research on how to set up a cyber in Karen', 'Research on how to set up a cyber in Karen', '/uploads/ClientJobImageMonMay16202212:41office-6.jpeg', 500, 40, '2022-06-01 12:41:00', '2022-05-16 09:41:37', 1),
(26, 12, 'Write copy for my website', 'Write copy for my website paulonteri.com', '/uploads/ClientJobImageMonMay16202212:42office2.jpeg', 5678, 17, '2022-05-25 12:42:00', '2022-05-16 09:42:42', 1),
(27, 13, 'Create 20 Instagram posts for us', 'Create 20 Instagram posts for us', '/uploads/ClientJobImageMonMay16202212:47office-vr.jpeg', 5555, 15, '2022-05-30 12:47:00', '2022-05-16 09:47:45', 1),
(28, 13, 'Fill in our survey', 'Fill in our survey located at paulonteri.com/survey', '/uploads/ClientJobImageMonMay16202212:49lady-office.jpeg', 500, 2, '2022-05-26 12:48:00', '2022-05-16 09:49:08', 1),
(29, 14, 'Convert to text', 'Convert the voice here bit.ly/sdsd to text', '/uploads/ClientJobImageMonMay16202212:56raise-hands.jpeg', 3000, 2, '2022-05-25 12:56:00', '2022-05-16 09:56:44', 1),
(30, 14, 'Translate website to Kiswahili', 'Translate website paulonteri.com to Kiswahili', '/uploads/ClientJobImageMonMay16202212:57tech.jpeg', 4000, 10, '2022-06-04 12:57:00', '2022-05-16 09:57:56', 0),
(31, 15, 'Check on the UX of our app', 'Check on the UX of our app Tala on playstore and submit a report', '/uploads/ClientJobImageMonMay16202213:03raise-hands.jpeg', 7000, 45, '2022-05-19 13:02:00', '2022-05-16 10:03:31', 1),
(32, 15, 'Mark stale issues as stale', 'Mark stale issues as stale in our open source repo https://github.com/paulonteri/freelance-marketplace/', '/uploads/ClientJobImageMonMay16202213:04tech.jpeg', 1000, 40, '2022-05-25 13:04:00', '2022-05-16 10:04:33', 1),
(33, 2, 'Sample', 'Sample Desc', '/uploads/ClientJobImageWedMay1820229:56lady-office.jpeg', 5000, 10, '2022-05-19 09:55:00', '2022-05-18 06:56:15', 0),
(34, 2, 'Quisquam adipisci iu', 'Mollit nemo autem si', '/uploads/ClientJobImageSatMay21202211:22db_schema.png', 64899, 32648, '2022-05-26 01:19:00', '2022-05-21 08:22:47', 0),
(35, 2, 'Aperiam repellendus', 'Sit perferendis lab', '/uploads/ClientJobImageWedMay2520227:43whiteboard.jpeg', 70128, 43957, '2023-11-05 15:15:00', '2022-05-25 04:43:17', 0),
(36, 2, 'Sample', 'Sint qui quasi conse', '/uploads/ClientJobImageWedMay2520227:58amazon.png', 45894, 79502, '2023-03-26 09:03:00', '2022-05-25 04:58:06', 0),
(37, 26, 'Rerum incididunt ad', 'Ut et ullam exceptur', '/uploads/ClientJobImageWedMay2520228:39code.jpeg', 69268, 56326, '2023-08-05 02:45:00', '2022-05-25 05:39:53', 1),
(38, 2, 'Suscipit reprehender', 'Mollitia aut dolore', '/uploads/ClientJobImageWedMay2520229:31aviator.jpeg', 28822, 31456, '2023-08-21 19:19:00', '2022-05-25 06:31:33', 1),
(39, 2, 'Sample 10', 'Aspernatur fugit en', '/uploads/ClientJobImageFriMay2720229:17aviator.jpeg', 57760, 9624, '2022-06-14 19:56:00', '2022-05-27 06:17:45', 1);

--
-- Dumping data for table `job_payment`
--

INSERT INTO `job_payment` (`id`, `job_id`, `phone_number`, `amount`, `is_payment_successful`, `response_merchant_request_id`, `response_checkout_request_id`, `response_response_code`, `callback_result_code`, `callback_result_desc`) VALUES
(1, 33, '254703130580', 1, 0, '63598-13796786-1', 'ws_CO_18052022145856358703130580', '0', NULL, NULL),
(2, 33, '254703130580', 1, 0, '53786-55006352-1', 'ws_CO_18052022150337133703130580', '0', NULL, NULL),
(3, 33, '254703130580', 1, 0, '27542-57927042-1', 'ws_CO_18052022154647572703130580', '0', NULL, NULL),
(4, 33, '254703130580', 1, 0, '15946-13133768-1', 'ws_CO_18052022163329539703130580', '0', '0', 'The service request is processed successfully.'),
(5, 33, '254703130580', 1, 0, '27542-58051285-1', 'ws_CO_18052022164408772703130580', '0', '1032', 'Request cancelled by user'),
(6, 33, '254703130580', 1, 0, '27528-58055237-1', 'ws_CO_18052022164554555703130580', '0', NULL, NULL),
(7, 33, '254703130580', 1, 0, '46626-56749368-1', 'ws_CO_18052022164648702703130580', '0', '17', 'Rule limited.'),
(8, 33, '254703130580', 1, 1, '15945-13166164-1', 'ws_CO_18052022164805451703130580', '0', '0', 'The service request is processed successfully.'),
(9, 34, '254769290772', 1, 0, '32107-738146-1', 'ws_CO_21052022113751889769290772', '0', NULL, NULL),
(10, 34, '254703130580', 1, 1, '86348-117174-1', 'ws_CO_21052022114744503703130580', '0', '0', 'The service request is processed successfully.'),
(11, 30, '254703130580', 1, 0, '32088-5762351-1', 'ws_CO_23052022145215250703130580', '0', NULL, NULL),
(12, 30, '254703130580', 1, 0, '27517-69551719-1', 'ws_CO_23052022145325342703130580', '0', NULL, NULL),
(13, 30, '254703130580', 1, 1, '32091-5767474-1', 'ws_CO_23052022145435248703130580', '0', '0', 'The service request is processed successfully.'),
(14, 17, '254703130580', 1, 0, '27523-71422343-1', 'ws_CO_24052022111843422703130580', '0', NULL, NULL),
(15, 17, '254703130580', 1, 0, '65102-7291351-1', 'ws_CO_24052022111957349703130580', '0', NULL, NULL),
(16, 17, '254703130580', 1, 0, '23978-3103269-1', 'ws_CO_24052022112156132703130580', '0', '1032', 'Request cancelled by user'),
(17, 17, '254703130580', 1, 0, '23978-3103269-2', 'ws_CO_24052022112219176703130580', '0', NULL, NULL),
(18, 17, '254703130580', 11, 1, '27520-71430774-2', 'ws_CO_24052022112303634703130580', '0', '0', 'The service request is processed successfully.'),
(19, 35, '254703130580', 18, 1, '86348-9053346-1', 'ws_CO_25052022074324926703130580', '0', '0', 'The service request is processed successfully.'),
(20, 37, '254703130580', 43, 1, '19161-9587320-2', 'ws_CO_25052022084006981703130580', '0', '0', 'The service request is processed successfully.'),
(21, 37, '254703130580', 42, 0, '53767-69910790-1', 'ws_CO_25052022085418468703130580', '0', NULL, NULL),
(22, 37, '254703130580', 41, 0, '41147-5120015-2', 'ws_CO_25052022085555654703130580', '0', '0', 'The service request is processed successfully.'),
(23, 37, '254703130580', 49, 0, '23970-5144251-1', 'ws_CO_25052022085803592703130580', '0', NULL, NULL),
(24, 37, '254703130580', 47, 0, '19144-9617098-1', 'ws_CO_25052022085824027703130580', '0', NULL, NULL),
(25, 37, '254703130580', 14, 0, '86354-9172260-2', 'ws_CO_25052022085853173703130580', '0', NULL, NULL),
(26, 37, '254703130580', 15, 0, '23970-5151381-1', 'ws_CO_25052022090209960703130580', '0', NULL, NULL),
(27, 37, '254703130580', 12, 0, '27540-73498407-1', 'ws_CO_25052022090601708703130580', '0', NULL, NULL),
(28, 37, '254703130580', 42, 0, '86348-9190631-1', 'ws_CO_25052022090916743703130580', '0', NULL, NULL),
(29, 37, '254703130580', 29, 0, '23985-5165732-2', 'ws_CO_25052022091044069703130580', '0', NULL, NULL),
(30, 38, '254703130580', 26, 0, '53785-69973413-1', 'ws_CO_25052022093143822703130580', '0', NULL, NULL),
(31, 38, '254703130580', 24, 1, '57073-70063367-1', 'ws_CO_25052022093519545703130580', '0', '0', 'The service request is processed successfully.'),
(32, 8, '254703130580', 24, 0, '57059-70065878-1', 'ws_CO_25052022093645703703130580', '0', NULL, NULL),
(33, 8, '254703130580', 20, 1, '21173-9311422-1', 'ws_CO_25052022093712945703130580', '0', '0', 'The service request is processed successfully.'),
(34, 5, '254703130580', 39, 1, '23963-5216624-1', 'ws_CO_25052022093929596703130580', '0', '0', 'The service request is processed successfully.'),
(35, 6, '254703130580', 19, 0, '41148-5197259-1', 'ws_CO_25052022093956823703130580', '0', NULL, NULL),
(36, 39, '254725695782', 23, 0, '57076-74524802-2', 'ws_CO_27052022091900971725695782', '0', NULL, NULL),
(37, 39, '254703130580', 48, 1, '32088-14464965-1', 'ws_CO_27052022092100232703130580', '0', '0', 'The service request is processed successfully.');

--
-- Dumping data for table `job_payment_dispatch`
--

INSERT INTO `job_payment_dispatch` (`id`, `job_payment_id`, `is_refund`, `phone_number`, `amount`, `is_dispatch_successful`, `response_conversation_id`, `response_originator_conversation_id`, `response_response_code`) VALUES
(10, 13, 1, '254703130580', 1, 0, 'AG_20220523_20102c0b5f25c026e5b0', '19156-5881860-1', '0'),
(11, 13, 1, '254703130580', 1, 0, 'AG_20220523_20102cfa35d8bc8db292', '21168-5513746-2', '0'),
(12, 18, 0, '254762307628', 11, 0, 'AG_20220524_201025643fe9897cf6ad', '27538-71446558-1', '0'),
(13, 20, 0, '254730652592', 50, 0, 'AG_20220525_20104cd99afdd32df0ea', '41147-5154867-2', '0'),
(14, 37, 1, '254703130580', 30, 0, 'AG_20220527_2010570c9327d621d68c', '57081-74549870-1', '0');

--
-- Dumping data for table `job_proposal`
--

INSERT INTO `job_proposal` (`id`, `status`, `title`, `description`, `job_id`, `freelancer_id`, `submission_description`, `submission_attachment`, `client_comment`, `time_work_starts`, `time_work_ends`, `24_hr_expiry_email_sent`, `time_created`, `is_active`) VALUES
(1, 'completed successfully', 'Flutter Developer & UI/UX Designer', 'I have mastered the art of states and widgets in Flutter, making it my preferred UI tool. I have vast experience working with Flutter, coupled with other technologies to create full-scale apps.\r\nSuch as both SQL(PostgreSQL,Mysql) and NoSQL(MongoDB) databases and python(flask,DRF,fastapi) or Js(Node) for backend Solutions. Open to working with you.', 6, 10, 'I have completed the task', '/uploads/FreelancerWorkCompleteFileMonApr18202215:47work.zip', NULL, NULL, NULL, 0, '2022-03-24 08:36:04', 1),
(2, 'withdrawn', 'I am an experienced social media manager', 'I would like to express my strong interest in the Social Media Manager position for the stated time. I am confident that my previous success as a social media manager, as well as my strong communication and collaboration skills, make me an ideal candidate for the position.\r\n\r\nI have ten years of experience in marketing, and I have spent the last five of those years as a Social Media Manager. My most recent campaign for Acme Corp. led to an increase of over 35% in inbound traffic for Acme’s website. Through a combination of creative social media marketing strategies and thorough monitoring of success through media analytics, KPIs, and dashboards, I can assure you of a similar rate of success.\r\n\r\nI am confident that my experience as well as my ability to collaborate and communicate, make me a strong candidate for the Social Media Manager.  Thank you so much for your time and consideration.', 5, 10, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-27 11:17:58', 1),
(4, 'accepted', 'Qualified Software Engineer', 'I have training in the above skills', 7, 10, NULL, NULL, NULL, NULL, NULL, 0, '2022-04-18 10:24:26', 1),
(5, 'accepted', 'I host my own mailing server', 'I am used to performing such tasks', 11, 10, NULL, NULL, NULL, NULL, NULL, 0, '2022-05-01 12:32:30', 1),
(6, 'accepted', 'Qualified Software Engineer', 'I have training in the above skills', 8, 10, NULL, NULL, NULL, NULL, NULL, 0, '2022-05-01 12:33:19', 1),
(7, 'accepted', 'I have vast experience in data centre management', 'Motivated IT support technician seeks new position in dynamic, growth-oriented company focused on cultivating exceptional customer experience and a positive work environment. With experience handling networking concerns, implementing new software, installing new hardware, and addressing user concerns, I bring attention to detail and a dedication to technical improvement to each job. Past achievements include new network architecture component selection and implementation, earning leading industry certifications, and driving the achievement of departmental goals.', 10, 10, NULL, NULL, NULL, NULL, NULL, 0, '2022-05-02 05:02:23', 1),
(8, 'accepted', 'Used to working with such data all day', 'I would like to give it my all', 9, 11, NULL, NULL, NULL, NULL, NULL, 0, '2022-05-02 05:18:45', 1),
(9, 'rejected', 'Former Software Developer', 'I am farmiliar with some of the technology above', 8, 11, NULL, NULL, NULL, NULL, NULL, 0, '2022-05-02 05:19:38', 1),
(10, 'rejected', 'Former Software Engineer', 'As the title says, I am a former software developer and would like to give this task a try', 7, 11, NULL, NULL, NULL, NULL, NULL, 0, '2022-05-02 05:20:23', 1),
(11, 'accepted', 'Experienced copywriter', 'Creative wordsmith dedicated to crafting messages worthwhile remembering. I believe stories are key to human connection, and storytelling is my passion. Let&rsquo;s get into each other.', 12, 11, NULL, NULL, NULL, NULL, NULL, 0, '2022-05-02 05:22:11', 1),
(13, 'sent', 'Sample proposal 1', 'Sample proposal 1 desc', 33, 10, NULL, NULL, NULL, NULL, NULL, 0, '2022-05-18 10:56:50', 1),
(14, 'completed successfully', 'Sample 24th', 'Sample 24th', 15, 10, 'dsdsdsd', '/uploads/FreelancerWorkCompleteFileTueMay24202211:00example-work.zip', NULL, NULL, NULL, 0, '2022-05-24 07:47:03', 1),
(15, 'completed successfully', 'Another Sample', 'Another Sample Desc', 17, 10, 'Sample Submit work', '/uploads/FreelancerWorkCompleteFileTueMay24202211:14example-work.zip', NULL, NULL, NULL, 0, '2022-05-24 08:07:16', 1),
(16, 'completed successfully', 'Ut velit in enim qu', 'Est dolor in ut sed', 37, 13, 'Quo velit expedita', '/uploads/FreelancerWorkCompleteFileWedMay2520229:15work1done.zip', NULL, NULL, NULL, 0, '2022-05-25 06:14:48', 1),
(17, 'completed unsuccessfully', 'Sample 10', 'Voluptas reiciendis', 39, 10, 'Sample 10', '/uploads/FreelancerWorkCompleteFileFriMay2720229:30work1done.zip', NULL, NULL, NULL, 0, '2022-05-27 06:25:58', 1),
(18, 'accepted', 'qwerty', 'qwerty qwerty', 38, 10, NULL, NULL, NULL, '2022-06-08 10:32:27', '2022-06-09 02:32:27', 0, '2022-06-08 10:29:20', 1);

--
-- Dumping data for table `job_rating`
--

INSERT INTO `job_rating` (`id`, `job_id`, `type`, `rating`, `comment`) VALUES
(1, 6, 'freelancer', 4, 'GOOD WORK!'),
(3, 6, 'client', 3, 'Good to work with!'),
(4, 15, 'freelancer', 5, 'Great working with you!'),
(5, 15, 'client', 5, 'Good time'),
(10, 17, 'freelancer', 3, 'Finished on time!'),
(11, 37, 'freelancer', 5, 'Thanks for the work'),
(12, 37, 'client', 3, 'Easy going');

--
-- Dumping data for table `job_skill`
--

INSERT INTO `job_skill` (`id`, `job_id`, `skill_id`) VALUES
(7, 5, 8),
(19, 5, 15),
(8, 6, 1),
(10, 6, 2),
(9, 7, 1),
(11, 8, 1),
(12, 9, 9),
(13, 10, 5),
(14, 11, 1),
(15, 11, 5),
(16, 12, 3),
(17, 12, 8),
(18, 12, 15),
(20, 13, 11),
(22, 14, 17),
(21, 14, 20),
(23, 14, 31),
(24, 15, 28),
(26, 16, 7),
(25, 16, 17),
(27, 17, 9),
(28, 18, 4),
(29, 19, 4),
(30, 19, 30),
(31, 20, 5),
(33, 21, 8),
(32, 21, 15),
(34, 22, 7),
(35, 23, 18),
(36, 24, 1),
(37, 25, 29),
(38, 26, 16),
(40, 27, 8),
(39, 27, 15),
(41, 28, 31),
(42, 29, 14),
(43, 30, 13),
(45, 31, 1),
(46, 31, 2),
(47, 31, 10),
(44, 31, 20),
(48, 32, 1),
(49, 32, 19),
(50, 33, 1),
(51, 33, 29),
(52, 34, 28),
(53, 35, 17),
(54, 36, 28),
(61, 37, 2),
(55, 37, 4),
(56, 37, 5),
(57, 37, 7),
(62, 37, 10),
(60, 37, 13),
(58, 37, 15),
(63, 37, 19),
(59, 37, 31),
(64, 37, 32),
(75, 38, 3),
(69, 38, 7),
(72, 38, 8),
(67, 38, 9),
(74, 38, 10),
(73, 38, 13),
(70, 38, 15),
(71, 38, 16),
(66, 38, 17),
(65, 38, 20),
(68, 38, 30),
(76, 39, 11);

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `type`, `action`, `ip_address`, `time_created`) VALUES
(1, 17, 'Log In', 'User with email admin@test.com has been logged in', NULL, '2022-06-08 05:55:12'),
(2, 17, 'Log Out', 'User with user_id 17 has been logged out', NULL, '2022-06-08 06:00:42'),
(3, 17, 'Log In', 'User with email admin@test.com has been logged in', NULL, '2022-06-08 06:00:45'),
(4, 17, 'Log Out', 'User with user_id 17 has been logged out', NULL, '2022-06-08 06:57:07'),
(5, 17, 'Log In', 'User with email admin@test.com has been logged in', NULL, '2022-06-08 06:57:12'),
(6, 17, 'Log Out', 'User with user_id 17 has been logged out', NULL, '2022-06-08 10:05:42'),
(7, 17, 'Log In', 'User with email admin@test.com has been logged in', NULL, '2022-06-08 10:05:44'),
(8, 12, 'Log In', 'User with email freelancer@test.com has been logged in', NULL, '2022-06-08 10:28:38'),
(9, 17, 'Log Out', 'User with user_id 17 has been logged out', NULL, '2022-06-08 10:30:13'),
(10, 11, 'Log In', 'User with email client@test.com has been logged in', NULL, '2022-06-08 10:30:23'),
(11, 11, 'Log In', 'User with email client@test.com has been logged in', NULL, '2022-06-09 19:50:04'),
(12, 11, 'Log Out', 'User with user_id 11 has been logged out', NULL, '2022-06-09 19:50:19'),
(13, 17, 'Log In', 'User with email admin@test.com has been logged in', NULL, '2022-06-09 19:50:23'),
(14, 11, 'Log In', 'User with email client@test.com has been logged in', NULL, '2022-06-10 10:53:06'),
(15, 11, 'Log Out', 'User with user_id 11 has been logged out', NULL, '2022-06-10 10:54:43'),
(16, 17, 'Log In', 'User with email admin@test.com has been logged in', NULL, '2022-06-10 10:54:49'),
(17, 17, 'Log In', 'User with email admin@test.com has been logged in', NULL, '2022-06-10 14:06:13'),
(18, 17, 'Log In', 'User with email admin@test.com has been logged in', NULL, '2022-06-19 11:24:06'),
(19, 17, 'General Log', 'Request: [GET /admin?alert=Logged%20in%20successfully!] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:24:06'),
(20, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:24:10'),
(21, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:24:16'),
(22, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:25:04'),
(23, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:25:14'),
(24, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:25:21'),
(25, 17, 'General Log', 'Request: [GET /admin/jobs] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:25:23'),
(26, 17, 'General Log', 'Request: [GET /admin/freelancers] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:25:25'),
(27, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:25:31'),
(28, 17, 'General Log', 'Request: [GET /admin/freelancers] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:26:09'),
(29, 17, 'General Log', 'Request: [GET /admin/freelancers] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:26:30'),
(30, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:26:37'),
(31, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:27:17'),
(32, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:27:36'),
(33, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:27:57'),
(34, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', NULL, '2022-06-19 11:33:54'),
(35, 17, 'General Log', 'Request: [GET /admin/jobs] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:42:57'),
(36, 17, 'General Log', 'Request: [GET /admin/freelancers] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:43:00'),
(37, 17, 'General Log', 'Request: [GET /admin/clients] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:43:02'),
(38, 17, 'General Log', 'Request: [GET /admin/skills] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:43:04'),
(39, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:44:38'),
(40, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:45:11'),
(41, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:45:47'),
(42, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:46:33'),
(43, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:47:35'),
(44, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:50:02'),
(45, 17, 'General Log', 'Request: [GET /admin/users/logs?pageNumber=1&userId=17&types%5B%5D=Log+In&types%5B%5D=Log+Out&types%5B%5D=Create+Freelancer&types%5B%5D=Create+Client&types%5B%5D=Register&types%5B%5D=Reset+Password] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:50:20'),
(46, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:50:27'),
(47, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:50:32'),
(48, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:50:34'),
(49, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:50:39'),
(50, 17, 'General Log', 'Request: [GET /admin/users/id?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:50:40'),
(51, 17, 'General Log', 'Request: [POST /admin/users/id?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:50:47'),
(52, 17, 'General Log', 'Request: [POST /admin/users/id?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:51:17'),
(53, 17, 'General Log', 'Request: [GET /admin/users/id?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:51:48'),
(54, 17, 'General Log', 'Request: [GET /admin/users/id?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:52:02'),
(55, 17, 'Log In', 'User with email admin@test.com has been logged in', '127.0.0.1', '2022-06-19 11:52:44'),
(56, 17, 'General Log', 'Request: [GET /admin?alert=Logged%20in%20successfully!] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:52:44'),
(57, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:52:45'),
(58, 17, 'General Log', 'Request: [GET /admin/users/id?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:52:46'),
(59, 17, 'General Log', 'Request: [POST /admin/users/id?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.91 Mobile Safari/537.36] and body [is_admin=true]', '127.0.0.1', '2022-06-19 11:53:22'),
(60, 17, 'General Log', 'Request: [POST /admin/users/id?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.91 Mobile Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:53:35'),
(61, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:53:51'),
(62, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:53:55'),
(63, 17, 'General Log', 'Request: [GET /dashboard/profile] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.91 Mobile Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:54:18'),
(64, 17, 'General Log', 'Request: [GET /dashboard/profile/edit] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.91 Mobile Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:54:23'),
(65, 17, 'General Log', 'Request: [POST /dashboard/profile/edit] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.91 Mobile Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:54:32'),
(66, 17, 'General Log', 'User with id 17 updated', '127.0.0.1', '2022-06-19 11:54:32'),
(67, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:54:35'),
(68, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:56:08'),
(69, 17, 'General Log', 'Request: [GET /admin/users/logs?userId=17] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:56:10'),
(70, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.91 Mobile Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:56:16'),
(71, 17, 'General Log', 'Request: [GET /admin/users/id?userId=27] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.91 Mobile Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:56:19'),
(72, 17, 'General Log', 'Request: [GET /admin/users/id?userId=27] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:58:13'),
(73, 17, 'General Log', 'Request: [GET /dashboard/profile] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:58:24'),
(74, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:58:27'),
(75, 17, 'General Log', 'Request: [GET /admin/users/id?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:58:30'),
(76, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:58:37'),
(77, 17, 'General Log', 'Request: [GET /admin/jobs] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:58:43'),
(78, 17, 'General Log', 'Request: [GET /admin/jobs] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:59:11'),
(79, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:59:23'),
(80, 17, 'General Log', 'Request: [GET /admin/users/id?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:59:24'),
(81, 17, 'General Log', 'Request: [GET /admin/users/id?userId=159] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:59:42'),
(82, 17, 'General Log', 'Request: [GET /logout] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:59:50'),
(83, 17, 'Log Out', 'User with user_id 17 has been logged out', '127.0.0.1', '2022-06-19 11:59:50'),
(84, 17, 'Log In', 'User with email admin@test.com has been logged in', '127.0.0.1', '2022-06-19 11:59:53'),
(85, 17, 'General Log', 'Request: [GET /admin?alert=Logged%20in%20successfully!] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:59:53'),
(86, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 11:59:58'),
(87, 17, 'General Log', 'Request: [GET /admin/jobs] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 12:00:00'),
(88, 17, 'General Log', 'Request: [GET /logout] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 12:00:09'),
(89, 17, 'Log Out', 'User with user_id 17 has been logged out', '127.0.0.1', '2022-06-19 12:00:09'),
(90, 17, 'Log In', 'User with email admin@test.com has been logged in', '127.0.0.1', '2022-06-19 12:00:18'),
(91, 17, 'General Log', 'Request: [GET /admin?alert=Logged%20in%20successfully!] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 12:00:18'),
(92, 17, 'General Log', 'Request: [GET /admin?alert=Logged%20in%20successfully!] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 12:01:35'),
(93, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 12:01:39'),
(94, 17, 'General Log', 'Request: [GET /admin/users] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 12:05:25'),
(95, 17, 'General Log', 'Request: [GET /admin/jobs] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 12:05:37'),
(96, 17, 'General Log', 'Request: [GET /admin/jobs/id?jobId=31] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 12:05:49'),
(97, 17, 'General Log', 'Request: [GET /admin] from ip [127.0.0.1] and user [17] with user agent [Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36] and body []', '127.0.0.1', '2022-06-19 12:05:56');

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `name`) VALUES
(11, 'Accounting'),
(20, 'AnsweringProductQuestions'),
(28, 'Cloud'),
(17, 'Consultancy'),
(9, 'DataEntry'),
(4, 'GraphicDesign'),
(30, 'Illustration'),
(5, 'ITSupport'),
(7, 'LegalAssistant'),
(15, 'Marketing'),
(18, 'Photography&Videography'),
(33, 'Programming'),
(1, 'QualityAssurance'),
(29, 'Research'),
(16, 'SEO'),
(8, 'SocialMediaManager'),
(31, 'SurveyTaking'),
(14, 'Transcription'),
(13, 'Translation'),
(2, 'UI/UX'),
(10, 'UsabilityTesting'),
(19, 'VirtualAssistant'),
(32, 'VoiceOverActing'),
(3, 'Writing');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `phone`, `password`, `first_name`, `middle_name`, `last_name`, `image`, `country`, `county`, `city`, `is_admin`, `is_active`, `time_created`) VALUES
(11, 'client@test.com', '0718578833', '$2y$10$5QzsfhuROuvDUYtQ4Zv3ZuKkVEfaW1txv/553xBCTunpQvc/bpIsK', 'Meek', 'Karan', 'Moi', '/uploads/profile.avif', 'Kenya', 'Kajiado', 'Rongai', 0, 1, '2022-03-22 06:52:13'),
(12, 'freelancer@test.com', '0762307628', '$2y$10$zL2K68YBS7rwMSGIyQ5R.egPQYy43zMaPokgHtOA01j4ylacVCRPu', 'Sharon', 'Kerubo', 'Kiara', '/uploads/profile-female.avif', 'Kenya', 'Kisii', 'Kisii', 1, 1, '2022-03-22 07:53:28'),
(13, 'freelancer1@test.com', '0793395484', '$2y$10$uohjjRXWHVnduYxpyyUuq.e1yNBkS2BZfXI4SvZzRUWCS.DJbXkS6', 'Amity', 'Rapando', 'Bean', '/uploads/ProfileImageTueMar2220229:241628513616264.jpeg', 'Kenya', 'Thika', 'Juja', 0, 1, '2022-03-22 08:53:44'),
(14, 'client1@test.com', '0777627107', '$2y$10$KKCOjS2ZFwlR6aGdxVpWleKstTq1d1q1Um14sC0m4mAyf0OrXVq6m', 'Margaret', 'Kerugoya', 'Wandia', '/uploads/ProfileImageSunMay01202212:16across the bridge.jpeg', 'Kenya', 'Kajiado', 'Rongai', 0, 1, '2022-05-01 12:16:46'),
(15, 'client2@test.com', '0721675907', '$2y$10$gTTrOn0rMMZ1.8ZownuMfODHWU64ZIQvcFOFRv9YeJ3eP8rcQxl6K', 'Virginia', 'Bond', 'Ngooru', '/uploads/ProfileImageWedMay11202212:20240452437_257190502758422_107796797346897910_n.jpg', 'Kenya', 'Nakuru', 'Gilgil', 0, 1, '2022-05-11 12:20:42'),
(16, 'freelancer2@test.com', '0788713917', '$2y$10$ZWE4wzPZQW1yqY8xL00wju4o.a87IGnOfjhaGA/ufbLy9QHk3yloa', 'Margaret', 'Duncan', 'Nerea', '/uploads/ProfileImageWedMay11202212:38240452437_257190502758422_107796797346897910_n.jpg', 'Kenya', 'Kajiado', 'Rongai', 1, 1, '2022-05-11 12:38:48'),
(17, 'admin@test.com', '0758751473', '$2y$10$tPEM20lasLluoM8yA0G2JeSZayhDhWcZeAh98OoDHrYJCP0pQc4w6', 'Keith', 'Otieno', 'Wend0', '/uploads/ProfileImageWedMay11202212:44explorers_on_the_moon.jpg', 'Kenya', 'Migori', 'Rongo', 1, 1, '2022-05-11 12:44:20'),
(18, 'client4@test.com', '0790257132', '$2y$10$2/8y0fwv1lftiO/znyTJzuP4pO3JPZmHKJhgGkTv1j.YKDyXLXhv2', 'Russell', 'Sanchez', 'Otieno', '/uploads/ProfileImageMonMay16202211:06man-dark-room.jpeg', 'Kenya', 'tana river', 'Hola', 0, 1, '2022-05-16 08:06:54'),
(19, 'client5@test.com', '0749936646', '$2y$10$/fUfBelCLqckoGS5B1PL1OuZIcPlRAn87Q2M.ePb/M0JD.7VJVI92', 'Rose', 'Jacobson', 'Moi', '/uploads/ProfileImageMonMay16202211:15lady-cuup.jpeg', 'Kenya', 'Lamu', 'Lamu', 0, 1, '2022-05-16 08:15:55'),
(20, 'client6@test.com', '0791263758', '$2y$10$PrtDZyX8H1CPlpceOBDteOgbM5FbUplTk/qVI5T3zsCjXMb562BxK', 'Ivana', 'Mohammed', 'Aiko', '/uploads/ProfileImageMonMay16202211:29man-suit.jpeg', 'Kenya', 'Taita taveta', 'Mwatete', 0, 1, '2022-05-16 08:29:20'),
(21, 'client7@test.com', '0724981929', '$2y$10$wuNw737ibgl5AfcbjLfxHeOox3ySY4p79J3uejQUpTgbL0cKuyCgm', 'Noelani', 'Mwangi', 'Colette', '/uploads/ProfileImageMonMay16202211:34men-suits.jpeg', 'Kenya', 'Garissa', 'Garissa', 0, 1, '2022-05-16 08:34:34'),
(22, 'client8@test.com', '0722674144', '$2y$10$qpT5aN5ISm6oaCObff7zl.kiP5rAQx4V9eKz7YiWcYX5uPJKkr31a', 'Whitney', 'Buyaki', 'Denise', '/uploads/ProfileImageMonMay16202211:41lady-suit.jpeg', 'Kenya', 'Tharaka-Nithi', 'Kathwana', 0, 1, '2022-05-16 08:41:14'),
(23, 'client9@test.com', '0745937862', '$2y$10$56dRZOmR7wkzbbkfKwvcVOgoB1Mz6RncMGbycBN1Rq4y2btmKjD7O', 'Clinton', 'Juma', 'Cullen', '/uploads/ProfileImageMonMay16202212:31man-t-shirt.jpeg', 'Kenya', 'Makueni', 'Wote', 0, 1, '2022-05-16 09:31:39'),
(24, 'client10@test.com', '0743603546', '$2y$10$Eu5bhlo7qeRLQk3jx8qWk.m37IzjJGQwpxEvuzmsiSh2Hgzed.mFu', 'Quintessa', 'Chebet', 'Clark', '/uploads/ProfileImageMonMay16202212:38old-man.jpeg', 'Kenya', 'Nyandarua', 'Ole kalau', 0, 1, '2022-05-16 09:38:00'),
(25, 'client11@test.com', '0733258756', '$2y$10$wZ6M8LmOdDSbHX/wkgbA.umh5dNezBdvORy71bl/3er5yhSiCjdAG', 'Jillian', 'Kimani', 'Russell', '/uploads/ProfileImageMonMay16202212:44man-shirt.jpeg', 'Kenya', 'Samburu', 'Maralal', 0, 1, '2022-05-16 09:44:40'),
(26, 'client12@test.com', '0746246146', '$2y$10$l4GuvYPUVUu8fpyAk3X8cevcMnO3W42GsVaMtIzgizs57gcMWh.8m', 'Anne', 'Nyambura', 'Josephine', '/uploads/ProfileImageMonMay16202212:54lady-cuup.jpeg', 'Kenya', 'Nyamira', 'Nyamira', 0, 1, '2022-05-16 09:54:32'),
(27, 'client13@test.com', '0745808930', '$2y$10$b04zbuP99EyFl8Uj5BzqfefO.t1b34/FkKI4/duq7pv8v1/.5Bdgu', 'Kessie', 'Barasa', 'Herman', '/uploads/ProfileImageMonMay16202213:00lady-suit.jpeg', 'Kenya', 'Kirinyaga', 'Kerugoya', 0, 1, '2022-05-16 10:00:36'),
(28, 'client14@test.com', '0790257133', '$2y$10$2/8y0fwv1lftiO/znyTJzuP4pO3JPZmHKJhgGkTv1j.YKDyXLXhv2', 'Russell', 'Sanchez', 'Otieno', '/uploads/ProfileImageMonMay16202211:06man-dark-room.jpeg', 'Kenya', 'tana river', 'Hola', 0, 1, '2022-05-12 08:06:54'),
(29, 'client15@test.com', '0749936647', '$2y$10$/fUfBelCLqckoGS5B1PL1OuZIcPlRAn87Q2M.ePb/M0JD.7VJVI92', 'Rose', 'Jacobson', 'Kioko', '/uploads/ProfileImageMonMay16202211:15lady-cuup.jpeg', 'Kenya', 'Lamu', 'Lamu', 0, 1, '2022-05-12 08:15:55'),
(30, 'client16@test.com', '0791263759', '$2y$10$PrtDZyX8H1CPlpceOBDteOgbM5FbUplTk/qVI5T3zsCjXMb562BxK', 'Ivana', 'Mohammed', 'Mwende', '/uploads/ProfileImageMonMay16202211:29man-suit.jpeg', 'Kenya', 'Taita taveta', 'Mwatete', 0, 1, '2022-05-12 08:29:20'),
(31, 'client17@test.com', '0724981920', '$2y$10$wuNw737ibgl5AfcbjLfxHeOox3ySY4p79J3uejQUpTgbL0cKuyCgm', 'Noelani', 'Mwangi', 'Oduor', '/uploads/ProfileImageMonMay16202211:34men-suits.jpeg', 'Kenya', 'Garissa', 'Garissa', 0, 1, '2022-05-12 08:34:34'),
(32, 'client18@test.com', '0722674145', '$2y$10$qpT5aN5ISm6oaCObff7zl.kiP5rAQx4V9eKz7YiWcYX5uPJKkr31a', 'Whitney', 'Buyaki', 'Kip', '/uploads/ProfileImageMonMay16202211:41lady-suit.jpeg', 'Kenya', 'Tharaka-Nithi', 'Kathwana', 0, 1, '2022-05-12 08:41:14'),
(33, 'client19@test.com', '0745937863', '$2y$10$56dRZOmR7wkzbbkfKwvcVOgoB1Mz6RncMGbycBN1Rq4y2btmKjD7O', 'Clinton', 'Juma', 'Ngugi', '/uploads/ProfileImageMonMay16202212:31man-t-shirt.jpeg', 'Kenya', 'Makueni', 'Wote', 0, 1, '2022-05-12 09:31:39'),
(34, 'client20@test.com', '0743603547', '$2y$10$Eu5bhlo7qeRLQk3jx8qWk.m37IzjJGQwpxEvuzmsiSh2Hgzed.mFu', 'Quintessa', 'Chebet', 'Kinyua', '/uploads/ProfileImageMonMay16202212:38old-man.jpeg', 'Kenya', 'Nyandarua', 'Ole kalau', 0, 1, '2022-05-12 09:38:00'),
(35, 'client21@test.com', '0733258757', '$2y$10$wZ6M8LmOdDSbHX/wkgbA.umh5dNezBdvORy71bl/3er5yhSiCjdAG', 'Jillian', 'Kimani', 'Waweru', '/uploads/ProfileImageMonMay16202212:44man-shirt.jpeg', 'Kenya', 'Samburu', 'Maralal', 0, 1, '2022-05-12 09:44:40'),
(36, 'client22@test.com', '0746246147', '$2y$10$l4GuvYPUVUu8fpyAk3X8cevcMnO3W42GsVaMtIzgizs57gcMWh.8m', 'Anne', 'Nyambura', 'Chege', '/uploads/ProfileImageMonMay16202212:54lady-cuup.jpeg', 'Kenya', 'Nyamira', 'Nyamira', 0, 1, '2022-05-12 09:54:32'),
(37, 'client23@test.com', '0735808930', '$2y$10$b04zbuP99EyFl8Uj5BzqfefO.t1b34/FkKI4/duq7pv8v1/.5Bdgu', 'Kessie', 'Barasa', 'Mbugua', '/uploads/ProfileImageMonMay16202213:00lady-suit.jpeg', 'Kenya', 'Kirinyaga', 'Kerugoya', 0, 1, '2022-05-12 10:00:36'),
(44, 'freelancer10@test.com', '0703603546', '$2y$10$Eu5bhlo7qeRLQk3jx8qWk.m37IzjJGQwpxEvuzmsiSh2Hgzed.mFu', 'Quintessa', 'Chebet', 'Clark', '/uploads/ProfileImageMonMay16202212:38old-man.jpeg', 'Kenya', 'Nyandarua', 'Ole kalau', 0, 1, '2022-05-15 09:38:00'),
(45, 'freelancer11@test.com', '0703258756', '$2y$10$wZ6M8LmOdDSbHX/wkgbA.umh5dNezBdvORy71bl/3er5yhSiCjdAG', 'Jillian', 'Kimani', 'Russell', '/uploads/ProfileImageMonMay16202212:44man-shirt.jpeg', 'Kenya', 'Samburu', 'Maralal', 0, 1, '2022-05-15 09:44:40'),
(46, 'freelancer12@test.com', '0703246146', '$2y$10$l4GuvYPUVUu8fpyAk3X8cevcMnO3W42GsVaMtIzgizs57gcMWh.8m', 'Anne', 'Nyambura', 'Josephine', '/uploads/ProfileImageMonMay16202212:54lady-cuup.jpeg', 'Kenya', 'Nyamira', 'Nyamira', 0, 1, '2022-05-15 09:54:32'),
(47, 'freelancer13@test.com', '0703808930', '$2y$10$b04zbuP99EyFl8Uj5BzqfefO.t1b34/FkKI4/duq7pv8v1/.5Bdgu', 'Kessie', 'Barasa', 'Herman', '/uploads/ProfileImageMonMay16202213:00lady-suit.jpeg', 'Kenya', 'Kirinyaga', 'Kerugoya', 0, 1, '2022-05-15 10:00:36'),
(48, 'freelancer14@test.com', '0703257133', '$2y$10$2/8y0fwv1lftiO/znyTJzuP4pO3JPZmHKJhgGkTv1j.YKDyXLXhv2', 'Russell', 'Sanchez', 'Otieno', '/uploads/ProfileImageMonMay16202211:06man-dark-room.jpeg', 'Kenya', 'tana river', 'Hola', 0, 1, '2022-05-11 08:06:54'),
(49, 'freelancer15@test.com', '0703936647', '$2y$10$/fUfBelCLqckoGS5B1PL1OuZIcPlRAn87Q2M.ePb/M0JD.7VJVI92', 'Rose', 'Jacobson', 'Kioko', '/uploads/ProfileImageMonMay16202211:15lady-cuup.jpeg', 'Kenya', 'Lamu', 'Lamu', 0, 1, '2022-05-11 08:15:55'),
(50, 'freelancer16@test.com', '0703263759', '$2y$10$PrtDZyX8H1CPlpceOBDteOgbM5FbUplTk/qVI5T3zsCjXMb562BxK', 'Ivana', 'Mohammed', 'Mwende', '/uploads/ProfileImageMonMay16202211:29man-suit.jpeg', 'Kenya', 'Taita taveta', 'Mwatete', 0, 1, '2022-05-11 08:29:20'),
(51, 'freelancer17@test.com', '0703981920', '$2y$10$wuNw737ibgl5AfcbjLfxHeOox3ySY4p79J3uejQUpTgbL0cKuyCgm', 'Noelani', 'Mwangi', 'Oduor', '/uploads/ProfileImageMonMay16202211:34men-suits.jpeg', 'Kenya', 'Garissa', 'Garissa', 0, 1, '2022-05-11 08:34:34'),
(52, 'freelancer18@test.com', '0703674145', '$2y$10$qpT5aN5ISm6oaCObff7zl.kiP5rAQx4V9eKz7YiWcYX5uPJKkr31a', 'Whitney', 'Buyaki', 'Kip', '/uploads/ProfileImageMonMay16202211:41lady-suit.jpeg', 'Kenya', 'Tharaka-Nithi', 'Kathwana', 0, 1, '2022-05-11 08:41:14'),
(53, 'freelancer19@test.com', '0703937863', '$2y$10$56dRZOmR7wkzbbkfKwvcVOgoB1Mz6RncMGbycBN1Rq4y2btmKjD7O', 'Clinton', 'Juma', 'Ngugi', '/uploads/ProfileImageMonMay16202212:31man-t-shirt.jpeg', 'Kenya', 'Makueni', 'Wote', 0, 1, '2022-05-11 09:31:39'),
(54, 'freelancer20@test.com', '0703603547', '$2y$10$Eu5bhlo7qeRLQk3jx8qWk.m37IzjJGQwpxEvuzmsiSh2Hgzed.mFu', 'Quintessa', 'Chebet', 'Kinyua', '/uploads/ProfileImageMonMay16202212:38old-man.jpeg', 'Kenya', 'Nyandarua', 'Ole kalau', 0, 1, '2022-05-11 09:38:00'),
(55, 'freelancer21@test.com', '0703258757', '$2y$10$wZ6M8LmOdDSbHX/wkgbA.umh5dNezBdvORy71bl/3er5yhSiCjdAG', 'Jillian', 'Kimani', 'Waweru', '/uploads/ProfileImageMonMay16202212:44man-shirt.jpeg', 'Kenya', 'Samburu', 'Maralal', 0, 1, '2022-05-11 09:44:40'),
(56, 'freelancer22@test.com', '0703246147', '$2y$10$l4GuvYPUVUu8fpyAk3X8cevcMnO3W42GsVaMtIzgizs57gcMWh.8m', 'Anne', 'Nyambura', 'Chege', '/uploads/ProfileImageMonMay16202212:54lady-cuup.jpeg', 'Kenya', 'Nyamira', 'Nyamira', 0, 1, '2022-05-11 09:54:32'),
(57, 'freelancer23@test.com', '0703808931', '$2y$10$b04zbuP99EyFl8Uj5BzqfefO.t1b34/FkKI4/duq7pv8v1/.5Bdgu', 'Kessie', 'Barasa', 'Mbugua', '/uploads/ProfileImageMonMay16202213:00lady-suit.jpeg', 'Kenya', 'Kirinyaga', 'Kerugoya', 0, 1, '2022-05-11 10:00:36'),
(124, 'client110@test.com', '0725603546', '$2y$10$Eu5bhlo7qeRLQk3jx8qWk.m37IzjJGQwpxEvuzmsiSh2Hgzed.mFu', 'Quintessa', 'Chebet', 'Clark', '/uploads/ProfileImageMonMay16202212:38old-man.jpeg', 'Kenya', 'Nyandarua', 'Ole kalau', 0, 1, '2022-05-14 09:38:00'),
(125, 'client111@test.com', '0725258756', '$2y$10$wZ6M8LmOdDSbHX/wkgbA.umh5dNezBdvORy71bl/3er5yhSiCjdAG', 'Jillian', 'Kimani', 'Russell', '/uploads/ProfileImageMonMay16202212:44man-shirt.jpeg', 'Kenya', 'Samburu', 'Maralal', 0, 1, '2022-05-14 09:44:40'),
(126, 'client112@test.com', '0725246146', '$2y$10$l4GuvYPUVUu8fpyAk3X8cevcMnO3W42GsVaMtIzgizs57gcMWh.8m', 'Anne', 'Nyambura', 'Josephine', '/uploads/ProfileImageMonMay16202212:54lady-cuup.jpeg', 'Kenya', 'Nyamira', 'Nyamira', 0, 1, '2022-05-14 09:54:32'),
(127, 'client113@test.com', '0725808933', '$2y$10$b04zbuP99EyFl8Uj5BzqfefO.t1b34/FkKI4/duq7pv8v1/.5Bdgu', 'Kessie', 'Barasa', 'Herman', '/uploads/ProfileImageMonMay16202213:00lady-suit.jpeg', 'Kenya', 'Kirinyaga', 'Kerugoya', 0, 1, '2022-05-14 10:00:36'),
(128, 'client114@test.com', '0725257133', '$2y$10$2/8y0fwv1lftiO/znyTJzuP4pO3JPZmHKJhgGkTv1j.YKDyXLXhv2', 'Russell', 'Sanchez', 'Otieno', '/uploads/ProfileImageMonMay16202211:06man-dark-room.jpeg', 'Kenya', 'tana river', 'Hola', 0, 1, '2022-05-14 08:06:54'),
(129, 'client115@test.com', '0725936647', '$2y$10$/fUfBelCLqckoGS5B1PL1OuZIcPlRAn87Q2M.ePb/M0JD.7VJVI92', 'Rose', 'Jacobson', 'Kioko', '/uploads/ProfileImageMonMay16202211:15lady-cuup.jpeg', 'Kenya', 'Lamu', 'Lamu', 0, 1, '2022-05-14 08:15:55'),
(130, 'client116@test.com', '0725263759', '$2y$10$PrtDZyX8H1CPlpceOBDteOgbM5FbUplTk/qVI5T3zsCjXMb562BxK', 'Ivana', 'Mohammed', 'Mwende', '/uploads/ProfileImageMonMay16202211:29man-suit.jpeg', 'Kenya', 'Taita taveta', 'Mwatete', 0, 1, '2022-05-14 08:29:20'),
(131, 'client117@test.com', '0725981920', '$2y$10$wuNw737ibgl5AfcbjLfxHeOox3ySY4p79J3uejQUpTgbL0cKuyCgm', 'Noelani', 'Mwangi', 'Oduor', '/uploads/ProfileImageMonMay16202211:34men-suits.jpeg', 'Kenya', 'Garissa', 'Garissa', 0, 1, '2022-05-14 08:34:34'),
(132, 'client118@test.com', '0725674145', '$2y$10$qpT5aN5ISm6oaCObff7zl.kiP5rAQx4V9eKz7YiWcYX5uPJKkr31a', 'Whitney', 'Buyaki', 'Kip', '/uploads/ProfileImageMonMay16202211:41lady-suit.jpeg', 'Kenya', 'Tharaka-Nithi', 'Kathwana', 0, 1, '2022-05-14 08:41:14'),
(133, 'client119@test.com', '0725937863', '$2y$10$56dRZOmR7wkzbbkfKwvcVOgoB1Mz6RncMGbycBN1Rq4y2btmKjD7O', 'Clinton', 'Juma', 'Ngugi', '/uploads/ProfileImageMonMay16202212:31man-t-shirt.jpeg', 'Kenya', 'Makueni', 'Wote', 0, 1, '2022-05-14 09:31:39'),
(134, 'client120@test.com', '0725603547', '$2y$10$Eu5bhlo7qeRLQk3jx8qWk.m37IzjJGQwpxEvuzmsiSh2Hgzed.mFu', 'Kevin', 'Mutisya', 'Linus', '/uploads/ProfileImageMonMay16202212:38old-man.jpeg', 'Kenya', 'Nyandarua', 'Ole kalau', 0, 1, '2022-05-14 09:38:00'),
(135, 'client121@test.com', '0725258757', '$2y$10$wZ6M8LmOdDSbHX/wkgbA.umh5dNezBdvORy71bl/3er5yhSiCjdAG', 'Phillip', 'Kiambaa', 'Waweru', '/uploads/ProfileImageMonMay16202212:44man-shirt.jpeg', 'Kenya', 'Samburu', 'Maralal', 0, 1, '2022-05-14 09:44:40'),
(136, 'client122@test.com', '0725246147', '$2y$10$l4GuvYPUVUu8fpyAk3X8cevcMnO3W42GsVaMtIzgizs57gcMWh.8m', 'Shirley', 'B', 'Chege', '/uploads/ProfileImageMonMay16202212:54lady-cuup.jpeg', 'Kenya', 'Nyamira', 'Nyamira', 0, 1, '2022-05-14 09:54:32'),
(137, 'client123@test.com', '0725808930', '$2y$10$b04zbuP99EyFl8Uj5BzqfefO.t1b34/FkKI4/duq7pv8v1/.5Bdgu', 'Tracy', 'K', 'Mbugua', '/uploads/ProfileImageMonMay16202213:00lady-suit.jpeg', 'Kenya', 'Kirinyaga', 'Kerugoya', 0, 1, '2022-05-14 10:00:36'),
(144, 'freelancer110@test.com', '0713603546', '$2y$10$Eu5bhlo7qeRLQk3jx8qWk.m37IzjJGQwpxEvuzmsiSh2Hgzed.mFu', 'Quintessa', 'Chebet', 'Clark', '/uploads/ProfileImageMonMay16202212:38old-man.jpeg', 'Kenya', 'Nyandarua', 'Ole kalau', 0, 1, '2022-05-13 09:38:00'),
(145, 'freelancer111@test.com', '0713258756', '$2y$10$wZ6M8LmOdDSbHX/wkgbA.umh5dNezBdvORy71bl/3er5yhSiCjdAG', 'Jillian', 'Kimani', 'Russell', '/uploads/ProfileImageMonMay16202212:44man-shirt.jpeg', 'Kenya', 'Samburu', 'Maralal', 0, 1, '2022-05-13 09:44:40'),
(146, 'freelancer112@test.com', '0713246146', '$2y$10$l4GuvYPUVUu8fpyAk3X8cevcMnO3W42GsVaMtIzgizs57gcMWh.8m', 'Anne', 'Nyambura', 'Josephine', '/uploads/ProfileImageMonMay16202212:54lady-cuup.jpeg', 'Kenya', 'Nyamira', 'Nyamira', 0, 1, '2022-05-13 09:54:32'),
(147, 'freelancer113@test.com', '0713808930', '$2y$10$b04zbuP99EyFl8Uj5BzqfefO.t1b34/FkKI4/duq7pv8v1/.5Bdgu', 'Kessie', 'Barasa', 'Herman', '/uploads/ProfileImageMonMay16202213:00lady-suit.jpeg', 'Kenya', 'Kirinyaga', 'Kerugoya', 0, 1, '2022-05-13 10:00:36'),
(148, 'freelancer114@test.com', '0713257133', '$2y$10$2/8y0fwv1lftiO/znyTJzuP4pO3JPZmHKJhgGkTv1j.YKDyXLXhv2', 'Russell', 'Sanchez', 'Otieno', '/uploads/ProfileImageMonMay16202211:06man-dark-room.jpeg', 'Kenya', 'tana river', 'Hola', 0, 1, '2022-05-13 08:06:54'),
(149, 'freelancer115@test.com', '0713936647', '$2y$10$/fUfBelCLqckoGS5B1PL1OuZIcPlRAn87Q2M.ePb/M0JD.7VJVI92', 'Rose', 'Jacobson', 'Kioko', '/uploads/ProfileImageMonMay16202211:15lady-cuup.jpeg', 'Kenya', 'Lamu', 'Lamu', 0, 1, '2022-05-13 08:15:55'),
(150, 'freelancer116@test.com', '0713263759', '$2y$10$PrtDZyX8H1CPlpceOBDteOgbM5FbUplTk/qVI5T3zsCjXMb562BxK', 'Ivana', 'Mohammed', 'Mwende', '/uploads/ProfileImageMonMay16202211:29man-suit.jpeg', 'Kenya', 'Taita taveta', 'Mwatete', 0, 1, '2022-05-13 08:29:20'),
(151, 'freelancer117@test.com', '0713981920', '$2y$10$wuNw737ibgl5AfcbjLfxHeOox3ySY4p79J3uejQUpTgbL0cKuyCgm', 'Noelani', 'Mwangi', 'Oduor', '/uploads/ProfileImageMonMay16202211:34men-suits.jpeg', 'Kenya', 'Garissa', 'Garissa', 0, 1, '2022-05-13 08:34:34'),
(152, 'freelancer118@test.com', '0713674145', '$2y$10$qpT5aN5ISm6oaCObff7zl.kiP5rAQx4V9eKz7YiWcYX5uPJKkr31a', 'Whitney', 'Buyaki', 'Kip', '/uploads/ProfileImageMonMay16202211:41lady-suit.jpeg', 'Kenya', 'Tharaka-Nithi', 'Kathwana', 0, 1, '2022-05-13 08:41:14'),
(153, 'freelancer119@test.com', '0713937863', '$2y$10$56dRZOmR7wkzbbkfKwvcVOgoB1Mz6RncMGbycBN1Rq4y2btmKjD7O', 'Clinton', 'Juma', 'Ngugi', '/uploads/ProfileImageMonMay16202212:31man-t-shirt.jpeg', 'Kenya', 'Makueni', 'Wote', 0, 1, '2022-05-13 09:31:39'),
(154, 'freelancer120@test.com', '0713603547', '$2y$10$Eu5bhlo7qeRLQk3jx8qWk.m37IzjJGQwpxEvuzmsiSh2Hgzed.mFu', 'Tracy', 'Chebet', 'Kinyua', '/uploads/ProfileImageMonMay16202212:38old-man.jpeg', 'Kenya', 'Nyandarua', 'Ole kalau', 0, 1, '2022-05-13 09:38:00'),
(155, 'freelancer121@test.com', '0713258757', '$2y$10$wZ6M8LmOdDSbHX/wkgbA.umh5dNezBdvORy71bl/3er5yhSiCjdAG', 'Tracy', 'Ouma', 'Waweru', '/uploads/ProfileImageMonMay16202212:44man-shirt.jpeg', 'Kenya', 'Samburu', 'Maralal', 0, 1, '2022-05-13 09:44:40'),
(156, 'freelancer122@test.com', '0713246147', '$2y$10$l4GuvYPUVUu8fpyAk3X8cevcMnO3W42GsVaMtIzgizs57gcMWh.8m', 'Tracy', 'O', 'Chege', '/uploads/ProfileImageMonMay16202212:54lady-cuup.jpeg', 'Kenya', 'Nyamira', 'Nyamira', 0, 1, '2022-05-13 09:54:32'),
(157, 'freelancer123@test.com', '0713808931', '$2y$10$b04zbuP99EyFl8Uj5BzqfefO.t1b34/FkKI4/duq7pv8v1/.5Bdgu', 'Juma', 'Barasa', 'Mbugua', '/uploads/ProfileImageMonMay16202213:00lady-suit.jpeg', 'Kenya', 'Kirinyaga', 'Kerugoya', 0, 1, '2022-05-13 10:00:36'),
(158, 'client100@test.com', '0785723187', '$2y$10$Nsrekpy5Auy48e/SW8h2befLW7GpDe/1oAPpZpLRe/BUfvEh3v3MK', 'Ila', 'Robles', 'Chantale Sutton', '/uploads/ProfileImageWedMay2520228:38code.jpeg', 'Kenya', 'Voluptatem voluptas', 'Accusantium quidem e', 0, 1, '2022-05-25 05:38:07'),
(159, 'freelancer100@test.com', '0730652592', '$2y$10$DsTbYkRxEKj0JMD84UA1ZeojCG6DB1MvmwBTW9/WKsMeTJ8XyXylq', 'Ali', 'Kennedy', 'Tobias Huff', '/uploads/ProfileImageWedMay2520228:47code.jpeg', 'Kenya', 'Dolorum quia est et', 'Laudantium id et do', 0, 1, '2022-05-25 05:47:25');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
