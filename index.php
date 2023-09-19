<?php
require 'flight/Flight.php';
//  Database Connection
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=api_estudiantes_tareas', 'root', ''));


Flight::start();
?>