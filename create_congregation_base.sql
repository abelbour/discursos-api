create table congregation(
	congregation_id integer primary key AUTOINCREMENT,
    name varchar(25),
    address varchar(100),
    description varchar (255),
    time_meeting varchar(100),
    size_id integer
);

create table size (
	size_id integer primary key AUTOINCREMENT,
    description varchar(50)
);

create table person_type(
	person_type integer primary key AUTOINCREMENT,
    description varchar(15)
);

create table person(
	person_id integer primary key AUTOINCREMENT,
    name varchar(50),
    phone varchar(50),
    email varchar(50),
    congregation_id integer,
    person_type_id integer
);

create table sketch(
	sketch_id integer primary key AUTOINCREMENT,
    title varchar(255),
    sketch_number integer
);

create table person_sketch(
	person_sketch_id integer primary key AUTOINCREMENT,
    person_id integer,
    sketch_id integer
);

create table time_lapse(
	time_lapse_id integer primary key AUTOINCREMENT,
    date_from date,
    date_to date
);

create table agreement(
	agreement_id integer primary key AUTOINCREMENT,
    congregation_id integer,
    person_id integer,
    time_lapse_id integer
);

create table user (
    user_id integer primary key AUTOINCREMENT,
    username varchar(50)
);

create table user_congregation(
    user_congregation_id integer primary key AUTOINCREMENT,
    user_id integer,
    congregation_id integer
);