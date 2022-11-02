-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 08:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `google_first_name` varchar(255) DEFAULT NULL,
  `google_last_name` varchar(255) DEFAULT NULL,
  `google_email_address` varchar(255) DEFAULT NULL,
  `google_image` varchar(255) DEFAULT NULL,
  `user_level` varchar(11) NOT NULL DEFAULT '0' COMMENT '0 - User, 1 - Management ...',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `google_id`, `google_first_name`, `google_last_name`, `google_email_address`, `google_image`, `user_level`, `created_at`, `updated_at`, `status`) VALUES
(2, '112473759592009280769', 'Ferdinand', 'Celis', 'ftcelis@asticom.com.ph', 'https://lh3.googleusercontent.com/a/ALm5wu37sIw30ni7YQI-QWhyTLTMGGFaNSbDsLfzCINoog=s96-c', '0', '2022-10-27 01:32:25', NULL, 0),
(3, '112473759592009280735', 'Nick Darwin', 'Montillano', 'namontillano@asticom.com.ph', 'https://lh3.googleusercontent.com/a/ALm5wu37sIw30ni7YQI-QWhyTLTMGGFaNSbDsLfzCINoog=s96-c', '0,1', '2022-11-02 05:44:33', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories_name` varchar(255) DEFAULT NULL,
  `categories_code` varchar(255) DEFAULT NULL,
  `display_status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_name`, `categories_code`, `display_status`, `created_at`, `deleted_status`) VALUES
(1, 'Broadcast', 'broadcast', 1, '2022-10-27 01:34:18', 0),
(2, 'HR', 'hr', 1, '2022-10-27 01:34:18', 0),
(3, 'Recruitment', 'recruitment', 1, '2022-10-27 01:34:18', 0),
(4, 'Finance', 'finance', 1, '2022-10-27 01:34:18', 0),
(5, 'CyberTech', 'cybertech', 1, '2022-10-27 01:34:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `comment_post_id` varchar(255) DEFAULT NULL,
  `comment_user_id` varchar(255) DEFAULT NULL,
  `comment_message` text NOT NULL,
  `comment_date_posted` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_post_id`, `comment_user_id`, `comment_message`, `comment_date_posted`) VALUES
