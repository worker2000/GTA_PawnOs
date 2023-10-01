<?php
require_once('../config.php');

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfen, ob ein Kunde mit den Verkäuferdaten bereits existiert
    $vorname_verkaeufer = $_POST["vorname_verkaeufer"];
    $name_verkaeufer = $_POST["name_verkaeufer"];
    $geburtsdatum_verkaeufer = $_POST["geburtsdatum_verkaeufer"];

    $sql_check_customer = "SELECT kundennummer FROM kunden WHERE kundenname = '$name_verkaeufer' AND geburtstag = '$geburtsdatum_verkaeufer'";
    $result = $conn->query($sql_check_customer);

    if ($result->num_rows > 0) {
        // Kunde existiert bereits, verwenden Sie seine Kundennummer
        $row = $result->fetch_assoc();
        $kundennummer = $row["kundennummer"];
    } else {
        // Kunde existiert nicht, erstellen Sie einen neuen Kunden
        $sql_insert_customer = "INSERT INTO kunden (kundenname, kundenvorname, geburtstag) VALUES ('$name_verkaeufer', '$vorname_verkaeufer', '$geburtsdatum_verkaeufer')";
        if ($conn->query($sql_insert_customer) === TRUE) {
            $kundennummer = $conn->insert_id; // Holen Sie sich die zugeordnete Kundennummer
        } else {
            echo "Fehler beim Erstellen eines neuen Kunden: " . $conn->error;
            exit(); // Beenden Sie die Ausführung, wenn ein Fehler auftritt
        }
    }

    // Verarbeiten Sie die restlichen Fahrzeugverkaufsinformationen und speichern Sie sie in der 'fahrzeug'-Tabelle
    $fahrzeugname = $_POST["fahrzeugname"];
    $nummernschild = $_POST["nummernschild"];
    $anzahl_schluessel = $_POST["anzahl_schluessel"];
    $fahrzeugbrief = $_POST["fahrzeugbrief"];
    $ankaufdatum = $_POST["ankaufdatum"];
    $ankaufpreis = $_POST["ankaufpreis"];
    $gewinn_rate = $_POST["gewinn_rate"];

    // Speichern Sie die Fahrzeugankaufsinformationen in der 'fahrzeug'-Tabelle
    $sql_insert_fahrzeug = "INSERT INTO fahrzeug (fahrzeugname, nummernschild, anzahl_schluessel, fahrzeugbrief, ankaufdatum, ankaufpreis, gewinn_rate, vorname_verkaeufer, name_verkaeufer, geburtsdatum_verkaeufer)
                              VALUES ('$fahrzeugname', '$nummernschild', '$anzahl_schluessel', '$fahrzeugbrief', '$ankaufdatum', '$ankaufpreis', '$gewinn_rate', '$vorname_verkaeufer', '$name_verkaeufer', '$geburtsdatum_verkaeufer')";

    if ($conn->query($sql_insert_fahrzeug) === TRUE) {
        // Fahrzeugankauf erfolgreich gespeichert, fahren Sie mit anderen Aktionen fort, falls erforderlich

        // Eintrag in der 'kunden_transaktionen'-Tabelle als Ausgabe hinzufügen
        $transaktionstyp = "Ausgabe";
        $artikel = "$fahrzeugname ($nummernschild)";
        $transaktionsdatum = date('Y-m-d H:i:s'); // Aktuelles Datum und Uhrzeit

        $sql_insert_transaction = "INSERT INTO kunden_transaktionen (kunde_id, transaktionstyp, artikel, betrag, transaktionsdatum)
                                  VALUES ('$kundennummer', '$transaktionstyp', '$artikel', '$ankaufpreis', '$transaktionsdatum')";

        if ($conn->query($sql_insert_transaction) === TRUE) {
            echo "Fahrzeugankauf erfolgreich gespeichert!";
        } else {
            echo "Fehler beim Hinzufügen der Transaktion in die kunden_transaktionen-Tabelle: " . $conn->error;
        }
    } else {
        echo "Fehler beim Speichern des Fahrzeugankaufs: " . $conn->error;
    }
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
