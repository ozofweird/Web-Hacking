drop database if exists WebTest;
create database WebTest;
use WebTest;

create table member(
no int not null auto_increment primary key,
u_id varchar(20) not null unique,
u_pass varchar(50) not null,
u_name varchar(20) not null,
nickname char(20),
age int,
email char(50) ,
reg_date datetime not null);

create table board(
strNumber int not null auto_increment primary key,
strName varchar(20) not null,
strPassword varchar(20) not null,
strEmail varchar(50),
strSubject varchar(100) not null,
strContent text not null,
htmlTag char(1) not null,
viewCount int not null default 0,
filename varchar(50),
filesize int,
writeDate datetime);
