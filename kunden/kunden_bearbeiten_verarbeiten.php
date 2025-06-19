<?php
require_once('../config.php');

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kundennummer = $_POST["kundennummer"];
    $kundenvorname = $_POST["kundenvorname"];
    $kundenname = $_POST["kundenname"];
    $geburtstag = $_POST["geburtstag"];
    $telefonnummer = $_POST["telefonnummer"];
    $email = $_POST["email"];
    $interessen = $_POST["interessen"];
    $bemerkungen = $_POST["bemerkungen"];
    $rabatt_stufe = $_POST["rabatt_stufe"];
    $kontonummer = $_POST["kontonummer"];

    // SQL-Abfrage, um die Kundendaten zu aktualisieren
    $sql = "UPDATE kunden SET
            kundenvorname = '$kundenvorname',
            kundenname = '$kundenname',
            geburtstag = '$geburtstag',
            telefonnummer = '$telefonnummer',
            email = '$email',
            interessen = '$interessen',
            bemerkungen = '$bemerkungen',
            rabatt_stufe = $rabatt_stufe,
            kontonummer = '$kontonummer'
            WHERE kundennummer = '$kundennummer'";

    if ($conn->query($sql) === TRUE) {
        echo "Kundendaten erfolgreich aktualisiert.";
    } else {
        echo "Fehler beim Aktualisieren der Kundendaten: " . $conn->error;
    }
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
