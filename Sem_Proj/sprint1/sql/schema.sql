CREATE TABLE bookinfo (
id int not null primary key auto_increment,
inserttime datetime,
booktitle varchar(255),
isbn varchar(255),
author varchar(255),
status varchar(255)
);

CREATE TABLE contactRequests (
id int not null primary key auto_increment,
inserttime datetime,
email varchar(255),
phone varchar(255),
message varchar(255)
);