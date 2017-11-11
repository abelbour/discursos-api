create schema conferences;

use conferences;

create table congregation(
	congregation_id smallint primary key auto_increment,
    name varchar(25),
    address varchar(100),
    description varchar (255),
    time_meeting varchar(100),
    size_id smallint
);

create table size (
	size_id smallint primary key auto_increment,
    description varchar(50)
);

create table person_type(
	person_type smallint primary key auto_increment,
    descript varchar(15)
);

create table person(
	person_id smallint primary key auto_increment,
    name varchar(50),
    phone varchar(50),
    email varchar(50),
    congregation_id smallint,
    person_type_id smallint
);

create table sketch(
	sketch_id smallint primary key auto_increment,
    title varchar(255),
    sketch_number smallint
);

create table person_sketch(
	person_sketch_id smallint primary key auto_increment,
    person_id smallint,
    sketch_id smallint
);

create table person_congregation(
	person_congregation_id smallint primary key auto_increment,
    person_id smallint,
    congregation_id smallint
);

create table time_lapse(
	time_lapse_id smallint primary key auto_increment,
    date_from date,
    date_to date
);

create table congregation_congregation_time_lapse(
	congregation_congregation_time_lapse_id smallint primary key auto_increment,
    congregation_id_1 smallint,
    congregation_id_2 smallint,
    time_lapse_id smallint
);

create table agreement(
	agreement_id smallint primary key auto_increment,
    congregation_id smallint,
    person_id smallint,
    time_lapse_id smallint
);

create table user (
    user_id smallint primary key auto_increment,
    username varchar(50)
);

create table user_congregation(
    user_congregation_id smallint primary key auto_increment,
    user_id smallint,
    congregation_id smallint
);