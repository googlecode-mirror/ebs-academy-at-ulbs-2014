CREATE TABLE `ULBSPlatform`.`User` (
  	ID INT NOT NULL AUTO_INCREMENT,
  	Email VARCHAR(100) NOT NULL,
 	Parola VARCHAR(32) NOT NULL,
  	Nume VARCHAR(100) NOT NULL,
 	Prenume VARCHAR(100) NOT NULL,
 	Tip ENUM('student', 'profesor', 'admin') NOT NULL,
 	DataAdaugarii DATE NOT NULL,
 	Status ENUM('AC','DEL','SUS','NEW') NOT NULL,
 	PRIMARY KEY (ID)
);
