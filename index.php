<?php
require 'flight/Flight.php';
//  Database Connection
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=api_estudiantes_tareas', 'root', ''));

/*   METHODS  */
//  GET
Flight::route('GET /students', function(){
    $sql = 'SELECT * FROM students';
    $sentence = Flight::db()->prepare($sql);
    $sentence->execute();
    $students = $sentence->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($students);
});

//  POST
Flight::route('POST /students', function(){});

//  PUT
Flight::route('PUT /students', function(){});

//  DELETE
Flight::route('DELETE /students', function(){});

//  SEARCH BY ID
Flight::route('GET /students/@id', function(){});


Flight::start();
?>