(26, '1', '112473759592009280735', 'asdlkjasdlkjasd', '2022-10-19 15:41:58'),
(27, '1', '112473759592009280735', 'asdsad', '2022-10-19 15:42:14'),
(35, '13', '112473759592009280735', 'whahahhaa', '2022-10-20 13:43:43'),
(41, '13', '112473759592009280735', 'asdasd', '2022-10-20 23:09:27'),
(42, '13', '112473759592009280735', 'asdasd123', '2022-10-20 23:09:33'),
(47, '7', '112473759592009280735', 'asdasdasd', '2022-10-21 00:12:52'),
(50, '25', '112473759592009280735', 'asd', '2022-10-21 09:18:16'),
(51, '25', '112473759592009280735', 'asd', '2022-10-21 09:47:30'),
(52, '14', '112473759592009280735', 'asdasd', '2022-10-21 12:18:43'),
(53, '26', '112473759592009280769', 'hello', '2022-10-21 13:13:00'),
(55, '26', '112473759592009280735', 'buzz', '2022-10-21 13:16:41'),
(57, '13', '112473759592009280735', 'woi', '2022-10-23 13:48:15'),
(58, '13', '112473759592009280735', 'buzz', '2022-10-23 13:48:18'),
(59, '13', '112473759592009280735', 'buzz', '2022-10-23 13:50:52'),
(60, '13', '112473759592009280735', 'numb', '2022-10-23 13:52:45'),
(61, '13', '112473759592009280735', 'noob', '2022-10-23 13:52:48'),
(62, '13', '112473759592009280735', '* tayo', '2022-10-23 13:56:47'),
(63, '13', '112473759592009280735', 'tayo', '2022-10-23 13:57:44'),
(65, '13', '112473759592009280735', 'asd', '2022-10-23 13:58:31'),
(70, '13', '[object HTMLInputElement]', 'sample', '2022-10-24 23:42:06'),
(75, '13', '112473759592009280735', 'asdasd', '2022-10-25 11:18:15'),
(76, '13', '112473759592009280735', 'buzzzzmeasd', '2022-10-25 11:26:04'),
(77, '13', '112473759592009280735', 'edited comment', '2022-10-25 12:18:25'),
(88, '11', '112473759592009280735', '1', '2022-10-25 20:58:06'),
(89, '11', '112473759592009280735', '2', '2022-10-25 20:58:07'),
(90, '11', '112473759592009280735', '3', '2022-10-25 20:58:09'),
(91, '11', '112473759592009280735', '4', '2022-10-25 20:58:10'),
(92, '11', '112473759592009280735', '5', '2022-10-25 20:58:11'),
(93, '11', '112473759592009280735', '6', '2022-10-25 20:58:12'),
(94, '11', '112473759592009280735', '7', '2022-10-25 20:58:13'),
(95, '11', '112473759592009280735', '8', '2022-10-25 20:58:14'),
(96, '11', '112473759592009280735', '9', '2022-10-25 20:58:15'),
(97, '11', '112473759592009280735', '10', '2022-10-25 20:58:17'),
(98, '11', '112473759592009280735', '11', '2022-10-25 20:58:18'),
(99, '11', '112473759592009280735', '12', '2022-10-25 20:58:20'),
(100, '11', '112473759592009280735', '13', '2022-10-25 20:58:21'),
(101, '11', '112473759592009280735', '14', '2022-10-25 20:58:22'),
(102, '11', '112473759592009280735', '15', '2022-10-25 20:58:24'),
(103, '11', '112473759592009280735', '16', '2022-10-25 20:58:26'),
(106, '11', '112473759592009280735', '17', '2022-10-25 21:20:02'),
(108, '24', '112473759592009280735', '1', '2022-10-25 21:36:19'),
(109, '24', '112473759592009280735', '2\r\n', '2022-10-25 21:36:21'),
(110, '24', '112473759592009280735', '3', '2022-10-25 21:36:22'),
(111, '24', '112473759592009280735', '4', '2022-10-25 21:36:23'),
(112, '24', '112473759592009280735', '5', '2022-10-25 21:36:24'),
(113, '24', '112473759592009280735', '6', '2022-10-25 21:36:25'),
(114, '24', '112473759592009280735', '7', '2022-10-25 21:36:26'),
(115, '24', '112473759592009280735', '8', '2022-10-25 21:36:27'),
(116, '24', '112473759592009280735', '9', '2022-10-25 21:36:28'),
(117, '27', '112473759592009280735', 'sdasdad', '2022-10-26 13:05:42'),
(118, '28', '112473759592009280735', 'nlknlk', '2022-10-26 13:30:38'),
(119, '14', '112473759592009280735', 'asdasdasdsda\r\nsad123', '2022-10-27 09:05:18'),
(120, '13', '112473759592009280735', 'asdasdasd\r\nadsasdasd', '2022-10-27 14:07:31'),
(121, '11', '112473759592009280735', 'asdasd', '2022-10-27 14:08:17'),
(122, '13', '112473759592009280735', 'asdasdasd', '2022-10-27 14:11:00'),
(123, '27', '112473759592009280735', 'asdasda', '2022-10-27 22:03:20'),
(124, '27', '112473759592009280735', '123123123', '2022-10-27 22:03:24'),
(125, '15', '112473759592009280735', 'dasdasdasd', '2022-10-27 22:11:44'),
(126, '15', '112473759592009280735', '4rererereyyre', '2022-10-27 22:11:50'),
(128, '15', '112473759592009280735', 'asd345fdhasdasd', '2022-10-27 22:14:37'),
(131, '15', '112473759592009280735', 'asdasd', '2022-10-27 22:18:37'),
(132, '15', '112473759592009280735', 'asd12312', '2022-10-27 22:22:03'),
(133, '15', '112473759592009280735', 'buzzz!', '2022-10-27 22:23:17'),
(134, '15', '112473759592009280735', 'asdasd123123', '2022-10-27 22:24:34'),
(135, '15', '112473759592009280735', 'sdgsdg253', '2022-10-27 22:24:40'),
(136, '26', '112473759592009280735', 'asdasd2312', '2022-10-27 22:25:56'),
(137, '14', '112473759592009280735', 'asdsadasd1213', '2022-10-27 22:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `title`, `content`) VALUES
(1, 'http://localhost/isearch.asticom.com.ph/hr.php', 'i-Search | HR', 'Timekeeping HR Downloadable Forms Ayala Coop Membership Form Ayala Coop Loan Ayala Coop Salary - ATD Ayala Coop Termination Form ETIQA Hospitalization Claim Form Out-Patient Claim Form Pag-Ibig Consolidation Form Pagibig Provident Claim SSS Maternity Notification (MAT 1) Maternity Reimbursement (MAT 2) Allocation of Maternity Leave Credits OB History Form SSS Maternity Guidelines FAQs Sickness Notification Sickness Reimbursement SSS Sickness Guidelines FAQs SSS E4 SSS Death Claim Philhealth Philhealth Member Registration Form Asticom CF1 CSF ABSI CF1 CSF FINSI CF1 CSF Payroll Payroll 101 2022 Payroll Calendar Benefits Benefits offered by SSS SSS Salary Loan SSS Sickness Benefits Maternity Leave Process and Benefits Expanded Maternity Leave SSS BENEFITS Update personal information with SSS SSS Salary Loan SSS Sickness Benefits Maternity Leave Process and Benefits Expanded Maternity Leave SSS BENEFITS Update personal information with SSS SSS Salary Loan SSS Sickness Benefits Total Employee Reward Benefits Digest Benefits 101 Ayala Coop Philhealth Benefits PAGIBIG Virtual Process PAGIBIG Loan ETIQA HMO ID Number Etiqa Accredited Hospital/Clinic Etiqa Dental Health Partners Etiqa Requirements Etiqa Brochure Etiqa X Covid 19 FAQs Employee Exit Management Online Resignation Offboarding Guide & Policy Case Management Case Management Whistle Blower Whistleblower Policy Code of Discipline Operations Code'),
(2, 'http://localhost/isearch.asticom.com.ph/project-vega.php', 'i-Search | Project Vega: Policies, Procedures and Guidelines', 'Project Vega: Policies, Procedures and Guidelines ( For Internal Use Only ) Access Control Policy and Guidelines BYOD Mobile Device Acceptable Use Policy Change Management Procedure Clear Desk and Clear Screen Guidelines Code Of Discipline Guidelines Compliance With Legal Requirements Guidelines Employee Off-Boarding Procedure Employee On-Boarding and Movement Procedure IMS Acceptable Use Guidelines IMS Control Of Documents and Records IMS Internal and External Communication IMS Internal Audit, Management Review and Nonconformity & Corrective Action Procedure IMS Training and Awareness Guidelines Incident Management Procedure Information Classification Guidelines Integrated Management System Manual Integrated Management System Policy Physical and Environmental Security Guidelines Service Catalogue');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(255) NOT NULL,
  `post_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `post_id`, `title`, `photo`) VALUES
(1, '15', 'Demo 1', '1.jpg'),
(2, '15', 'Demo 2', '2.jpg'),
(3, '15', 'Demo 3', '3.jpg'),
(4, '15', 'Demo 4', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `post_type` varchar(255) DEFAULT NULL COMMENT 'Announcements, News, Community',
  `post_category` varchar(255) DEFAULT NULL COMMENT 'categories table -> "categories_code"',
  `post_embed` varchar(255) DEFAULT '0',
  `post_thumb` varchar(255) NOT NULL DEFAULT '0',
  `post_title` varchar(255) DEFAULT NULL,
  `post_content` text NOT NULL,
  `post_postedby` varchar(255) DEFAULT NULL,
  `post_postedon` varchar(255) DEFAULT NULL,
  `post_pin` int(10) NOT NULL DEFAULT 0,
  `post_views` int(255) NOT NULL DEFAULT 0,
  `display_status` varchar(255) NOT NULL DEFAULT '0',
  `deleted_status` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_type`, `post_category`, `post_embed`, `post_thumb`, `post_title`, `post_content`, `post_postedby`, `post_postedon`, `post_pin`, `post_views`, `display_status`, `deleted_status`) VALUES
