-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2022 at 02:36 PM
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
(3, 13, '/uploads/ClientImageTueMar2220229:371628513616264.jpeg', 'Ut mollitia excepteu', 'Est facilis maxime a', 'company', '2022-03-22 09:06:43', 1),
(4, 14, '/uploads/ClientImageSunMay01202212:20D9lGXtQXYAEalMK.jpeg', 'Rivatex Limited', 'Rivatext is an integrated textile factory that converts cotton lint through various processes to finished fabrics.', 'company', '2022-05-01 12:20:11', 1);

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`id`, `title`, `description`, `user_id`, `years_of_experience`, `time_created`, `is_active`) VALUES
(10, 'Creative Graphic Designer', 'Highly experienced, creative, and multitalented Graphic Designer with an extensive background in web, marketing multimedia, and print design. Exceptional collaborative and interpersonal skills; very strong team player with well-developed written and verbal communication abilities. Experienced at producing high-end business-to-business and consumer-facing designs; talented at building and maintaining partnerships. Passionate and accustomed to performing in deadline-driven environments.', 12, 5, '2022-03-22 07:54:52', 1),
(11, 'Freelancer 1', 'Descrpt', 13, 2, '2022-03-22 09:02:23', 1);

--
-- Dumping data for table `freelancer_skill`
--

