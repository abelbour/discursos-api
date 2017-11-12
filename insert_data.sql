insert into person_type (description) values ('Anciano');
insert into person_type (description) values ('Siervo Ministerial');

insert into size (description) values ('Grande');
insert into size (description) values ('Intermedia');
insert into size (description) values ('Chica');

insert into congregation (name, address, description, time_meeting, size_id) values ('Congregacion Prueba 1', 'Direccion de Pruebas', 'Alguna descripcion', 'Domingo 09:00 hs', 1);
insert into congregation (name, address, description, time_meeting, size_id) values ('Congregacion Prueba 2', 'Direccion de Pruebas', 'Alguna descripcion', 'Domingo 09:00 hs', 2);
insert into congregation (name, address, description, time_meeting, size_id) values ('Congregacion Prueba 3', 'Direccion de Pruebas', 'Alguna descripcion', 'Domingo 09:00 hs', 3);

insert into person (name, phone, email, congregation_id, person_type_id) values ('Persona 1', '12345678', 'algo@algo.com', 1, 1);
insert into person (name, phone, email, congregation_id, person_type_id) values ('Persona 2', '12345678', 'algo@algo.com', 2, 1);
insert into person (name, phone, email, congregation_id, person_type_id) values ('Persona 3', '12345678', 'algo@algo.com', 3, 1);

insert into person (name, phone, email, congregation_id, person_type_id) values ('Persona 4', 'algo@algo.com', '12345678', 1, 2);
insert into person (name, phone, email, congregation_id, person_type_id) values ('Persona 5', 'algo@algo.com', '12345678', 2, 2);
insert into person (name, phone, email, congregation_id, person_type_id) values ('Persona 6', 'algo@algo.com', '12345678', 3, 2);

insert into sketch (title, sketch_number) values ('Titulo 1', 1);
insert into sketch (title, sketch_number) values ('Titulo 2', 2);
insert into sketch (title, sketch_number) values ('Titulo 3', 3);
insert into sketch (title, sketch_number) values ('Titulo 4', 4);
insert into sketch (title, sketch_number) values ('Titulo 5', 5);
insert into sketch (title, sketch_number) values ('Titulo 6', 6);
insert into sketch (title, sketch_number) values ('Titulo 7', 7);
insert into sketch (title, sketch_number) values ('Titulo 8', 8);	
insert into sketch (title, sketch_number) values ('Titulo 9', 9);
insert into sketch (title, sketch_number) values ('Titulo 10', 10);

insert into time_lapse (date_from, date_to) values ('2018-01-01', '2018-06-30');	
insert into time_lapse (date_from, date_to) values ('2018-07-01', '2018-31-12');

insert into agreement (congregation_id, person_id, time_lapse_id) values (1, 3, 1);	
insert into agreement (congregation_id, person_id, time_lapse_id) values (1, 6, 1);

insert into agreement (congregation_id, person_id, time_lapse_id) values (2, 1, 1);
insert into agreement (congregation_id, person_id, time_lapse_id) values (2, 4, 1);

insert into agreement (congregation_id, person_id, time_lapse_id) values (3, 2, 1);
insert into agreement (congregation_id, person_id, time_lapse_id) values (3, 5, 1);

insert into user (username) values ('user1');
insert into user (username) values ('user2');
insert into user (username) values ('user3');

insert into person_sketch (person_id, person_id) values (1, 1);
insert into person_sketch (person_id, person_id) values (2, 2);
insert into person_sketch (person_id, person_id) values (3, 3);
insert into person_sketch (person_id, person_id) values (4, 4);
insert into person_sketch (person_id, person_id) values (5, 5);
insert into person_sketch (person_id, person_id) values (6, 6);
insert into person_sketch (person_id, person_id) values (1, 7);
insert into person_sketch (person_id, person_id) values (2, 8);
insert into person_sketch (person_id, person_id) values (3, 9);
insert into person_sketch (person_id, person_id) values (6, 10);

insert into user_congregation (user_id, congregation_id) values (1, 1);
insert into user_congregation (user_id, congregation_id) values (2, 2);
insert into user_congregation (user_id, congregation_id) values (3, 3);
