<?php
require 'flight/Flight.php';
//  Database Connection
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=api_estudiantes_tareas', 'root', ''));

/*
            (Address, folders, Method Address)
    URL: http://localhost/APIS-Webservices/API_estudiantes_tareas/students
*/

/*   METHODS STUDENTS  */
//  GET
Flight::route('GET /students', function(){
    $sql = 'SELECT * FROM students';
    $sentence = Flight::db()->prepare($sql);
    $sentence->execute();
    $students = $sentence->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($students);
});

//  POST
Flight::route('POST /students', function(){
    $full_name = (Flight::request()->data->full_name);
    $age = (Flight::request()->data->age);
    $enrollment = (Flight::request()->data->enrollment);
    $address = (Flight::request()->data->address);
    $tel = (Flight::request()->data->tel);
    $email = (Flight::request()->data->email);
    $gender = (Flight::request()->data->gender);
    $comments = (Flight::request()->data->comments);

    $sql = 'INSERT INTO students (full_name, age, enrollment, address, tel, email, gender, comments) VALUES(?,?,?,?,?,?,?,?)';
    $sentence = Flight::db()->prepare($sql);

    $sentence->bindParam(1, $full_name);
    $sentence->bindParam(2, $age);
    $sentence->bindParam(3, $enrollment);
    $sentence->bindParam(4, $address);
    $sentence->bindParam(5, $tel);
    $sentence->bindParam(6, $email);
    $sentence->bindParam(7, $gender);
    $sentence->bindParam(8, $comments);
    $sentence->execute();

    Flight::jsonp(['Added Student !!']);
});

//  PUT
Flight::route('PUT /students', function(){
    $id = (Flight::request()->data->id);
    $full_name = (Flight::request()->data->full_name);
    $age = (Flight::request()->data->age);
    $enrollment = (Flight::request()->data->enrollment);
    $address = (Flight::request()->data->address);
    $tel = (Flight::request()->data->tel);
    $email = (Flight::request()->data->email);
    $gender = (Flight::request()->data->gender);
    $comments = (Flight::request()->data->comments);

    $sql = 'UPDATE students SET full_name=?, age=?, enrollment=?, address=?, tel=?, email=?, gender=?, comments=? WHERE id=?';
    $sentence = Flight::db()->prepare($sql);

    $sentence->bindParam(1, $full_name);
    $sentence->bindParam(2, $age);
    $sentence->bindParam(3, $enrollment);
    $sentence->bindParam(4, $address);
    $sentence->bindParam(5, $tel);
    $sentence->bindParam(6, $email);
    $sentence->bindParam(7, $gender);
    $sentence->bindParam(8, $comments);
    $sentence->bindParam(9, $id);
    $sentence->execute();

    Flight::jsonp(['Updated Student !!']);
});

/*  DELETE
Flight::route('DELETE /students', function(){
    $id = (Flight::request()->data->id);
    $sql = 'DELETE FROM students WHERE id=?';
    $sentence = Flight::db()->prepare($sql);
    $sentence->bindParam(1, $id);
    $sentence->execute();
    Flight::jsonp(['Eliminated Student !!']);
});*/
//  DELETE
Flight::route('DELETE /students/@id', function($id){
    // Eliminar las tareas asociadas al estudiante
    $sqlDeleteTasks = 'DELETE FROM tasks WHERE student_id=?';
    $sentenceDeleteTasks = Flight::db()->prepare($sqlDeleteTasks);
    $sentenceDeleteTasks->bindParam(1, $id);
    $sentenceDeleteTasks->execute();

    // Eliminar al estudiante
    $sqlDeleteStudent = 'DELETE FROM students WHERE id=?';
    $sentenceDeleteStudent = Flight::db()->prepare($sqlDeleteStudent);
    $sentenceDeleteStudent->bindParam(1, $id);
    $sentenceDeleteStudent->execute();

    Flight::jsonp(['message' => 'Student and Associated Tasks Deleted']);
});

//  SEARCH BY ID
Flight::route('GET /students/@id', function($id){
    $sql = 'SELECT * FROM students WHERE id=?';
    $sentence = Flight::db()->prepare($sql);
    $sentence->bindParam(1, $id);
    $sentence->execute();
    $students = $sentence->fetchAll(PDO::FETCH_ASSOC);

    Flight::json($students);
});





/*   METHODS TASKS  */
//  GET
Flight::route('GET /tasks', function(){
    $sql = 'SELECT * FROM tasks';
    $sentence = Flight::db()->prepare($sql);
    $sentence->execute();
    $tasks = $sentence->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($tasks);
});

// Endpoint para crear una tarea asociada a un estudiante
//  URL: http://localhost/APIS-Webservices/API_estudiantes_tareas/students/1/tasks
Flight::route('POST /students/@student_id/tasks', function($student_id){
    $title = (Flight::request()->data->title);
    $description = (Flight::request()->data->description);
    $student_id = intval($student_id); // Convertir a entero

    // Insertar una nueva tarea asociada al estudiante
    $sql = 'INSERT INTO tasks (title, description, student_id, grade) VALUES(?,?,?,0)';
    $sentence = Flight::db()->prepare($sql);

    $sentence->bindParam(1, $title);
    $sentence->bindParam(2, $description);
    $sentence->bindParam(3, $student_id);
    $sentence->execute();

    Flight::jsonp(['Added Task for Student ' . $student_id]);
});

//  http://localhost/APIS-Webservices/API_estudiantes_tareas/students/1/tasks
// Endpoint para listar todas las tareas de un estudiante
Flight::route('GET /students/@student_id/tasks', function($student_id){
    $student_id = intval($student_id); // Convertir a entero

    // Obtener todas las tareas asociadas al estudiante
    $sql = 'SELECT * FROM tasks WHERE student_id=?';
    $sentence = Flight::db()->prepare($sql);
    $sentence->bindParam(1, $student_id);
    $sentence->execute();
    $tasks = $sentence->fetchAll(PDO::FETCH_ASSOC);

    Flight::json($tasks);
});

//  http://localhost/APIS-Webservices/API_estudiantes_tareas/students/1/tasks/5
// Endpoint para actualizar la calificación de una tarea
Flight::route('PUT /students/@student_id/tasks/@task_id', function($student_id, $task_id){
    $grade = (Flight::request()->data->grade);

    // Actualizar la calificación de la tarea
    $sql = 'UPDATE tasks SET grade=? WHERE id=? AND student_id=?';
    $sentence = Flight::db()->prepare($sql);

    $sentence->bindParam(1, $grade);
    $sentence->bindParam(2, $task_id);
    $sentence->bindParam(3, $student_id);
    $sentence->execute();

    Flight::jsonp(['Updated Task Grade for Student ' . $student_id]);
});

// Endpoint opcional para eliminar una tarea
Flight::route('DELETE /students/@student_id/tasks/@task_id', function($student_id, $task_id){
    // Eliminar la tarea asociada al estudiante
    $sql = 'DELETE FROM tasks WHERE id=? AND student_id=?';
    $sentence = Flight::db()->prepare($sql);
    $sentence->bindParam(1, $task_id);
    $sentence->bindParam(2, $student_id);
    $sentence->execute();

    Flight::jsonp(['Deleted Task for Student ' . $student_id]);
});



Flight::start();

?>