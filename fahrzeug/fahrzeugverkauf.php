<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?><!DOCTYPE html>
<html lang="de">
<head>
    <link rel="stylesheet" type="text/css" href="/pawn/style/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fahrzeugverkauf</title>
</head>
<body>
    <?php
    require_once('../config.php');

    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    $kundennummer = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fahrzeug_id = $_POST["fahrzeug_id"];
        $kaeufername = $_POST["kaeufername"];
        $kaeufer_vorname = $_POST["kaeufer_vorname"];
        $kaeufer_geburtstag = $_POST["kaeufer_geburtstag"];
        $kaufpreis = $_POST["kaufpreis"];

        // Überprüfen, ob ein Kunde mit den angegebenen Daten bereits existiert
        $sql_check_customer = "SELECT kundennummer FROM kunden WHERE kundenname = '$kaeufername' AND geburtstag = '$kaeufer_geburtstag'";
        $result = $conn->query($sql_check_customer);

        if ($result->num_rows > 0) {
            // Kunde existiert bereits, verwenden Sie seine Kundennummer
            $row = $result->fetch_assoc();
            $kundennummer = $row["kundennummer"];
        } else {
            // Kunde existiert nicht, erstellen Sie einen neuen Kunden
            $sql_insert_customer = "INSERT INTO kunden (kundenname, kundenvorname, geburtstag) VALUES ('$kaeufername', '$kaeufer_vorname', '$kaeufer_geburtstag')";
            if ($conn->query($sql_insert_customer) === TRUE) {
                $kundennummer = $conn->insert_id; // Holen Sie sich die zugeordnete Kundennummer
            } else {
                echo "Fehler beim Erstellen eines neuen Kunden: " . $conn->error;
                exit(); // Beenden Sie die Ausführung, wenn ein Fehler auftritt
            }
        }

        // Abrufen von Fahrzeugdaten aus der 'fahrzeug'-Tabelle
        $sql_get_fahrzeug_info = "SELECT fahrzeugname, nummernschild FROM fahrzeug WHERE id = $fahrzeug_id";
        $result = $conn->query($sql_get_fahrzeug_info);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $fahrzeugname = $row["fahrzeugname"];
            $nummernschild = $row["nummernschild"];
        } else {
            echo "Fahrzeugdaten konnten nicht abgerufen werden.";
            exit(); // Beenden Sie die Ausführung, wenn ein Fehler auftritt
        }

        // Speichern Sie die Transaktionsdaten in der 'kunden_transaktionen'-Tabelle
        $transaktionstyp = "Einnahme";
        $artikel = "$fahrzeugname ($nummernschild)";
        $transaktionsdatum = date('Y-m-d H:i:s'); // Aktuelles Datum und Uhrzeit

        $sql_insert_transaction = "INSERT INTO kunden_transaktionen (kunde_id, transaktionstyp, artikel, betrag, transaktionsdatum)
                                  VALUES ('$kundennummer', '$transaktionstyp', '$artikel', '$kaufpreis', '$transaktionsdatum')";

        if ($conn->query($sql_insert_transaction) === TRUE) {
            // Verkauf erfolgreich gespeichert, fahren Sie mit anderen Aktionen fort, falls erforderlich

            // Verkaufszeit in der 'fahrzeug'-Tabelle aktualisieren
            $verkaufszeit = date('Y-m-d H:i:s'); // Aktuelles Datum und Uhrzeit
            $sql_update_fahrzeug = "UPDATE fahrzeug SET verkaufszeit = '$verkaufszeit' WHERE id = $fahrzeug_id";
            $conn->query($sql_update_fahrzeug);

            echo "Verkauf erfolgreich gespeichert!";
        } else {
            echo "Fehler beim Speichern der Transaktion: " . $conn->error;
        }
    }

    // Verbindung zur Datenbank schließen
    $conn->close();
    ?>

    <h1>Fahrzeugverkauf</h1>
    <form action="fahrzeugverkauf.php" method="POST">
        <input type="hidden" name="fahrzeug_id" value="<?php echo $_GET['fahrzeug_id']; ?>" />
        <label for="kaeufername">Käufername:</label>
        <input type="text" name="kaeufername" id="kaeufername" required />
        <label for="kaeufer_vorname">Käufer Vorname:</label>
        <input type="text" name="kaeufer_vorname" id="kaeufer_vorname" required />
        <label for="kaeufer_geburtstag">Käufer Geburtstag:</label>
        <input type="date" name="kaeufer_geburtstag" id="kaeufer_geburtstag" required />
        <label for="kaufpreis">Kaufpreis:</label>
        <input type="number" step="0.01" name="kaufpreis" id="kaufpreis" required />
        <button type="submit">Verkaufen</button>
    </form>
    <td>
        <a href="/pawn/fahrzeug/fahrzeugankauf.php">Fahrzeugankauf</a>
    </td>
    <td>
        <a href="/pawn/fahrzeug/fahrzeugbestand.php">Fahrzeugbestand</a>
    </td>
    <td>
        <a href="/pawn/index.php">Hauptmenü</a>
    </td>
    <?php
require_once('footer.php'); // Footer einfügen
?>
