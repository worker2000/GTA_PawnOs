<?php
require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $benutzer_id = $_POST["benutzer_id"];
    $neuer_mitarbeiterrang = $_POST["neuer_mitarbeiterrang"];

    // SQL-Abfrage, um den Mitarbeiterrang für den Benutzer zu aktualisieren
    $sql = "UPDATE benutzer SET mitarbeiterrang = '$neuer_mitarbeiterrang' WHERE id = $benutzer_id";

    if ($conn->query($sql) === TRUE) {
        // Erfolgreiche Aktualisierung
        header("Location: admin_seite.php"); // Zurück zur Admin-Seite weiterleiten
        exit();
    } else {
        echo "Fehler beim Aktualisieren des Mitarbeiterrangs: " . $conn->error;
    }

    // Verbindung zur Datenbank schließen
    $conn->close();
} else {
    echo "Ungültige Anfrage.";
}
?>
