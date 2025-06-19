
<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?>
<!DOCTYPE html>
<html>
<head>
    <title>Neuen Benutzer hinzufügen</title>
</head>
<body>
    <h2>Neuen Benutzer hinzufügen</h2>
    <form method="post" action="neuer_benutzer.php">
        <label for="neuer_benutzername">Benutzername:</label>
        <input type="text" name="neuer_benutzername" id="neuer_benutzername" required><br><br>

        <label for="neues_passwort">Passwort:</label>
        <input type="password" name="neues_passwort" id="neues_passwort" required><br><br>

        <label for="neuer_mitarbeiterrang">Mitarbeiterrang:</label>
        <select name="neuer_mitarbeiterrang" id="neuer_mitarbeiterrang">
            <option value="Admin">Admin</option>
            <option value="CEO">CEO</option>
            <option value="Co-CEO">Co-CEO</option>
            <option value="Buchhalter">Buchhalter</option>
            <option value="Mitarbeiter+Fahrzeugverkauf">Mitarbeiter+Fahrzeug</option>
            <option value="Mitarbeiter">Mitarbeiter</option>
            <option value="Praktikant">Praktikant</option>
        </select><br><br>

        <input type="submit" value="Benutzer hinzufügen">
    </form>
</body>
</html>
<?php
session_start();

require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $neuer_benutzername = $_POST["neuer_benutzername"];
    $neues_passwort = $_POST["neues_passwort"];
    $neuer_mitarbeiterrang = $_POST["neuer_mitarbeiterrang"];

    // Passwort hashen (Sie sollten eine sichere Hashing-Methode verwenden)
    $hashed_password = password_hash($neues_passwort, PASSWORD_DEFAULT);

    // SQL-Abfrage, um einen neuen Benutzer hinzuzufügen
    $sql = "INSERT INTO benutzer (benutzername, passwort, mitarbeiterrang)
    VALUES ('$neuer_benutzername', '$hashed_password', '$neuer_mitarbeiterrang')";

if ($conn->query($sql) === TRUE) {
    // Erfolgreich neuen Benutzer hinzugefügt, jetzt zur admin_seite.php zurückleiten
    header("Location: admin_seite.php");
    exit; // Beenden Sie das Skript, um sicherzustellen, dass keine weiteren Ausgaben gemacht werden
} else {
    echo "Fehler beim Hinzufügen des Benutzers: " . $conn->error;
}

    // Verbindung zur Datenbank schließen
    $conn->close();
}
?>
<?php
require_once('footer.php'); // Footer einfügen
?>
