<?php
require_once('config.php');

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// Daten aus dem Formular abrufen
$fahrzeugname = $_POST["fahrzeugname"];
$nummernschild = $_POST["nummernschild"];
$anzahl_schluessel = $_POST["anzahl_schluessel"];
$fahrzeugbrief = $_POST["fahrzeugbrief"];
$ankaufdatum = $_POST["ankaufdatum"];
$ankaufpreis = $_POST["ankaufpreis"];
$gewinn_rate = $_POST["gewinn_rate"];

// Berechnung des Verkaufspreises
$verkaufspreis = $ankaufpreis * (1 + $gewinn_rate);

// Daten für den Verkäufer abrufen
$vorname_verkaeufer = $_POST["vorname_verkaeufer"];
$name_verkaeufer = $_POST["name_verkaeufer"];
$geburtsdatum_verkaeufer = $_POST["geburtsdatum_verkaeufer"];
$personalausweisnummer_verkaeufer = $_POST["personalausweisnummer_verkaeufer"];

// SQL-Abfrage, um das neue Fahrzeug und den Verkäufer in die Datenbank einzufügen
$sql_insert_fahrzeug = "INSERT INTO fahrzeug (fahrzeugname, nummernschild, anzahl_schluessel, fahrzeugbrief, ankaufdatum, ankaufpreis, gewinn_rate, verkaufspreis, vorname_verkaeufer, name_verkaeufer, geburtsdatum_verkaeufer, personalausweisnummer_verkaeufer)
VALUES ('$fahrzeugname', '$nummernschild', $anzahl_schluessel, '$fahrzeugbrief', '$ankaufdatum', $ankaufpreis, $gewinn_rate, $verkaufspreis, '$vorname_verkaeufer', '$name_verkaeufer', '$geburtsdatum_verkaeufer', '$personalausweisnummer_verkaeufer')";

if ($conn->query($sql_insert_fahrzeug) === TRUE) {
    echo "Fahrzeug und Verkäuferdaten erfolgreich hinzugefügt!";
} else {
    echo "Fehler beim Hinzufügen der Daten: " . $conn->error;
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
