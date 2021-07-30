-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 07:14 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agroculture`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `blog` (IN `id` INT)  BEGIN
DELETE FROM mycart WHERE bid = id;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE `blogdata` (
  `blogId` int NOT NULL,
  `blogUser` varchar(256) NOT NULL,
  `blogTitle` varchar(256) NOT NULL,
  `blogContent` longtext NOT NULL,
  `blogTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogdata`
--

INSERT INTO `blogdata` (`blogId`, `blogUser`, `blogTitle`, `blogContent`, `blogTime`, `likes`) VALUES
(19, 'ThePhenom', 'First Blog', '<p>Its Awesome website<img alt=\"wink\" src=\"https://cdn.ckeditor.com/4.8.0/full/plugins/smiley/images/wink_smile.png\" style=\"height:23px; width:23px\" title=\"wink\" /></p>\r\n', '2018-02-25 07:39:41', 2),
(20, 'aman0275', 'sdsds', '<p>sdsdsdsdffg</p>\r\n', '2020-12-10 12:38:48', 1),
(21, 'shrivastava', 'Mini project', '<p>created by aman and animesh asdfghjkliuytrewdfghjk</p>\r\n', '2021-01-09 18:30:24', 2),
(22, 'shrivastava', 'Mini project', '<p>DBMS project</p>\r\n', '2021-01-14 16:48:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogfeedback`
--

