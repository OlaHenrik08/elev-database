<?php
include 'db.php';

// Hent eleven som skal oppdateres
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediger elev</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1373EF 0%, #bcd2ee 50%, #1373EF 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .back-link {
            display: inline-block;
            color: #1373EF;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .back-link:hover {
            color: #1373EF;
            transform: translateX(-5px);
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            color: #555;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"] {
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #1373EF;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input[type="submit"] {
            background: #1373EF;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(19, 115, 239, 0.2);
        }

        input[type="submit"]:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href='index.php' class="back-link">← Gå tilbake til elev tabellen</a>

        <h1>✏️ Rediger elev</h1>
        
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $elev['id']; ?>">
            
            <div class="form-group">
                <label for="fornavn">Fornavn:</label>
                <input type="text" id="fornavn" name="fornavn" value="<?php echo $elev['fornavn']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="etternavn">Etternavn:</label>
                <input type="text" id="etternavn" name="etternavn" value="<?php echo $elev['etternavn']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="klasse">Klasse:</label>
                <input type="text" id="klasse" name="klasse" value="<?php echo $elev['klasse']; ?>" required>
            </div>
            
            <input type="submit" value="Oppdater elev">
        </form>
    </div>
</body>
</html>