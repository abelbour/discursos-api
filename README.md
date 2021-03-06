# Documentacion API Conferencias

## Correr como Built-In Server

**php -S localhost:port /ruta/al/proyecto**

## Estructura JSON Respuestas

###### Congregacion

- /congregation/:id
```
[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}]
```

- /congregation/user/:id
```
[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"},{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"},{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"},{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"},{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"},{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}]
```
- /congregation/person/:congregation_id

```
[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1","persons":[{"person_id":"1","name":"Persona 1","phone":"12345678","email":"algo@algo.com","congregation_id":"1","person_type_id":"1"}]}]
```

###### Person
- /person/:id

- /person/:name

```
[{"person_id":"1","name":"Persona 1","phone":"12345678","email":"algo@algo.com","congregation_id":"1","person_type_id":"1"},{"person_id":"2","name":"Persona 2","phone":"12345678","email":"algo@algo.com","congregation_id":"2"}]
```

###### Conferencia

- /sketch/:sketch_number

```
{ sketch_id: 1, title:"Conferencia de Prueba", sketch_number: 1 }
```

###### Arreglo

- /agreement/:id

```
{ agreement_id: 1, congregation: [ congregation_id: 1, name: "Congregacion de Prueba", address: "Una direccion de Prueba 123", description:"alguna indicacion importante", time_meeting: "Domingo 09:30 hs", size_id: 1 }], person_id:[{ person_id: 1, name: "Nombre Prueba", phone: "123455678", email: "algo@algo.com", congregation_id: 1, person_type_id: 1 }], time_lapse_id: [{time_lapse_id: 1, date_from:"2018-01-01", date_to:"2018-06-30"}] }
```

- /agreement/congregation/:congregation_id/:time_lapse_id
- /agreement/all/:time_lapse

```
[
	[{"agreement_id":"1","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"3","name":"Persona 3","phone":"12345678","email":"algo@algo.com","congregation_id":"3","person_type_id":"1"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"2","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"6","name":"Persona 6","phone":"algo@algo.com","email":"12345678","congregation_id":"3","person_type_id":"2"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"7","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"3","name":"Persona 3","phone":"12345678","email":"algo@algo.com","congregation_id":"3","person_type_id":"1"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"8","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"6","name":"Persona 6","phone":"algo@algo.com","email":"12345678","congregation_id":"3","person_type_id":"2"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"13","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"3","name":"Persona 3","phone":"12345678","email":"algo@algo.com","congregation_id":"3","person_type_id":"1"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"14","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"6","name":"Persona 6","phone":"algo@algo.com","email":"12345678","congregation_id":"3","person_type_id":"2"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"19","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"3","name":"Persona 3","phone":"12345678","email":"algo@algo.com","congregation_id":"3","person_type_id":"1"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"20","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"6","name":"Persona 6","phone":"algo@algo.com","email":"12345678","congregation_id":"3","person_type_id":"2"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"25","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"3","name":"Persona 3","phone":"12345678","email":"algo@algo.com","congregation_id":"3","person_type_id":"1"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"26","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"6","name":"Persona 6","phone":"algo@algo.com","email":"12345678","congregation_id":"3","person_type_id":"2"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"31","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"3","name":"Persona 3","phone":"12345678","email":"algo@algo.com","congregation_id":"3","person_type_id":"1"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]},{"agreement_id":"32","congregation":[{"congregation_id":"1","name":"Congregacion Prueba 1","address":"Direccion de Pruebas","description":"Alguna descripcion","time_meeting":"Domingo 09:00 hs","size_id":"1"}],"person":[{"person_id":"6","name":"Persona 6","phone":"algo@algo.com","email":"12345678","congregation_id":"3","person_type_id":"2"}],"time_lapse":[{"time_lapse_id":"1","date_from":"2018-01-01","date_to":"2018-06-30"}]}]
]
```

###### Periodo Arreglos

- /time_lapse/current

- /time_lapse/last

- /time_lapse/next

```
{time_lapse_id: 1, date_from:"2018-01-01", date_to:"2018-06-30"}
```

###### Error

```
{status:400|404|500, message:"mensaje del error"}
```
