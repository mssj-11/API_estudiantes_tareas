#   REST API - Students & Tasks


##  Requirements
*   #### Server: XAMPP
*   #### Dependency Manager: Composer
*   #### Language: PHP
*   #### Framework: Flight
*   #### DataBase: MySQL
*   #### Test: POSTMAN

##  Versions:
*   ####    PHP & MySQL: 8.1.12
*   ####    Composer: 2.5.7
*   ####    Flight: 2.0.1


# Installation

1. Clone this repository to your local machine.
```sh
https://github.com/mssj-11/API_estudiantes_tareas
```
2. nstall dependencies using Composer.
```sh
composer install
```
3. Create or Import a MySQL database for the project (e.g., api_estudiantes_tareas) and configure the database connection.
`api_estudiantes_tareas.sql`


# Running the API
The API should now be running locally at
```sh
http://localhost/API_estudiantes_tareas
```

##  API Endpoints
*   ###  Students
#### Get All Students
#### URL: /students
#### Method: GET
```sh
http://localhost/API_estudiantes_tareas/students
```

#### Create a Student
#### URL: /students
#### Method: POST
```sh
http://localhost/API_estudiantes_tareas/students
```


#### Update a Student
#### URL: /students
#### Method: PUT
```sh
http://localhost/API_estudiantes_tareas/students
```


#### Delete a Student
#### URL: /students/:id
#### Method: DELETE
```sh
http://localhost/API_estudiantes_tareas/students/ID
```


#### Search a Student by ID
#### URL: /students/:id
#### Method: GET
```sh
http://localhost/API_estudiantes_tareas/students/ID
```



*   ### Tasks
#### Get All Tasks
#### URL: /tasks
#### Method: GET
```sh
http://localhost/API_estudiantes_tareas/tasks
```

#### Create a Task for a Student
#### URL: /students/:student_id/tasks
#### Method: POST
```sh
http://localhost/API_estudiantes_tareas/students/ID/tasks
```

#### Get All Tasks for a Student
#### URL: /students/:student_id/tasks
#### Method: GET
```sh
http://localhost/API_estudiantes_tareas/students/ID/tasks
```

#### Update Task Grade for a Student
#### URL: /students/:student_id/tasks/:task_id
#### Method: PUT
```sh
http://localhost/API_estudiantes_tareas/students/ID/tasks/ID_TASK
```

#### Delete a Task for a Student
#### URL: /students/:student_id/tasks/:task_id
#### Method: DELETE
```sh
http://localhost/API_estudiantes_tareas/students/ID/tasks/ID_TASK
```