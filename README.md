# Documentacion API Conferencias

## Correr como Built-In Server

** php -S localhost:port /ruta/al/proyecto **

## Estructura JSON Respuestas

** Congregacion **

/congregacion/info

{ congregation_id: 1, name: "Congregacion de Prueba", address: "Una direccion de Prueba 123", description:"alguna indicacion importante", time_meeting: "Domingo 09:30 hs", size_id: 1 }

** Person **
{ person_id: 1, name: "Nombre Prueba", phone: "123455678", email: "algo@algo.com", congregation_id: 1, person_type_id: 1 }

** Conferencia **
{ sketch_id: 1, title:"Conferencia de Prueba", sketch_number: 1 }

** Arreglo **
{ agreement_id: 1, congregation: [ congregation_id: 1, name: "Congregacion de Prueba", address: "Una direccion de Prueba 123", description:"alguna indicacion importante", time_meeting: "Domingo 09:30 hs", size_id: 1 }], person_id:[{ person_id: 1, name: "Nombre Prueba", phone: "123455678", email: "algo@algo.com", congregation_id: 1, person_type_id: 1 }], time_lapse_id: [{time_lapse_id: 1, date_from:"2018-01-01", date_to:"2018-06-30"}] }

