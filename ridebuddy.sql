-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 04:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ridebuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatId` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `message` text NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatId`, `personId`, `message`, `timeStamp`) VALUES
(1617, 17, 'Nice to meet you!', '2020-12-09 17:05:05'),
(1617, 16, 'Nice to meet you too! YEes!!!!', '2020-12-09 19:12:42'),
(1618, 16, 'Nice to meet you!', '2020-12-09 21:47:39'),
(1619, 16, 'Nice to meet you!', '2020-12-14 00:03:30'),
(1619, 16, 'hi', '2020-12-14 14:14:29'),
(1617, 16, 'Nice to meet you!', '2020-12-16 12:42:11'),
(1619, 16, 'Nice to meet you too! YEes!!!!', '2020-12-16 12:42:28'),
(1617, 16, 'Nice to meet you!', '2020-12-16 18:52:08'),
(1617, 16, 'dfdsa', '2020-12-16 18:52:12'),
(1617, 16, '', '2020-12-16 19:06:58'),
(1617, 16, 'hhihi', '2020-12-27 07:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classId` int(11) NOT NULL,
  `className` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classId`, `className`) VALUES
(1, 'First'),
(2, 'Business'),
(3, 'Premium economy'),
(4, 'Economy');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(11) NOT NULL,
  `fName` varchar(3) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `contactTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `fName`, `lName`, `email`, `message`, `contactTime`) VALUES
