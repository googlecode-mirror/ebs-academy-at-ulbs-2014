CREATE TABLE ebs.teme_licenta (
 id INT NOT NULL AUTO_INCREMENT,
  id_materie INT(11) NOT NULL,
  id_user INT(11) NOT NULL,
  denumire_tema VARCHAR(50),
  descriere_tema VARCHAR(500),
  id_grupa INT,
  locuri_disponibile TINYINT(2) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_materie) REFERENCES ebs.materii(id),
  FOREIGN KEY(id_user) REFERENCES ebs.user(id),
  FOREIGN KEY(id_grupa) REFERENCES ebs.grupa(id),
);

	

