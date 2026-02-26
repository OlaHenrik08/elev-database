<?php
include "db.php";

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM laerere WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $fag = $_POST['fag'];

    $sql = "UPDATE laerere 
            SET fornavn='$fornavn', etternavn='$etternavn', fag='$fag'
            WHERE id=$id";

    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rediger lærer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Rediger lærer</h1>

    <form method="POST">
        <input type="text" name="fornavn" value="<?= $row['fornavn'] ?>" required><br><br>
        <input type="text" name="etternavn" value="<?= $row['etternavn'] ?>" required><br><br>
        <input type="text" name="fag" value="<?= $row['fag'] ?>" required><br><br>
        <button type="submit" name="update" class="edit-btn">Oppdater</button>
    </form>
</div>

</body>
</html>