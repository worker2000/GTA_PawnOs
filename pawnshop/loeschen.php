<?php
require_once('../config.php');

// Überprüfen, ob eine Artikel-ID übergeben wurde
if(isset($_GET['id'])) {
    // Artikel-ID aus der GET-Anfrage abrufen
    $artikelId = $_GET['id'];

    // SQL-Abfrage zum Löschen des Artikels erstellen
    $sql = "DELETE FROM artikel WHERE ID = $artikelId";

    if ($conn->query($sql) === TRUE) {
        // Erfolgreich gelöscht, weiterleiten zur abfrage.php
        header("Location: /pawn/pawnshop/abfrage.php");
        exit;
    } else {
        echo "Fehler beim Löschen des Artikels: " . $conn->error;
    }
}
?>