(1, 'Dee', 'Shah', 'dee@shah.com', 'Hi', '2020-12-05 12:28:09'),
(2, 'Nei', 'Armstrong', 'narm@imm.com', 'Yes', '2020-12-16 22:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryId` int(11) NOT NULL,
  `countryName` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryId`, `countryName`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Congo, the Democratic Republic of the'),
(51, 'Cook Islands'),
(52, 'Costa Rica'),
(53, 'Cote D\'Ivoire'),
(54, 'Croatia'),
(55, 'Cuba'),
(56, 'Cyprus'),
(57, 'Czech Republic'),
(58, 'Denmark'),
(59, 'Djibouti'),
(60, 'Dominica'),
(61, 'Dominican Republic'),
(62, 'Ecuador'),
(63, 'Egypt'),
(64, 'El Salvador'),
(65, 'Equatorial Guinea'),
(66, 'Eritrea'),
(67, 'Estonia'),
(68, 'Ethiopia'),
(69, 'Falkland Islands (Malvinas)'),
(70, 'Faroe Islands'),
(71, 'Fiji'),
(72, 'Finland'),
(73, 'France'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Greece'),
(84, 'Greenland'),
(85, 'Grenada'),
(86, 'Guadeloupe'),
(87, 'Guam'),
(88, 'Guatemala'),
(89, 'Guinea'),
(90, 'Guinea-Bissau'),
(91, 'Guyana'),
(92, 'Haiti'),
(93, 'Heard Island and Mcdonald Islands'),
(94, 'Holy See (Vatican City State)'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Indonesia'),
(101, 'Iran, Islamic Republic of'),
(102, 'Iraq'),
(103, 'Ireland'),
(104, 'Israel'),
(105, 'Italy'),
(106, 'Jamaica'),
(107, 'Japan'),
(108, 'Jordan'),
(109, 'Kazakhstan'),
(110, 'Kenya'),
(111, 'Kiribati'),
(112, 'Korea, Democratic People\'s Republic of'),
(113, 'Korea, Republic of'),
(114, 'Kuwait'),
(115, 'Kyrgyzstan'),
(116, 'Lao People\'s Democratic Republic'),
(117, 'Latvia'),
(118, 'Lebanon'),
(119, 'Lesotho'),
(120, 'Liberia'),
(121, 'Libyan Arab Jamahiriya'),
(122, 'Liechtenstein'),
(123, 'Lithuania'),
(124, 'Luxembourg'),
(125, 'Macao'),
(126, 'Macedonia, the Former Yugoslav Republic of'),
(127, 'Madagascar'),
(128, 'Malawi'),
(129, 'Malaysia'),
(130, 'Maldives'),
(131, 'Mali'),
(132, 'Malta'),
(133, 'Marshall Islands'),
(134, 'Martinique'),
(135, 'Mauritania'),
(136, 'Mauritius'),
(137, 'Mayotte'),
(138, 'Mexico'),
(139, 'Micronesia, Federated States of'),
(140, 'Moldova, Republic of'),
(141, 'Monaco'),
(142, 'Mongolia'),
(143, 'Montserrat'),
(144, 'Morocco'),
(145, 'Mozambique'),
(146, 'Myanmar'),
(147, 'Namibia'),
(148, 'Nauru'),
(149, 'Nepal'),
(150, 'Netherlands'),
(151, 'Netherlands Antilles'),
(152, 'New Caledonia'),
(153, 'New Zealand'),
(154, 'Nicaragua'),
(155, 'Niger'),
(156, 'Nigeria'),
(157, 'Niue'),
(158, 'Norfolk Island'),
(159, 'Northern Mariana Islands'),
(160, 'Norway'),
(161, 'Oman'),
(162, 'Pakistan'),
(163, 'Palau'),
(164, 'Palestinian Territory, Occupied'),
(165, 'Panama'),
(166, 'Papua New Guinea'),
(167, 'Paraguay'),
(168, 'Peru'),
(169, 'Philippines'),
(170, 'Pitcairn'),
(171, 'Poland'),
(172, 'Portugal'),
(173, 'Puerto Rico'),
(174, 'Qatar'),
(175, 'Reunion'),
(176, 'Romania'),
(177, 'Russian Federation'),
(178, 'Rwanda'),
(179, 'Saint Helena'),
(180, 'Saint Kitts and Nevis'),
(181, 'Saint Lucia'),
(182, 'Saint Pierre and Miquelon'),
(183, 'Saint Vincent and the Grenadines'),
(184, 'Samoa'),
(185, 'San Marino'),
(186, 'Sao Tome and Principe'),
(187, 'Saudi Arabia'),
(188, 'Senegal'),
(189, 'Serbia and Montenegro'),
(190, 'Seychelles'),
(191, 'Sierra Leone'),
(192, 'Singapore'),
(193, 'Slovakia'),
(194, 'Slovenia'),
(195, 'Solomon Islands'),
(196, 'Somalia'),
(197, 'South Africa'),
(198, 'South Georgia and the South Sandwich Islands'),
(199, 'Spain'),
(200, 'Sri Lanka'),
(201, 'Sudan'),
(202, 'Suriname'),
(203, 'Svalbard and Jan Mayen'),
(204, 'Swaziland'),
(205, 'Sweden'),
(206, 'Switzerland'),
(207, 'Syrian Arab Republic'),
(208, 'Taiwan, Province of China'),
(209, 'Tajikistan'),
(210, 'Tanzania, United Republic of'),
(211, 'Thailand'),
(212, 'Timor-Leste'),
(213, 'Togo'),
(214, 'Tokelau'),
(215, 'Tonga'),
(216, 'Trinidad and Tobago'),
(217, 'Tunisia'),
(218, 'Turkey'),
(219, 'Turkmenistan'),
(220, 'Turks and Caicos Islands'),
(221, 'Tuvalu'),
(222, 'Uganda'),
(223, 'Ukraine'),
(224, 'United Arab Emirates'),
(225, 'United Kingdom'),
(226, 'United States'),
(227, 'United States Minor Outlying Islands'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Venezuela'),
(232, 'Viet Nam'),
(233, 'Virgin Islands, British'),
(234, 'Virgin Islands, U.s.'),
(235, 'Wallis and Futuna'),
(236, 'Western Sahara'),
(237, 'Yemen'),
(238, 'Zambia'),
(239, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `dealbreaker`
--

CREATE TABLE `dealbreaker` (
  `dealBreakerId` int(11) NOT NULL,
  `dealBreakerName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealbreaker`
--

INSERT INTO `dealbreaker` (`dealBreakerId`, `dealBreakerName`) VALUES
(1, 'Loud talker'),
(2, 'Noisy eater'),
(3, 'Political debate'),
(4, 'Religious debate'),
(5, 'Snob'),
(6, 'Snorer'),
(7, 'Speak while eating'),
(8, 'Unhygienic');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `eduId` int(11) NOT NULL,
  `eduName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`eduId`, `eduName`) VALUES
