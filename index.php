<?php
include "db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $selectSql = "SELECT * FROM elever WHERE id = $id";
    $result = $conn->query($selectSql);
    
    if ($result->num_rows > 0) {
        $elev = $result->fetch_assoc();
    } else {
        header("Location: index.php");
        exit();
    }
}

// Oppdater eleven når skjemaet sendes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klasse = $_POST["klasse"];

    $updateSql = "UPDATE elever SET fornavn='$fornavn', etternavn='$etternavn', klasse='$klasse' WHERE id=$id";
    
    if ($conn->query($updateSql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Feil: " . $conn->error;
    }
}

$sql= "SELECT * FROM elever";
$result= $conn->query($sql);

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $deleteSql = "DELETE FROM elever WHERE id = $id";
    $conn->query($deleteSql);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skole Database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="container">
        <section class="emoji"><!--Gidder ikke å legge til en emoji mitt forslag: 🍌--></section>
        <h1>Skole Database</h1>
        <h2>Liste over elever</h2>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Fornavn</th>
                <th>Etternavn</th>
                <th>Klasse</th>
                <th>Handlinger</th>
            </tr>
            <?php
            
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["fornavn"] . "</td>";
                    echo "<td>" . $row["etternavn"] . "</td>";
                    echo "<td>" . $row["klasse"] . "</td>";
                   echo "<td>
                            <a class='add-btn' style='padding:8px 16px; font-size:13px; margin-right:6px;' 
                            href='update.php?id=" . $row["id"] . "'>
                            Rediger
                            </a>

                            <a class='delete-btn' href='?delete=" . $row["id"] . "' 
                            onclick=\"return confirm('Er du sikker på at du vil slette denne eleven?');\">
                            Slett
                            </a>
                        </td>";
                    echo "</tr>";
                }   
                    echo "<tr class='add-row'>"; 
                        echo "<td colspan='5'><a class='add-btn' href='http://localhost/SkoleDB/create.php'>Legg til en elev</a></td>";
                    echo "</tr>";


            ?>
        </table>
    </section>
</body>
</html>
