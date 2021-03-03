
-- course
CREATE TABLE `course` (
 `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
 `courseName` varchar(50) NOT NULL,
 `term` varchar(15) DEFAULT NULL,
 `startDate` date DEFAULT NULL,
 `endDate` date DEFAULT NULL,
 `credit` int(11) DEFAULT NULL,
 `prequisite` int(5) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10003 DEFAULT CHARSET=latin1;

-- registration	

CREATE TABLE `registration` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `studentID` int(10) unsigned NOT NULL,
 `courseID` int(5) unsigned NOT NULL,
 `registrationDate` date DEFAULT NULL,
 PRIMARY KEY (`id`,`studentID`,`courseID`),
 KEY `fk1` (`studentID`),
 KEY `fk2` (`courseID`),
 CONSTRAINT `fk1` FOREIGN KEY (`studentID`) REFERENCES `student` (`id`),
 CONSTRAINT `fk2` FOREIGN KEY (`courseID`) REFERENCES `course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000003 DEFAULT CHARSET=latin1;
-- student	
CREATE TABLE `student` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `firstName` varchar(25) NOT NULL,
 `lastName` varchar(25) NOT NULL,
 `dob` date DEFAULT NULL,
 `address` varchar(2000) DEFAULT NULL,
 `gender` varchar(10) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1801040005 DEFAULT CHARSET=latin1;