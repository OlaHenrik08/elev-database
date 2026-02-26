<?php
include "db.php";
$result = $conn->query("SELECT * FROM laerere");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lærere</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="http://localhost/elev-database/Elev/index.php">Elev tabell</a></li>
            <li><a href="http://localhost/elev-database/L%C3%A6rer/index.php">Lærer tabell</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h1>Lærerliste</h1>
    <h2>Oversikt over alle lærere</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Fag</th>
            <th>Handling</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['fornavn'] ?></td>
            <td><?= $row['etternavn'] ?></td>
            <td><?= $row['fag'] ?></td>
            <td>
                <a class="edit-btn" href="update.php?id=<?= $row['id'] ?>">Rediger</a>
                <a class="delete-btn" href="delete.php?id=<?= $row['id'] ?>">Slett</a>
            </td>
        </tr>
        <?php endwhile; ?>

        <tr class="add-row">
            <td colspan="5">
                <a class="add-btn" href="create.php">+ Legg til lærer</a>
            </td>
        </tr>

    </table>
</div>

</body>
</html>