CREATE TABLE `blogfeedback` (
  `blogId` int NOT NULL,
  `comment` varchar(256) NOT NULL,
  `commentUser` varchar(256) NOT NULL,
  `commentPic` varchar(256) NOT NULL DEFAULT 'profile0.png',
  `commentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogfeedback`
--

INSERT INTO `blogfeedback` (`blogId`, `comment`, `commentUser`, `commentPic`, `commentTime`) VALUES
(19, 'Mast yarr', 'ThePhenom', 'profile0.png', '2018-02-25 07:39:54'),
(20, 'gajab bro', 'aman0275', 'profile0.png', '2020-12-10 12:42:20'),
(20, 'huhuhlulu', 'aman0275', 'profile0.png', '2020-12-10 12:43:57'),
(19, 'dsddf', 'aman0275', 'profile0.png', '2020-12-20 13:59:22'),
(21, 'nice blog', 'shrivastava', 'profile0', '2021-01-09 18:30:47'),
(21, 'beautifull', 'akhil@gmail.com', 'profile0.png', '2021-01-09 18:35:22'),
(22, 'nice project', 'akhil@gmail.com', 'profile0.png', '2021-01-14 16:51:45'),
(22, 'great', 'shrivastava', 'profile0', '2021-01-17 16:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `bid` int NOT NULL,
  `bname` varchar(100) NOT NULL,
  `busername` varchar(100) NOT NULL,
  `bpassword` varchar(100) NOT NULL,
  `bhash` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `bmobile` varchar(100) NOT NULL,
  `baddress` text NOT NULL,
  `bactive` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `bname`, `busername`, `bpassword`, `bhash`, `bemail`, `bmobile`, `baddress`, `bactive`) VALUES
(4, 'Aman Sharma', 'amanq2', '$2y$10$raNa.ro/1HFc5NCMDcSV.uMT8fNfkCCxB.ldLGnL//Jj76bP90bG6', 'e0ec453e28e061cc58ac43f91dc2f3f0', 'amanuch@gmail.com', '0939513645', '14 subhash ward mandla', 0),
(5, 'Aman Sharma', 'aman0275', '$2y$10$MmkdwtsFGTnIw3ftLvLeruuL1FFAv9ap82t494f/mB3VaePO7DJKy', '02e74f10e0327ad868d138f2b4fdd6f0', 'aman0275@gmail.com', '9399513645', '14 subhash ward mandla', 1),
(6, 'animesh', 'shrivastava', '$2y$10$9WRJqGl/dKCI0h0DeZ7fH.I.zJnfHX18ySvGo9aOS6lJUV8T97XeO', '4b0250793549726d5c1ea3906726ebfe', 'as@gmail.com', '1234567890', 'bihar', 1),
(7, 'anay', 'anay1717@gmail.com', '$2y$10$Ut7HBNtKIAmifICTExwX1OOkFWFZdKrtKbbLxtv0vAq8f/wOkMFDO', '860320be12a1c050cd7731794e231bd3', 'anay1717@gmail.com', '5678901234', 'brooklyn bridge ke neeche', 1);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `fid` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fusername` varchar(255) NOT NULL,
  `fpassword` varchar(255) NOT NULL,
  `fhash` varchar(255) NOT NULL,
  `femail` varchar(255) NOT NULL,
  `fmobile` varchar(255) NOT NULL,
  `faddress` text NOT NULL,
  `factive` int NOT NULL DEFAULT '1',
  `frating` int NOT NULL DEFAULT '0',
  `picExt` varchar(255) NOT NULL DEFAULT 'png',
  `picStatus` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`fid`, `fname`, `fusername`, `fpassword`, `fhash`, `femail`, `fmobile`, `faddress`, `factive`, `frating`, `picExt`, `picStatus`) VALUES
(4, 'Aman Sharma', 'aman0275', '$2y$10$Ekz0b4JUkuMzlFhEKEdmHOgo9qMCGBaA1h9gjNd2zPdJtII6ekJx2', '24681928425f5a9133504de568f5f6df', 'aman0275@gmail.com', '9399513645', '14 subhash ward mandla', 1, 0, 'png', 0),
(5, 'akki', 'ask@123', '$2y$10$c6RVgfsjYbJp/fUFZkRuXO5..wcN.y/Cv2hGRf0heAfg7nkxnDnRy', '98dce83da57b0395e163467c9dae521b', 'akki@gmail.com', '1234567890', '14 subhash ward mandla', 0, 0, 'png', 0),
(6, 'man Sharma', 'amn0275', '$2y$10$dRvbqLdB5c.hKATAE.EcYOd.g.obYF682vOfb9dmLUGHkyBW.Ozri', '07cdfd23373b17c6b337251c22b7ea57', 'amaiha0275@gmail.com', '0399513645', '14 subhash ward mandla', 0, 0, 'png', 0),
(7, 'anay', 'sharma', '$2y$10$dbSpiPzuWUjR63vuYRcCUezczGMiun10d2jeTv/5BKcBgDM37WEVu', 'a1140a3d0df1c81e24ae954d935e8926', 'akkinew@gmail.com', '6362610023', 'subhash ward jabalpur', 1, 0, 'png', 0),
(8, 'akhil sing', 'akhil@gmail.com', '$2y$10$.1BNvDQJ9vZOUOkvLFqQ3up74UtpUV4jceeh3NrxAnBiYeWniJNHG', 'f9a40a4780f5e1306c46f1c8daecee3b', 'akhil@gmail.com', '1234567890', 'ganganagar', 1, 0, 'png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fproduct`
--

CREATE TABLE `fproduct` (
  `fid` int NOT NULL,
  `pid` int NOT NULL,
  `product` varchar(255) NOT NULL,
  `pcat` varchar(255) NOT NULL,
  `pinfo` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `pimage` varchar(255) NOT NULL DEFAULT 'blank.png',
  `picStatus` int NOT NULL DEFAULT '0',
  `rating` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fproduct`
--

INSERT INTO `fproduct` (`fid`, `pid`, `product`, `pcat`, `pinfo`, `price`, `pimage`, `picStatus`, `rating`) VALUES
(8, 33, 'bananan', 'Fruit', '<p>best banana</p>\r\n', 200, 'bananan8.jpg', 1, 0),
(8, 34, 'wheat', 'Grains', '<p>best in ganganagar</p>\r\n', 500, 'wheat8.jpg', 1, 0),
(8, 35, 'rice', 'Grains', '<p>best in Bangalore&nbsp;</p>\r\n', 1546, 'rice8.jpg', 1, 0),
(8, 36, 'mango', 'Fruit', '<p>kachha mango best</p>\r\n', 150, 'mango8.jpg', 1, 8.66667),
(8, 37, 'watermelon', 'Fruit', '<p>watermelon is a delicious and refreshing fruit that&#39;s also good for you.</p>\r\n', 150, 'watermelon8.jpg', 1, 0),
(8, 38, 'tomato', 'Vegetable', '<p>The&nbsp;<strong>tomato</strong>&nbsp;is the edible berry of the plant Solanum lycopersicum, commonly known as a&nbsp;<strong>tomato</strong>&nbsp;plant</p>\r\n', 50, 'tomato8.jpg', 1, 8),
(8, 39, 'potato', 'Vegetable', '<p>the potato is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nightshade\" title=\"Nightshade\">nightshade</a>&nbsp;in the genus&nbsp;<em>Solanum</em></p>\r\n', 40, 'potato8.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likedata`
--

CREATE TABLE `likedata` (
  `blogId` int NOT NULL,
  `blogUserId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likedata`
--

INSERT INTO `likedata` (`blogId`, `blogUserId`) VALUES
(19, 3),
(19, 4),
(20, 4),
(21, 6),
(21, 8),
(22, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `bid` int NOT NULL,
  `pid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`bid`, `pid`) VALUES
(3, 27),
(3, 30),
(5, 27),
(5, 27),
(7, 32),
(7, 32),
(6, 34),
(6, 38),
(6, 35),
(6, 35),
(6, 35);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `pid` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`pid`, `name`, `rating`, `comment`) VALUES
(36, 'animesh', 8, 'nice'),
(36, 'animesh', 5, 'average'),
(36, 'animesh', 9, 'ascdas'),
(36, 'animesh', 10, '55sd'),
(36, 'animesh', 10, 'sdsd'),
(36, 'animesh', 10, 'segse'),
(38, 'animesh', 8, 'very nice');

--
-- Triggers `review`
--
DELIMITER $$
CREATE TRIGGER `rating` AFTER INSERT ON `review` FOR EACH ROW begin
declare sum_rating float;
set @sum_rating:=(select avg(rating) from review where pid=new.pid);
update fproduct set rating =@sum_rating where pid=new.pid;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int NOT NULL,
  `bid` int NOT NULL,
  `pid` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `bid`, `pid`, `name`, `city`, `mobile`, `email`, `pincode`, `addr`) VALUES
(1, 3, 28, 'sa,j,cns', 'sajc', 'sajch', 'kmendki98@gmail.com', 'sacu', 'ckaskjc'),
(2, 5, 29, 'Aman Sharma', 'mandla', '09399513645', 'amanuchiha0275@gmail.com', '481661', '14 subhash ward mandla'),
(3, 6, 32, 'anay', 'jabalpur', '1234567890', 'asd@gmail.com', '481661', 'subhash ward jabalpur'),
(4, 6, 32, 'anay', 'delhi', '5678901234', 'as@gmail.com', '234673', 'bihar'),
(5, 6, 32, 'animesh', 'jabalpur', '6362610023', 'akki@gmail.com', '234673', 'subhash ward jabalpur'),
(6, 6, 32, 'animesh', 'jabalpur', '6362610023', 'akki@gmail.com', '234673', 'subhash ward jabalpur'),
(7, 6, 32, 'animesh', 'jabalpur', '6362610023', 'akki@gmail.com', '234673', 'subhash ward jabalpur'),
(8, 6, 32, 'animesh', 'jabalpur', '6362610023', 'akki@gmail.com', '234673', 'subhash ward jabalpur'),
(9, 6, 32, 'animesh', 'jabalpur', '5678901234', 'akkinew@gmail.com', '481661', 'bihar'),
(10, 6, 32, 'akhil sing', 'delhi', '1234567890', 'as@gmail.com', '234673', 'ganganagar'),
(11, 6, 32, 'sanj', 'bengalor', '8762685468', 'as@gmail.com', '126995', 'jayanagar'),
(12, 6, 33, 'sanj', 'bengalor', '8762685468', 'as@gmail.com', '126995', 'jayanagar'),
(13, 6, 28, 'sanj', 'bengalor', '8762685468', 'as@gmail.com', '126995', 'jayanagar'),
(14, 6, 30, 'sanj', 'bengalor', '8762685468', 'as@gmail.com', '126995', 'jayanagar'),
(15, 6, 33, 'animesh', 'jabalpur', '1234567890', 'akhil@gmail.com', '481661', 'ganganagar'),
(16, 6, 33, 'animesh', 'jabalpur', '1234567890', 'akhil@gmail.com', '481661', 'ganganagar'),
(17, 6, 32, 'animesh', 'jabalpur', '1234567890', 'akhil@gmail.com', '481661', 'ganganagar'),
(18, 6, 32, 'animesh', 'jabalpur', '1234567890', 'akhil@gmail.com', '481661', 'ganganagar'),
(19, 6, 36, 'akhil sing', 'delhi', '7654739258', 'akhil@gmail.com', '238553', 'jayanagar'),
(20, 6, 36, 'akhil sing', 'delhi', '7654739258', 'akhil@gmail.com', '238553', 'jayanagar'),
(21, 6, 34, 'akhil sing', 'delhi', '5678901234', 'samk@gmail.com', '126995', 'delhi 14'),
(22, 6, 38, 'akhil sing', 'delhi', '5678901234', 'samk@gmail.com', '126995', 'delhi 14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogdata`
--
ALTER TABLE `blogdata`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `bid` (`bid`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `fid` (`fid`);

--
-- Indexes for table `fproduct`
--
ALTER TABLE `fproduct`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `likedata`
--
ALTER TABLE `likedata`
  ADD KEY `blogId` (`blogId`),
  ADD KEY `blogUserId` (`blogUserId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogdata`
--
ALTER TABLE `blogdata`
  MODIFY `blogId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `bid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `fid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fproduct`
--
ALTER TABLE `fproduct`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `farmer` (`fid`);

--
-- Constraints for table `likedata`
--
ALTER TABLE `likedata`
  ADD CONSTRAINT `likedata_ibfk_1` FOREIGN KEY (`blogId`) REFERENCES `blogdata` (`blogId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
