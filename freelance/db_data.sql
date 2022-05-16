-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2022 at 12:31 PM
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
(25, 37, '/uploads/ClientIdImageMonMay16202213:01id_m.jpeg', '/uploads/ClientImageMonMay16202213:01raise-hands.jpeg', 'Paper Source', 'Agriculture', 'company', '2022-05-16 10:01:40', 1);

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`id`, `user_id`, `national_id`, `title`, `description`, `years_of_experience`, `time_created`, `is_active`) VALUES
(10, 12, '/uploads/national_id.webp', 'Creative software engineer &amp; graphic designer', 'Highly experienced, creative, and multitalented Software engineer and Graphic Designer with an extensive background in web, marketing multimedia, and print design. Exceptional collaborative and interpersonal skills; very strong team player with well-developed written and verbal communication abilities. Experienced at producing high-end business-to-business and consumer-facing designs; talented at building and maintaining partnerships. Passionate and accustomed to performing in deadline-driven environments.', 5, '2022-03-22 07:54:52', 1),
(11, 13, '/uploads/national_id.webp', 'Content marketing professional', 'I am a content marketing professional at HubSpot, an inbound marketing and sales platform that helps companies attract visitors, convert leads, and close customers. \nPreviously, I worked as a marketing manager for a tech software startup. He graduated with honors from The Catholic University of Eastern Africa with a dual degree in Business Administration and Creative Writing. I am also a highly creative and multitalented Graphic Designer with extensive experience in multimedia, marketing, and print design. ', 2, '2022-03-22 09:02:23', 1),
(12, 16, '/uploads/ClientIdImageThuMay1220227:28id_f.jpeg', 'Data entry expert', 'Data entry expert', 3, '2022-05-12 07:28:39', 1);

--
-- Dumping data for table `freelancer_skill`
--

INSERT INTO `freelancer_skill` (`id`, `freelancer_id`, `skill_id`) VALUES
(40, 10, 1),
(41, 10, 2),
(38, 10, 4),
(39, 10, 5),
(5, 11, 2),
(6, 11, 3),
(9, 11, 4),
(10, 11, 15),
(11, 12, 9),
(12, 12, 10);

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
(15, 7, 'Send us guide', 'Send us guide on how to move from heroku to google cloud', '/uploads/ClientJobImageMonMay16202211:18tech.jpeg', 100, 1, '2022-05-24 11:17:00', '2022-05-16 08:18:19', 1),
(16, 7, 'How to quickly get work visa for employees', 'Send us tips on how to quickly get work visa for employees', '/uploads/ClientJobImageMonMay16202211:19men-suits.jpeg', 100000, 5, '2022-05-26 11:19:00', '2022-05-16 08:19:45', 1),
(17, 8, 'Create users CSV', 'Create 1000 users for us and add it to a CSV', '/uploads/ClientJobImageMonMay16202211:32raise-hands.jpeg', 1000, 40, '2022-05-24 11:31:00', '2022-05-16 08:32:13', 1),
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
(30, 14, 'Translate website to Kiswahili', 'Translate website paulonteri.com to Kiswahili', '/uploads/ClientJobImageMonMay16202212:57tech.jpeg', 4000, 10, '2022-06-04 12:57:00', '2022-05-16 09:57:56', 1),
(31, 15, 'Check on the UX of our app', 'Check on the UX of our app Tala on playstore and submit a report', '/uploads/ClientJobImageMonMay16202213:03raise-hands.jpeg', 7000, 45, '2022-05-19 13:02:00', '2022-05-16 10:03:31', 1),
(32, 15, 'Mark stale issues as stale', 'Mark stale issues as stale in our open source repo https://github.com/paulonteri/freelance-marketplace/', '/uploads/ClientJobImageMonMay16202213:04tech.jpeg', 1000, 40, '2022-05-25 13:04:00', '2022-05-16 10:04:33', 1);

--
-- Dumping data for table `job_proposal`
--

