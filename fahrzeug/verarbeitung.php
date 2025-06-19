<?php
require_once('../config.php');

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

// Daten für den Verkäufer abrufen
$vorname_verkaeufer = $_POST["vorname_verkaeufer"];
$name_verkaeufer = $_POST["name_verkaeufer"];
$geburtsdatum_verkaeufer = $_POST["geburtsdatum_verkaeufer"];
$personalausweisnummer_verkaeufer = $_POST["personalausweisnummer_verkaeufer"];

// Berechnung des Verkaufspreises
$verkaufspreis = $ankaufpreis * (1 + ($gewinn_rate / 100));

// SQL-Abfrage mit Prepared Statements
$sql_insert_fahrzeug = "INSERT INTO fahrzeug (fahrzeugname, nummernschild, anzahl_schluessel, fahrzeugbrief, ankaufdatum, ankaufpreis, gewinn_rate, vorname_verkaeufer, name_verkaeufer, geburtsdatum_verkaeufer, personalausweisnummer_verkaeufer, verkaufspreis)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepared Statement vorbereiten
$stmt = $conn->prepare($sql_insert_fahrzeug);

if ($stmt) {
    // Parameter an das Prepared Statement binden
    $stmt->bind_param("ssisssdssssd", $fahrzeugname, $nummernschild, $anzahl_schluessel, $fahrzeugbrief, $ankaufdatum, $ankaufpreis, $gewinn_rate, $vorname_verkaeufer, $name_verkaeufer, $geburtsdatum_verkaeufer, $personalausweisnummer_verkaeufer, $verkaufspreis);

    // Prepared Statement ausführen
    if ($stmt->execute()) {
        echo "Fahrzeug und Verkäuferdaten erfolgreich hinzugefügt!";
    } else {
        echo "Fehler beim Hinzufügen der Daten: " . $stmt->error;
    }

    // Prepared Statement schließen
    $stmt->close();
} else {
    echo "Fehler beim Vorbereiten der SQL-Abfrage: " . $conn->error;
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
<html>
<body>

        <td>
            <a href="/pawn/fahrzeug/fahrzeugankauf.php">Fahrzeugankauf</a>
        </td>
        <td>
            <a href="/pawn/fahrzeug/fahrzeugbestand.php">Fahrzeugbestand</a>
        </td>
        <td>
            <a href="/pawn/index.php">Hauptmenü</a>
        </td>
</body>
</html>
