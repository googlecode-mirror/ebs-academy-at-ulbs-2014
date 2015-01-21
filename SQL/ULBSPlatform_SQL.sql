//----User-------------------------------------------

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

//----Examene----------------------------------------

CREATE TABLE 'ULBSPlatform'.'Examen' (
	 ID INT NOT NULL AUTO_INCREMENT,
	 IDGRUPA INT NULL,  
	 IDMATERIE INT NULL,
	 DATA DATETIME NULL,
	 TIP_EXAMEN INT NULL,
	 PRIMARY KEY (ID)
);
 
//----Materii----------------------------------------
CREATE TABLE 'ULBSPlatform'.'Materii' (
	ID INT NOT NULL AUTO_INCREMENT,
	ID_USER INT,
	CREDITE INT,
	DENUMIRE VARCHAR(100),
	PRIMARY KEY(ID),
	FOREIGN KEY(ID_USER)REFERENCES 'ULBSPlatform'.Users(ID)
);

CREATE TABLE 'ULBSPlatform'.'Materii_Grupe'(
	ID INT  NOT NULL AUTO_INCREMENT,
	ID_MATERIE INT,
	ID_GRUPA INT,
	SEMESTRU INT,
	PRIMARY KEY(ID),
	FOREIGN KEY(ID_MATERIE)REFERENCES 'ULBSPlatform'.Materii(ID),
	FOREIGN KEY(ID_GRUPA)REFERENCES 'ULBSPlatform'.Grupe(ID)
);

//---------Prezenta-----------------------------------

CREATE TABLE 'ULBSPlatform'.'Prezenta' (
	  ID INT(11) NOT NULL AUTO_INCREMENT,
	  ID_MATERIE INT(11) NOT NULL,
	  DATA DATE NOT NULL,
	  TIP_PREZENTA VARCHAR(1) CHARACTER SET DEC8 NOT NULL,
	  PRIMARY KEY (ID)
);

CREATE TABLE 'ULBSPlatform'.'Prezenta_User' (
	  ID INT(11) NOT NULL AUTO_INCREMENT,
	  ID_PREZENTA INT(11) NOT NULL,
	  ID_USER INT(11) NOT NULL,
	  PRIMARY KEY ('ID')
); 

//------------Teme licenta-------------------------------
CREATE TABLE 'ULBSPlatform'.'Teme_Licenta' (
	 ID INT NOT NULL AUTO_INCREMENT,
	 ID_MATERIE INT(11) NOT NULL,
	 ID_USER INT(11) NOT NULL,
	 DENUMIRE_TEMA VARCHAR(50),
	 DESCRIERE_TEMA VARCHAR(500),
	 ID_GRUPA INT,
	 LOCURI_DISPONIBILE TINYINT(2) NOT NULL,
	 PRIMARY KEY(ID),
	 FOREIGN KEY(ID_MATERIE) REFERENCES 'ULBSPlatform'.Materii(ID),
	 FOREIGN KEY(ID_USER) REFERENCES 'ULBSPlatform'.User(ID),
	 FOREIGN KEY(ID_GRUPA) REFERENCES 'ULBSPlatform'.Grupa(ID)
);

//---------Teste------------------------------------------

//SQL pentru creearea tabelelor test, intrebare, raspuns

CREATE TABLE 'ULBSPlatform'.'Test' (
	  ID INT NOT NULL AUTO_INCREMENT,
	  ID_MATERIE INT NULL,
	  ID_USER INT NULL,
	  DENUMIRE VARCHAR(70) NULL,
	  TIP INT NULL,
	  DESCRIERE VARCHAR(500) NULL,
	  DATA DATETIME NULL,
	  PRIMARY KEY (ID)
);

CREATE TABLE 'ULBSPlatform'.'Intrebare' (
	  ID INT NOT NULL AUTO_INCREMENT,
	  ID_TEST INT NULL,
	  INTREBAREA VARCHAR(500) NULL,
	  TIP_INTREBARE ENUM('grila','scris','vot') NOT NULL,
	  PUNCTAJ_INTREBARE FLOAT NULL,
	  DATA_MODIFICARII DATETIME NULL,
	  PRIMARY KEY (ID)
);
// TIP INTREBARE + CONVENCTIE

CREATE TABLE 'ULBSPlatform'.'Raspunsuri' (
	  ID INT NOT NULL AUTO_INCREMENT,
	  ID_INTREBARE INT NULL,
	  RASPUNS VARCHAR(500) NULL,
	  CORECT VARCHAR(45) NULL,
	  PRIMARY KEY (ID)
);

//SQL pentru creearea tabelelor de legatura(user_test si user_raspuns)

CREATE TABLE 'ULBSPlatform'.'User_Test' (
	  ID INT NOT NULL AUTO_INCREMENT,
	  ID_USER INT NULL,
	  ID_TEST INT NULL,
	  PUNCTAJ VARCHAR(45) NULL,
	  DATA DATE NULL,
	  PRIMARY KEY (ID)
);

CREATE TABLE 'ULBSPlatform'.'User_Raspuns' (
	  ID INT NOT NULL AUTO_INCREMENT,
	  ID_USER_TEST INT NULL,
	  RASPUNSUL VARCHAR(500) NULL,
	  PUNCTAJ_OBTINUT VARCHAR(45) NULL,
	  PRIMARY KEY (ID)
);