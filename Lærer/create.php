<?php
include "db.php";

if (isset($_POST['submit'])) {
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $fag = $_POST['fag'];

    $sql = "INSERT INTO laerere (fornavn, etternavn, fag) 
            VALUES ('$fornavn', '$etternavn', '$fag')";

    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Legg til lærer </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1> Legg til lærer</h1>

    <form method="POST">
        <input type="text" name="fornavn" placeholder="Fornavn" required><br><br>
        <input type="text" name="etternavn" placeholder="Etternavn" required><br><br>
        <input type="text" name="fag" placeholder="Fag" required><br><br>
        <button type="submit" name="submit" class="add-btn">Lagre</button>
        
    </form>
</div>

</body>
</html>