create DATABASE socialnetwork;
use socialnetwork;
Create Table user(
user_id int Auto_Increment,
first_name varchar(15)  not null,
last_name varchar(15)  not null,
nick_name varchar(30),
email varchar(50)   not null UNIQUE,
password varchar(100) not null,
phonenum1 varchar(11),
phonenum2 varchar(11),
status  char(30) not null,
gender char(30) not null,
birthdate date not null,
pic BLOB ,
bio text(140) ,
hometown varchar(50),
img_status tinyint(5)  DEFAULT '1',
PRIMARY key(user_id)
);
 Create Table friend_ship(

data TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
request_status BOOLEAN DEFAULT '0' ,
friend_id int(3) not null,
user_id int(3) not null,
Foreign key(friend_id) REFERENCES user(user_id),
Foreign key(user_id) REFERENCES user(user_id),
PRIMARY key (friend_id , user_id)
);

Create Table post(
caption text(140) not null,
img BLOB ,
ptime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
privacy BOOLEAN DEFAULT '1',
poster_id int(3) not null ,
Foreign key(poster_id) REFERENCES user(user_id)

);