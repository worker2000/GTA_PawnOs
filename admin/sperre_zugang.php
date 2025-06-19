<?php
require_once('../config.php');

if (isset($_GET['id'])) {
    $benutzer_id = $_GET['id'];

    // SQL-Abfrage, um den Zugang für den Benutzer zu sperren
    $sql = "UPDATE benutzer SET zugang_gesperrt = 1 WHERE id = $benutzer_id";

    if ($conn->query($sql) === TRUE) {
        // Erfolgreiche Sperrung des Zugangs
        header("Location: admin_seite.php"); // Weiterleitung zur admin_seite.php
        exit; // Beenden Sie das Skript, um sicherzustellen, dass keine weiteren Ausgaben gemacht werden
    } else {
        echo "Fehler beim Sperren des Zugangs: " . $conn->error;
    }
} else {
    echo "Ungültige Anfrage.";
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