(1, 'Some high school, no diploma'),
(2, 'High school graduate, diploma '),
(3, 'Bachelor’s degree'),
(4, 'Master’s degree'),
(5, 'Doctorate degree'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flightId` int(11) NOT NULL,
  `flightNum` varchar(10) NOT NULL,
  `airline` varchar(45) NOT NULL,
  `departDate` date NOT NULL,
  `departTime` time NOT NULL,
  `origin` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flightId`, `flightNum`, `airline`, `departDate`, `departTime`, `origin`, `destination`) VALUES
(1, 'AA 2894', 'American Airline', '2020-12-07', '09:15:00', 'SEA', 'YYZ'),
(2, 'UA 107', 'United Airlines', '2020-12-09', '12:10:00', 'MUC', 'IAD'),
(3, 'ET 512', 'Ethiopean Airlines', '2020-12-05', '08:25:00', 'ADD', 'JFK'),
(4, 'testing', 'testing', '2020-12-02', '14:42:00', 'HKG', 'YYZ'),
(5, 'testing', 'testing', '2020-12-11', '02:44:00', 'HKG', 'YYZ'),
(6, 'testing', 'testing', '2020-12-03', '07:17:00', 'HKG', 'YYZ');

-- --------------------------------------------------------

--
-- Table structure for table `flight-person`
--

CREATE TABLE `flight-person` (
  `flightId` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `seatNum` varchar(30) NOT NULL,
  `tickImageFile` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight-person`
--

INSERT INTO `flight-person` (`flightId`, `personId`, `classId`, `seatNum`, `tickImageFile`) VALUES
(1, 16, 1, '1E', '16.jpg'),
(1, 17, 1, '2F', '17.jpg'),
(1, 18, 1, '3F', '18.jpg'),
(1, 21, 1, '3A', '21.jpg'),
(1, 22, 1, '2E', '22.jpg'),
(1, 24, 1, '3K', '24.jpg'),
(1, 25, 1, '4F', '25.jpg'),
(2, 16, 1, '1K', '16.jpg'),
(3, 16, 1, '3E', '16.jpg'),
(3, 18, 1, '1F', '18.jpg'),
(2, 22, 1, '4A', '22.jpg'),
(4, 17, 1, '11K', 'Claude Monet, Cliff Walk at Po'),
(5, 17, 1, '11K', 'Claude Monet, Cliff Walk at Po'),
(6, 16, 2, '11K', 'bg.png');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `genderId` int(11) NOT NULL,
  `genderName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`genderId`, `genderName`) VALUES
(1, 'Female'),
(2, 'Male'),
(3, 'Others'),
(4, 'Undisclosed');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interestId` int(11) NOT NULL,
  `interestName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interestId`, `interestName`) VALUES
(1, 'Arts and Crafts'),
(2, 'Blogging and Vlogging'),
(3, 'Dance'),
(4, 'Fashion'),
(5, 'Gaming'),
(6, 'Gourmet'),
(7, 'Health'),
(8, 'Movie'),
(9, 'Music'),
(10, 'Politics'),
(11, 'Sports'),
(12, 'Theatre'),
(13, 'Trade and Investments'),
(14, 'Travel'),
(15, 'Wine'),
(16, 'Yoga'),
(17, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `interest-icebreaker`
--

CREATE TABLE `interest-icebreaker` (
  `interestId` int(11) NOT NULL,
  `icebreakerId` int(11) NOT NULL,
  `icebreakerQ` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest-icebreaker`
