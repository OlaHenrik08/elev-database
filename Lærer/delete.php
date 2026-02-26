<?php
include "db.php";

$id = $_GET['id'];
$conn->query("DELETE FROM laerere WHERE id=$id");

header("Location: index.php");
?>