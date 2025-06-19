<?php
session_start();

// Verbindung zur Datenbank herstellen (config.php enth�lt Ihre Datenbankverbindung)
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

        // Passwort �berpr�fen
        if (password_verify($passwort, $hashed_password)) {
            $_SESSION["benutzer_id"] = $row["id"];
            $_SESSION["benutzername"] = $row["benutzername"];
            $_SESSION["mitarbeiterrang"] = $row["mitarbeiterrang"];

            // Hier k�nnen Sie zur Hauptseite weiterleiten oder andere Aktionen durchf�hren
            header("Location: hauptseite.php");
        } else {
            echo "Falsches Passwort.";
        }
    } else {
        echo "Benutzer nicht gefunden.";
    }
}

// Verbindung zur Datenbank schlie�en
$conn->close();
?>
