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

//  DELETE
Flight::route('DELETE /students', function(){
    $id = (Flight::request()->data->id);
    $sql = 'DELETE FROM students WHERE id=?';
    $sentence = Flight::db()->prepare($sql);
    $sentence->bindParam(1, $id);
    $sentence->execute();
    Flight::jsonp(['Eliminated Student !!']);
});

//  SEARCH BY ID
Flight::route('GET /students/@id', function(){
    $sql = 'SELECT * FROM students WHERE id=?';
    $sentence = Flight::db()->prepare($sql);
    $sentence->bindParam(1, $id);
    $sentence->execute();
    $students = $sentence->fetchAll(PDO::FETCH_ASSOC);

    Flight::jsonp($students);
});


Flight::start();
?>