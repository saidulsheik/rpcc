-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2020 at 07:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_head`
--

CREATE TABLE `acc_head` (
  `id` int(4) NOT NULL,
  `activity_id` int(4) DEFAULT NULL,
  `acc_code` varchar(8) DEFAULT NULL,
  `acc_head` varchar(269) DEFAULT NULL,
  `unit` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acc_head`
--

INSERT INTO `acc_head` (`id`, `activity_id`, `acc_code`, `acc_head`, `unit`) VALUES
(1, 1, '1.1.1', 'Training and Material cost on Case Management and Referral Pathway (8 Supervisor+30 New Social Workers)  (detailed annex)', 'NOS'),
(2, 1, '1.1.2', 'Training and Material cost on National  Case Management tools  ( 92  Social Workers +8 Supervisor ) (detailed annex)', 'Nos.'),
(3, 1, '1.1.3', 'Travel and referral cost for identify unaccompanied & separated children, OVC and case management Existing)', 'Nos.'),
(4, 1, '1.1.4', 'Travel and referral cost for identify unaccompanied & separated children, OVC and case management (New)', 'sai'),
(5, 1, '1.1.5', 'Emergency response/referral support for children at risk with emergency response services 34 camps and 9 union at host community (as per need)', 'Nos.'),
(6, 1, '1.1.6', 'Salary (15 month+2 Month as Festival bonus) of Senior Program Manager (Child Protection) (New post)', 'Person-month'),
(7, 1, '1.1.7', 'Salary (15 month+2 Month as Festival bonus) of Case Management Expert (New post)', 'Person-month'),
(8, 1, '1.1.8', 'Salary (15month+2 Month as Festival bonus) of Case Supervisor  for Case Management (New post))', 'Person-month'),
(9, 1, '1.1.9', 'Salary (15 month+2 Month as Festival bonus) of Social  Workers (New post)', 'Person-month'),
(10, 1, '1.1.10', 'Salary (18 month+3 Month as Festival bonus) of Social  Workers (Existing post)', 'Person-month'),
(11, 1, '1.1.11', 'Logistics   for SWs workers  (ex: note book pen ,  backpacks,  T-shirt, raincoat, Umbrella, Clip Folder, Stapler, Stamp Pad, Snicker)', 'Person-month'),
(12, 1, '1.1.12', 'Print of the Case Management forms 6500  (child protection subsector case management task force form+ National Case Management tools ) + Cash Assisstance Forms 15000 (21500 pcs@30 )', 'no.'),
(13, 1, '1.1.13', 'File for Case Management', 'No.'),
(14, 1, '1.1.14', 'ID card for New recruited workers', 'no.'),
(15, 1, '1.1.15', 'Forthnightly meeting (per month 2 meeting * 18 month=36 meeting ) (cost for per person @500 *106Person) ', 'No. of Meeting'),
(16, 2, '1.2.1', 'Meeting on Cash Assistance SoP in between UNICEF and DSS', 'No. of Meeting'),
(17, 2, '1.2.2', 'Orientation on Cash Assistance programme tools for the social worker (8 Supervisor and 29 New Social Workers) ', 'no.'),
(18, 2, '1.2.3', 'Meeting with Stakeholders ( UNOs, UP Chair, UP Members ,  USSO,  Union SWs , Community representative    in  5 Union of Teknaf and Ukhoya Upz in host community ( Quarterly 1) on Cash Assisstance', 'no.'),
(19, 2, '1.2.4', 'Coordination Meeting with Case Management stakeholders in camp (32 camps and 9 host coumunity Quarterly 3 meeting )  ', 'no.'),
(20, 2, '1.2.5', 'Orientation of care givers/parents fostering UASC, Orphan, CHH,  caregivers / parents with cronoc illness ,  caregivers / parents of CWD on child care/protection ( Camp 5462 and Host 2941 )', 'no.'),
(21, 2, '1.2.6', 'Salary (15 month+2 Month as Festival bonus) of  Training Officer ( new post )', 'Person-month'),
(22, 2, '1.2.7', 'Salary (15 month+2 Month as Festival bonus) of Cash Expert ( new post )', 'Person-month'),
(23, 2, '1.2.8', 'Distribution of cash grant ( Note: 14,946 children i)  4,491 benefitting from Cash ; ii)  new children 10,455 for cash assisstance ;  ) Note:  11,658 care givers recepeintof cash assisstance i)  3255  caregivers recipient of cash insttament  ;ii) 8403 new care givers )', 'no.'),
(24, 2, '1.2.9', 'Cost for facilitating the distribution of cash grants  (2% service charge for bank)', ''),
(25, 2, '1.2.10', 'Meeting to review and respond to feedback received from Help Desk on  cash distribution  by cash recipient and PDM findings and reccomendations (meeting between DSS and UNICEF) ', 'no.'),
(26, 2, '1.2.11', 'Refreshment and distribution programme arrangement cost ( 32 camps and 9 host comunity )', ''),
(27, 3, '1.3.1', 'Training on  CPIMS+ (8 Supervisor+26 Old and 29 New Social Workers) ', 'Nos.'),
(28, 3, '1.3.2', 'Salary (15 month+2 Month as Festival bonus) of Manager (Monitoring and Evaluation)(New post)', 'Person-month'),
(29, 3, '1.3.3', 'Salary (15 month+2 Month as Festival bonus) of Monitoring and Documentation Officer(New post)', 'Person-month'),
(30, 3, '1.3.4', 'Salary (15 month+2 Month as Festival bonus) of MIS and IT Officer(New post)', 'Person-month'),
(31, 3, '1.3.5', 'Salary (18 month+3 Month as Festival bonus) of Data Entry Assistant (existing post)', 'Person-month'),
(32, 3, '1.3.6', 'Salary (15 month+2 Month as Festival bonus) of Data Entry Assistant (New post)', 'Person-month'),
(33, 3, '1.3.7', 'Printer/cctv for programme office', 'no.'),
(34, 4, '2.1.1', 'Formation of community-based child protection committees and material cost ( 3 in camps and 45 in host community)  ', 'no.'),
(35, 4, '2.1.2', ' Capacity building of  community-based child protection committees  on child rights and their roles and responsibilities- child protection  ( new 48  CBCPC, 3 in camps and 45 in host community) ', 'no.'),
(36, 4, '2.1.3', 'CBCP meetings  ( in Camp -3 in camps and 45 in host comunity) )', 'no.'),
(37, 4, '2.1.4', 'Material  cost for the formation meeting of the Parents and Caregivers groups (Lump sum cost for per meeting), 4 groups in 1 camps and Union ( 32*4 = 136 groups in camps and 5*4=20 groups in host comunity) ', 'no.'),
(38, 4, '2.1.5', 'Orientation and awareness among parents and care givers groups, religious leaders, women, and other key community leaders with improved knowledge on delivering child protection messages,   child & adolescent protection needs and GBV response as well as prevention.', 'no.'),
(39, 4, '2.1.6', 'Salary (15 month+2 Month as Festival bonus) of Finance and Admin Manager(New post)', 'Person-month'),
(40, 4, '2.1.7', 'Salary (18 month+3 Month as Festival bonus) of Accounts Officer(Existing post)', 'Person-month'),
(41, 4, '2.1.8', 'Salary (15 month+2 Month as Festival bonus) of Accounts Assistant (New post)', 'Person-month'),
(42, 4, '2.1.9', 'Salary (15 month+2 Month as Festival bonus) of Admin Officer (New post)', 'Person-month'),
(43, 4, '2.1.10', 'Salary (15 month+2 Month as Festival bonus) of Office  Assistant (existing post)', 'Person-month'),
(44, 4, '2.1.11', 'Salary (15 month+2 Month as Festival bonus) of Store Keeper(New post)', 'Person-month'),
(45, 4, '2.1.12', 'Salary (15 month+2 Month as Festival bonus) of  Messenger(existing post)', 'Person-month'),
(46, 4, '2.1.13', 'Salary (15 month+2 Month as Festival bonus) of Cleaner for Office (New post)', 'Person-month'),
(47, 4, '2.1.14', 'Salary (15 month + 2 Month as Festival bonus) of Guard for Office (New post)', 'Person-month'),
(48, 4, '2.1.15', 'Salary (18 month+3 Month as Festival bonus) of Cleaner-1  and  Guard -1 for Office  (Existing post)', 'Person-month'),
(49, 4, '2.1.16', 'Recruitment Cost of  new  staff ( detailed annex)', 'lump sum'),
(50, 4, '2.1.17', 'Mobile  & Internet Bill for 53 existing 18 months & 49 new project\'s staffs  15 months (Annex -Staff salary sheet)', 'Person-month'),
(51, 4, '2.1.18', 'Furniture (Detailed enclosed)', 'Lump sum'),
(52, 4, '2.1.19', 'Digital SLR Camera for capturing programmatic events and activities', 'Nos.'),
(53, 4, '2.1.20', 'Communication and Visibility Materials Staff ( poster,leaflet, brochure, etc) (detaild annex)', 'Nos.'),
(54, 4, '2.1.21', 'Fire Extinguisher ', 'Nos.'),
(55, 4, '2.1.22', 'Making  signboard with stand for visibility of Child Protection programme).', 'Nos.'),
(56, 5, '3.1.1', 'Training and Material cost on Child Protection in Emergency  to staff  ', 'no. '),
(57, 5, '3.1.2', 'Training  for Program staff on Protection from Sexual Exploitation and Abuse (PSEA)  respond on SEA situation (detailed annex)', 'no'),
(58, 5, '3.1.3', 'Training  for Program staff on child safe-guarding policies to prevent (detailed annex)', 'no'),
(59, 5, '3.1.4', 'Training  for Program staff on child rights , child protection Policy and code of Conduct (detailed annex)', 'no'),
(60, 6, '4.1.1', 'Case Management support and referral service cost for vulnerable children and adolescent during emergency ', 'Lump sum'),
(61, 7, '5.1.1', 'Office Rent ', 'Monthly'),
(62, 7, '5.1.2', 'Utilities & Maintenance', 'Monthly'),
(63, 7, '5.1.3', 'Mobile & internet bill for Coordinator and focal persons ( 10 project staff )', 'Person-month'),
(64, 7, '5.1.4', 'Stationary/ consumable supplies (Lumsum)', 'Monthly'),
(65, 7, '5.1.5', 'Internet facilities, laptop maintenance/repair for project office', 'monthly'),
(66, 8, '5.2.1', 'Staff travelling  & transport cost for monitoring and quality assurance (Annex -Staff salary sheet)', 'Person-month'),
(67, 8, '5.2.2', 'Travelling and Transportation-HO (6trips@2 personnel, and 36 trips@1 persons per month )', 'Nos'),
(68, 8, '5.2.3', 'Travelling and Transportation-( Air fare for Ministry and DSS and related monitoring team such as DG 4 times, Minister 4 times, Secretary 4 times, Additional Secretary 2 times, Joint Secretary, 2 times, Deputy Secretary/DPD or others 4 times Estimated)', 'no.'),
(69, 8, '5.2.4', 'Daily Allowances Minister, State Minister, Secretary, DG DSS and other High Officials above Joint Secretary or Equivalent , Alternative Focal point(Estimated 6 types officials 20 times 40 man day Details in Annex)', 'No. DSA'),
(70, 8, '5.2.5', 'Daily Allowances (DA)  Focal Persons,  Coordinator and other designated Officer for this program (Estimated 3 types officials 80 times man day Details in Annex)', 'No. DSA'),
(71, 8, '5.2.6', 'Renting transportation for monitoring and supervision and for other office use ', 'Month'),
(72, 8, '5.2.7', 'Local Conveyance for Project Office based staff', 'Month'),
(73, 8, '5.2.8', 'Office Maintenance (refreshment, bank charge, and other petty expenses)', 'no.'),
(74, 2, '1.1.1', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(4) NOT NULL,
  `output_id` int(1) DEFAULT NULL,
  `activity_code` varchar(8) DEFAULT NULL,
  `activity_name` varchar(164) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `output_id`, `activity_code`, `activity_name`) VALUES
