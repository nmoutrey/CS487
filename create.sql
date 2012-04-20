Create Table ScubaUser(
       username varchar(20) not null,
       password varchar(20) not null,
       firstname varchar (20) not null,
       lastname varchar (20) not null,
       money int not null,
       primary key (username)
);

Create Table ScubaCourse(
       classID int auto_increment not null,
       name varchar(30) not null,
       location varchar(30) not null,
       description varchar(100) not null,
       day int not null,
       month int not null,
       year int not null,
       capacity int not null,
       price int not null,
       primary key (classID)
);

Create Table TakesCourse(
       username varchar(20) not null,
       classID int not null,
       primary key (username, classID),
       foreign key (username) references ScubaUser,
       foreign key (classID) references ScubaCourse
);
