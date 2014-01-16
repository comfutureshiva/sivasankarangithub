mysql -u root

create database jobhunters;

use jobhunters;

create table useraccounts(email varchar(50) not null primary key, fname varchar(50), lname varchar(50),username varchar(50) not null,userpwd varchar(50) not null, confpwd varchar(50) not null);

create table personaldetails(phone int(20),mobile int(20) not null, location char(50), address varchar(50) not null, joblocation varchar(30) not null, fathername varchar(50), mothername varchar(50), religion varchar(50), community varchar(50), branch varchar(30), native varchar(50), naddu varchar(50), pattam varchar(50), kottam varchar(50));

create table referencedetails( relativename varchar(50), relationship varchar(50), refermobile varchar(50), referaddress varchar(50), referemail varchar(50));

create table personaldetails(jobcateg varchar(50), totalexpyear int(10), totlaexpmonth int(10), currentsallac int(10), currentsalthousands int(10), resumehead varchar(50));

create table edudetails(ug varchar(50) not null, ugcollege varchar(50), pg varchar(50), pgcollege varchar(50), phd varchar(50));

create table resumedetails(userresume varchar(600), resumetxt varchar(1000));