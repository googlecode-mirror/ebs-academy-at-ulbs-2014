create table Materii
(
id int NOT NULL AUTO_INCREMENT,
id_user int,
credite int,
denumire varchar(100),
primary key(id),
foreign key(id_user)references user(id)
);

create table Materii_grupe
(
id int  NOT NULL AUTO_INCREMENT, 
id_materie int,
id_grupa int,
semestru int, 
primary key(id),
foreign key(id_materie)references materii(id),
foreign key(id_grupa)references grupe(id)
);