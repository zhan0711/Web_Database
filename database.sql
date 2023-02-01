
CREATE DATABASE dd;
GRANT USAGE ON *.* TO 'appuser1'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON dd.* TO 'appuser1'@'localhost';
FLUSH PRIVILEGES;

USE dd;

/* create table of student profile */
DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `studentID` mediumint(8) unsigned NOT NULL auto_increment,
  `firstName` varchar(255) default NULL,
  `lastName` varchar(255) default NULL,
  `phone` varchar(100) default NULL,
  `email` varchar(255) default NULL,
  `address` varchar(255) default NULL,
  `postalZip` varchar(10) default NULL,
  `country` varchar(100) default NULL,
  `password` varchar(100) default NULL,
  PRIMARY KEY (`studentID`)
) AUTO_INCREMENT=1;

INSERT INTO `student` (`firstName`,`lastName`,`phone`,`email`,`address`,`postalZip`,`country`,`password`)
VALUES
  ("Harlan","Martin","1-843-195-4223","sociis.natoque.penatibus@outlook.com","4199 Eget Ave","76427","Canada","123Demo"),
  ("Zeus","Powers","(666) 592-7430","non.lacinia@outlook.edu","P.O. Box 513, 9765 Nulla. Street","45-42","Canada","123Demo"),
  ("Tobias","Horne","(833) 377-7336","sem.vitae@yahoo.couk","787-1200 Non, Rd.","6233","Canada","123Demo"),
  ("Trevor","Duran","1-278-272-5836","mollis@aol.ca","860-497 Curabitur Rd.","36-554","Canada","123Demo"),
  ("Xyla","Bean","(325) 938-1791","pellentesque@outlook.ca","Ap #994-3173 Sit Av.","41218","Canada","123Demo");

/* create table of course */
DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `courseID` mediumint(8) unsigned NOT NULL auto_increment,
  `level` varchar(10) default NULL,
  `courseName` varchar(255) default NULL,
  PRIMARY KEY (`courseID`)
) AUTO_INCREMENT=1;

INSERT INTO `course` (`level`,`courseName`)
VALUES
  ("01","Java"),
  ("02","Web"),
  ("01","Database"),
  ("01","Communication"),
  ("02","Linux");

/* create table of teacher profile */
DROP TABLE IF EXISTS `teacher`;

CREATE TABLE `teacher` (
  `teacherID` mediumint(8) unsigned NOT NULL auto_increment,
  `firstName` varchar(255) default NULL,
  `lastName` varchar(255) default NULL,
  `phone` varchar(100) default NULL,
  `email` varchar(255) default NULL,
  `password` varchar(100) default NULL,
  `courseID` mediumint(8) unsigned default NULL,
  FOREIGN KEY (`courseID`) REFERENCES `course`(`courseID`) ON DELETE SET NULL,
  PRIMARY KEY (`teacherID`)
) AUTO_INCREMENT=1;


INSERT INTO `teacher` (`firstName`,`lastName`,`phone`,`email`,`password`,`courseID`)
VALUES
  ("Marge","Rableau","(613) 953-4290","mlowings0@samsung.com","123Demo","4"),
  ("Janeva","Lowings","(413) 132-9064","vcordey2@tmall.com","123Demo","3"),
  ("Van","Cordey","(514) 892-9962","jrableau1@wired.com","123Demo","1"),
  ("Delores","Hydes","(506) 970-0979","douldcott6@cloudflare.com","123Demo","3"),
  ("Jeremiah","Ouldcott","(613) 932-9991","68239469382@qq.com","123Demo","4");


/* create table of grades. referencing course and student */
DROP TABLE IF EXISTS `grade`;

CREATE TABLE `grade` (
  `courseID` mediumint(8) unsigned default NULL,
  `studentID` mediumint(8) unsigned default NULL,
  `grade` double default NULL,
  FOREIGN KEY (`studentID`) REFERENCES `student`(`studentID`) ON DELETE CASCADE,
  FOREIGN KEY (`courseID`) REFERENCES `course`(`courseID`) ON DELETE CASCADE
);

INSERT INTO `grade`(`courseID`, `studentID`, `grade`)
VALUES
 ('1','1','90'),
 ('1','2','91'),
 ('1','3','92'),
 ('2','1','90'),
 ('2','2','91'),
 ('2','3','92');
