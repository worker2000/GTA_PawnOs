<?php
session_start();

// Verbindung zur Datenbank herstellen (config.php enthält Ihre Datenbankverbindung)
require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $benutzername = $_POST["benutzername"];
    $passwort = $_POST["passwort"];

    // SQL-Abfrage, um Benutzerdaten abzurufen
    $sql = "SELECT * FROM benutzer WHERE benutzername = '$benutzername'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["passwort"];

        // Passwort überprüfen
        if (password_verify($passwort, $hashed_password)) {
            $_SESSION["benutzer_id"] = $row["id"];
            $_SESSION["benutzername"] = $row["benutzername"];
            $_SESSION["mitarbeiterrang"] = $row["mitarbeiterrang"];

            // Hier können Sie zur Hauptseite weiterleiten oder andere Aktionen durchführen
            header("Location: hauptseite.php");
        } else {
            echo "Falsches Passwort.";
        }
    } else {
        echo "Benutzer nicht gefunden.";
    }
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
