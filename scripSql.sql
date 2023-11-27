
    CREATE DATABASE IF NOT EXISTS db_name_test;

    USE db_name_test;
    --
    CREATE TABLE IF NOT EXISTS `utilisateurs` (
    `UserID` int NOT NULL AUTO_INCREMENT,
    `email` varchar(50) DEFAULT NULL,
    `password` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`UserID`)
) ENGINE=InnoDB ;