--

INSERT INTO `interest-icebreaker` (`interestId`, `icebreakerId`, `icebreakerQ`) VALUES
(1, 1, 'Macrame is the art of tying knots in patterns. It is believed to have originated in the 13th century by Arabic Weavers. However, decorative knot-tying can also be traced back to third-century China.'),
(1, 2, 'Did you know that Leonardo da Vinci spent 12 years painting the Mona Lisa’s lips?'),
(1, 3, 'Did you know, students who study art are 4 times more likely to be recognized for academic achievement.'),
(2, 1, 'Before it was known as \"blog\"- or \"vlog\"-ing, the practice of semi-automated online diarising pairing life video with text was referred to as \"sousveillance\".'),
(2, 2, 'Fun facts: the most popular vlogger has 103 million subscribers; there are 2.50 million content creators on Youtube; 3.500hrs of video uploaded every minute. \r\n'),
(2, 3, 'The first ever YouTube vlog was from a zoo. It was an 18 second video about elephants.\r\n'),
(3, 1, 'The \"Dancing Plague\" of 1518 was a mania that lasted a month and killed dozens of people in Strasbourg, France through exhaustion or heart attack.\r\n'),
(3, 2, 'You may know Tupac Shakur as the late rapping legend of the late 80s and early 90s, but what you may not know is that he used to do ballet! He became a member of the 127th Street Ensemble, a Harlem based theater company.\r\n'),
(3, 3, 'A world record for the longest conga dance line was set by 119,986 people in Miami in 1988.'),
(4, 1, 'What is one article of clothing someone could wear that would make you dramatically change your opinion of them?\r\n'),
(4, 2, 'What horrible fashion trend do you secretly like?'),
(4, 3, ' Turtle neck or scarf?\r\n'),
(5, 1, 'Did you know the Game Boy version of Tetris was the first game played in space? In 1993, Tetris traveled aboard a Soyuz TM-17 rocket to the MIR Space Station, where it was played by Russian cosmonaut Aleksandr A. Serebrov. The game was later sold at an auction for $1,220.'),
(5, 2, 'During the 2008 presidential election, Barack Obama purchased ad space in 18 games that ran in 10 states. The \"Vote for Change\" billboards were in Burnout Paradise, Skate, Madden, and more that targeted the demographic of ages 18 to 34.'),
(5, 3, 'Games are useful for overcoming bias and cognitive dissonance. A 2015 study demonstrates the power of games to overcome cognitive dissonance and reduce stereotypes.'),
(6, 1, 'On Saturday, April 16, 2011, the world\'s first photosynthetic restaurant for plants opened for business. A menu of enhanced sunlight that is designed to appeal to their sophisticated sensory apparatus, provides plants not only with energy, but a satisfying, piquant, and delightful experience.'),
(6, 2, 'What is ‘gourmet’? Is there a singular definition or is it just something we know when we see it?'),
(6, 3, 'Is gourmet about the food or the experience? Does a $1000 Sunday dessert sound a bit gratuitous? The Las Vegas Fleur Burger 5000 at $5000 might be more to your taste, or, is it the the Louis XIII Pizza coming in at a royal $9315.71?'),
(7, 1, 'Did you know Heroin was prescribed to treat coughs and other ailments, such as back pain and insomnia? From 1898 through 1910, these cough syrups were marketed as a non-addictive morphine substitute and quickly became the cause of one of the highest addiction rates among its users.'),
(7, 2, 'Do you think long life expectancy has anything to do with dietary habits? The largest concentration of healthy 100-year-olds is in Okinawa, Japan. The people there eat a diet high in grains, vegetables and fish, and low in eggs, meat and dairy. '),
(7, 3, 'Did you know during Victorian times, people came up with a radical solution to reduce weight — tapeworms. While it is known that tapeworms can be dangerous and in some cases even lethal, this questionable practice is still alive today.'),
(8, 1, 'Which movie(s) are you planning to watch on this flight?'),
(8, 2, 'Which movie(s) do you think is/are the top movie(s) in the last 12 months?'),
(8, 3, 'Can you name an incredible movie that has changed your viewpoint on life?'),
(9, 1, 'Can you recite the 7 steps of a major scale? (tips: a combination of tones and semitones)\r\n\r\n'),
(9, 2, 'Which music streaming service(s)/app(s) do you like most?'),
(9, 3, 'Who is/are your favourite singers/musicians?'),
(10, 0, 'Did you know the oldest existing governing body was established in 930 AD and the youngest was introduced in 1848? '),
(10, 2, 'In 1975, US Presidential candidate Emil Matalik advocated a maximum of one animal and one tree per family because he believed that there were too many animals and plant life on earth. That same year, Louis Abalofia’s campaign poster featured a photo of him in the nude, with the slogan \"I have nothing to hide.\" '),
(10, 3, 'The word ‘politics’ comes from the Greek ‘politika’ meaning ‘relating to public life’.'),
(11, 1, 'Did you know that American Swimmer, Michael Phelps, has won more Olympic Golds than Mexico?'),
(11, 2, 'Did you know Wrestling is recognised as the world’s oldest competitive sport? Cave drawings of wrestlers can be found dating back as far as 3000 BC.'),
(11, 3, 'Did you know food plays a crucial role in athletic performance? An athlete can’t afford to eat anything and expect the best results on their body. An athlete’s meal should be cleaner than the meal of an average Joe! Serious athletes can’t regularly eat junk food.'),
(12, 1, 'Did you know two seats are permanently bolted open at the Palace Theatre, London, for the theatre ghosts to sit in?'),
(12, 2, 'Did you know Walt Disney World, Florida, has a record 1.2 million costumes in its theatrical wardrobes?'),
(12, 3, 'Did you know the word theatre comes from an ancient Greek word meaning a ‘place for seeing?'),
(13, 1, 'Did you know investors who have never previously owned a stock are more likely to buy when stocks reach upper price limits such as all-time highs? Other rational investors can profit at the expense of the attention driven individual investors.'),
(13, 2, 'Did you know 5-6 million containers are transiting the ocean at any given time? More than 100,000 ships are at sea carrying that trade. There are 750,000 people who work as seafarers on ship crews involved with trade.'),
(13, 3, 'Did you know in 2019 alone, machinery and transport equipment accounted for €872 billion or 40.9 % of all goods exported from the EU?'),
(14, 1, 'What’s your favourite seat on an airplane?'),
(14, 2, 'Do you have a favourite way to travel?\r\n'),
(14, 3, 'Would you rather travel back in time or forward to the future?\r\n'),
(15, 1, 'Did you know the most expensive wine ever sold is the exception to the dated rule of rare wine, as it was not even a decade old at the time of purchase? The six liter Screaming Eagle Cabernet Sauvignon 1992 bottle was sold for $500,000 USD in 2000 at a Napa Valley charity auction!'),
(15, 2, 'Did you know some blinded trials among wine consumers have indicated that people can find nothing in a wine\'s aroma or taste to distinguish between ordinary and pricey brands? Academic research on blinded wine tastings have also cast doubt on the ability of professional tasters to judge wines consistently.\r\n'),
(15, 3, 'The most popular wines by world vineyard area in order of preference, starting with least popular: Pinot Noir, Trebbiano Toscano, Sauvignon Blanc, Garnacha, Syrah, Chardonnay, Tempranillo, Airén, Merlot & Cabernet Sauvignon.'),
(16, 1, 'Did you know it is said that ancient yogis believed we only had a limited number of breaths?'),
(16, 2, 'Did you know the word ‘yoga’ was first mentioned in the Rig Veda, written approximately around 1500 B.C or before? \r\n'),
(16, 3, 'There are 11 styles of yoga, are you familiar with them?: Vinyasa, Hatha, Iyengar, Kundalini, Ashtanga, Bikram, Yin, Restorative, Prenatal, Anusara, Jivamukti.');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `personId` int(11) NOT NULL,
  `profileId` int(11) NOT NULL,
  `profilePicFile` text COLLATE utf8_unicode_ci NOT NULL,
  `fName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `showEm` tinyint(1) NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `countryId` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `showDOB` tinyint(1) NOT NULL,
  `showYOB` tinyint(1) NOT NULL,
  `genderId` int(11) NOT NULL,
  `genderNote` text COLLATE utf8_unicode_ci NOT NULL,
  `showGen` tinyint(1) NOT NULL,
  `relationshipId` int(11) NOT NULL,
  `relationshipNote` text COLLATE utf8_unicode_ci NOT NULL,
  `showRe` tinyint(1) NOT NULL,
  `eduId` int(11) NOT NULL,
  `eduNote` text COLLATE utf8_unicode_ci NOT NULL,
  `showEd` tinyint(1) NOT NULL,
  `job` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jobNote` text COLLATE utf8_unicode_ci NOT NULL,
  `showJob` tinyint(1) NOT NULL,
  `regTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `statusNote` varchar(140) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personId`, `profileId`, `profilePicFile`, `fName`, `lName`, `email`, `showEm`, `password`, `countryId`, `DOB`, `showDOB`, `showYOB`, `genderId`, `genderNote`, `showGen`, `relationshipId`, `relationshipNote`, `showRe`, `eduId`, `eduNote`, `showEd`, `job`, `jobNote`, `showJob`, `regTime`, `userId`, `statusId`, `statusNote`) VALUES
