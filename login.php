<?php
session_start();

require_once('config.php');

if (isset($_SESSION['benutzer_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $benutzername = $_POST["benutzername"];
    $passwort = $_POST["passwort"];

    $sql = "SELECT id, passwort, mitarbeiterrang, zugang_gesperrt FROM benutzer WHERE benutzername = '$benutzername'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $benutzer_id = $row["id"];
        $gespeichertes_passwort = $row["passwort"];
        $mitarbeiterrang = $row["mitarbeiterrang"];
        $zugang_gesperrt = $row["zugang_gesperrt"];

        if ($zugang_gesperrt == 1) {
            echo "Ihr Zugang wurde gesperrt. Bitte kontaktieren Sie den Administrator.";
        } else {
            if (password_verify($passwort, $gespeichertes_passwort)) {
                $_SESSION['benutzer_id'] = $benutzer_id;
                header("Location: index.php");
                exit;
            } else {
                echo "Falsches Passwort. Bitte versuchen Sie es erneut.";
            }
        }
    } else {
        echo "Benutzername nicht gefunden. Bitte überprüfen Sie Ihre Eingabe.";
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form method="post" action="">
        <label for="benutzername">Benutzername:</label>
        <input type="text" id="benutzername" name="benutzername" required><br>

        <label for="passwort">Passwort:</label>
        <input type="password" id="passwort" name="passwort" required><br>

        <input type="submit" value="Anmelden">
    </form>
</body>
</html>
