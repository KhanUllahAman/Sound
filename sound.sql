-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 07:18 PM
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
-- Database: `sound`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `employee` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `phone` text NOT NULL,
  `birthday` varchar(250) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `pinterest` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `employee`, `image`, `phone`, `birthday`, `country`, `city`, `linkedin`, `twitter`, `pinterest`, `facebook`) VALUES
(4, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', '', 'abdulrehman.jpg', '03406886905', '10-jan-2004', 'pakistan', 'karachi', 'rehmanabdul1445', 'rehmanabdul1445', 'rehmanabdul1445', 'rehmanabdul1445'),
(6, 'Abdul Rehman fff', 'rehmanabdul1445@gmail.com', '428a78b4fee47253898d7918c0a09160', 'user', '', '', '', '', '', '', '', '', '', ''),
(7, 'unknown', 'unknown@gmail.com', '7789f854a3107432a84a897f2ff3e4fd', 'admin', '', '', '', '', '', '', '', '', '', ''),
(8, 'Abdul Rehman', 'rehmanabdul1445@gmail.com', '428a78b4fee47253898d7918c0a09160', 'user', '', 'abdulrehman.jpg', '03406886905', '10-jan-2004', 'Pakistan', 'Karachi', 'https://twitter.com/rehmanabdul1445', 'https://twitter.com/rehmanabdul1445', 'https://www.pinterest.com/abdulrehman1445', 'https://www.facebook.com/abdulrehman1445'),
(9, 'umar iqbal', 'umar1@gmail.com', '3f011c233957dfba24d6b2d5d653aa6c', 'user', '', '', '', '', '', '', '', '', '', ''),
(10, 'aziz ur rehman', 'aziz1@gmail.com', '77f96d74d75182a5a4fa205443bbc7e0', 'user', '', '', '', '', '', '', '', '', '', ''),
(11, 'adeel', 'adeel1@gmail.com', '80bc114d9c3c4553afc6e5588464cec7', 'user', '', '', '', '', '', '', '', '', '', ''),
(12, 'adeell', 'adeell1@gmail.com', '80bc114d9c3c4553afc6e5588464cec7', 'admin', '', '', '', '', '', '', '', '', '', ''),
(15, 'shayan', 'shayan@gmail.com', 'bc854861ea4788668252d0248112aacc', 'user', '', '', '', '', '', '', '', '', '', ''),
(19, 'employee', 'employee@gmail.com', '033836b6cedd9a857d82681aafadbc19', 'admin', 'yes', 'abdulrehman.jpg', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` varchar(250) NOT NULL,
  `tracks` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `image`, `title`, `artist`, `tracks`, `date`) VALUES
(12, 'Atif Aslam - Romantic Hits.png', 'Atif Aslam - Romantic Hits', 'Atif Aslam', '12', '2018-02-24'),
(13, 'Legend-Nusrat-Fateh-Ali-Khan-Hin.png', 'Legend - Nusrat Fateh Ali Khan - Album', 'Nusrat Fateh Ali Khan', '9', '2000-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `country` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `image`, `name`, `age`, `country`) VALUES
(26, 'NusratFatehAliKhan.jpg', 'Nusrat Fateh Ali Khan', 48, 'Pakitsan'),
(27, 'AtifAslamm.jpg', 'Atif Aslam', 0, ''),
(30, 'arijitsingh.png', 'Arijit SIngh', 0, ''),
(31, 'posoori.png', 'Ali Sethi x Shae Gill', 0, ''),
(32, 'kaka.png', 'Kaka', 0, ''),
(33, 'king.png', 'KIng', 0, ''),
(34, 'Jasmine Sandlas.png', 'Jasmine Sandlas', 0, ''),
(35, 'Dhvani Bhanushali and Nikhil DSouza.png', 'Dhvani Bhanushali and Nikhil DSouza', 0, ''),
(36, 'King & Zahrah Khan.png', 'King & Zahrah Khan ', 0, ''),
(37, 'YoungStunners.png', 'Young Stunners', 0, ''),
(38, 'asim azhar.png', 'Asim Azhar', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `artistquotes`
--

CREATE TABLE `artistquotes` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `quote` text NOT NULL,
  `position` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artistquotes`
--

INSERT INTO `artistquotes` (`id`, `image`, `quote`, `position`) VALUES
(2, 'QuoteNFAK.jpg', 'As the times change, people change, and so do their tastes, so I try to understand what the public wants, what they require. I have tried to make the music a bit easier for them to understand', ''),
(3, 'QuoteFarhanSaeed.jpg', 'If people critisize you, hurt you or shout at you, dont be bothered. Just remember, in ever game audience makes the noice, not the players.', ''),
(4, 'QuoteAtifAslam.jpg', 'I dont listen to my songs. The only time I do it is when someone points out a flaw in the end product.', 'active'),
(5, 'QuoteIbrarulHaq.jpg', 'Sone say I am too sensitive but truth is I just feel too much. Every word, ever action and every energy goes straight to m heart!.', ''),
(6, 'QuoteBilalSaeed.jpg', 'Dont lose our hope. There is night means Day has to be come because light and dark has same traveling speed.', '');

-- --------------------------------------------------------

--
-- Table structure for table `bannerimages`
--

CREATE TABLE `bannerimages` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `text` varchar(1000) NOT NULL,
  `title` varchar(250) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bannerimages`
--

INSERT INTO `bannerimages` (`id`, `image`, `text`, `title`, `link`) VALUES
(3, 'AbidaParveen.png', 'Top Best Artist', 'Abida Parveen', '#'),
(5, 'NFAK.png', 'Top Best Artist', 'NFAK', '#'),
(6, 'AtifAslam.png', 'Top Best Artist', 'Atif Aslam', '#'),
(7, 'ALiZafar.png', 'Top Best Artist', 'Ali Zafar', '#'),
(8, 'FarhanSaeed.png', 'Top Best Artist', 'Farhan Saeed', '#'),
(9, 'AmninderVirk.png', 'Top Best Artist', 'Amninder Virk', '#');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(2, 'Rock'),
(4, 'Jazz'),
(5, 'pop music'),
(7, 'hiphop music'),
(14, 'Film Scores'),
(15, 'Indian Film Pop'),
(16, 'Orchestral pop, Filmi , Sufi'),
(17, 'Filmi'),
(18, 'Indian Music');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `languages` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `languages`) VALUES
(3, 'English'),
(4, 'Urdu'),
(12, 'Hindi'),
(13, 'Punjabi');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `rating` varchar(250) NOT NULL,
  `review` text NOT NULL,
  `path` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `rating`, `review`, `path`, `image`) VALUES
(25, 'admin', 'I just Love it 😍', 'its amazing rally 😍😍', 'Mitti De Tibbe - by KAKA', 'abdulrehman.jpg'),
(27, 'admin', 'I just Love it 😍', 'amazing song hates off', 'Mitti De Tibbe - by KAKA', 'abdulrehman.jpg'),
(29, 'Abdul Rehman', 'I just Like it 😎', 'jnhbgv nhgv', 'BAMB AAGYA - Jasmine Sandles', 'abdulrehman.jpg'),
(30, 'Abdul Rehman', 'I just Love it 😍', 'One good thing about music, when it hits you, you feel no pain.', 'Kesariya - Brahmāstra ', 'abdulrehman.jpg'),
(32, 'Abdul Rehman', 'I just Hate it 😡', 'noooooooooooooooooooooooooooooo', 'Jab Koi Baat', 'abdulrehman.jpg'),
(33, 'Abdul Rehman', 'I just Hate it 😡', 'heheheheheh', 'Coke Studio | Season 14', 'abdulrehman.jpg'),
(35, 'Abdul Rehman', 'I just Love it 😍', 'Just amazing!', 'Tere Sang Yaara', 'abdulrehman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `album` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` varchar(250) NOT NULL,
  `song` varchar(250) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `language` varchar(250) NOT NULL,
  `date` text NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `album`, `image`, `title`, `artist`, `song`, `genre`, `language`, `date`, `description`) VALUES
(121, 'Atif Aslam - Romantic Hits', 'dill meri na suna-atif aslam.png', 'Dil Meri Na Sune', 'Atif Aslam', 'Dil Meri Na Sune - atif aslam.mp3', 'Film Scores', 'Hindi', '2018-01-01', 'Song Credits :\r\nSinger : Atif Aslam \r\nMusic: Himesh Reshammiya,\r\nLyrics : Manoj Muntashir, \r\nEdit & Gfx : Nadeem Akhtar (Paperboyz Studioz)\r\nChoreography : Adil Shaikh\r\nMusic Produced by : Aditya Dev, \r\nAditya Dev’s Music Assistant : Gaurav Singh\r\nHi'),
(122, 'Atif Aslam - Romantic Hits', 'Dekhte Dekhte.png', 'Dekhte Dekhte', 'Atif Aslam', 'Dekhte Dekhte-atif aslam.mp3', 'Indian Film Pop', 'Hindi', '2018-01-01', 'Song Credits :\r\n♪Song: Dekhte Dekhte\r\n♪Singer: Atif Aslam \r\n♪Written by Nusrat Fateh Ali Khan / Manoj Muntashir\r\n♪Composer - Nusrat Fateh Ali Khan / Rochak Kohli\r\n♪Published by WOMAD Music Ltd / T-Series\r\n►Additional credits \r\nSong Produced, Mixed an'),
(123, '', 'dill diyan gallan.png', 'Dil Diyan Gallan', 'Atif Aslam', 'Dil Diyan Gallan - atif aslam.mp3', 'Orchestral pop, Filmi , Sufi', 'Hindi', '2018-01-01', 'Song Credits:\r\nSong: Dil Diyan Gallan\r\nSinger: Atif Aslam\r\nMusic: Vishal and Shekhar\r\nLyrics: Irshad Kamil'),
(124, 'Atif Aslam - Romantic Hits', 'jab koi baat.png', 'Jab Koi Baat', 'Atif Aslam', 'Jab Koi Bat - atif aslam.mp3', 'Indian Film Pop', 'Hindi', '2018-01-01', '\r\nSong : Jab Koi Baat\r\nSinger : Atif Aslam & Shirley Setia\r\nMusic : DJ Chetas\r\nLyrics : Indeevar\r\nDirector : David Zennie\r\nProduced by : Champak Jain & Girish Jain\r\nExecutive Producer : Chetas Shah, Gaurav Chawla (On Stage Talents)\r\nMix & Master : Li'),
(125, 'Atif Aslam - Romantic Hits', 'jeena jeena atif aslam.png', 'Jeena Jeena', 'Atif Aslam', 'Jeena Jeena - Atif Aslam.mp3', 'Filmi', 'Hindi', '2018-01-01', 'Song: Jeena Jeena\r\nSinger: Atif Aslam\r\nMusic: Sachin-Jigar\r\nLyrics: Dinesh Vijan & Priya Saraiya\r\nAll songs mixed & mastered by Eric Pillai (Future Sound of Bombay)\r\n'),
(126, 'Atif Aslam - Romantic Hits', 'jeena laga hoon.png', 'Jeene Laga Hoon', 'Atif Aslam', 'Jeena Jeena - Atif Aslam.mp3', 'Indian Film Pop', 'Hindi', '2018-01-01', 'Song Credits :\r\nSingers : Atif Aslam, Shreya Ghoshal\r\nMusic Director : Sachin Jigar\r\nLyrics Writer : Priya Panchal\r\nMixed & Mastered By Eric Pillai (Future Sound of Bombay)'),
(127, 'Atif Aslam - Romantic Hits', 'musafir.png', 'Musafir', 'Atif Aslam', 'Musafir  - Atif Aslam.mp3', 'Indian Film Pop', 'Hindi', '2018-01-01', 'Song - MUSAFIR\r\nSingers- Atif Aslam Palak Muchhal \r\nMusic Composer - Palash Muchhal\r\nLyricist- Palak Muchhal\r\nMusic Label - T-Series \r\n'),
(128, 'Atif Aslam - Romantic Hits', 'o sathi.png', 'O Saathi', 'Atif Aslam', 'O Saathi atif aslam.mp3', 'Indian Music', 'Hindi', '2018-01-01', '\r\n\"O SAATHI\" SONG INFO\r\nSinger: Atif Aslam\r\nAlbum: Baaghi 2\r\nLyricist: Arko\r\nMusic: Arko\r\nLanguage: Hindi'),
(129, 'Atif Aslam - Romantic Hits', 'pehli dafa.png', 'Pehli Dafa', 'Atif Aslam', 'Pehli Dafa Atif Aslam.mp3', 'Indian Music', 'Hindi', '2018-01-01', 'Song: PEHLI DAFA\r\nSinger: ATIF ASLAM\r\nMusic: SHIRAZ UPPAL\r\nLyrics: SHAKEEL SOHAIL\r\nEditor: Nitin FCP \r\nMusic Label: T-SERIES'),
(130, 'Atif Aslam - Romantic Hits', 'piya o piya.png', 'Piya O Re Piya', 'Atif Aslam', 'Piya O Re Piya Atif Aslam.mp3', 'Indian Music', 'Hindi', '2018-01-01', 'Song credits:\r\nSinger(s): Atif Aslam & Shreya Ghoshal\r\nMusic Director: Sachin Jigar\r\nLyrics Writer: Priya Panchal\r\nEdit & Gfx : Nadeem Akhtar (Paperboyz Studioz)\r\n'),
(131, 'Atif Aslam - Romantic Hits', 'tera hua atif aslam.png', 'Tera Hua', 'Atif Aslam', 'Tera Hua - atifa slam.mp3', 'Indian Music', 'Hindi', '2018-01-01', 'Song- Tera Hua \r\nSinger- Atif Aslam \r\nMusic -Tanishk Bagchi\r\nLyrics - Manoj Muntashir \r\nAdditional Lyrics - Shabbir Ahmed, Arafat Mehmood\r\nMusic Supervisor - Azeem Dayani\r\nSongs Mixed And Mastered By Eric Pillai@Future Sound Of Bombay\r\nMix Assistant '),
(132, 'Atif Aslam - Romantic Hits', 'tere sang yaara.png', 'Tere Sang Yaara', 'Atif Aslam', 'Tere Sang Yaara - atif aslam.mp3', 'Indian Music', 'Hindi', '2018-01-01', 'Title : Tere Sang Yaara\r\nSinger : Atif Aslam\r\nLyrics : Manoj Muntashir\r\nMusic : Arko\r\nGuitarist : Krishna Pradhan\r\nProduced & Mixed by Aditya Dev\r\nMastered by Shadab Rayeen'),
(133, 'Legend - Nusrat Fateh Ali Khan - Album', 'Dil-Pe-Zakham-Khate-Hain-Punjabi.png', 'Dil Pe Zakham Khate Hain', 'Nusrat Fateh Ali Khan', 'Dil Pe Zakham Khate Hain  - nfak.mp3', 'Orchestral pop, Filmi , Sufi', 'Urdu', '1999-01-01', 'Dil Pe Zakham Khate Hain by Nusrat Fateh Ali Khan -  Superhit Songs'),
(134, 'Legend - Nusrat Fateh Ali Khan - Album', 'Dulhe Ka Sehra Suhana Lagta Hai.png', 'Dulhe Ka Sehra Suhana Lagta Hai', 'Nusrat Fateh Ali Khan', 'Dulhe Ka Sehra Suhana Lagta Hai - nfak.mp3', 'Orchestral pop, Filmi , Sufi', 'Urdu', '1999-01-01', 'Song : Dulhe Ka Sehra Suhana Lagta Hai\r\nSinger : Nusrat Fateh Ali Khan\r\nMusic : Nadeem- Shravan\r\nLyrics : Sameer\r\nProducer : Ratan Jain - Umed Jain\r\nDirector : Dharmesh Darshan\r\nMovie : Dhadkan\r\nStar Cast : Akshay Kumar, Sunil Shetty, Shilpa Shetty, '),
(135, 'Legend - Nusrat Fateh Ali Khan - Album', 'Hai Kahan Ka Irada Tumhara Sanam nfak.png', 'Hai Kahan Ka Irada', 'Nusrat Fateh Ali Khan', 'Hai Kahan Ka Irada Tumhara Sanam - nfak.mp3', 'Orchestral pop, Filmi , Sufi', 'Urdu', '1999-02-02', 'Song Name: Hai Kahan Ka Irada \nSinger: Nusrat Fateh Ali Khan. '),
(136, 'Legend - Nusrat Fateh Ali Khan - Album', 'kali kali zulfon ke phande na dalo.png', 'Kali Kali Zulfon Ke Phande Nah Dalo', 'Nusrat Fateh Ali Khan', 'Kali Kali Zulfon Ke Phande Na  - nfak.mp3', 'Orchestral pop, Filmi , Sufi', 'Urdu', '1999-01-01', 'Song Name: Kali Kali Zulfon Ke Phande Nah Dalo\r\nSinger: Nusrat Fateh Ali Khan. '),
(137, 'Legend - Nusrat Fateh Ali Khan - Album', 'matlabi dost hain matlabi yaar hai.png', 'Matlabi dost hai matlabi yaar hai', 'Nusrat Fateh Ali Khan', 'Matlabi dost hai matlabi yaar hai-nfak.mp3', 'Orchestral pop, Filmi , Sufi', 'Urdu', '1999-01-01', 'Song Name:Matlabi dost hai matlabi yaar hai\r\nSinger: Nusrat Fateh Ali Khan. '),
(138, 'Legend - Nusrat Fateh Ali Khan - Album', 'mera rashke kamar.jpg', 'Mere Rashke Qamar', 'Nusrat Fateh Ali Khan', 'Mere Rashke Qamar - nfak.mp3', 'Orchestral pop, Filmi , Sufi', 'Urdu', '1999-01-01', 'Song Name: Mere Rashke Qamar\r\nSinger: Nusrat Fateh Ali Khan. '),
(139, 'Legend - Nusrat Fateh Ali Khan - Album', 'Saja Hai Maikhana nfak.png', 'Saja Hai Maikhana', 'Nusrat Fateh Ali Khan', 'Saja Hai Maikhana  - nfak.mp3', 'Orchestral pop, Filmi , Sufi', 'Urdu', '1999-01-01', 'Song Name: Saja Hai Maikhana \r\nSinger: Nusrat Fateh Ali Khan. '),
(140, 'Legend - Nusrat Fateh Ali Khan - Album', 'Sochta-Hoon-Punjabi.png', 'Sochta Hoon Keh Woh Kitne Masoom The', 'Nusrat Fateh Ali Khan', 'Sochta Hun - NFAK.mp3', 'Orchestral pop, Filmi , Sufi', 'Urdu', '1999-01-01', 'Song Name: Sochta Hoon Keh Woh Kitne Masoom The\r\nSinger: Nusrat Fateh Ali Khan. '),
(141, 'Legend - Nusrat Fateh Ali Khan - Album', 'Ye Jo Halka Halka nfak.png', 'Yeh Jo Halka Halka', 'Nusrat Fateh Ali Khan', 'Ye Jo Halka Halka - nfak.mp3', 'Orchestral pop, Filmi , Sufi', 'Urdu', '1999-01-01', 'Song Name: Yeh Jo Halka Halka\r\nSinger: Nusrat Fateh Ali Khan. ');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming`
--

CREATE TABLE `upcoming` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcoming`
--

INSERT INTO `upcoming` (`id`, `image`, `date`) VALUES
(15, 'size_l (2).jpg', '2022-12-09'),
(17, 'size_l (1).jpg', '2023-03-09'),
(18, 'size_l.jpg', '2022-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `video` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` text NOT NULL,
  `artist` varchar(250) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `language` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `image`, `video`, `title`, `description`, `date`, `artist`, `genre`, `language`) VALUES
(27, 'kesariya.png', 'Kesariya - Brahmāstra _ Ranbir Kapoor _ Alia Bhatt _ Pritam _ Arijit Singh _ Amitabh Bhattacharya.mp4', 'Kesariya - Brahmāstra ', 'Music - Pritam\r\nLyrics - Amitabh Bhattacharya\r\nSinger - Arijit Singh\r\nAdditional Vocals - Nikhita Gandhi', '2022-07-17', 'Arijit SIngh', 'Indian Film Pop', 'Hindi'),
(28, 'posoori.png', 'Pasoori-Coke Studio _ Season 14 _ Pasoori _ Ali Sethi x Shae Gill.mp4', 'Coke Studio | Season 14', 'Coke Studio 14\r\nCurated & Produced by Xulfi\r\n\r\nSong Narrative: Ali Sethi\r\nWritten by Ali Sethi & Fazal Abbas\r\n\r\nComposed by Ali Sethi & Xulfi\r\nMusic Arranged by Abdullah Siddiqui & Sherry Khattak\r\nMusic Produced by Abdullah Siddiqui & Xulfi\r\n\r\nMixed by Xulfi', '2022-02-07', 'Ali Sethi x Shae Gill', 'Orchestral pop, Filmi , Sufi', 'Punjabi'),
(29, 'Mitti De Tibbe.png', 'Mitti De Tibbe.mp4', 'Mitti De Tibbe - by KAKA', 'Times Music presents the latest Punjabi hit Mitti De Tibbe, by Kaka\r\nTeri khushboo ch teri mitti di mahek main mehsoos karda aan, uss Mitti Di Khushboo ch main tenu yaad karda aan. Chheti mil Chheti  Mil.\r\nWitness a beautiful love story unfold with this new Punjabi song', '2022-07-28', 'Kaka', 'Indian Music', 'Punjabi'),
(30, 'tu aa ke dekhle.png', 'Tu Aake Dekhle.mp4', 'King - Tu Aake Dekhle', 'Song -  TU AAKE DEKHLE \r\nArtist - King \r\nLyrics - King \r\nComposer - King \r\nVideo Aesthetics By - Xmiikey \r\nSupporting Artists - Jasz& Nitye\r\nModel/Actor - Simran Kaur \r\nMix And Mastering By - Satyam HCR \r\nMusic Produced By - Shahbeats ', '2020-09-01', 'KIng', 'Indian Music', 'Hindi'),
(31, 'bamb-aa-gaya.png', 'BAMB AAGYA.mp4', 'BAMB AAGYA - Jasmine Sandles', 'Track Credits\r\nSong: Bamb Aagya\r\nSinger: Gur Sidhu, Jasmine Sandlas\r\nLyrics: Kaptaan\r\nMusic: Gur Sidhu\r\nMix & Master: B Sanjh\r\nConcept/screenplay/direction: Garry bhullar\r\nDop: Vikcee ', '2022-04-21', 'Jasmine Sandlas', 'Indian Music', 'Punjabi'),
(32, 'vaaste.png', 'Vaaste Song.mp4', 'Vaaste Song', 'Vaaste Song - Dhvani Bhanushali, Tanishk Bagchi | Nikhil D | Bhushan Kumar | Radhika Rao, Vaste Song\r\n', '2022-07-22', 'Dhvani Bhanushali and Nikhil DSouza', 'Indian Music', 'Hindi'),
(33, 'oops.png', 'OFFICIAL MUSIC VIDEO.mp4', 'OOPS | OFFICIAL MUSIC VIDEO', 'Artist: King & Zahrah Khan  \r\nLyrics and performed by: King \r\nProduced by: Section 8 & Hiten \r\nMixed & mastered by: Hanish Taneja', '2022-08-23', 'King & Zahrah Khan', 'Indian Music', 'Hindi'),
(34, 'Aazma le.png', 'AAZMA LE - Young Stunners.mp4', 'AAZMA LE - Young Stunners', 'Written & Performed by Talha Anjum, Talhah Yunus & Bilal Ali\r\nProduced, Mixed & Mastered by @Jokhay \r\nChorus Lyrics by Bilal Ali & Zahid Qureshi', '2022-05-23', 'Young Stunners', 'hiphop music', 'Urdu'),
(35, 'GAME ON.png', 'GAME ON -  Young Stunners.mp4', 'GAME ON -  Young Stunners', 'Written/Performed by @Talha Anjum & @Talhah Yunus \r\nMusic/Mix/Master: @Jokhay', '2022-05-12', 'Young Stunners', 'hiphop music', 'Urdu'),
(36, 'AFSANAY - Young Stunners.png', 'AFSANAY - Young Stunners.mp4', 'AFSANAY - Young Stunners', 'Official Video from the EP ‘A Tale of Two Talhas’\r\n\r\nWritten and Performed by Talhah Yunus & Talha Anjum\r\nMusic Produced, Mixed & Mastered by Jokhay \r\n', '2021-05-19', 'Young Stunners', 'hiphop music', 'Urdu'),
(37, 'GUMAAN - Young Stunners.png', 'GUMAAN - Young Stunners.mp4', 'GUMAAN - Young Stunners', 'Official Video from the EP “A Tale Of Two Talhas”\r\n', '2020-09-18', 'Young Stunners', 'hiphop music', 'Urdu'),
(38, 'Why Not Meri Jaan.png', 'Why Not Meri Jaan.mp4', 'Why Not Meri Jaan - Why Not Meri Jan', 'It’s time to let go of the ‘Whys’ and ‘Whats’ and usher in the new with a ‘Why Not’.\r\nFeaturing the incredible Young Stunners!\r\n\r\nExecutive Producer: Ali Hamza Productions\r\nDirector: Zeeshan Parwez', '2021-08-28', 'Young Stunners', 'hiphop music', 'Urdu'),
(39, 'Asim Azhar - Jo Tu Na Mila.png', 'Asim Azhar - Jo Tu Na Mila.mp4', 'Asim Azhar - Jo Tu Na Mila', 'Singer: Asim Azhar\r\nDirector: Yasir Jaswal\r\nStarring: Iqra Aziz & Waleed Khalid\r\n\r\nComposer: Asim Azhar\r\nMusic Producer: Qasim Azhar\r\nLyrics: Kunaal Vermaa\r\nCo-Produced by Haider Ali\r\nCo-Composer by Hasan Ali\r\nMixed by Chris “TEK” O Ryan\r\nMastered by Joe Bozzi', '2018-11-20', 'Asim Azhar', 'Jazz', 'Urdu'),
(40, 'Asim Azhar - Habibi.png', 'Asim Azhar - Habibi.mp4', 'Habibi - Asim Azhar  ', 'Song Name: Habibi\r\nMusic Composer: Asim Azhar, Haider Ali\r\nLyrics: Asim Azhar, Raamis Ali\r\nMusic Producer: Haider Ali, Asim Azhar, Black Summer, Qasim Azhar\r\nGuitars by: Dilawar Hussain\r\nVocal Production & Mixed by: Chris ‘TEK’ O Ryan\r\nMastered by: Joe Bozzi', '2022-07-11', 'Asim Azhar', 'Jazz', 'Urdu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artistquotes`
--
ALTER TABLE `artistquotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bannerimages`
--
ALTER TABLE `bannerimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcoming`
--
ALTER TABLE `upcoming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `artistquotes`
--
ALTER TABLE `artistquotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bannerimages`
--
ALTER TABLE `bannerimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `upcoming`
--
ALTER TABLE `upcoming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
