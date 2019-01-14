<?php

$dataSource = 'mysql:host=localhost;dbname=movie';
$username = 'movie';
$password = 'password';

// Create a PDO instance representing a connection to a database
$db = new PDO($dataSource, $username, $password);

// Display PDO errors
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
