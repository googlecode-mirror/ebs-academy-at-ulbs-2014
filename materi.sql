create table Materii
(
id int,
id_prof int,
credite int,
denumire varchar(50),
semestru int, 
primary key(id),
foreign key(id_prof)references profesori(id)
);

create table Materii_grupe
(
id int, 
id_materie int,
id_grupa int,
primary key(id),
foreign key(id_materie)references materii(id),
foreign key(id_grupa)references grupe(id)
);