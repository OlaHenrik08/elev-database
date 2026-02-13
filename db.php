<?php
$host= "localhost";
$user= "root";  
$password= "";
$db= "skole";

$conn= new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("could not connect to the database " . $conn->connect_error);

}

