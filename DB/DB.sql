--
-- Database: 'dendax'
--
 
create database IF NOT EXISTS `dendax` ;
 use `dendax`;
-- --------------------------------------------------------
 
--
-- Table structure for table 'users'
--
 
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name`  text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) ,
  `message` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- log (userId, message, modified) --

CREATE TABLE IF NOT EXISTS `log` (
  `userId` int(11) NOT NULL ,
  `message` text NOT NULL,
  `modified`  TIMESTAMP NOT NULL DEFAULT now(),
  FOREIGN KEY (userId) REFERENCES user(ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;


--
-- "BEFORE UPDATE " Trigger to insert the old record in the user table  into the log table
--


DROP TRIGGER IF EXISTS `user_update_trigger`

delimiter |
CREATE TRIGGER `user_update_trigger`
BEFORE UPDATE ON user
FOR EACH ROW
BEGIN

INSERT INTO log (`userId` , `message`) VALUES(OLD.ID, OLD.message);

END;
|

--
-- PROCEDURE to get the user logs by userid
--

DELIMITER //

CREATE PROCEDURE `GET_USER_LOGS` (IN ckID INT)
BEGIN
    SELECT `user`.`ID`, `user`.`name`, `log`.`message`, `log`.`modified` FROM user, log
    WHERE `user`.`ID` = `log`.`userId` AND `user`.`ID` = ckID;
END; //



