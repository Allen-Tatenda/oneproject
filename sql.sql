CREATE TABLE users(
    id int (100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username varchar (200) NOT NULL,
    firstname varchar (200) NOT NULL,
    lastname varchar (200) NOT NULL,
    dob varchar (200) NOT NULL,
    gender varchar (200) NOT NULL,
    passwords varchar (200) NOT NULL,
    nonceDate varchar (200) NOT NULL,
    profilepic varchar (200) NOT NULL
)

CREATE TABLE loginlog(
    id int (100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    userid int (200) NOT NULL,
    dates varchar (200) NOT NULL,
)