(1, 1, '1.1', 'Identify unaccompanied, separated, other vulnerable children, adolescent and case management & referral activities'),
(2, 1, '1.2', 'Cash assistance to care givers/parents fostering UASC, Orphan, CHH,  caregivers / parents with cronoc illness ,  caregivers / parents of CWD '),
(3, 1, '1.3', 'Information Management System'),
(4, 2, '2.1', 'Formation of Community based Child Protection committee (CBCPC) and community awareness on CP including Case Management and DRR.'),
(5, 3, '3.1', 'Training and Capacity building '),
(6, 4, '4.1', 'In  case of emergency due to natural disaster (heavy rains, cyclone etc.) the  risk of family separation is reduced and separated children receive appropriate care.'),
(7, 5, '5.1', 'Operational costs for the programme (office space, office supplies, maintenance)'),
(8, 5, '5.2', 'Planning , Monitoring and Communication  of the programme (DSA and Travel Cost for MOSW -DSS HQ Officials )');

-- --------------------------------------------------------

--
-- Table structure for table `budget_details`
--

CREATE TABLE `budget_details` (
  `id` int(8) NOT NULL,
  `acc_id` int(4) NOT NULL,
  `acc_code` varchar(6) DEFAULT NULL,
  `budget_id` int(4) DEFAULT NULL,
  `qty` int(8) DEFAULT NULL,
  `no_of_month` int(2) DEFAULT NULL,
  `unit_cost` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `budget_details`
--

INSERT INTO `budget_details` (`id`, `acc_id`, `acc_code`, `budget_id`, `qty`, `no_of_month`, `unit_cost`) VALUES
(439, 1, '1.1.1', 14, 50, 20, 100),
(440, 2, '1.1.2', 14, 500, 100, 100),
(441, 3, '1.1.3', 14, 100, 100, 120),
(442, 4, '1.1.4', 14, 12, 15, 150),
(443, 5, '1.1.5', 14, 0, 0, 0),
(444, 6, '1.1.6', 14, 0, 0, 0),
(445, 7, '1.1.7', 14, 0, 0, 0),
(446, 8, '1.1.8', 14, 0, 0, 0),
(447, 9, '1.1.9', 14, 0, 0, 0),
(448, 10, '1.1.10', 14, 0, 0, 0),
(449, 11, '1.1.11', 14, 0, 0, 0),
(450, 12, '1.1.12', 14, 0, 0, 0),
(451, 13, '1.1.13', 14, 0, 0, 0),
(452, 14, '1.1.14', 14, 0, 0, 0),
(453, 15, '1.1.15', 14, 0, 0, 0),
(454, 16, '1.2.1', 14, 0, 0, 0),
(455, 17, '1.2.2', 14, 0, 0, 0),
(456, 18, '1.2.3', 14, 0, 0, 0),
(457, 19, '1.2.4', 14, 0, 0, 0),
(458, 20, '1.2.5', 14, 0, 0, 0),
(459, 21, '1.2.6', 14, 0, 0, 0),
(460, 22, '1.2.7', 14, 0, 0, 0),
(461, 23, '1.2.8', 14, 0, 0, 0),
(462, 24, '1.2.9', 14, 0, 0, 0),
(463, 25, '1.2.10', 14, 0, 0, 0),
(464, 26, '1.2.11', 14, 0, 0, 0),
(465, 27, '1.3.1', 14, 0, 0, 0),
(466, 28, '1.3.2', 14, 0, 0, 0),
(467, 29, '1.3.3', 14, 0, 0, 0),
(468, 30, '1.3.4', 14, 0, 0, 0),
(469, 31, '1.3.5', 14, 0, 0, 0),
(470, 32, '1.3.6', 14, 0, 0, 0),
(471, 33, '1.3.7', 14, 0, 0, 0),
(472, 34, '2.1.1', 14, 0, 0, 0),
(473, 35, '2.1.2', 14, 10, 20, 20000),
(474, 36, '2.1.3', 14, 0, 0, 0),
(475, 37, '2.1.4', 14, 0, 0, 0),
(476, 38, '2.1.5', 14, 0, 0, 0),
(477, 39, '2.1.6', 14, 0, 0, 0),
(478, 40, '2.1.7', 14, 0, 0, 0),
(479, 41, '2.1.8', 14, 0, 0, 0),
(480, 42, '2.1.9', 14, 0, 0, 0),
(481, 43, '2.1.10', 14, 0, 0, 0),
(482, 44, '2.1.11', 14, 0, 0, 0),
(483, 45, '2.1.12', 14, 0, 0, 0),
(484, 46, '2.1.13', 14, 0, 0, 0),
(485, 47, '2.1.14', 14, 0, 0, 0),
(486, 48, '2.1.15', 14, 0, 0, 0),
(487, 49, '2.1.16', 14, 0, 0, 0),
(488, 50, '2.1.17', 14, 0, 0, 0),
(489, 51, '2.1.18', 14, 0, 0, 0),
(490, 52, '2.1.19', 14, 0, 0, 0),
(491, 53, '2.1.20', 14, 0, 0, 0),
(492, 54, '2.1.21', 14, 0, 0, 0),
(493, 55, '2.1.22', 14, 0, 0, 0),
(494, 56, '3.1.1', 14, 0, 0, 0),
(495, 57, '3.1.2', 14, 0, 0, 0),
(496, 58, '3.1.3', 14, 0, 0, 0),
(497, 59, '3.1.4', 14, 0, 0, 0),
(498, 60, '4.1.1', 14, 0, 0, 0),
(499, 61, '5.1.1', 14, 0, 0, 0),
(500, 62, '5.1.2', 14, 0, 0, 0),
(501, 63, '5.1.3', 14, 0, 0, 0),
(502, 64, '5.1.4', 14, 0, 0, 0),
(503, 65, '5.1.5', 14, 0, 0, 0),
(504, 66, '5.2.1', 14, 0, 0, 0),
(505, 67, '5.2.2', 14, 0, 0, 0),
(506, 68, '5.2.3', 14, 0, 0, 0),
(507, 69, '5.2.4', 14, 0, 0, 0),
(508, 70, '5.2.5', 14, 0, 0, 0),
(509, 71, '5.2.6', 14, 0, 0, 0),
(510, 72, '5.2.7', 14, 0, 0, 0),
(511, 73, '5.2.8', 14, 2, 2, 2000),
(512, 74, '1.1.1', 14, 0, 0, 0),
(661, 1, '1.1.1', 15, 2, 2, 2000),
(662, 2, '1.1.2', 15, 0, 0, 0),
(663, 3, '1.1.3', 15, 0, 0, 0),
(664, 4, '1.1.4', 15, 0, 0, 0),
(665, 5, '1.1.5', 15, 0, 0, 0),
(666, 6, '1.1.6', 15, 0, 0, 0),
(667, 7, '1.1.7', 15, 0, 0, 0),
(668, 8, '1.1.8', 15, 0, 0, 0),
(669, 9, '1.1.9', 15, 0, 0, 0),
(670, 10, '1.1.10', 15, 0, 0, 0),
(671, 11, '1.1.11', 15, 0, 0, 0),
(672, 12, '1.1.12', 15, 0, 0, 0),
(673, 13, '1.1.13', 15, 0, 0, 0),
(674, 14, '1.1.14', 15, 0, 0, 0),
(675, 15, '1.1.15', 15, 0, 0, 0),
(676, 16, '1.2.1', 15, 0, 0, 0),
(677, 17, '1.2.2', 15, 0, 0, 0),
(678, 18, '1.2.3', 15, 0, 0, 0),
(679, 19, '1.2.4', 15, 0, 0, 0),
(680, 20, '1.2.5', 15, 0, 0, 0),
(681, 21, '1.2.6', 15, 0, 0, 0),
(682, 22, '1.2.7', 15, 0, 0, 0),
(683, 23, '1.2.8', 15, 0, 0, 0),
(684, 24, '1.2.9', 15, 0, 0, 0),
(685, 25, '1.2.10', 15, 0, 0, 0),
(686, 26, '1.2.11', 15, 0, 0, 0),
(687, 27, '1.3.1', 15, 0, 0, 0),
(688, 28, '1.3.2', 15, 0, 0, 0),
(689, 29, '1.3.3', 15, 0, 0, 0),
(690, 30, '1.3.4', 15, 0, 0, 0),
(691, 31, '1.3.5', 15, 0, 0, 0),
(692, 32, '1.3.6', 15, 0, 0, 0),
(693, 33, '1.3.7', 15, 0, 0, 0),
(694, 34, '2.1.1', 15, 0, 0, 0),
(695, 35, '2.1.2', 15, 0, 0, 0),
(696, 36, '2.1.3', 15, 0, 0, 0),
(697, 37, '2.1.4', 15, 0, 0, 0),
(698, 38, '2.1.5', 15, 0, 0, 0),
(699, 39, '2.1.6', 15, 0, 0, 0),
(700, 40, '2.1.7', 15, 0, 0, 0),
(701, 41, '2.1.8', 15, 0, 0, 0),
(702, 42, '2.1.9', 15, 0, 0, 0),
(703, 43, '2.1.10', 15, 0, 0, 0),
(704, 44, '2.1.11', 15, 0, 0, 0),
(705, 45, '2.1.12', 15, 0, 0, 0),
(706, 46, '2.1.13', 15, 0, 0, 0),
(707, 47, '2.1.14', 15, 0, 0, 0),
(708, 48, '2.1.15', 15, 0, 0, 0),
(709, 49, '2.1.16', 15, 0, 0, 0),
(710, 50, '2.1.17', 15, 0, 0, 0),
(711, 51, '2.1.18', 15, 0, 0, 0),
(712, 52, '2.1.19', 15, 0, 0, 0),
(713, 53, '2.1.20', 15, 0, 0, 0),
(714, 54, '2.1.21', 15, 0, 0, 0),
(715, 55, '2.1.22', 15, 0, 0, 0),
(716, 56, '3.1.1', 15, 0, 0, 0),
(717, 57, '3.1.2', 15, 0, 0, 0),
(718, 58, '3.1.3', 15, 0, 0, 0),
(719, 59, '3.1.4', 15, 0, 0, 0),
(720, 60, '4.1.1', 15, 0, 0, 0),
(721, 61, '5.1.1', 15, 0, 0, 0),
(722, 62, '5.1.2', 15, 0, 0, 0),
(723, 63, '5.1.3', 15, 0, 0, 0),
(724, 64, '5.1.4', 15, 0, 0, 0),
(725, 65, '5.1.5', 15, 0, 0, 0),
(726, 66, '5.2.1', 15, 0, 0, 0),
(727, 67, '5.2.2', 15, 0, 0, 0),
(728, 68, '5.2.3', 15, 0, 0, 0),
(729, 69, '5.2.4', 15, 0, 0, 0),
(730, 70, '5.2.5', 15, 0, 0, 0),
(731, 71, '5.2.6', 15, 0, 0, 0),
(732, 72, '5.2.7', 15, 0, 0, 0),
(733, 73, '5.2.8', 15, 0, 0, 0),
(734, 74, '1.1.1', 15, 0, 0, 0),
(735, 1, '1.1.1', 12, 2, 2, 90500),
(736, 2, '1.1.2', 12, 1, 1, 560900),
(737, 3, '1.1.3', 12, 50, 18, 500),
(738, 4, '1.1.4', 12, 30, 15, 500),
(739, 5, '1.1.5', 12, 25, 18, 500),
(740, 6, '1.1.6', 12, 1, 17, 90000),
(741, 7, '1.1.7', 12, 1, 17, 70000),
(742, 8, '1.1.8', 12, 8, 17, 45000),
(743, 9, '1.1.9', 12, 30, 17, 35000),
(744, 10, '1.1.10', 12, 50, 21, 35000),
(745, 11, '1.1.11', 12, 111, 1, 7520),
(746, 12, '1.1.12', 12, 21500, 1, 30),
(747, 13, '1.1.13', 12, 15000, 1, 15),
(748, 14, '1.1.14', 12, 54, 1, 300),
(749, 15, '1.1.15', 12, 2, 15, 55500),
(750, 16, '1.2.1', 12, 2, 1, 10000),
(751, 17, '1.2.2', 12, 1, 1, 33500),
(752, 18, '1.2.3', 12, 30, 1, 5000),
(753, 19, '1.2.4', 12, 41, 6, 5000),
(754, 20, '1.2.5', 12, 8403, 1, 50),
(755, 21, '1.2.6', 12, 1, 17, 50000),
(756, 22, '1.2.7', 12, 1, 17, 70000),
(757, 23, '1.2.8', 12, 9327, 18, 2000),
(758, 24, '1.2.9', 12, 10, 10, 10),
(759, 25, '1.2.10', 12, 1, 3, 5000),
(760, 26, '1.2.11', 12, 41, 18, 3000),
(761, 27, '1.3.1', 12, 1, 1, 135200),
(762, 28, '1.3.2', 12, 1, 17, 70000),
(763, 29, '1.3.3', 12, 1, 17, 50000),
(764, 30, '1.3.4', 12, 1, 17, 50000),
(765, 31, '1.3.5', 12, 2, 21, 35000),
(766, 32, '1.3.6', 12, 1, 17, 35000),
(767, 33, '1.3.7', 12, 1, 1, 123850),
(768, 34, '2.1.1', 12, 48, 1, 6000),
(769, 35, '2.1.2', 12, 48, 1, 10000),
(770, 36, '2.1.3', 12, 48, 18, 3000),
(771, 37, '2.1.4', 12, 158, 1, 2500),
(772, 38, '2.1.5', 12, 158, 1, 5000),
(773, 39, '2.1.6', 12, 1, 17, 70000),
(774, 40, '2.1.7', 12, 1, 21, 50000),
(775, 41, '2.1.8', 12, 1, 17, 40000),
(776, 42, '2.1.9', 12, 1, 17, 45000),
(777, 43, '2.1.10', 12, 1, 21, 25000),
(778, 44, '2.1.11', 12, 1, 17, 27000),
(779, 45, '2.1.12', 12, 1, 21, 17000),
(780, 46, '2.1.13', 12, 1, 17, 14450),
(781, 47, '2.1.14', 12, 1, 17, 14450),
(782, 48, '2.1.15', 12, 2, 21, 14450),
(783, 49, '2.1.16', 12, 1, 1, 600000),
(784, 50, '2.1.17', 12, 102, 0, 0),
(785, 51, '2.1.18', 12, 0, 0, 0),
(786, 52, '2.1.19', 12, 1, 1, 400000),
(787, 53, '2.1.20', 12, 0, 0, 0),
(788, 54, '2.1.21', 12, 4, 1, 3000),
(789, 55, '2.1.22', 12, 1, 1, 30000),
(790, 56, '3.1.1', 12, 4, 1, 25000),
(791, 57, '3.1.2', 12, 2, 1, 25000),
(792, 58, '3.1.3', 12, 2, 1, 25000),
(793, 59, '3.1.4', 12, 4, 1, 40000),
(794, 60, '4.1.1', 12, 300, 2, 2500),
(795, 61, '5.1.1', 12, 1, 18, 90000),
(796, 62, '5.1.2', 12, 1, 18, 20000),
(797, 63, '5.1.3', 12, 5, 18, 2000),
(798, 64, '5.1.4', 12, 1, 18, 120000),
(799, 65, '5.1.5', 12, 1, 18, 10000),
(800, 66, '5.2.1', 12, 109, 0, 0),
(801, 67, '5.2.2', 12, 48, 0, 10000),
(802, 68, '5.2.3', 12, 24, 1, 12000),
(803, 69, '5.2.4', 12, 472, 1, 3000),
(804, 70, '5.2.5', 12, 80, 1, 1500),
(805, 71, '5.2.6', 12, 1, 18, 180000),
(806, 72, '5.2.7', 12, 1, 18, 5000),
(807, 73, '5.2.8', 12, 1, 18, 10000),
(808, 74, '1.1.1', 12, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `budget_master`
--

CREATE TABLE `budget_master` (
  `budget_id` int(11) NOT NULL,
  `budget_desc` varchar(256) NOT NULL,
  `start_month` date NOT NULL,
  `end_month` date NOT NULL,
  `report_text_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT 'Status=0 active budget'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget_master`
--

INSERT INTO `budget_master` (`budget_id`, `budget_desc`, `start_month`, `end_month`, `report_text_id`, `status`) VALUES
(12, 'RCPP Budget Proposal for 2020-21', '2020-07-01', '2021-06-30', 1, 0),
(14, 'RPCC Budget', '2020-07-01', '2021-06-30', 0, 1),
(15, 'test for report text', '2020-08-01', '2020-09-30', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `camp_info`
--

CREATE TABLE `camp_info` (
  `id` int(2) NOT NULL,
  `camp_id` varchar(6) DEFAULT NULL,
  `upailla` varchar(16) DEFAULT NULL,
  `carea` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `camp_info`
--

INSERT INTO `camp_info` (`id`, `camp_id`, `upailla`, `carea`) VALUES
(1, '1 E', 'Ukhia', 'Kutupalang'),
(2, '1 W', 'Ukhia', 'Kutupalang'),
(3, '2 E', 'Ukhia', 'Kutupalang'),
(4, '2 W', 'Ukhia', 'Kutupalang'),
(5, '3', 'Ukhia', 'Kutupalang'),
(6, '4', 'Ukhia', 'Kutupalang'),
(7, '4 Ext', 'Ukhia', 'Kutupalang'),
(8, '5', 'Ukhia', 'Kutupalang'),
(9, '6', 'Ukhia', 'Ghumdhum'),
(10, '7', 'Ukhia', 'Ghumdhum'),
(11, '8E', 'Ukhia', 'Balukhali'),
(12, '8W', 'Ukhia', 'Balukhali'),
(13, '9', 'Ukhia', 'Balukhali'),
(14, '10', 'Ukhia', 'Balukhali'),
(15, '11', 'Ukhia', 'Balukhali'),
(16, '12', 'Ukhia', 'Balukhali'),
(17, '13', 'Ukhia', 'Thankhali'),
(18, '14', 'Ukhia', 'Hakimpara'),
(19, '15', 'Ukhia', 'Jamtola'),
(20, '16', 'Ukhia', 'Moynarghona'),
(21, '17', 'Ukhia', 'Balukhali'),
(22, '18', 'Ukhia', 'Balukhali'),
(23, '19', 'Ukhia', 'Thankhali'),
(24, '20', 'Ukhia', 'Balukhali'),
(25, '20 Ext', 'Ukhia', 'Balukhali'),
(26, '21', 'Teknaf', 'Chakmarkul'),
(27, '22', 'Teknaf', 'Unchiprang'),
(28, '23', 'Teknaf', 'Shamlapur'),
(29, '24', 'Teknaf', 'Leda'),
(30, '25', 'Teknaf', 'Alikhali'),
(31, '26', 'Teknaf', 'Noyapara'),
(32, '27', 'Teknaf', 'Jadimura');

-- --------------------------------------------------------

--
-- Table structure for table `cg_details`
--

CREATE TABLE `cg_details` (
  `id` int(4) NOT NULL,
  `cg_id` int(4) NOT NULL,
  `camp_id` int(11) NOT NULL,
  `no_of_child` int(11) NOT NULL,
  `no_of_care` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cg_details`
--

INSERT INTO `cg_details` (`id`, `cg_id`, `camp_id`, `no_of_child`, `no_of_care`, `amount`) VALUES
(1, 1, 1, 22, 16, 0),
(2, 1, 1, 36, 26, 0),
(3, 1, 3, 24, 20, 0),
(4, 1, 6, 8, 7, 0),
(5, 1, 7, 23, 15, 0),
(6, 1, 9, 9, 8, 0),
(7, 1, 13, 31, 29, 0),
(8, 1, 14, 16, 14, 0),
(9, 1, 15, 34, 28, 0),
(10, 1, 16, 12, 5, 0),
(11, 1, 17, 23, 18, 0),
(12, 1, 18, 15, 10, 0),
(13, 1, 19, 26, 25, 0),
(14, 1, 20, 11, 9, 0),
(15, 1, 21, 4, 3, 0),
(16, 1, 22, 9, 7, 0),
(17, 1, 24, 7, 5, 0),
(18, 1, 25, 7, 5, 0),
(19, 1, 26, 43, 33, 0),
(20, 1, 27, 13, 8, 0),
(21, 3, 32, 11, 10, 20000),
(22, 3, 30, 15, 14, 28000),
(23, 4, 32, 10, 10, 20000),
(24, 4, 31, 10, 2, 4000),
(25, 4, 28, 10, 4, 8000),
(123, 7, 32, 11, 10, 20000),
(124, 7, 31, 12, 10, 20000),
(125, 7, 27, 10, 10, 20000),
(130, 5, 31, 11, 10, 20000),
(131, 5, 32, 11, 10, 20000),
(132, 5, 28, 11, 10, 20000),
(133, 5, 30, 10, 10, 20000),
(134, 5, 13, 10, 10, 20000),
(135, 8, 32, 10, 10, 20000),
(136, 8, 30, 10, 10, 20000),
(137, 8, 26, 10, 10, 20000),
(138, 6, 32, 11, 10, 20000),
(139, 6, 31, 11, 10, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `cg_master`
--

CREATE TABLE `cg_master` (
  `id` int(4) NOT NULL,
  `month_name` varchar(250) NOT NULL,
  `cg_desc` varchar(250) NOT NULL,
  `total_amout` float NOT NULL,
  `report_text_id` int(11) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cg_master`
--

INSERT INTO `cg_master` (`id`, `month_name`, `cg_desc`, `total_amout`, `report_text_id`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '2020-04-01', 'test data', 0, 0, 1, '2020-08-10 12:33:03', '0000-00-00 00:00:00', 1, NULL),
(3, 'August', 'test', 48000, 0, 1, '2020-08-11 16:14:22', '0000-00-00 00:00:00', 1, NULL),
(4, 'August', 'For the mon', 32000, 0, 1, '2020-08-11 17:04:52', '0000-00-00 00:00:00', 1, NULL),
(5, 'August', 'For the mon', 100000, 0, 1, '2020-08-11 17:07:14', '0000-00-00 00:00:00', 1, 1),
(6, 'August', 'For the month of August', 40000, 3, 1, '2020-08-11 17:15:04', '0000-00-00 00:00:00', 1, 1),
(7, 'August', 'Test data for August', 60000, 0, 1, '2020-08-11 17:24:05', '0000-00-00 00:00:00', 1, 1),
(8, 'July', 'test cash allowance', 60000, 3, 1, '2020-08-11 19:06:39', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`) VALUES
(1, 'RPCC', '13', '10', '19 Monipuripara, Farmgate, Tejgoan, Dhaka-1215.', '01750975175', 'Bangladesh', 'Sample message<br>                  <div>\r\n\r\nSample message\r\n\r\n<br></div>', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Administrator', 'a:40:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:15:\"createCashgrant\";i:9;s:15:\"updateCashgrant\";i:10;s:13:\"viewCashgrant\";i:11;s:15:\"deleteCashgrant\";i:12;s:12:\"createBudget\";i:13;s:12:\"updateBudget\";i:14;s:10:\"viewBudget\";i:15;s:12:\"deleteBudget\";i:16;s:16:\"createOfficeFund\";i:17;s:16:\"updateOfficeFund\";i:18;s:14:\"viewOfficeFund\";i:19;s:16:\"deleteOfficeFund\";i:20;s:16:\"createUnicefFund\";i:21;s:16:\"updateUnicefFund\";i:22;s:14:\"viewUnicefFund\";i:23;s:16:\"deleteUnicefFund\";i:24;s:17:\"createAccountHead\";i:25;s:17:\"updateAccountHead\";i:26;s:15:\"viewAccountHead\";i:27;s:17:\"deleteAccountHead\";i:28;s:12:\"createOutput\";i:29;s:12:\"updateOutput\";i:30;s:10:\"viewOutput\";i:31;s:12:\"deleteOutput\";i:32;s:16:\"createReportText\";i:33;s:16:\"updateReportText\";i:34;s:14:\"viewReportText\";i:35;s:16:\"deleteReportText\";i:36;s:11:\"viewReports\";i:37;s:13:\"updateCompany\";i:38;s:11:\"viewProfile\";i:39;s:13:\"updateSetting\";}'),
(4, 'Owners', 'a:36:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:11:\"viewReports\";i:33;s:13:\"updateCompany\";i:34;s:11:\"viewProfile\";i:35;s:13:\"updateSetting\";}');

-- --------------------------------------------------------

--
-- Table structure for table `of_details`
--

CREATE TABLE `of_details` (
  `id` int(4) NOT NULL,
  `of_id` int(4) NOT NULL,
  `acc_h_id` int(11) NOT NULL,
  `bill_no` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `of_details`
--

INSERT INTO `of_details` (`id`, `of_id`, `acc_h_id`, `bill_no`, `qty`, `amount`) VALUES
(705, 1, 1, '3636', 10, 905000),
(706, 1, 2, '22', 10, 5609000),
(707, 1, 3, '2222', 14, 7000),
(708, 1, 4, '5000', 500, 250000),
(709, 1, 5, '2323', 3, 1000),
(710, 1, 6, '8', 7, 0),
(711, 1, 7, '23', 15, 0),
(712, 1, 9, '9', 8, 0),
(713, 1, 13, '31', 29, 0),
(714, 1, 14, '16', 14, 0),
(715, 1, 15, '34', 28, 0),
(716, 1, 16, '12', 5, 0),
(717, 1, 17, '23', 18, 0),
(718, 1, 18, '15', 10, 0),
(719, 1, 19, '26', 25, 0),
(720, 1, 20, '11', 9, 0),
(721, 1, 21, '4', 3, 0),
(722, 1, 22, '9', 7, 0),
(723, 1, 24, '7', 5, 0),
(724, 1, 25, '7', 5, 0),
(725, 1, 26, '43', 33, 0),
(726, 1, 27, '13', 8, 0),
(727, 1, 29, '0', 10, 500000),
(728, 1, 39, '0', 2, 140000),
(729, 1, 70, '4444', 44, 66000),
(730, 1, 71, '0', 4, 720000),
(731, 1, 72, '0', 2, 10000),
(732, 1, 73, '0', 2, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `of_master`
--

CREATE TABLE `of_master` (
  `id` int(4) NOT NULL,
  `month_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `of_desc` varchar(250) CHARACTER SET utf8 NOT NULL,
  `total_amout` float NOT NULL,
  `report_text_id` double UNSIGNED NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `of_master`
--

INSERT INTO `of_master` (`id`, `month_name`, `of_desc`, `total_amout`, `report_text_id`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'February,2020', 'রোহিঙ্গা শিশু সুরক্ষা কার্যক্রমের আওতায় বরাদ্দকৃত অর্থ ছাড় করা প্রসংগে।', 8228000, 1, 1, '2020-08-21 23:29:29', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `output`
--

CREATE TABLE `output` (
  `id` int(4) NOT NULL,
  `output_name` varchar(216) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `output`
--

INSERT INTO `output` (`id`, `output_name`) VALUES
(2, ' Strengthen Capacity of Community based Child Protection mechanism through engaging parents, community leaders  and religious leaders  and other community members '),
(4, 'In case of emergency due to natural disaster (heavy rains, cyclone etc.) risk of family separation is reduced and separated children receive appropriate care and facilities are renovated (Emergency Contingency Plan).'),
(1, 'Number of children and adolescent boys and girls supported with trained case worker.'),
(5, 'Programme management '),
(3, 'Programme staff enhanced capacity of program to ensure quality and standard programme delivery for the children , adolescents and community.'),
(6, 'Saidul Islam Sheik');

-- --------------------------------------------------------

--
-- Table structure for table `report_text`
--

CREATE TABLE `report_text` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `header1` text CHARACTER SET utf8 NOT NULL,
  `header2` text CHARACTER SET utf8 NOT NULL,
  `footer1` text CHARACTER SET utf8 NOT NULL,
  `footer2` text CHARACTER SET utf8 NOT NULL,
  `signature_left` text CHARACTER SET utf8 NOT NULL,
  `signature_right` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_text`
--

INSERT INTO `report_text` (`id`, `name`, `header1`, `header2`, `footer1`, `footer2`, `signature_left`, `signature_right`) VALUES
(1, 'Test Name', 'Test Header 1', 'Test Header 2', 'Test Footer 1', 'Test Footer 2', 'Signature left', 'signature right'),
(2, 'For office fund', '<p>Office fund header 1</p>', '<p>Office fund header 2</p>', '<p>office fund footer 1</p>', '<p>office fund footer 2</p>', '<p>left sign</p>', '<p>right sign</p>'),
(3, 'For Unicef Fund', '<p>Report Heade1</p><p>For f</p><p>Unicef Fund</p>', '<p>\r\n\r\n</p><p>Report Header</p><p>Forf</p><p>Unicef Fund</p>\r\n\r\n<br><p></p>', '<p>\r\n\r\n</p><p>Report footer</p><p>Forf</p><p>Unicef Fund</p>\r\n\r\n<br><p></p>', '<p>\r\n\r\n</p><p>Report Footer</p><p>Forf</p><p>Unicef Fund</p>\r\n\r\n<br><p></p>', '<p>\r\n\r\n</p><p>Report Footer</p><p>Forf</p><p>Unicef Fund</p>\r\n\r\n<br><p></p>', '<p>\r\n\r\n</p><p>Report Footer</p><p>Forf</p><p>Unicef Fund</p>\r\n\r\n<br><p></p>');

-- --------------------------------------------------------

--
-- Table structure for table `uncef_fund_details`
--

CREATE TABLE `uncef_fund_details` (
  `id` int(8) NOT NULL,
  `acc_id` int(4) NOT NULL,
  `acc_code` varchar(6) DEFAULT NULL,
  `unicef_fund_id` int(4) DEFAULT NULL,
  `qty` int(8) DEFAULT NULL,
  `no_of_month` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uncef_fund_details`
--

INSERT INTO `uncef_fund_details` (`id`, `acc_id`, `acc_code`, `unicef_fund_id`, `qty`, `no_of_month`) VALUES
(445, 1, '1.1.1', 3, 5, 5),
(446, 2, '1.1.2', 3, 10, 10),
(447, 3, '1.1.3', 3, 3, 4),
(448, 4, '1.1.4', 3, 0, 0),
(449, 5, '1.1.5', 3, 0, 0),
(450, 6, '1.1.6', 3, 0, 0),
(451, 7, '1.1.7', 3, 0, 0),
(452, 8, '1.1.8', 3, 0, 0),
(453, 9, '1.1.9', 3, 0, 0),
(454, 10, '1.1.10', 3, 0, 0),
(455, 11, '1.1.11', 3, 0, 0),
(456, 12, '1.1.12', 3, 0, 0),
(457, 13, '1.1.13', 3, 0, 0),
(458, 14, '1.1.14', 3, 0, 0),
(459, 15, '1.1.15', 3, 0, 0),
(460, 16, '1.2.1', 3, 0, 0),
(461, 17, '1.2.2', 3, 0, 0),
(462, 18, '1.2.3', 3, 0, 0),
(463, 19, '1.2.4', 3, 0, 0),
(464, 20, '1.2.5', 3, 0, 0),
(465, 21, '1.2.6', 3, 0, 0),
(466, 22, '1.2.7', 3, 0, 0),
(467, 23, '1.2.8', 3, 0, 0),
(468, 24, '1.2.9', 3, 0, 0),
(469, 25, '1.2.10', 3, 0, 0),
(470, 26, '1.2.11', 3, 0, 0),
(471, 27, '1.3.1', 3, 0, 0),
(472, 28, '1.3.2', 3, 0, 0),
(473, 29, '1.3.3', 3, 0, 0),
(474, 30, '1.3.4', 3, 0, 0),
(475, 31, '1.3.5', 3, 0, 0),
(476, 32, '1.3.6', 3, 0, 0),
(477, 33, '1.3.7', 3, 0, 0),
(478, 34, '2.1.1', 3, 0, 0),
(479, 35, '2.1.2', 3, 0, 0),
(480, 36, '2.1.3', 3, 0, 0),
(481, 37, '2.1.4', 3, 0, 0),
(482, 38, '2.1.5', 3, 0, 0),
(483, 39, '2.1.6', 3, 0, 0),
(484, 40, '2.1.7', 3, 0, 0),
(485, 41, '2.1.8', 3, 0, 0),
(486, 42, '2.1.9', 3, 0, 0),
(487, 43, '2.1.10', 3, 0, 0),
(488, 44, '2.1.11', 3, 0, 0),
(489, 45, '2.1.12', 3, 0, 0),
(490, 46, '2.1.13', 3, 0, 0),
(491, 47, '2.1.14', 3, 0, 0),
(492, 48, '2.1.15', 3, 0, 0),
(493, 49, '2.1.16', 3, 0, 0),
(494, 50, '2.1.17', 3, 0, 0),
(495, 51, '2.1.18', 3, 0, 0),
(496, 52, '2.1.19', 3, 0, 0),
(497, 53, '2.1.20', 3, 0, 0),
(498, 54, '2.1.21', 3, 0, 0),
(499, 55, '2.1.22', 3, 0, 0),
(500, 56, '3.1.1', 3, 0, 0),
(501, 57, '3.1.2', 3, 0, 0),
(502, 58, '3.1.3', 3, 0, 0),
(503, 59, '3.1.4', 3, 0, 0),
(504, 60, '4.1.1', 3, 0, 0),
(505, 61, '5.1.1', 3, 0, 0),
(506, 62, '5.1.2', 3, 0, 0),
(507, 63, '5.1.3', 3, 0, 0),
(508, 64, '5.1.4', 3, 0, 0),
(509, 65, '5.1.5', 3, 0, 0),
(510, 66, '5.2.1', 3, 0, 0),
(511, 67, '5.2.2', 3, 0, 0),
(512, 68, '5.2.3', 3, 0, 0),
(513, 69, '5.2.4', 3, 0, 0),
(514, 70, '5.2.5', 3, 0, 0),
(515, 71, '5.2.6', 3, 0, 0),
(516, 72, '5.2.7', 3, 0, 0),
(517, 73, '5.2.8', 3, 20, 20),
(518, 74, '1.1.1', 3, 15, 15),
(519, 1, '1.1.1', 2, 10, 2),
(520, 2, '1.1.2', 2, 20, 5),
(521, 3, '1.1.3', 2, 0, 0),
(522, 4, '1.1.4', 2, 0, 0),
(523, 5, '1.1.5', 2, 0, 0),
(524, 6, '1.1.6', 2, 0, 0),
(525, 7, '1.1.7', 2, 0, 0),
(526, 8, '1.1.8', 2, 0, 0),
(527, 9, '1.1.9', 2, 0, 0),
(528, 10, '1.1.10', 2, 0, 0),
(529, 11, '1.1.11', 2, 0, 0),
(530, 12, '1.1.12', 2, 0, 0),
(531, 13, '1.1.13', 2, 0, 0),
(532, 14, '1.1.14', 2, 0, 0),
(533, 15, '1.1.15', 2, 0, 0),
(534, 16, '1.2.1', 2, 0, 0),
(535, 17, '1.2.2', 2, 0, 0),
(536, 18, '1.2.3', 2, 0, 0),
(537, 19, '1.2.4', 2, 0, 0),
(538, 20, '1.2.5', 2, 0, 0),
(539, 21, '1.2.6', 2, 0, 0),
(540, 22, '1.2.7', 2, 0, 0),
(541, 23, '1.2.8', 2, 0, 0),
(542, 24, '1.2.9', 2, 0, 0),
(543, 25, '1.2.10', 2, 0, 0),
(544, 26, '1.2.11', 2, 0, 0),
(545, 27, '1.3.1', 2, 0, 0),
(546, 28, '1.3.2', 2, 0, 0),
(547, 29, '1.3.3', 2, 0, 0),
(548, 30, '1.3.4', 2, 0, 0),
(549, 31, '1.3.5', 2, 0, 0),
(550, 32, '1.3.6', 2, 0, 0),
(551, 33, '1.3.7', 2, 0, 0),
(552, 34, '2.1.1', 2, 0, 0),
(553, 35, '2.1.2', 2, 0, 0),
(554, 36, '2.1.3', 2, 0, 0),
(555, 37, '2.1.4', 2, 0, 0),
(556, 38, '2.1.5', 2, 0, 0),
(557, 39, '2.1.6', 2, 0, 0),
(558, 40, '2.1.7', 2, 0, 0),
(559, 41, '2.1.8', 2, 0, 0),
(560, 42, '2.1.9', 2, 0, 0),
(561, 43, '2.1.10', 2, 0, 0),
(562, 44, '2.1.11', 2, 0, 0),
(563, 45, '2.1.12', 2, 0, 0),
(564, 46, '2.1.13', 2, 0, 0),
(565, 47, '2.1.14', 2, 0, 0),
(566, 48, '2.1.15', 2, 0, 0),
(567, 49, '2.1.16', 2, 0, 0),
(568, 50, '2.1.17', 2, 0, 0),
(569, 51, '2.1.18', 2, 0, 0),
(570, 52, '2.1.19', 2, 0, 0),
(571, 53, '2.1.20', 2, 0, 0),
(572, 54, '2.1.21', 2, 0, 0),
(573, 55, '2.1.22', 2, 0, 0),
(574, 56, '3.1.1', 2, 0, 0),
(575, 57, '3.1.2', 2, 0, 0),
(576, 58, '3.1.3', 2, 0, 0),
(577, 59, '3.1.4', 2, 0, 0),
(578, 60, '4.1.1', 2, 0, 0),
(579, 61, '5.1.1', 2, 0, 0),
(580, 62, '5.1.2', 2, 0, 0),
(581, 63, '5.1.3', 2, 0, 0),
(582, 64, '5.1.4', 2, 0, 0),
(583, 65, '5.1.5', 2, 0, 0),
(584, 66, '5.2.1', 2, 0, 0),
(585, 67, '5.2.2', 2, 0, 0),
(586, 68, '5.2.3', 2, 0, 0),
(587, 69, '5.2.4', 2, 0, 0),
(588, 70, '5.2.5', 2, 0, 0),
(589, 71, '5.2.6', 2, 0, 0),
(590, 72, '5.2.7', 2, 0, 0),
(591, 73, '5.2.8', 2, 0, 0),
(592, 74, '1.1.1', 2, 0, 0),
(593, 1, '1.1.1', 1, 1, 1),
(594, 2, '1.1.2', 1, 0, 0),
(595, 3, '1.1.3', 1, 0, 0),
(596, 4, '1.1.4', 1, 0, 0),
(597, 5, '1.1.5', 1, 0, 0),
(598, 6, '1.1.6', 1, 0, 0),
(599, 7, '1.1.7', 1, 0, 0),
(600, 8, '1.1.8', 1, 0, 0),
(601, 9, '1.1.9', 1, 0, 0),
(602, 10, '1.1.10', 1, 0, 0),
(603, 11, '1.1.11', 1, 0, 0),
(604, 12, '1.1.12', 1, 0, 0),
(605, 13, '1.1.13', 1, 0, 0),
(606, 14, '1.1.14', 1, 0, 0),
(607, 15, '1.1.15', 1, 0, 0),
(608, 16, '1.2.1', 1, 0, 0),
(609, 17, '1.2.2', 1, 0, 0),
(610, 18, '1.2.3', 1, 0, 0),
(611, 19, '1.2.4', 1, 0, 0),
(612, 20, '1.2.5', 1, 0, 0),
(613, 21, '1.2.6', 1, 0, 0),
(614, 22, '1.2.7', 1, 0, 0),
(615, 23, '1.2.8', 1, 0, 0),
(616, 24, '1.2.9', 1, 0, 0),
(617, 25, '1.2.10', 1, 0, 0),
(618, 26, '1.2.11', 1, 0, 0),
(619, 27, '1.3.1', 1, 0, 0),
(620, 28, '1.3.2', 1, 0, 0),
(621, 29, '1.3.3', 1, 0, 0),
(622, 30, '1.3.4', 1, 0, 0),
(623, 31, '1.3.5', 1, 0, 0),
(624, 32, '1.3.6', 1, 0, 0),
(625, 33, '1.3.7', 1, 0, 0),
(626, 34, '2.1.1', 1, 0, 0),
(627, 35, '2.1.2', 1, 0, 0),
(628, 36, '2.1.3', 1, 0, 0),
(629, 37, '2.1.4', 1, 0, 0),
(630, 38, '2.1.5', 1, 0, 0),
(631, 39, '2.1.6', 1, 0, 0),
(632, 40, '2.1.7', 1, 0, 0),
(633, 41, '2.1.8', 1, 0, 0),
(634, 42, '2.1.9', 1, 0, 0),
(635, 43, '2.1.10', 1, 0, 0),
(636, 44, '2.1.11', 1, 0, 0),
(637, 45, '2.1.12', 1, 0, 0),
(638, 46, '2.1.13', 1, 0, 0),
(639, 47, '2.1.14', 1, 0, 0),
(640, 48, '2.1.15', 1, 0, 0),
(641, 49, '2.1.16', 1, 0, 0),
(642, 50, '2.1.17', 1, 0, 0),
(643, 51, '2.1.18', 1, 0, 0),
(644, 52, '2.1.19', 1, 0, 0),
(645, 53, '2.1.20', 1, 0, 0),
(646, 54, '2.1.21', 1, 0, 0),
(647, 55, '2.1.22', 1, 0, 0),
(648, 56, '3.1.1', 1, 0, 0),
(649, 57, '3.1.2', 1, 0, 0),
(650, 58, '3.1.3', 1, 0, 0),
(651, 59, '3.1.4', 1, 0, 0),
(652, 60, '4.1.1', 1, 0, 0),
(653, 61, '5.1.1', 1, 0, 0),
(654, 62, '5.1.2', 1, 0, 0),
(655, 63, '5.1.3', 1, 0, 0),
(656, 64, '5.1.4', 1, 0, 0),
(657, 65, '5.1.5', 1, 0, 0),
(658, 66, '5.2.1', 1, 0, 0),
(659, 67, '5.2.2', 1, 0, 0),
(660, 68, '5.2.3', 1, 0, 0),
(661, 69, '5.2.4', 1, 0, 0),
(662, 70, '5.2.5', 1, 0, 0),
(663, 71, '5.2.6', 1, 0, 0),
(664, 72, '5.2.7', 1, 0, 0),
(665, 73, '5.2.8', 1, 0, 0),
(666, 74, '1.1.1', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `unief_fund_master`
--

CREATE TABLE `unief_fund_master` (
  `unicef_fund_id` int(11) NOT NULL,
  `unicef_fund_desc` varchar(256) NOT NULL,
  `start_month` date NOT NULL,
  `end_month` date NOT NULL,
  `report_text_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unief_fund_master`
--

INSERT INTO `unief_fund_master` (`unicef_fund_id`, `unicef_fund_desc`, `start_month`, `end_month`, `report_text_id`, `status`) VALUES
(1, 'Test Unicef Fund', '2020-09-01', '2020-09-30', 1, 1),
(2, 'Test Unicef Fund 3', '2020-09-01', '2020-09-30', 1, 1),
(3, 'Test Data 4', '2020-09-01', '2020-09-30', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`) VALUES
(1, 'admin', '$2y$10$ZrBk2zWOLhPAaOhncDBJv.pKAfhFYywahFQXY4NXDmhOcaRtLdAfS', 'admin@admin.com', 'Saidul Islam', 'Sheik', '12345678910', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_head`
--
ALTER TABLE `acc_head`
  ADD PRIMARY KEY (`id`),
  ADD KEY `COL 1` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `output_id` (`output_id`);

--
-- Indexes for table `budget_details`
--
ALTER TABLE `budget_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `budget_id` (`budget_id`);

--
-- Indexes for table `budget_master`
--
ALTER TABLE `budget_master`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `budget_id` (`budget_id`);

--
-- Indexes for table `camp_info`
--
ALTER TABLE `camp_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `cg_details`
--
ALTER TABLE `cg_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `cg_id` (`cg_id`),
  ADD KEY `camp_id` (`camp_id`);

--
-- Indexes for table `cg_master`
--
ALTER TABLE `cg_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `of_details`
--
ALTER TABLE `of_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `cg_id` (`of_id`),
  ADD KEY `camp_id` (`acc_h_id`);

--
-- Indexes for table `of_master`
--
ALTER TABLE `of_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `output`
--
ALTER TABLE `output`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `output_name` (`output_name`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `report_text`
--
ALTER TABLE `report_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uncef_fund_details`
--
ALTER TABLE `uncef_fund_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `budget_id` (`unicef_fund_id`);

--
-- Indexes for table `unief_fund_master`
--
ALTER TABLE `unief_fund_master`
  ADD PRIMARY KEY (`unicef_fund_id`),
  ADD KEY `budget_id` (`unicef_fund_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_head`
--
ALTER TABLE `acc_head`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `budget_details`
--
ALTER TABLE `budget_details`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=809;

--
-- AUTO_INCREMENT for table `budget_master`
--
ALTER TABLE `budget_master`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cg_details`
--
ALTER TABLE `cg_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `cg_master`
--
ALTER TABLE `cg_master`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `of_details`
--
ALTER TABLE `of_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=733;

--
-- AUTO_INCREMENT for table `of_master`
--
ALTER TABLE `of_master`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `output`
--
ALTER TABLE `output`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report_text`
--
ALTER TABLE `report_text`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uncef_fund_details`
--
ALTER TABLE `uncef_fund_details`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT for table `unief_fund_master`
--
ALTER TABLE `unief_fund_master`
  MODIFY `unicef_fund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acc_head`
--
ALTER TABLE `acc_head`
  ADD CONSTRAINT `acc_head_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`output_id`) REFERENCES `output` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `budget_details`
--
ALTER TABLE `budget_details`
  ADD CONSTRAINT `budget_details_ibfk_1` FOREIGN KEY (`budget_id`) REFERENCES `budget_master` (`budget_id`);

--
-- Constraints for table `cg_details`
--
ALTER TABLE `cg_details`
  ADD CONSTRAINT `cg_details_ibfk_1` FOREIGN KEY (`cg_id`) REFERENCES `cg_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cg_details_ibfk_2` FOREIGN KEY (`camp_id`) REFERENCES `camp_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
