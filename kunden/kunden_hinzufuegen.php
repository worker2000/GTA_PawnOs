<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?><?php
require_once('../config.php');

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kundenname = $_POST["kundenname"];
    $kundenvorname = $_POST["kundenvorname"];
    $geburtstag = $_POST["geburtstag"];
    $telefonnummer = $_POST["telefonnummer"];
    $email = $_POST["email"];
    $bemerkungen = $_POST["bemerkungen"];
    $interne_bemerkungen = $_POST["interne_bemerkungen"];
    $rabatt_stufe = $_POST["rabatt_stufe"];
    $kontonummer = $_POST["kontonummer"]; // Hinzugefügtes Feld für Kontonummer

    // SQL-Abfrage, um den Kunden in die Datenbank einzufügen
    $sql = "INSERT INTO kunden (kundenname, kundenvorname, geburtstag, telefonnummer, email, bemerkungen, interne_bemerkungen, rabatt_stufe, kontonummer)
    VALUES ('$kundenname', '$kundenvorname', '$geburtstag', '$telefonnummer', '$email', '$bemerkungen', '$interne_bemerkungen', $rabatt_stufe, '$kontonummer')"; // Das Feld Kontonummer wurde hier hinzugefügt

    if ($conn->query($sql) === TRUE) {
        // Erfolgreich den Kunden hinzugefügt

        // ID des gerade hinzugefügten Kunden abrufen
        $kunde_id = $conn->insert_id;

        // Interessen als Schlagwörter trennen und in die Tabelle kunden_interessen einfügen
        $interessen = $_POST["interessen"];
        $interessen_array = explode(',', $interessen);
        foreach ($interessen_array as $schlagwort) {
            $schlagwort = trim($schlagwort); // Leerzeichen entfernen
            $sql_schlagwort = "INSERT INTO kunden_interessen (kunde_id, schlagwort)
            VALUES ($kunde_id, '$schlagwort')";

            $conn->query($sql_schlagwort);
        }

        // Zeige Kundennummer zusammen mit einer Nachricht an
        echo "Kunde erfolgreich hinzugefügt. Die Kundennummer lautet: $kunde_id";
    } else {
        echo "Fehler beim Hinzufügen des Kunden: " . $conn->error;
    }
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
<html>
<body
    <td>
        <a href="/pawn/kunden/kunden_hinzufuegen.html">Kunden hinzufügen</a>
    </td>
    <td>
        <a href="/pawn/kunden/kunden_suchen.html">Kunden suchen</a>
    </td>
    <td>
        <a href="/pawn/kunden/transaktion_erfassen.html">Einkauf/Verkauf erfassen</a>
    </td>
    <td>
        <a href="/pawn/index.php">Hauptmenü</a>
    </td>
    <?php
require_once('footer.php'); // Footer einfügen
?>