INSERT INTO `freelancer_skill` (`id`, `freelancer_id`, `skill_id`) VALUES
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
(7, 2, 'Python Django Developer Needed', 'A full-stack developer is needed. Strong knowledge of Python and Django is needed.\r\n\r\nRequirements:\r\n- Strong knowledge and experience with Python and Django.\r\n- Intermediate knowledge and experience with Vue and Nuxt js.\r\n- Intermediate knowledge and experience with HTML/CSS/JavaScript.\r\n- Attention to detail.\r\n- The developer should create several apis using Django framework.\r\n- AWS experience as well.\r\n- Previous experience with building websites and portals that consist of customer and admin pages.\r\n- Experience working with asynchronous celery tasks\r\n- Comfortable working with multiple 3rd party services\r\n\r\n\r\nIf the work is completed on time and in a satisfactory manner, additional work will be given.', '/uploads/ClientJobImageMonApr18202210:09555.jpg', 3000, 168, '2022-05-04 13:08:00', '2022-04-18 10:09:00', 1),
(8, 2, 'I need a software engineer ( developer) to work on an ongoing project.', 'It\'s a platform that requires many microservices & functionalities built into or around it for effective use.\r\n\r\nThe development requirements are;\r\n\r\nFor frontend engineer minimum requirements:\r\nHTML, CSS, Javascript, React Js, GraphQL, Apollo GraphQL, Apollo Federation\r\n\r\nFor back-end engineer minimum requirements:\r\n\r\nPython(Django framework), PostgreSQL, GraphQL, Microservices, Docker, Apollo Federation and API design', '/uploads/ClientJobImageThuMar2420226:14images.png', 2500, 15, '2022-05-03 09:11:00', '2022-04-24 06:14:02', 1),
(9, 2, 'Freelance proof readers wanted', 'Tasks:\r\n1) Transfer data from paper formats into computer files or database systems using keyboards, data recorders or optical scanners\r\n2) Type in data provided directly from customers\r\n3) Create spreadsheets with large numbers of figures without mistakes\r\n4) Verify data by comparing it to source documents\r\n5) Update existing data\r\n6) Retrieve data from the database or electronic files as requested\r\n7) Perform regular backups to ensure data preservation\r\n8) Sort and organize paperwork after entering data to ensure it is not lost', '/uploads/ClientJobImageSunMay01202212:04silicon-valley-1.jpg', 1000, 40, '2022-05-02 15:03:00', '2022-05-01 12:04:00', 1),
(10, 4, 'Data Center IT Level 2 Support Technician', 'Position Overview and Objectives:\r\n&bull; Take queries from Level 1 technicians to facilitate in-depth troubleshooting and backend analysis.\r\n&bull; Review the work order from a Level 1 technician to determine how much support was provided, what the client issue is, and how long the client has worked with the Level 1 technician.\r\n&bull; Provide swift break-fix support and resolution.\r\n&bull; Communicate with the user for an in-depth analysis of the problem before providing a solution.\r\n&bull; Quickly determine if issues require communication up to Level 3 technician for SME support.\r\n&bull; Provide extensive troubleshooting support, as needed.\r\n&bull; Provide programming support associated with the software, as needed.\r\n&bull; Perform hardware installations (rack/stack) and cable installations (routing, terminating, structured cabling), including troubleshooting and testing. Perform hardware decommission and cable removal.\r\n&bull; Perform remote hands support (e.g., power cycles, physical environment, and cabling inspections, swap out failed components, hardware upgrades, testing of copper and fiber cables, handling storage media, and enter troubleshooting commands).\r\n&bull; Prepare and coordinate incoming/outgoing shipments. Compare packing lists with purchase details to ensure correct make, model, and quantities are received and receipted.\r\n&bull; Support Service Management and related processes (e.g., Service Request, Incident, Change) by creating, updating, and closing associated tickets. Oversee and support Physical access processes to maintain secure Data Center facilities.\r\n&bull; Play an active role in managing the execution of the Power Maintenance Events.\r\n&bull; Oversee, track, maintain, order adequate sparing, cabinets, and consumable levels.\r\n&bull; Perform physical audits and ensure the Service Management database is updated and accurate.\r\n&bull; Handle tape backup media and prepare for offsite storage if applicable.\r\n&bull; Collaborate and maintain business relationships to meet and exceed client expectations with respect to business as usual and project activities.\r\n&bull; Train and provide oversight to improve service levels.\r\n&bull; Manage projects &ndash; Build Center Solution tools, space planning, power requirements, cabling requirements. Work with CSE staff, order cables and related supplies.\r\n&bull; Allocate job tasks to staff. May maintain staff&rsquo;s shift scheduling and approve timecards.\r\n&bull; May carry out performance reviews. Ensure staff performance is of the highest standards and meets service metrics.\r\n&bull; Act as a point of escalation.', '/uploads/ClientJobImageSunMay01202212:25freelance-it-support-technician.jpeg', 300, 200, '2022-05-06 15:23:00', '2022-05-01 12:25:34', 1),
(11, 4, 'We need someone to upgrade our mailing server', 'Hi everyone ,\r\nWe have our mailing system hosted on our private dedicated server , but we have some problems building a good reputation and we need to improve our sending stability .\r\nOur goal is to reach a sending volume of 100k email per day and those emails must go to inbox to all mailboxes like Gmail , Outlook , Hotmail , GMX , Orange etc..\r\nSo please we need freelancer that can do this job for us .\r\n++ Additional  information ++\r\nIf this is required us to buy another service to improve our work please attach details and we will negotiate with the price .\r\nIf we find you good we may invite you to work with us daily .\r\nGood luck.', '/uploads/ClientJobImageSunMay01202212:28freelance-it-support-technician.jpeg', 5000, 10, '2022-05-05 15:28:00', '2022-05-01 12:28:56', 1);

--
-- Dumping data for table `job_proposal`
--

