create database cup;
use cup;
-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2015 at 09:32 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cup`
--

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE IF NOT EXISTS `coach` (
  `CoachID` int(3) NOT NULL,
  `Name` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`CoachID`, `Name`) VALUES
(1, 'Luis Enrique'),
(2, 'Rafael Benitez');

-- --------------------------------------------------------

--
-- Table structure for table `cup`
--

CREATE TABLE IF NOT EXISTS `cup` (
  `CupID` int(3) NOT NULL,
  `Name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Start` date NOT NULL,
  `End` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cup`
--

INSERT INTO `cup` (`CupID`, `Name`, `Start`, `End`) VALUES
(1, 'Cup Spain', '2015-11-01', '2015-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `cup_schdule`
--

CREATE TABLE IF NOT EXISTS `cup_schdule` (
  `ID` int(10) NOT NULL,
  `CupID` int(5) NOT NULL,
  `Team1ID` int(5) NOT NULL,
  `Team2ID` int(5) NOT NULL,
  `MatchDate` datetime NOT NULL,
  `StaduimID` int(3) NOT NULL,
  `Round` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cup_schdule`
--

INSERT INTO `cup_schdule` (`ID`, `CupID`, `Team1ID`, `Team2ID`, `MatchDate`, `StaduimID`, `Round`) VALUES
(1, 1, 1, 2, '2015-12-01 21:45:00', 1, 1),
(2, 1, 2, 1, '2015-12-05 21:45:00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cup_team`
--

CREATE TABLE IF NOT EXISTS `cup_team` (
  `CupTeamID` int(10) NOT NULL,
  `CupID` int(5) NOT NULL,
  `TeamID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match_card`
--

CREATE TABLE IF NOT EXISTS `match_card` (
  `MatchCardID` int(10) NOT NULL,
  `MatchID` int(5) NOT NULL,
  `PlayerID` int(5) NOT NULL,
  `CardTime` time NOT NULL,
  `Type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match_goal`
--

CREATE TABLE IF NOT EXISTS `match_goal` (
  `MatchGoalID` int(10) NOT NULL,
  `MatchID` int(5) NOT NULL,
  `PlayerID` int(10) NOT NULL,
  `GoalTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `PlayerID` int(10) NOT NULL,
  `PlayerName` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `TeamID` int(4) NOT NULL,
  `PlayerNum` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`PlayerID`, `PlayerName`, `DOB`, `TeamID`, `PlayerNum`) VALUES
(104, 'A', '1970-05-01', 1, 1),
(105, 'B', '1971-07-01', 1, 2),
(106, 'C', '1970-10-01', 1, 3),
(107, 'D', '1968-05-10', 1, 4),
(108, 'E', '1975-05-04', 1, 5),
(109, 'F', '1980-10-15', 1, 6),
(110, 'G', '1985-01-20', 1, 7),
(111, 'H', '1970-07-07', 1, 8),
(112, 'I', '1982-02-02', 1, 9),
(113, 'M', '1987-06-24', 1, 10),
(114, 'K', '1990-03-02', 2, 11),
(115, 'L', '1982-06-05', 2, 12),
(116, 'N', '1982-07-07', 2, 13),
(117, 'O', '1989-09-09', 2, 14),
(118, 'P', '1970-05-01', 2, 15),
(119, 'Q', '1988-08-08', 2, 16),
(120, 'R', '1965-12-20', 2, 17),
(121, 'S', '1970-11-05', 2, 18),
(122, 'T', '1977-08-01', 2, 19),
(123, 'U', '1974-05-25', 2, 20),
(124, 'Osman', '1995-09-01', 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `staduim`
--

CREATE TABLE IF NOT EXISTS `staduim` (
  `StaduimID` int(3) NOT NULL,
  `Name` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staduim`
--

INSERT INTO `staduim` (`StaduimID`, `Name`) VALUES
(1, 'Camp Nou'),
(2, 'Santiago Bernabeu');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `TeamID` int(5) NOT NULL,
  `Name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `CoachID` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TeamID`, `Name`, `CoachID`) VALUES
(1, 'Barcelona', 1),
(2, 'Real Madrid', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`CoachID`);

--
-- Indexes for table `cup`
--
ALTER TABLE `cup`
  ADD PRIMARY KEY (`CupID`);

--
-- Indexes for table `cup_schdule`
--
ALTER TABLE `cup_schdule`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CupID` (`CupID`),
  ADD KEY `StaduimID` (`StaduimID`),
  ADD KEY `Team1ID` (`Team1ID`),
  ADD KEY `Team2ID` (`Team2ID`);

--
-- Indexes for table `cup_team`
--
ALTER TABLE `cup_team`
  ADD PRIMARY KEY (`CupTeamID`),
  ADD KEY `CupID` (`CupID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indexes for table `match_card`
--
ALTER TABLE `match_card`
  ADD PRIMARY KEY (`MatchCardID`),
  ADD KEY `MatchID` (`MatchID`),
  ADD KEY `PlayerID` (`PlayerID`);

--
-- Indexes for table `match_goal`
--
ALTER TABLE `match_goal`
  ADD PRIMARY KEY (`MatchGoalID`),
  ADD KEY `MatchID` (`MatchID`),
  ADD KEY `PlayerID` (`PlayerID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`PlayerID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indexes for table `staduim`
--
ALTER TABLE `staduim`
  ADD PRIMARY KEY (`StaduimID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TeamID`),
  ADD KEY `CoachID` (`CoachID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `CoachID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cup`
--
ALTER TABLE `cup`
  MODIFY `CupID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cup_schdule`
--
ALTER TABLE `cup_schdule`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cup_team`
--
ALTER TABLE `cup_team`
  MODIFY `CupTeamID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `match_card`
--
ALTER TABLE `match_card`
  MODIFY `MatchCardID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `match_goal`
--
ALTER TABLE `match_goal`
  MODIFY `MatchGoalID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `PlayerID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `staduim`
--
ALTER TABLE `staduim`
  MODIFY `StaduimID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `TeamID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cup_schdule`
--
ALTER TABLE `cup_schdule`
  ADD CONSTRAINT `cup_schdule_ibfk_1` FOREIGN KEY (`CupID`) REFERENCES `cup` (`CupID`),
  ADD CONSTRAINT `cup_schdule_ibfk_2` FOREIGN KEY (`StaduimID`) REFERENCES `staduim` (`StaduimID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cup_schdule_ibfk_3` FOREIGN KEY (`Team1ID`) REFERENCES `team` (`TeamID`),
  ADD CONSTRAINT `cup_schdule_ibfk_4` FOREIGN KEY (`Team2ID`) REFERENCES `team` (`TeamID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cup_team`
--
ALTER TABLE `cup_team`
  ADD CONSTRAINT `cup_team_ibfk_1` FOREIGN KEY (`CupID`) REFERENCES `cup` (`CupID`),
  ADD CONSTRAINT `cup_team_ibfk_2` FOREIGN KEY (`TeamID`) REFERENCES `team` (`TeamID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `match_card`
--
ALTER TABLE `match_card`
  ADD CONSTRAINT `match_card_ibfk_1` FOREIGN KEY (`MatchID`) REFERENCES `cup_schdule` (`ID`),
  ADD CONSTRAINT `match_card_ibfk_2` FOREIGN KEY (`PlayerID`) REFERENCES `player` (`PlayerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `match_goal`
--
ALTER TABLE `match_goal`
  ADD CONSTRAINT `match_goal_ibfk_1` FOREIGN KEY (`MatchID`) REFERENCES `cup_schdule` (`ID`),
  ADD CONSTRAINT `match_goal_ibfk_2` FOREIGN KEY (`PlayerID`) REFERENCES `player` (`PlayerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `team` (`TeamID`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`CoachID`) REFERENCES `coach` (`CoachID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
