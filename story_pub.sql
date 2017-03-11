-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2017 at 05:38 PM
-- Server version: 5.5.52-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `story_pub`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_new_user`(IN sroles INT,IN semail VARCHAR(100), 
				IN spass VARCHAR(64), IN susername VARCHAR(45) )
BEGIN
	INSERT INTO users(roles,email,password,username) values(
		sroles,semail,spass,susername);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_new_valoration`(IN siduser INT, IN sidstory INT, IN svalue INT)
BEGIN
	declare n int;
	SELECT count(*) FROM story WHERE siduser=users  AND sidstory=idstories;
    if n=0 then 
	   INSERT INTO valorations(story,user,value) VALUES(sidstory,siduser,svalue);
    
    end if;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`idroles` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idroles`, `descripcion`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'invitado');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE IF NOT EXISTS `stories` (
`idstories` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `path` int(4) NOT NULL,
  `medium_value` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stories_has_tags`
--

CREATE TABLE IF NOT EXISTS `stories_has_tags` (
  `stories_idstories1` int(11) NOT NULL,
  `tags_idtags1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`idtags` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`idusers` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `roles` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `email`, `password`, `username`, `roles`) VALUES
(5, 'admin@storypub.es', '1234', 'admin', 1),
(6, 'user@gmail.es', '1234', 'user1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `valorations`
--

CREATE TABLE IF NOT EXISTS `valorations` (
`idvalorations` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `story` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `valorations`
--
DELIMITER //
CREATE TRIGGER `tr_valoration` AFTER INSERT ON `valorations`
 FOR EACH ROW begin 
	declare media decimal(1,1);
    SELECT AVG(value) INTO media FROM valorations WHERE story=NEW.story;
    UPDATE stories SET medium_value=media WHERE idstory=NEW.story;

END
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`idroles`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
 ADD PRIMARY KEY (`idstories`), ADD KEY `fk_stories_users1_idx` (`users`);

--
-- Indexes for table `stories_has_tags`
--
ALTER TABLE `stories_has_tags`
 ADD PRIMARY KEY (`stories_idstories1`,`tags_idtags1`), ADD KEY `fk_stories_has_tags_stories1_idx` (`stories_idstories1`), ADD KEY `fk_stories_has_tags_tags1_idx` (`tags_idtags1`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`idtags`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`idusers`), ADD KEY `fk_users_roles_idx` (`roles`);

--
-- Indexes for table `valorations`
--
ALTER TABLE `valorations`
 ADD PRIMARY KEY (`idvalorations`), ADD KEY `fk_valorations_users1_idx` (`user`), ADD KEY `fk_valorations_stories1_idx` (`story`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
MODIFY `idstories` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `idtags` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `valorations`
--
ALTER TABLE `valorations`
MODIFY `idvalorations` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
ADD CONSTRAINT `fk_stories_users1` FOREIGN KEY (`users`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stories_has_tags`
--
ALTER TABLE `stories_has_tags`
ADD CONSTRAINT `fk_stories_has_tags_stories1` FOREIGN KEY (`stories_idstories1`) REFERENCES `stories` (`idstories`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_stories_has_tags_tags1` FOREIGN KEY (`tags_idtags1`) REFERENCES `tags` (`idtags`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`roles`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `valorations`
--
ALTER TABLE `valorations`
ADD CONSTRAINT `fk_valorations_stories1` FOREIGN KEY (`story`) REFERENCES `stories` (`idstories`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_valorations_users1` FOREIGN KEY (`user`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