(16, 16, 'kayden.png', 'Neil', 'Armstrong', 'narm@imm.com', 0, '123', 30, '1969-07-16', 0, 0, 2, 'Alpha male', 0, 3, 'happily   ', 0, 3, 'LSE, Harvard Business School, MIT', 0, 'CEO', 'I am the CEO of a fintech startup in Silicon Valley', 1, '2020-11-14 09:14:19', 2, 1, 'attending a superhero party'),
(17, 17, 'jase.jpg', 'Jase', 'Smith', 'jase@smith.com', 1, '123', 44, '1966-03-23', 1, 1, 2, '', 0, 1, 'Ready for a new relationship', 1, 3, '', 1, 'Executive Chef', 'Michelin Stars Studded', 1, '2020-11-27 15:25:17', 2, 2, 'Attending Wine and Dine Conference 2021'),
(18, 18, 'gal.jpg', 'gal', 'gadot', 'flymuch@wonderwoman.com', 1, '123', 55, '2020-12-01', 1, 1, 2, '', 1, 5, '', 1, 4, '', 0, 'superhero', '', 1, '2020-12-05 14:15:19', 2, 4, 'omg, off to save the world, again! '),
(19, 19, 'buddy.jpg', 'yer', 'bestbud', 'buddz4lyfe@example.com', 1, '123', 10, '2020-12-01', 0, 0, 1, 'bruhhhhh', 1, 3, 'it\'s all good1', 1, 0, 'yeah well.... BRUHHHHHHHH', 1, 'Tiny Kitten Rescue Patrol', 'yeahhhhh bruhhhhh\r\nmeow', 1, '2020-12-05 14:20:44', 2, 1, 'always bruhh, let\'s hit the minibar!'),
(20, 20, 'john.jpg', 'John', 'Smith', 'John@smith.com', 0, '123', 1, '2020-12-01', 1, 1, 4, '', 0, 2, 'irrelephant', 1, 0, 'Masters in Life', 1, 'something totally normal', 'yup, totally normal', 1, '2020-12-05 14:25:18', 2, 4, 'just another john smith going about his boring business nothing to notice here'),
(21, 21, 'mrsclaus.jpg', 'Seraphina', 'Claus', 'Sera@northpole.com', 2, '123', 44, '2020-12-01', 0, 0, 2, '', 0, 3, 'Me and the Big Guy have an understanding. ', 1, 3, '', 1, 'Mrs Claus', 'It\'s all one and the same', 0, '2020-12-05 14:35:01', 2, 1, 'It\'s vacay time!!!'),
(22, 22, 'elf.jpg', 'el', 'feh', 'elf@northpole.com', 1, '123', 222, '2020-12-01', 0, 1, 3, '', 0, 4, '', 0, 2, 'Majored in modern artisanal candy and it\'s effects on small human manipulative parenting tactics.', 1, 'CEO of Candy Branch NP', 'Last ten years, I\'ve been head of the Candy division up North. ', 1, '2020-12-05 14:35:01', 2, 4, ''),
(23, 23, 'frank.jpg', 'Frank', 'Dohg', 'frank@sauce.com', 1, '123', 159, '2020-12-01', 0, 0, 1, '', 0, 0, 'None of your business, man!', 0, 1, '', 0, 'Sausage Sauce king', 'yeah, that\'s me. Frank Dohg. Pouring the sauce on baby', 1, '2020-12-05 14:44:38', 2, 3, 'anyone looking for a cuddle buddy on this flight?'),
(24, 24, 'jane.jpg', 'jane', 'Bland', 'plainjane@example.com', 1, '123', 198, '2020-12-01', 0, 0, 2, '', 0, 1, '', 1, 3, '', 1, 'Civil Servant', 'I write policy for the government. It gives me time to be at home with my 9 cats.', 1, '2020-12-05 14:44:38', 2, 1, 'I could talk I guess. I\'ve never done this before'),
(25, 25, 'rubberducky.jpg', 'Andrew', 'Smyk', 'andrew@smyk.com', 1, '123', 12, '2020-12-01', 1, 1, 1, '', 1, 3, 'pretty sure I got kids around here somewh --- oh, gotta take the dog out', 1, 4, 'Master of the universe!', 1, 'professional wrangler', 'oh man. where do i even start. Look, you wanna chat. let\'s do it! (you got any pizza?)', 1, '2020-12-05 14:54:01', 2, 1, 'this is great. i brought some cool stuff with me for the trip if you wanna see'),
(26, 26, '', 'testing', 'testing', 'testing@testing.com', 1, '123', 14, '2020-12-02', 1, 0, 1, ' ', 1, 1, ' ', 1, 1, ' ', 1, '', ' ', 1, '2020-12-09 21:11:21', 2, 1, ''),
(27, 27, '', 'testing', 'testing', 'testing@testing.com', 1, '123', 14, '2020-12-02', 1, 0, 1, ' ', 1, 1, ' ', 1, 1, ' ', 1, '', ' ', 1, '2020-12-09 21:14:09', 2, 1, ''),
(28, 28, 'kayden.png', 'kk', 'leung', 'kk@leung.com', 1, '123', 14, '2020-12-04', 1, 0, 2, 'fd', 1, 1, '', 1, 1, '', 1, '', '', 1, '2020-12-16 17:59:42', 2, 3, ''),
(29, 29, 'kayden.png', 'kk', 'leung', 'kk@leung.com', 1, '123', 13, '2020-12-04', 1, 0, 1, '', 1, 1, '', 1, 1, '', 1, '', '', 1, '2020-12-16 18:03:18', 2, 1, ''),
(30, 30, 'kayden.png', 'kk', 'leung', 'kk@leung.com', 1, '123', 13, '2020-12-04', 1, 0, 1, '', 1, 1, '', 1, 1, '', 1, '', '', 1, '2020-12-16 18:04:53', 2, 1, ''),
(31, 31, 'kayden.png', 'kk', 'leung', 'kk@leung.com', 1, '123', 13, '2020-12-04', 1, 0, 2, '', 1, 1, '', 1, 1, '', 1, '', '', 1, '2020-12-16 18:05:04', 2, 1, ''),
(32, 32, 'kayden.png', 'kk', 'leung', 'kk@leung.com', 1, '123', 13, '2020-12-04', 1, 0, 2, '', 1, 1, '', 1, 1, '', 1, '', '', 1, '2020-12-16 18:05:51', 2, 1, ''),
(33, 33, 'car6.png', 'testing', 'testing', 'testing@testing.com', 1, '123', 17, '2020-12-09', 1, 0, 2, '', 1, 2, ' ', 1, 1, ' ', 1, 'pilot', ' i am a pilot', 1, '2020-12-16 23:39:27', 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `person-dealbreaker`
--

CREATE TABLE `person-dealbreaker` (
  `personId` int(11) NOT NULL,
  `dealBreakerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person-dealbreaker`
--

INSERT INTO `person-dealbreaker` (`personId`, `dealBreakerId`) VALUES
(17, 8),
(17, 6),
(17, 5),
(18, 2),
(18, 4),
(19, 1),
(21, 5),
(21, 7),
(21, 4),
(21, 1),
(23, 4),
(23, 8),
(23, 7),
(23, 6),
(24, 5),
(25, 1),
(25, 4),
(25, 5),
(25, 7),
(27, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 1),
(16, 2),
(16, 3),
(16, 6);

-- --------------------------------------------------------

--
-- Table structure for table `person-interest`
--

CREATE TABLE `person-interest` (
  `personId` int(11) NOT NULL,
  `interestId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person-interest`
--

INSERT INTO `person-interest` (`personId`, `interestId`) VALUES
(17, 5),
(17, 4),
(17, 8),
(17, 9),
(17, 14),
(17, 15),
(17, 16),
(18, 5),
(18, 8),
(19, 2),
(19, 3),
(19, 4),
(19, 12),
(19, 13),
(19, 14),
(20, 12),
(20, 13),
(20, 14),
(21, 4),
(21, 10),
(21, 11),
(22, 12),
(22, 15),
(22, 16),
(23, 2),
(23, 5),
(23, 4),
(23, 14),
(24, 4),
(24, 6),
(24, 8),
(24, 12),
(25, 8),
(25, 9),
(25, 10),
(25, 12),
(25, 13),
(27, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `person-profile`
--

CREATE TABLE `person-profile` (
  `personId` int(11) NOT NULL,
  `profileId` int(11) NOT NULL,
  `addBuddy` tinyint(1) NOT NULL,
  `connected` tinyint(1) NOT NULL,
  `blocked` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person-profile`
--

INSERT INTO `person-profile` (`personId`, `profileId`, `addBuddy`, `connected`, `blocked`) VALUES
(17, 16, 1, 0, 0),
(18, 16, 1, 0, 0),
(16, 17, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `relationshipId` int(11) NOT NULL,
  `relationshipName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`relationshipId`, `relationshipName`) VALUES
(1, 'Single'),
(2, 'In a relationship'),
(3, 'Married'),
(4, 'Separated'),
(5, 'Divorced'),
(6, 'Widowed'),
(7, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusId` int(11) NOT NULL,
  `statusName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusId`, `statusName`) VALUES
(1, 'Available'),
(2, 'Busy'),
(3, 'Sleeping'),
(4, 'In a meeting'),
(5, 'Do not disturb'),
(6, 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`) VALUES
(1, 'Admin'),
(2, 'Others');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `dealbreaker`
--
ALTER TABLE `dealbreaker`
  ADD PRIMARY KEY (`dealBreakerId`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`eduId`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flightId`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`genderId`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interestId`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personId`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`relationshipId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `dealbreaker`
--
ALTER TABLE `dealbreaker`
  MODIFY `dealBreakerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `eduId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flightId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `genderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `relationshipId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
