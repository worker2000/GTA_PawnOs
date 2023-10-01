<?php
require_once('../config.php');

if (isset($_GET['id'])) {
    $benutzer_id = $_GET['id'];

    // SQL-Abfrage, um den Zugang für den Benutzer zu entsperren
    $sql = "UPDATE benutzer SET zugang_gesperrt = 0 WHERE id = $benutzer_id";

    if ($conn->query($sql) === TRUE) {
        // Erfolgreiche Entsperrung des Zugangs
        header("Location: admin_seite.php"); // Weiterleitung zur admin_seite.php
        exit; // Beenden Sie das Skript, um sicherzustellen, dass keine weiteren Ausgaben gemacht werden
    } else {
        echo "Fehler beim Entsperren des Zugangs: " . $conn->error;
    }
} else {
    echo "Ungültige Anfrage.";
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
