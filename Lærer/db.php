<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "skole";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Tilkobling feilet: " . $conn->connect_error);
}
?>