(1, 'Announcements', 'cybertech', 'https://docs.google.com/presentation/d/1y-aXhKWJYrLHBW3HMS0HGSgYAai79DgUoQZDjdtvZuA/embed?authuser=0&amp;delayms=3000&amp;loop=true&amp;start=true', '0', 'How-to-Use Jira Work Management', 'How-to-Use Jira Work Management', 'CyberTech', '2022-10-14 08:00:00', 0, 2, '1', '0'),
(2, 'Announcements', 'cybertech', 'https://drive.google.com/file/d/13GP_YFR_ZwdK5EbnMUf2l10fNgZCdKYK/preview', '0', 'Jira Work Management', 'Jira Work Management', 'CyberTech', '2022-10-14 08:00:00', 0, 1, '1', '0'),
(3, 'Announcements', 'cybertech', 'https://www.youtube.com/embed/WTH5zMmLZeg', '0', 'iServe CTG Live Chat support', 'iServe CTG Live Chat support', 'CyberTech', '2022-10-14 08:00:00', 0, 1, '1', '0'),
(4, 'Announcements', 'cybertech', 'https://drive.google.com/file/d/19fHksIMlVv_Ck_lo0nyOdFGUOslBkZBY/preview', '0', 'Project Trace', 'Project Trace', 'CyberTech', '2022-10-14 08:00:00', 0, 0, '1', '0'),
(5, 'Announcements', 'cybertech', 'https://docs.google.com/presentation/d/1gRq9cAfbJDy_u9Qm39-ajpp3VXvubUIG001K_QJzBmk/embed?delayms=3000&start=true&slide=id.g13fca2fbe37_0_0', '0', 'Project Vega: ISO Certification', 'Project Vega: ISO Certification', 'CyberTech', '2022-10-14 08:00:00', 0, 0, '1', '0'),
(6, 'Announcements', 'cybertech', 'https://drive.google.com/file/d/1SAn8VkSslSgfzgo60-jqGLgj2h2HDqTq/preview', '0', 'Project Vega', 'Project Vega', 'CyberTech', '2022-10-14 08:00:00', 0, 1, '1', '0'),
(7, 'Announcements', 'cybertech', 'https://drive.google.com/file/d/1EFVQt1IYPCewfEEmy1HKmd5eS7FWJSVr/preview', '0', 'Acquishare Walkthrough', 'Acquishare Walkthrough', 'CyberTech', '2022-10-14 08:00:00', 0, 2, '1', '0'),
(8, 'Announcements', 'cybertech', '1qhi7pbd0f48znwot6jglc2x95sevm.gif', '0', 'Acquishare MVP2', 'Acquishare MVP2', 'CyberTech', '2022-10-14 08:00:00', 0, 1, '1', '0'),
(9, 'Announcements', 'cybertech', 'https://drive.google.com/file/d/17OQ-KuP3mOnFQqfBnNw3v9IE8V4RejrU/preview', '0', 'Project Vega Infomercial Guide', 'Project Vega Infomercial Guide', 'CyberTech', '2022-10-14 08:00:00', 0, 3, '1', '0'),
(10, 'Announcements', 'cybertech', '0utwy1inxoq9verdk64h2c5p8fazjm.gif', '0', 'Project Vega', 'Project Vega', 'CyberTech', '2022-10-14 08:00:00', 0, 4, '1', '0'),
(11, 'Announcements', 'cybertech', 'https://drive.google.com/file/d/1SBbIAn_Oyl2dqgbyVqzmx2XxCs3aX1Iy/preview', '0', 'Internal Quality Audit (IQA) Guide Infomercial', 'Internal Quality Audit (IQA) Guide Infomercial', 'CyberTech', '2022-10-14 08:00:00', 1, 193, '1', '0'),
(12, 'Announcements', 'cybertech', 'https://drive.google.com/file/d/1TmpObFYPjHQ7QSNrWfa70bMcW9gmRMvj/preview', '0', 'Project Vega Internal Quality Audit (IQA) -\r\nPost Audit Activities', 'Project Vega Internal Quality Audit (IQA) -\r\nPost Audit Activities', 'CyberTech', '2022-10-14 08:00:00', 1, 73, '1', '0'),
(13, 'Announcements', 'cybertech', '2st83hpug4l1kyjd6xrbavwnq0zf79.gif', '0', 'Project Vega Internal Quality Audit (IQA) is now COMPLETED, but what\'s next!?', 'Project Vega Internal Quality Audit (IQA) is now COMPLETED, but what\'s next!?', 'CyberTech', '2022-10-14 08:00:00', 1, 407, '1', '0'),
(14, 'News', 'hr', 'https://drive.google.com/file/d/1V1v65_A9Mi4-N_bJUNMj_iZz6j5lejUj/preview', '1usgv3op6lanzdindaj42rq0by9etw.png', 'DigiOffice Training Roadshow', 'DigiOffice Training Roadshow', 'HR', '2022-10-14 08:00:00', 1, 128, '1', '0'),
(15, 'Announcements', 'hr', '1usgv3op6lanzdikfmj42rq0by9etw.png', '0utwy1inxoq9verdk64h2c5p8fazjm.gif', 'DIGIOFFICE IS NOW LIVE!', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis rhoncus scelerisque vulputate. Curabitur at pulvinar ante. In placerat, justo sit amet gravida cursus, eros ipsum varius erat, vitae finibus nulla risus sed eros. Quisque semper massa sit amet venenatis hendrerit. Donec auctor magna id orci imperdiet, a gravida enim fermentum. Donec pretium dolor at libero gravida, eget rutrum nisl condimentum. Donec eu efficitur est. Aliquam tempus nisl eu nisl condimentum, id pellentesque velit consectetur. Nam ut turpis quis enim convallis egestas a at nisl. In eu erat ut diam dictum rutrum et id nulla. Aenean ac laoreet odio. Fusce vitae porta nulla, a ornare nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi ut nibh venenatis libero molestie malesuada eu id tortor.</p>\n\n<p>In sodales libero ac posuere fermentum. Cras quis erat eget nisi maximus congue. Curabitur a elit iaculis, lobortis felis in, scelerisque arcu. Aenean vel porta risus, sed bibendum mi. Vivamus gravida, tortor at dictum convallis, magna justo venenatis sapien, et malesuada nunc risus eget tortor. Pellentesque tristique gravida metus, eget efficitur nunc. Nunc sollicitudin, elit at tincidunt tempor, sapien neque lacinia leo, vel efficitur enim sapien sit amet justo. Cras finibus sed eros sed dictum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla mi elit, viverra quis nulla vitae, malesuada tristique lorem. Proin tincidunt id sapien eget accumsan.</p>', 'HR', '2022-10-14 08:00:00', 1, 370, '1', '0'),
(16, 'Community', 'cybertech', 'https://docs.google.com/presentation/d/1y-aXhKWJYrLHBW3HMS0HGSgYAai79DgUoQZDjdtvZuA/embed?authuser=0&amp;delayms=3000&amp;loop=true&amp;start=true', '0', 'Demo 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in vehicula leo. Sed fringilla hendrerit dolor, pellentesque accumsan neque. Sed blandit eros massa, et varius eros placerat a. Donec porta est quis elementum dignissim. Nunc pellentesque at diam vitae feugiat. Nulla urna urna, euismod vitae varius eu, lacinia vitae lectus. Nulla maximus nunc ut nisi facilisis, quis volutpat nisi feugiat. Mauris eget est vel sem semper fringilla nec quis mi. Suspendisse a arcu commodo, tempor est ut, lacinia urna. In quam tortor, volutpat at ornare vitae, molestie a mauris. Nunc volutpat sapien vitae pharetra gravida. Maecenas consectetur aliquam leo rhoncus pharetra.', 'CyberTech', '2022-10-14 08:00:00', 0, 3, '1', '0'),
(17, 'Community', 'cybertech', 'https://drive.google.com/file/d/13GP_YFR_ZwdK5EbnMUf2l10fNgZCdKYK/preview', '0', 'Demo 2', 'Suspendisse enim eros, tempor et convallis ac, fringilla aliquam est. Duis scelerisque luctus est, sit amet placerat est. Vivamus sed ultrices est. Ut condimentum quis turpis et pharetra. Donec tempor tellus ornare arcu malesuada, viverra auctor ex feugiat. Sed pulvinar, metus eget porta iaculis, risus dui consequat tellus, vel cursus leo est non velit. Praesent euismod, enim vitae eleifend finibus, nulla risus mattis sem, et tempor enim nibh id felis. Morbi in tempor urna. Mauris rhoncus molestie ante in sollicitudin. Maecenas sem est, maximus a tellus nec, mattis dignissim mi. Donec lobortis nulla sit amet elit rutrum, sed pretium odio lobortis. Phasellus mi odio, gravida a efficitur at, volutpat in nisl. Nullam non magna in justo pellentesque condimentum.', 'CyberTech', '2022-10-14 08:00:00', 0, 1, '1', '0'),
(18, 'Community', 'cybertech', 'https://www.youtube.com/embed/WTH5zMmLZeg', '0', 'Demo 3', 'Aliquam id dui eget lectus interdum finibus. Aenean lorem libero, volutpat ut sagittis vitae, gravida eget justo. Maecenas vitae metus congue neque venenatis feugiat ut non dolor. Phasellus nec lacus posuere, pretium orci ac, congue neque. Aliquam sodales nibh vel aliquam lobortis. Donec iaculis mauris quis erat maximus bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse enim odio, gravida suscipit nisl et, interdum auctor sapien. Suspendisse magna massa, ultricies quis tellus quis, imperdiet fermentum dolor.', 'CyberTech', '2022-10-14 08:00:00', 0, 2, '1', '0'),
(19, 'Community', 'cybertech', 'https://drive.google.com/file/d/19fHksIMlVv_Ck_lo0nyOdFGUOslBkZBY/preview', '0', 'Demo 4', 'Etiam rutrum justo mi, sed commodo orci laoreet ut. Vivamus a arcu arcu. Donec aliquam, mi ut molestie mollis, est libero luctus lorem, vel imperdiet dolor magna a felis. Quisque vel nisi ornare, volutpat tortor vitae, semper odio. Fusce purus felis, condimentum vel sem a, rhoncus eleifend ex. Morbi egestas dictum mi eget tincidunt. In ac leo leo. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ac consequat est. Nullam velit est, porttitor facilisis ultrices eget, scelerisque vel risus. Vestibulum risus quam, placerat a placerat id, auctor imperdiet dolor. Etiam sollicitudin accumsan convallis.', 'CyberTech', '2022-10-14 08:00:00', 0, 0, '1', '0'),
(20, 'Community', 'cybertech', 'https://docs.google.com/presentation/d/1gRq9cAfbJDy_u9Qm39-ajpp3VXvubUIG001K_QJzBmk/embed?delayms=3000&start=true&slide=id.g13fca2fbe37_0_0', '0', 'Demo 5', 'Fusce sit amet augue pulvinar, dapibus urna quis, sodales diam. Ut a massa id elit suscipit consequat ac non augue. Fusce vitae velit sed eros euismod egestas. Pellentesque a erat ac sem auctor iaculis nec quis tellus. Cras tempus lacinia odio, at tincidunt tortor facilisis porttitor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed nulla urna, cursus sit amet ornare ut, blandit ut lorem. Morbi malesuada felis et turpis semper sollicitudin. Duis sit amet mauris sit amet magna porta vehicula. Cras ultricies mi ante, eu auctor augue vestibulum vel. Nulla dapibus diam eu enim pellentesque, ut rhoncus velit blandit. Sed suscipit tempus dolor quis tincidunt. Etiam ligula ante, iaculis in dapibus sit amet, fermentum ac metus.', 'CyberTech', '2022-10-14 08:00:00', 0, 0, '1', '0'),
(21, 'Community', 'cybertech', 'https://drive.google.com/file/d/1SAn8VkSslSgfzgo60-jqGLgj2h2HDqTq/preview', '0', 'Demo 6', 'Quisque tempor tempus erat eget convallis. Integer feugiat venenatis vestibulum. Vestibulum non rhoncus nisi. Sed eleifend id velit cursus auctor. Curabitur sodales tortor sed ligula sodales, sed laoreet sapien faucibus. Donec pretium mi nunc, quis rhoncus tellus molestie at. Mauris rutrum ipsum sed est venenatis, id congue arcu condimentum. Integer sagittis lacus sit amet neque accumsan cursus. In urna justo, accumsan non rutrum sed, sagittis eget dui. Donec egestas velit pretium, lacinia tellus sit amet, molestie justo. Donec nec sapien sit amet lectus euismod sollicitudin.', 'CyberTech', '2022-10-14 08:00:00', 0, 1, '1', '0'),
(22, 'Community', 'cybertech', 'https://drive.google.com/file/d/1EFVQt1IYPCewfEEmy1HKmd5eS7FWJSVr/preview', '0', 'Demo 7', 'Vestibulum sollicitudin, dolor in rutrum consequat, risus nisi efficitur eros, et maximus eros sem sit amet magna. Praesent a est eu sapien pellentesque aliquet. Vestibulum auctor sapien sapien, ac consequat ex pellentesque vitae. Proin lectus erat, sollicitudin sed lorem sit amet, bibendum efficitur leo. Nunc a ligula mollis urna aliquam posuere. Mauris condimentum massa ut est iaculis dapibus. In diam ante, scelerisque vitae iaculis vitae, posuere eu nisi. Suspendisse nec neque ut enim feugiat vulputate non quis elit. Donec hendrerit urna at porta tempus.', 'CyberTech', '2022-10-14 08:00:00', 0, 3, '1', '0'),
(23, 'Community', 'cybertech', '1qhi7pbd0f48znwot6jglc2x95sevm.gif', '0', 'Demo 8', 'Suspendisse pharetra orci nulla, bibendum fermentum metus consectetur in. Quisque bibendum magna eu lectus iaculis faucibus. Nullam varius fringilla magna, id sodales diam vehicula in. Ut semper rhoncus justo, quis dapibus dolor commodo ullamcorper. Curabitur ornare rutrum lorem at commodo. Curabitur vitae elementum velit. Aliquam egestas luctus eros, in consectetur sapien ullamcorper in. Integer malesuada dolor quam, sit amet tempor nunc luctus nec. Donec scelerisque aliquam vulputate. Duis in libero id mauris tempus ultricies at tincidunt justo.', 'CyberTech', '2022-10-14 08:00:00', 0, 1, '1', '0'),
(24, 'Community', 'cybertech', 'https://drive.google.com/file/d/17OQ-KuP3mOnFQqfBnNw3v9IE8V4RejrU/preview', '0', 'Demo 9', 'Nam auctor pellentesque elementum. Pellentesque posuere enim id posuere euismod. Aliquam sed metus vitae nunc venenatis sagittis. Vivamus eget lacinia dui. Aliquam justo enim, scelerisque ut lobortis eget, condimentum ac est. Vivamus tempus venenatis purus ut tempor. Quisque ullamcorper dui lectus, fermentum hendrerit est auctor eget. Nulla massa orci, gravida non auctor at, ullamcorper vel ligula. Aliquam vel dictum dolor. Nullam dapibus odio at enim gravida, in eleifend massa auctor. Pellentesque in lorem euismod, porttitor ligula sit amet, semper mauris.', 'CyberTech', '2022-10-14 08:00:00', 0, 5, '1', '0'),
(25, 'Community', 'cybertech', '0utwy1inxoq9verdk64h2c5p8fazjm.gif', '0', 'Demo 10', 'Donec hendrerit orci a rhoncus feugiat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis a eros mauris. Praesent sollicitudin, magna vel dignissim laoreet, nunc erat malesuada felis, quis ullamcorper nibh leo sit amet sapien. Duis euismod, nunc vitae porttitor aliquam, sapien nulla accumsan magna, ut blandit nulla lacus sed odio. Curabitur dapibus, lorem nec malesuada feugiat, est mauris aliquet urna, at viverra nibh arcu a elit. Nulla pulvinar lorem vitae enim vulputate viverra. Maecenas ornare rutrum elit. Duis et ante vel diam mollis fermentum. Phasellus orci mauris, convallis nec eleifend sed, blandit eu velit. Fusce consectetur ultricies commodo. Aenean tempus odio neque, sit amet tempus ante laoreet sit amet. Morbi at placerat augue. Vestibulum tempor, nunc eget ullamcorper ultrices, justo nulla egestas felis, sit amet finibus ante ex nec dui. Morbi ullamcorper odio non ipsum ullamcorper lacinia.', 'CyberTech', '2022-10-14 08:00:00', 0, 14, '1', '0'),
(26, 'Community', 'cybertech', '2st83hpug4l1kyjd6xrbavwnq0zf69.gif', '0', 'AGC Q3 TOWNHALL LIVE BROADCAST', 'SEE YOU, AGCFAM! | AGC Q3 TOWNHALL LIVE BROADCAST', 'CyberTech', '2022-10-14 08:00:00', 1, 247, '1', '0'),
(27, 'Broadcast', 'broadcast', 'https://dev.botadmin.agc.com.ph/gomobile_api/uploads/FIYuVTML3S.png', '0', 'IMPORTANT PAYROLL REMINDERS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'GoMobile', '14-10-22 04:35:44', 0, 31, '1', '0'),
(28, 'Broadcast', 'broadcast', 'https://dev.botadmin.agc.com.ph/gomobile_api/uploads/10Tomk2lAl.png', '0', 'AGC Mental Health Awareness Week', 'AGC Mental Health Awareness Week | That thing called Emotion - A Mental Health Webinar', 'GoMobile', '14-10-22 17:23:09', 0, 11, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `profanity`
--

CREATE TABLE `profanity` (
  `id` int(10) NOT NULL,
  `badwords` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profanity`
--

INSERT INTO `profanity` (`id`, `badwords`) VALUES
(1, 'anal,anus,arse,ass,ballsack,balls,bastard,bitch,biatch,bloody,blowjob,blow job,bollock,bollok,boner,boob,bugger,bum,butt,buttplug,clitoris,cock,coon,crap,cunt,damn,dick,dildo,dyke,fag,feck,fellate,fellatio,felching,fuck,f u c k,fudgepacker,fudge packer,flange,Goddamn,God damn,hell,homo,jerk,jizz,knobend,knob end,labia,lmao,lmfao,muff,nigger,nigga,omg,penis,piss,poop,prick,pube,pussy,queer,scrotum,sex,shit,s hit,sh1t,slut,smegma,spunk,tit,tosser,turd,twat,vagina,wank,whore,wtf,abbo,abo,abortion,abuse,addict,addicts,adult,africa,african,alla,allah,alligatorbait,amateur,american,anal,analannie,analsex,angie,angry,anus,arab,arabs,areola,argie,aroused,arse,arsehole,asian,ass,assassin,assassinate,assassination,assault,assbagger,assblaster,assclown,asscowboy,asses,assfuck,assfucker,asshat,asshole,assholes,asshore,assjockey,asskiss,asskisser,assklown,asslick,asslicker,asslover,assman,assmonkey,assmunch,assmuncher,asspacker,asspirate,asspuppies,assranger,asswhore,asswipe,athletesfoot,attack,australian,babe,babies,backdoor,backdoorman,backseat,badfuck,balllicker,balls,ballsack,banging,baptist,barelylegal,barf,barface,barfface,bast,bastard ,bazongas,bazooms,beaner,beast,beastality,beastial,beastiality,beatoff,beat-off,beatyourmeat,beaver,bestial,bestiality,bi,biatch,bible,bicurious,bigass,bigbastard,bigbutt,bigger,bisexual,bi-sexual,bitch,bitcher,bitches,bitchez,bitchin,bitching,bitchslap,bitchy,biteme,black,blackman,blackout,blacks,blind,blow,blowjob,boang,bogan,bohunk,bollick,bollock,bomb,bombers,bombing,bombs,bomd,bondage,boner,bong,boob,boobies,boobs,booby,boody,boom,boong,boonga,boonie,booty,bootycall,bountybar,bra,brea5t,breast,breastjob,breastlover,breastman,brothel,bugger,buggered,buggery,bullcrap,bulldike,bulldyke,bullshit,bumblefuck,bumfuck,bunga,bunghole,buried,burn,butchbabes,butchdike,butchdyke,butt,buttbang,butt-bang,buttface,buttfuck,butt-fuck,buttfucker,butt-fucker,buttfuckers,butt-fuckers,butthead,buttman,buttmunch,buttmuncher,buttpirate,buttplug,buttstain,byatch,cacker,cameljockey,cameltoe,canadian,cancer,carpetmuncher,carruth,catholic,catholics,cemetery,chav,cherrypopper,chickslick,children\'s,chin,chinaman,chinamen,chinese,chink,chinky,choad,chode,christ,christian,church,cigarette,cigs,clamdigger,clamdiver,clit,clitoris,clogwog,cocaine,cock,cockblock,cockblocker,cockcowboy,cockfight,cockhead,cockknob,cocklicker,cocklover,cocknob,cockqueen,cockrider,cocksman,cocksmith,cocksmoker,cocksucer,cocksuck ,cocksucked ,cocksucker,cocksucking,cocktail,cocktease,cocky,cohee,coitus,color,colored,coloured,commie,communist,condom,conservative,conspiracy,coolie,cooly,coon,coondog,copulate,cornhole,corruption,cra5h,crabs,crack,crackpipe,crackwhore,crack-whore,crap,crapola,crapper,crappy,crash,creamy,crime,crimes,criminal,criminals,crotch,crotchjockey,crotchmonkey,crotchrot,cum,cumbubble,cumfest,cumjockey,cumm,cummer,cumming,cumquat,cumqueen,cumshot,cunilingus,cunillingus,cunn,cunnilingus,cunntt,cunt,cunteyed,cuntfuck,cuntfucker,cuntlick ,cuntlicker ,cuntlicking ,cuntsucker,cybersex,cyberslimer,dago,dahmer,dammit,damn,damnation,damnit,darkie,darky,datnigga,dead,deapthroat,death,deepthroat,defecate,dego,demon,deposit,desire,destroy,deth,devil,devilworshipper,dick,dickbrain,dickforbrains,dickhead,dickless,dicklick,dicklicker,dickman,dickwad,dickweed,diddle,die,died,dies,dike,dildo,dingleberry,dink,dipshit,dipstick,dirty,disease,diseases,disturbed,dive,dix,dixiedike,dixiedyke,doggiestyle,doggystyle,dong,doodoo,doo-doo,doom,dope,dragqueen,dragqween,dripdick,drug,drunk,drunken,dumb,dumbass,dumbbitch,dumbfuck,dyefly,dyke,easyslut,eatballs,eatme,eatpussy,ecstacy,ejaculate,ejaculated,ejaculating ,ejaculation,enema,enemy,erect,erection,ero,escort,ethiopian,ethnic,european,evl,excrement,execute,executed,execution,executioner,explosion,facefucker,faeces,fag,fagging,faggot,fagot,failed,failure,fairies,fairy,faith,fannyfucker,fart,farted ,farting ,farty ,fastfuck,fat,fatah,fatass,fatfuck,fatfucker,fatso,fckcum,fear,feces,felatio ,felch,felcher,felching,fellatio,feltch,feltcher,feltching,fetish,fight,filipina,filipino,fingerfood,fingerfuck ,fingerfucked ,fingerfucker ,fingerfuckers,fingerfucking ,fire,firing,fister,fistfuck,fistfucked ,fistfucker ,fistfucking ,fisting,flange,flasher,flatulence,floo,flydie,flydye,fok,fondle,footaction,footfuck,footfucker,footlicker,footstar,fore,foreskin,forni,fornicate,foursome,fourtwenty,fraud,freakfuck,freakyfucker,freefuck,fu,fubar,fuc,fucck,fuck,fucka,fuckable,fuckbag,fuckbuddy,fucked,fuckedup,fucker,fuckers,fuckface,fuckfest,fuckfreak,fuckfriend,fuckhead,fuckher,fuckin,fuckina,fucking,fuckingbitch,fuckinnuts,fuckinright,fuckit,fuckknob,fuckme ,fuckmehard,fuckmonkey,fuckoff,fuckpig,fucks,fucktard,fuckwhore,fuckyou,fudgepacker,fugly,fuk,fuks,funeral,funfuck,fungus,fuuck,gangbang,gangbanged ,gangbanger,gangsta,gatorbait,gay,gaymuthafuckinwhore,gaysex ,geez,geezer,geni,genital,german,getiton,gin,ginzo,gipp,girls,givehead,glazeddonut,gob,god,godammit,goddamit,goddammit,goddamn,goddamned,goddamnes,goddamnit,goddamnmuthafucker,goldenshower,gonorrehea,gonzagas,gook,gotohell,goy,goyim,greaseball,gringo,groe,gross,grostulation,gubba,gummer,gun,gyp,gypo,gypp,gyppie,gyppo,gyppy,hamas,handjob,hapa,harder,hardon,harem,headfuck,headlights,hebe,heeb,hell,henhouse,heroin,herpes,heterosexual,hijack,hijacker,hijacking,hillbillies,hindoo,hiscock,hitler,hitlerism,hitlerist,hiv,ho,hobo,hodgie,hoes,hole,holestuffer,homicide,homo,homobangers,homosexual,honger,honk,honkers,honkey,honky,hook,hooker,hookers,hooters,hore,hork,horn,horney,horniest,horny,horseshit,hosejob,hoser,hostage,hotdamn,hotpussy,hottotrot,hummer,husky,hussy,hustler,hymen,hymie,iblowu,idiot,ikey,illegal,incest,insest,intercourse,interracial,intheass,inthebuff,israel,israeli,israel\'s,italiano,itch,jackass,jackoff,jackshit,jacktheripper,jade,jap,japanese,japcrap,jebus,jeez,jerkoff,jesus,jesuschrist,jew,jewish,jiga,jigaboo,jigg,jigga,jiggabo,jigger ,jiggy,jihad,jijjiboo,jimfish,jism,jiz ,jizim,jizjuice,jizm ,jizz,jizzim,jizzum,joint,juggalo,jugs,junglebunny,kaffer,kaffir,kaffre,kafir,kanake,kid,kigger,kike,kill,killed,killer,killing,kills,kink,kinky,kissass,kkk,knife,knockers,kock,kondum,koon,kotex,krap,krappy,kraut,kum,kumbubble,kumbullbe,kummer,kumming,kumquat,kums,kunilingus,kunnilingus,kunt,ky,kyke,lactate,laid,lapdance,latin,lesbain,lesbayn,lesbian,lesbin,lesbo,lez,lezbe,lezbefriends,lezbo,lezz,lezzo,liberal,libido,licker,lickme,lies,limey,limpdick,limy,lingerie,liquor,livesex,loadedgun,lolita,looser,loser,lotion,lovebone,lovegoo,lovegun,lovejuice,lovemuscle,lovepistol,loverocket,lowlife,lsd,lubejob,lucifer,luckycammeltoe,lugan,lynch,macaca,mad,mafia,magicwand,mams,manhater,manpaste,marijuana,mastabate,mastabater,masterbate,masterblaster,mastrabator,masturbate,masturbating,mattressprincess,meatbeatter,meatrack,meth,mexican,mgger,mggor,mickeyfinn,mideast,milf,minority,mockey,mockie,mocky,mofo,moky,moles,molest,molestation,molester,molestor,moneyshot,mooncricket,mormon,moron,moslem,mosshead,mothafuck,mothafucka,mothafuckaz,mothafucked ,mothafucker,mothafuckin,mothafucking ,mothafuckings,motherfuck,motherfucked,motherfucker,motherfuckin,motherfucking,motherfuckings,motherlovebone,muff,muffdive,muffdiver,muffindiver,mufflikcer,mulatto,muncher,munt,murder,murderer,muslim,naked,narcotic,nasty,nastybitch,nastyho,nastyslut,nastywhore,nazi,necro,negro,negroes,negroid,negro\'s,nig,niger,nigerian,nigerians,nigg,nigga,niggah,niggaracci,niggard,niggarded,niggarding,niggardliness,niggardliness\'s,niggardly,niggards,niggard\'s,niggaz,nigger,niggerhead,niggerhole,niggers,nigger\'s,niggle,niggled,niggles,niggling,nigglings,niggor,niggur,niglet,nignog,nigr,nigra,nigre,nip,nipple,nipplering,nittit,nlgger,nlggor,nofuckingway,nook,nookey,nookie,noonan,nooner,nude,nudger,nuke,nutfucker,nymph,ontherag,oral,orga,orgasim ,orgasm,orgies,orgy,osama,paki,palesimian,palestinian,pansies,pansy,panti,panties,payo,pearlnecklace,peck,pecker,peckerwood,pee,peehole,pee-pee,peepshow,peepshpw,pendy,penetration,peni5,penile,penis,penises,penthouse,period,perv,phonesex,phuk,phuked,phuking,phukked,phukking,phungky,phuq,pi55,picaninny,piccaninny,pickaninny,piker,pikey,piky,pimp,pimped,pimper,pimpjuic,pimpjuice,pimpsimp,pindick,piss,pissed,pisser,pisses ,pisshead,pissin ,pissing,pissoff ,pistol,pixie,pixy,playboy,playgirl,pocha,pocho,pocketpool,pohm,polack,pom,pommie,pommy,poo,poon,poontang,poop,pooper,pooperscooper,pooping,poorwhitetrash,popimp,porchmonkey,porn,pornflick,pornking,porno,pornography,pornprincess,pot,poverty,premature,pric,prick,prickhead,primetime,propaganda,pros,prostitute,protestant,pu55i,pu55y,pube,pubic,pubiclice,pud,pudboy,pudd,puddboy,puke,puntang,purinapricness,puss,pussie,pussies,pussy,pussycat,pussyeater,pussyfucker,pussylicker,pussylips,pussylover,pussypounder,pusy,quashie,queef,queer,quickie,quim,ra8s,rabbi,racial,racist,radical,radicals,raghead,randy,rape,raped,raper,rapist,rearend,rearentry,rectum,redlight,redneck,reefer,reestie,refugee,reject,remains,rentafuck,republican,rere,retard,retarded,ribbed,rigger,rimjob,rimming,roach,robber,roundeye,rump,russki,russkie,sadis,sadom,samckdaddy,sandm,sandnigger,satan,scag,scallywag,scat,schlong,screw,screwyou,scrotum,scum,semen,seppo,servant,sex,sexed,sexfarm,sexhound,sexhouse,sexing,sexkitten,sexpot,sexslave,sextogo,sextoy,sextoys,sexual,sexually,sexwhore,sexy,sexymoma,sexy-slim,shag,shaggin,shagging,shat,shav,shawtypimp,sheeney,shhit,shinola,shit,shitcan,shitdick,shite,shiteater,shited,shitface,shitfaced,shitfit,shitforbrains,shitfuck,shitfucker,shitfull,shithapens,shithappens,shithead,shithouse,shiting,shitlist,shitola,shitoutofluck,shits,shitstain,shitted,shitter,shitting,shitty ,shoot,shooting,shortfuck,showtime,sick,sissy,sixsixsix,sixtynine,sixtyniner,skank,skankbitch,skankfuck,skankwhore,skanky,skankybitch,skankywhore,skinflute,skum,skumbag,slant,slanteye,slapper,slaughter,slav,slave,slavedriver,sleezebag,sleezeball,slideitin,slime,slimeball,slimebucket,slopehead,slopey,slopy,slut,sluts,slutt,slutting,slutty,slutwear,slutwhore,smack,smackthemonkey,smut,snatch,snatchpatch,snigger,sniggered,sniggering,sniggers,snigger\'s,sniper,snot,snowback,snownigger,sob,sodom,sodomise,sodomite,sodomize,sodomy,sonofabitch,sonofbitch,sooty,sos,soviet,spaghettibender,spaghettinigger,spank,spankthemonkey,sperm,spermacide,spermbag,spermhearder,spermherder,spic,spick,spig,spigotty,spik,spit,spitter,splittail,spooge,spreadeagle,spunk,spunky,squaw,stagg,stiffy,strapon,stringer,stripclub,stroke,stroking,stupid,stupidfuck,stupidfucker,suck,suckdick,sucker,suckme,suckmyass,suckmydick,suckmytit,suckoff,suicide,swallow,swallower,swalow,swastika,sweetness,syphilis,taboo,taff,tampon,tang,tantra,tarbaby,tard,teat,terror,terrorist,teste,testicle,testicles,thicklips,thirdeye,thirdleg,threesome,threeway,timbernigger,tinkle,tit,titbitnipply,titfuck,titfucker,titfuckin,titjob,titlicker,titlover,tits,tittie,titties,titty,tnt,toilet,tongethruster,tongue,tonguethrust,tonguetramp,tortur,torture,tosser,towelhead,trailertrash,tramp,trannie,tranny,transexual,transsexual,transvestite,triplex,trisexual,trojan,trots,tuckahoe,tunneloflove,turd,turnon,twat,twink,twinkie,twobitwhore,uck,uk,unfuckable,upskirt,uptheass,upthebutt,urinary,urinate,urine,usama,uterus,vagina,vaginal,vatican,vibr,vibrater,vibrator,vietcong,violence,virgin,virginbreaker,vomit,vulva,wab,wank,wanker,wanking,waysted,weapon,weenie,weewee,welcher,welfare,wetb,wetback,wetspot,whacker,whash,whigger,whiskey,whiskeydick,whiskydick,whit,whitenigger,whites,whitetrash,whitey,whiz,whop,whore,whorefucker,whorehouse,wigger,willie,williewanker,willy,wn,wog,women\'s,wop,wtf,wuss,wuzzie,xtc,xxx,yankee,yellowman,zigabo,zipperhead,amputa,animal ka,bilat,binibrocha,bobo,bogo,boto,brocha,burat,bwesit,bwisit,demonyo ka,engot,etits,gaga,gagi,gago,habal,hayop ka,hayup,hinampak,hinayupak,hindot,hindutan,hudas,iniyot,inutel,inutil,iyot,kagaguhan,kagang,kantot,kantotan,kantut,kantutan,kaululan,kayat,kiki,kikinginamo,kingina,kupal,leche,leching,lechugas,lintik,nakakaburat,nimal,ogag,olok,pakingshet,pakshet,pakyu,pesteng yawa,poke,poki,pokpok,poyet,pu\'keng,pucha,puchanggala,puchangina,puke,puki,pukinangina,puking,punyeta,puta,putang,putang ina,putangina,putanginamo,putaragis,putragis,puyet,ratbu,shunga,sira ulo,siraulo,suso,susu,tae,taena,tamod,tanga,tangina,taragis,tarantado,tete,teti,timang,tinil,tite,titi,tungaw,ulol,ulul,ungas');

-- --------------------------------------------------------

--
-- Table structure for table `reacts`
--

CREATE TABLE `reacts` (
  `id` int(255) NOT NULL,
  `react_post` varchar(255) DEFAULT NULL,
  `react_type` varchar(50) NOT NULL DEFAULT '0',
  `react_date` varchar(50) DEFAULT NULL,
  `react_user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reacts`
--

INSERT INTO `reacts` (`id`, `react_post`, `react_type`, `react_date`, `react_user_id`) VALUES
(3, '11', '1', '2022-10-18 16:48:41', '1209380912830921831'),
(53, '1', '1', '2022-10-21 07:41:02', '112473759592009280735'),
(66, '15', '5', '2022-10-27 15:53:03', '112473759592009280735'),
(68, '12', '1', '2022-10-21 07:41:02', '112473759592009280735'),
(70, '14', '3', '2022-10-27 22:33:03', '112473759592009280735'),
(71, '7', '1', '2022-10-21 07:41:02', '112473759592009280735'),
(72, '11', '1', '2022-10-21 07:41:02', '112473759592009280735'),
(73, '25', '1', '2022-10-21 09:18:13', '112473759592009280735'),
(74, '26', '5', '2022-10-27 22:32:30', '112473759592009280735'),
(75, '13', '3', '2022-10-25 13:22:02', '112473759592009280735'),
(76, '16', '2', '2022-10-25 14:18:21', '112473759592009280735'),
(77, '28', '2', '2022-10-26 13:03:37', '112473759592009280735');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profanity`
--
ALTER TABLE `profanity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reacts`
--
ALTER TABLE `reacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `profanity`
--
ALTER TABLE `profanity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reacts`
--
ALTER TABLE `reacts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
