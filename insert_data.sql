INSERT INTO person_type (description) VALUES ('Anciano');
INSERT INTO person_type (description) VALUES ('Siervo Ministerial');

INSERT INTO size (description) VALUES ('Grande');
INSERT INTO size (description) VALUES ('Intermedia');
INSERT INTO size (description) VALUES ('Chica');

INSERT INTO congregation (name, address, description, time_meeting, size_id) VALUES ('Congregacion Prueba 1', 'Direccion de Pruebas', 'Alguna descripcion', 'Domingo 09:00 hs', 1);
INSERT INTO congregation (name, address, description, time_meeting, size_id) VALUES ('Congregacion Prueba 2', 'Direccion de Pruebas', 'Alguna descripcion', 'Domingo 09:00 hs', 2);
INSERT INTO congregation (name, address, description, time_meeting, size_id) VALUES ('Congregacion Prueba 3', 'Direccion de Pruebas', 'Alguna descripcion', 'Domingo 09:00 hs', 3);

INSERT INTO person (name, phone, email, congregation_id, person_type_id) VALUES ('Persona 1', '12345678', 'algo@algo.com', 1, 1);
INSERT INTO person (name, phone, email, congregation_id, person_type_id) VALUES ('Persona 2', '12345678', 'algo@algo.com', 2, 1);
INSERT INTO person (name, phone, email, congregation_id, person_type_id) VALUES ('Persona 3', '12345678', 'algo@algo.com', 3, 1);

INSERT INTO person (name, phone, email, congregation_id, person_type_id) VALUES ('Persona 4', 'algo@algo.com', '12345678', 1, 2);
INSERT INTO person (name, phone, email, congregation_id, person_type_id) VALUES ('Persona 5', 'algo@algo.com', '12345678', 2, 2);
INSERT INTO person (name, phone, email, congregation_id, person_type_id) VALUES ('Persona 6', 'algo@algo.com', '12345678', 3, 2);

INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 1', 1);
INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 2', 2);
INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 3', 3);
INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 4', 4);
INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 5', 5);
INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 6', 6);
INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 7', 7);
INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 8', 8);	
INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 9', 9);
INSERT INTO sketch (title, sketch_number) VALUES ('Titulo 10', 10);

INSERT INTO time_lapse (date_from, date_to) VALUES ('2018-01-01', '2018-06-30');	
INSERT INTO time_lapse (date_from, date_to) VALUES ('2018-07-01', '2018-31-12');

INSERT INTO agreement (congregation_id, person_id, time_lapse_id) VALUES (1, 3, 1);	
INSERT INTO agreement (congregation_id, person_id, time_lapse_id) VALUES (1, 6, 1);

INSERT INTO agreement (congregation_id, person_id, time_lapse_id) VALUES (2, 1, 1);
INSERT INTO agreement (congregation_id, person_id, time_lapse_id) VALUES (2, 4, 1);

INSERT INTO agreement (congregation_id, person_id, time_lapse_id) VALUES (3, 2, 1);
INSERT INTO agreement (congregation_id, person_id, time_lapse_id) VALUES (3, 5, 1);

INSERT INTO user (username) VALUES ('user1');
INSERT INTO user (username) VALUES ('user2');
INSERT INTO user (username) VALUES ('user3');

INSERT INTO person_sketch (person_id, sketch_id) VALUES (1, 1);
INSERT INTO person_sketch (person_id, sketch_id) VALUES (2, 2);
INSERT INTO person_sketch (person_id, sketch_id) VALUES (3, 3);
INSERT INTO person_sketch (person_id, sketch_id) VALUES (4, 4);
INSERT INTO person_sketch (person_id, sketch_id) VALUES (5, 5);
INSERT INTO person_sketch (person_id, sketch_id) VALUES (6, 6);
INSERT INTO person_sketch (person_id, sketch_id) VALUES (1, 7);
INSERT INTO person_sketch (person_id, sketch_id) VALUES (2, 8);
INSERT INTO person_sketch (person_id, sketch_id) VALUES (3, 9);
INSERT INTO person_sketch (person_id, sketch_id) VALUES (6, 10);

INSERT INTO user_congregation (user_id, congregation_id) VALUES (1, 1);
INSERT INTO user_congregation (user_id, congregation_id) VALUES (2, 2);
INSERT INTO user_congregation (user_id, congregation_id) VALUES (3, 3);