INSERT INTO `job_proposal` (`id`, `status`, `title`, `description`, `job_id`, `freelancer_id`, `submission_description`, `submission_attachment`, `client_comment`, `time_work_starts`, `time_work_ends`, `time_created`, `is_active`) VALUES
(1, 'completed successfully', 'Flutter Developer & UI/UX Designer', 'I have mastered the art of states and widgets in Flutter, making it my preferred UI tool. I have vast experience working with Flutter, coupled with other technologies to create full-scale apps.\r\nSuch as both SQL(PostgreSQL,Mysql) and NoSQL(MongoDB) databases and python(flask,DRF,fastapi) or Js(Node) for backend Solutions. Open to working with you.', 6, 10, 'I have completed the task', '/uploads/FreelancerWorkCompleteFileMonApr18202215:47work.zip', NULL, NULL, NULL, '2022-03-24 08:36:04', 1),
(2, 'withdrawn', 'I am an experienced social media manager', 'I would like to express my strong interest in the Social Media Manager position for the stated time. I am confident that my previous success as a social media manager, as well as my strong communication and collaboration skills, make me an ideal candidate for the position.\r\n\r\nI have ten years of experience in marketing, and I have spent the last five of those years as a Social Media Manager. My most recent campaign for Acme Corp. led to an increase of over 35% in inbound traffic for Acme’s website. Through a combination of creative social media marketing strategies and thorough monitoring of success through media analytics, KPIs, and dashboards, I can assure you of a similar rate of success.\r\n\r\nI am confident that my experience as well as my ability to collaborate and communicate, make me a strong candidate for the Social Media Manager.  Thank you so much for your time and consideration.', 5, 10, NULL, NULL, NULL, NULL, NULL, '2022-03-27 11:17:58', 1),
(4, 'accepted', 'Qualified Software Engineer', 'I have training in the above skills', 7, 10, NULL, NULL, NULL, NULL, NULL, '2022-04-18 10:24:26', 1),
(5, 'accepted', 'I host my own mailing server', 'I am used to performing such tasks', 11, 10, NULL, NULL, NULL, NULL, NULL, '2022-05-01 12:32:30', 1),
(6, 'accepted', 'Qualified Software Engineer', 'I have training in the above skills', 8, 10, NULL, NULL, NULL, NULL, NULL, '2022-05-01 12:33:19', 1),
(7, 'accepted', 'I have vast experience in data centre management', 'Motivated IT support technician seeks new position in dynamic, growth-oriented company focused on cultivating exceptional customer experience and a positive work environment. With experience handling networking concerns, implementing new software, installing new hardware, and addressing user concerns, I bring attention to detail and a dedication to technical improvement to each job. Past achievements include new network architecture component selection and implementation, earning leading industry certifications, and driving the achievement of departmental goals.', 10, 10, NULL, NULL, NULL, NULL, NULL, '2022-05-02 05:02:23', 1),
(8, 'accepted', 'Used to working with such data all day', 'I would like to give it my all', 9, 11, NULL, NULL, NULL, NULL, NULL, '2022-05-02 05:18:45', 1),
(9, 'rejected', 'Former Software Developer', 'I am farmiliar with some of the technology above', 8, 11, NULL, NULL, NULL, NULL, NULL, '2022-05-02 05:19:38', 1),
(10, 'rejected', 'Former Software Engineer', 'As the title says, I am a former software developer and would like to give this task a try', 7, 11, NULL, NULL, NULL, NULL, NULL, '2022-05-02 05:20:23', 1),
(11, 'accepted', 'Experienced copywriter', 'Creative wordsmith dedicated to crafting messages worthwhile remembering. I believe stories are key to human connection, and storytelling is my passion. Let&rsquo;s get into each other.', 12, 11, NULL, NULL, NULL, NULL, NULL, '2022-05-02 05:22:11', 1);

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
(49, 32, 19);

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
(1, 'Programming'),
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
(11, 'client@test.com', '0718578833', '$2y$10$5QzsfhuROuvDUYtQ4Zv3ZuKkVEfaW1txv/553xBCTunpQvc/bpIsK', 'Meek', 'Moi', 'Karan', '/uploads/profile.avif', 'Kenya', 'Kajiado', 'Rongai', 0, 1, '2022-03-22 06:52:13'),
(12, 'freelancer@test.com', '0762307628', '$2y$10$zL2K68YBS7rwMSGIyQ5R.egPQYy43zMaPokgHtOA01j4ylacVCRPu', 'Sharon', 'Kerubo', 'Kiara', '/uploads/profile-female.avif', 'Kenya', 'Kisii', 'Kisii', 1, 1, '2022-03-22 07:53:28'),
(13, 'freelancer1@test.com', '0793395484', '$2y$10$uohjjRXWHVnduYxpyyUuq.e1yNBkS2BZfXI4SvZzRUWCS.DJbXkS6', 'Amity', 'Rapando', 'Bean', '/uploads/ProfileImageTueMar2220229:241628513616264.jpeg', 'Kenya', 'Thika', 'Juja', 0, 1, '2022-03-22 08:53:44'),
(14, 'client1@test.com', '0777627107', '$2y$10$KKCOjS2ZFwlR6aGdxVpWleKstTq1d1q1Um14sC0m4mAyf0OrXVq6m', 'Margaret', 'Kerugoya', 'Wandia', '/uploads/ProfileImageSunMay01202212:16across the bridge.jpeg', 'Kenya', 'Kajiado', 'Rongai', 0, 1, '2022-05-01 12:16:46'),
(15, 'client2@test.com', '0721675907', '$2y$10$gTTrOn0rMMZ1.8ZownuMfODHWU64ZIQvcFOFRv9YeJ3eP8rcQxl6K', 'Virginia', 'Bond', 'Ngooru', '/uploads/ProfileImageWedMay11202212:20240452437_257190502758422_107796797346897910_n.jpg', 'Kenya', 'Nakuru', 'Gilgil', 0, 1, '2022-05-11 12:20:42'),
(16, 'freelancer2@test.com', '0788713917', '$2y$10$ZWE4wzPZQW1yqY8xL00wju4o.a87IGnOfjhaGA/ufbLy9QHk3yloa', 'Margaret', 'Duncan', 'Nerea', '/uploads/ProfileImageWedMay11202212:38240452437_257190502758422_107796797346897910_n.jpg', 'Kenya', 'Kajiado', 'Rongai', 1, 1, '2022-05-11 12:38:48'),
(17, 'admin@test.com', '0758751473', '$2y$10$tPEM20lasLluoM8yA0G2JeSZayhDhWcZeAh98OoDHrYJCP0pQc4w6', 'Keith', 'Wend', 'Otieno', '/uploads/ProfileImageWedMay11202212:44explorers_on_the_moon.jpg', 'Kenya', 'Migori', 'Rongo', 1, 1, '2022-05-11 12:44:20'),
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
(28, 'client14@test.com', '0790257133', '$2y$10$2/8y0fwv1lftiO/znyTJzuP4pO3JPZmHKJhgGkTv1j.YKDyXLXhv2', 'Russell', 'Sanchez', 'Otieno', '/uploads/ProfileImageMonMay16202211:06man-dark-room.jpeg', 'Kenya', 'tana river', 'Hola', 0, 1, '2022-05-16 08:06:54'),
(29, 'client15@test.com', '0749936647', '$2y$10$/fUfBelCLqckoGS5B1PL1OuZIcPlRAn87Q2M.ePb/M0JD.7VJVI92', 'Rose', 'Jacobson', 'Kioko', '/uploads/ProfileImageMonMay16202211:15lady-cuup.jpeg', 'Kenya', 'Lamu', 'Lamu', 0, 1, '2022-05-16 08:15:55'),
(30, 'client16@test.com', '0791263759', '$2y$10$PrtDZyX8H1CPlpceOBDteOgbM5FbUplTk/qVI5T3zsCjXMb562BxK', 'Ivana', 'Mohammed', 'Mwende', '/uploads/ProfileImageMonMay16202211:29man-suit.jpeg', 'Kenya', 'Taita taveta', 'Mwatete', 0, 1, '2022-05-16 08:29:20'),
(31, 'client17@test.com', '0724981920', '$2y$10$wuNw737ibgl5AfcbjLfxHeOox3ySY4p79J3uejQUpTgbL0cKuyCgm', 'Noelani', 'Mwangi', 'Oduor', '/uploads/ProfileImageMonMay16202211:34men-suits.jpeg', 'Kenya', 'Garissa', 'Garissa', 0, 1, '2022-05-16 08:34:34'),
(32, 'client18@test.com', '0722674145', '$2y$10$qpT5aN5ISm6oaCObff7zl.kiP5rAQx4V9eKz7YiWcYX5uPJKkr31a', 'Whitney', 'Buyaki', 'Kip', '/uploads/ProfileImageMonMay16202211:41lady-suit.jpeg', 'Kenya', 'Tharaka-Nithi', 'Kathwana', 0, 1, '2022-05-16 08:41:14'),
(33, 'client19@test.com', '0745937863', '$2y$10$56dRZOmR7wkzbbkfKwvcVOgoB1Mz6RncMGbycBN1Rq4y2btmKjD7O', 'Clinton', 'Juma', 'Ngugi', '/uploads/ProfileImageMonMay16202212:31man-t-shirt.jpeg', 'Kenya', 'Makueni', 'Wote', 0, 1, '2022-05-16 09:31:39'),
(34, 'client20@test.com', '0743603547', '$2y$10$Eu5bhlo7qeRLQk3jx8qWk.m37IzjJGQwpxEvuzmsiSh2Hgzed.mFu', 'Quintessa', 'Chebet', 'Kinyua', '/uploads/ProfileImageMonMay16202212:38old-man.jpeg', 'Kenya', 'Nyandarua', 'Ole kalau', 0, 1, '2022-05-16 09:38:00'),
(35, 'client21@test.com', '0733258757', '$2y$10$wZ6M8LmOdDSbHX/wkgbA.umh5dNezBdvORy71bl/3er5yhSiCjdAG', 'Jillian', 'Kimani', 'Waweru', '/uploads/ProfileImageMonMay16202212:44man-shirt.jpeg', 'Kenya', 'Samburu', 'Maralal', 0, 1, '2022-05-16 09:44:40'),
(36, 'client22@test.com', '0746246147', '$2y$10$l4GuvYPUVUu8fpyAk3X8cevcMnO3W42GsVaMtIzgizs57gcMWh.8m', 'Anne', 'Nyambura', 'Chege', '/uploads/ProfileImageMonMay16202212:54lady-cuup.jpeg', 'Kenya', 'Nyamira', 'Nyamira', 0, 1, '2022-05-16 09:54:32'),
(37, 'client23@test.com', '0735808930', '$2y$10$b04zbuP99EyFl8Uj5BzqfefO.t1b34/FkKI4/duq7pv8v1/.5Bdgu', 'Kessie', 'Barasa', 'Mbugua', '/uploads/ProfileImageMonMay16202213:00lady-suit.jpeg', 'Kenya', 'Kirinyaga', 'Kerugoya', 0, 1, '2022-05-16 10:00:36');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
