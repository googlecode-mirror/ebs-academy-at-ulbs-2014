CREATE TABLE ebs.grupa (
 id INT NOT NULL AUTO_INCREMENT,
 nume VARCHAR(50) NOT NULL,
 an INT(11) NOT NULL,
 sef_grupa VARCHAR(50),
 profil VARCHAR(50) NOT NULL,
 
 PRIMARY KEY(id),
 FOREIGN KEY(sef_grupa) REFERENCES ebs.user(id),
);