INSERT INTO `job_proposal` (`id`, `status`, `title`, `description`, `job_id`, `freelancer_id`, `submission_description`, `submission_attachment`, `client_comment`, `time_work_starts`, `time_work_ends`, `time_created`, `is_active`) VALUES
(1, 'completed successfully', 'Flutter Developer & UI/UX Designer', 'I have mastered the art of states and widgets in Flutter, making it my preferred UI tool. I have vast experience working with Flutter, coupled with other technologies to create full-scale apps.\r\nSuch as both SQL(PostgreSQL,Mysql) and NoSQL(MongoDB) databases and python(flask,DRF,fastapi) or Js(Node) for backend Solutions. Open to working with you.', 6, 10, 'I have completed the task', '/uploads/FreelancerWorkCompleteFileMonApr18202215:47work.zip', NULL, NULL, NULL, '2022-03-24 08:36:04', 1),
(2, 'withdrawn', 'I am an experienced social media manager', 'I would like to express my strong interest in the Social Media Manager position for the stated time. I am confident that my previous success as a social media manager, as well as my strong communication and collaboration skills, make me an ideal candidate for the position.\r\n\r\nI have ten years of experience in marketing, and I have spent the last five of those years as a Social Media Manager. My most recent campaign for Acme Corp. led to an increase of over 35% in inbound traffic for Acme’s website. Through a combination of creative social media marketing strategies and thorough monitoring of success through media analytics, KPIs, and dashboards, I can assure you of a similar rate of success.\r\n\r\nI am confident that my experience as well as my ability to collaborate and communicate, make me a strong candidate for the Social Media Manager.  Thank you so much for your time and consideration.', 5, 10, NULL, NULL, NULL, NULL, NULL, '2022-03-27 11:17:58', 1),
(4, 'sent', 'Tenetur magna verita', 'Sint autem accusamus', 7, 10, NULL, NULL, NULL, NULL, NULL, '2022-04-18 10:24:26', 1),
(5, 'sent', 'I host my own mailing server', 'I am used to performing such tasks', 11, 10, NULL, NULL, NULL, NULL, NULL, '2022-05-01 12:32:30', 1),
(6, 'sent', 'Qualified Software Engineer', 'I have training in the above skills', 8, 10, NULL, NULL, NULL, NULL, NULL, '2022-05-01 12:33:19', 1);

--
-- Dumping data for table `job_rating`
--

INSERT INTO `job_rating` (`id`, `job_id`, `type`, `rating`, `comment`) VALUES
(1, 6, 'freelancer', 4, 'GOOD WORK!'),
(3, 6, 'client', 3, 'Good to work with!');

--
-- Dumping data for table `job_skill`
--

INSERT INTO `job_skill` (`id`, `job_id`, `skill_id`) VALUES
(7, 5, 8),
(8, 6, 1),
(10, 6, 2),
(9, 7, 1),
(11, 8, 1),
(12, 9, 9),
(13, 10, 5),
(14, 11, 1),
(15, 11, 5);

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
(14, 'Transcription'),
(13, 'Translation'),
(2, 'UI/UX'),
(10, 'UsabilityTesting'),
(3, 'Writing');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `phone`, `password`, `first_name`, `middle_name`, `last_name`, `image`, `country`, `county`, `city`, `street`, `postal_code`, `is_admin`, `is_active`, `time_created`) VALUES
(11, 'byfixusaki', 'client@test.com', '+254718578833', '$2y$10$5QzsfhuROuvDUYtQ4Zv3ZuKkVEfaW1txv/553xBCTunpQvc/bpIsK', 'Daniele', NULL, 'Moi', '/uploads/profile.avif', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-03-22 06:52:13'),
(12, 'mutuvor', 'freelancer@test.com', '+254762307628', '$2y$10$zL2K68YBS7rwMSGIyQ5R.egPQYy43zMaPokgHtOA01j4ylacVCRPu', 'Sharon', NULL, 'Kemunto', '/uploads/profile-female.avif', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-03-22 07:53:28'),
(13, 'wyjaqe', 'giferuqa@mailinator.com', '+254793395484', '$2y$10$uohjjRXWHVnduYxpyyUuq.e1yNBkS2BZfXI4SvZzRUWCS.DJbXkS6', 'Amity', NULL, 'Bean', '/uploads/ProfileImageTueMar2220229:241628513616264.jpeg', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-03-22 08:53:44'),
(14, 'pukycylub', 'client1@test.com', '0777627107', '$2y$10$KKCOjS2ZFwlR6aGdxVpWleKstTq1d1q1Um14sC0m4mAyf0OrXVq6m', 'Margaret', NULL, 'Wandia', '/uploads/ProfileImageSunMay01202212:16across the bridge.jpeg', NULL, NULL, NULL, NULL, NULL, 0, 1, '2022-05-01 12:16:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
