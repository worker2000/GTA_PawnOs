<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['benutzer_id'])) {
    header("Location: login.php");
    exit;
}

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['benutzer_id'])) {
    header("Location: login.php");
    exit;
}

// Aktuelle Benutzerrolle abrufen (aus Ihrer Datenbank)
$benutzer_id = $_SESSION['benutzer_id'];
$sql = "SELECT mitarbeiterrang, zugang_gesperrt FROM benutzer WHERE id = $benutzer_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $benutzer_rolle = $row['mitarbeiterrang'];
    
    // Überprüfen, ob der Benutzer gesperrt ist
    if ($row['zugang_gesperrt'] == 1) {
        echo "Ihr Zugang ist gesperrt. Bitte kontaktieren Sie den Administrator.";
        exit;
    }

    // Überprüfen, ob die Rolle des Benutzers in den erlaubten Rollen enthalten ist
    $erlaubte_rollen = ['Admin', 'CEO', 'Co-CEO', 'Mitarbeiter+Fahrzeugverkauf'];
    if (!in_array($benutzer_rolle, $erlaubte_rollen)) {
        echo "Zugriff verweigert: Sie haben nicht die erforderlichen Berechtigungen.";
        exit;
    }
} else {
    echo "Benutzer nicht gefunden.";
    exit;
}

?><!DOCTYPE html>
<html lang="de">
<head>
    <link rel="stylesheet" type="text/css" href="/pawn/style/style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fahrzeugankauf</title>
</head>
<body>
    <h1>Fahrzeugankauf</h1>
    <form method="POST" action="verarbeitung_einkauf.php">
        <label for="fahrzeugname">Fahrzeugname:</label>
        <input type="text" name="fahrzeugname" required><br>

        <label for="nummernschild">Nummernschild:</label>
        <input type="text" name="nummernschild" required><br>

        <label for="anzahl_schluessel">Anzahl der Schlüssel:</label>
        <input type="number" name="anzahl_schluessel" required><br>

        <label for="fahrzeugbrief">Fahrzeugbrief:</label>
        <select name="fahrzeugbrief">
            <option value="ja">Ja</option>
            <option value="nein">Nein</option>
            <option value="wird_nachgeliefert">Wird nachgeliefert</option>
        </select><br>

        <label for="ankaufdatum">Ankaufdatum:</label>
        <input type="date" name="ankaufdatum" required><br>

        <label for="ankaufpreis">Ankaufpreis:</label>
        <input type="number" step="0.01" name="ankaufpreis" required><br>

        <label for="gewinn_rate">Gewinnrate:</label>
        <select name="gewinn_rate">
            <option value="0.10">10%</option>
            <option value="0.15">15%</option>
            <option value="0.20">20%</option>
        </select><br>

        <!-- Verkäuferinformationen -->
        <h2>Verkäuferinformationen</h2>
        <label for="vorname_verkaeufer">Vorname Verkäufer:</label>
        <input type="text" name="vorname_verkaeufer" required><br>

        <label for="name_verkaeufer">Name Verkäufer:</label>
        <input type="text" name="name_verkaeufer" required><br>

        <label for="geburtsdatum_verkaeufer">Geburtsdatum Verkäufer:</label>
        <input type="date" name="geburtsdatum_verkaeufer" required><br>

        <label for="personalausweisnummer_verkaeufer">Personalausweisnummer Verkäufer:</label>
        <input type="text" name="personalausweisnummer_verkaeufer" required><br>

        <input type="submit" value="Fahrzeug hinzufügen">
    </form>
    <td>
        <a href="/pawn/fahrzeug/fahrzeugverkauf.php">Fahrzeugverkauf</a>
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
