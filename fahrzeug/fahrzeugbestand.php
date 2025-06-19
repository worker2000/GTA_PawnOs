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
<body>
    <?php
    require_once('../config.php');

    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // Funktion zum Aktualisieren der Fahrzeugdaten
    function updateFahrzeugDaten($fahrzeug_id, $anzahl_schluessel, $fahrzeugbrief, $ankaufpreis, $gewinn_rate)
    {
        global $conn;

        // Berechnung des neuen Verkaufspreises basierend auf der Gewinnrate
        $verkaufspreis = $ankaufpreis * (1 + $gewinn_rate);

        $sql_update = "UPDATE fahrzeug SET anzahl_schluessel = '$anzahl_schluessel', fahrzeugbrief = '$fahrzeugbrief', ankaufpreis = '$ankaufpreis', gewinn_rate = '$gewinn_rate', verkaufspreis = '$verkaufspreis' WHERE id = $fahrzeug_id";

        if ($conn->query($sql_update) === TRUE) {
            return "Fahrzeugdaten erfolgreich aktualisiert!";
        } else {
            return "Fehler beim Aktualisieren der Fahrzeugdaten: " . $conn->error;
        }
    }

    // Funktion zum Hochladen von Fahrzeugfotos
    function uploadFahrzeugFoto($fahrzeug_id)
    {
        if (isset($_FILES['fahrzeugfoto']) && $_FILES['fahrzeugfoto']['error'] === UPLOAD_ERR_OK) {
            // Verzeichnis zum Speichern der hochgeladenen Dateien
            $uploadVerzeichnis = 'fahrzeugfotos/';

            // Dateiname festlegen (hier können Sie ggf. weitere Anpassungen vornehmen)
            $zielDatei = $uploadVerzeichnis . basename($_FILES['fahrzeugfoto']['name']);

            // Datei in das Upload-Verzeichnis verschieben
            if (move_uploaded_file($_FILES['fahrzeugfoto']['tmp_name'], $zielDatei)) {
                // Aktualisieren Sie das Feld "fahrzeugfoto" in der Datenbank mit dem Dateinamen
                global $conn;
                $sql_update_foto = "UPDATE fahrzeug SET fahrzeugfoto = '$zielDatei' WHERE id = $fahrzeug_id";

                if ($conn->query($sql_update_foto) === TRUE) {
                    return "Fahrzeugfoto erfolgreich hochgeladen!";
                } else {
                    return "Fehler beim Aktualisieren des Fahrzeugfotos in der Datenbank: " . $conn->error;
                }
            } else {
                return "Fehler beim Verschieben der Datei in das Upload-Verzeichnis.";
            }
        } else {
            return "Es wurde keine Datei hochgeladen oder ein Fehler ist aufgetreten.";
        }
    }

    // Prüfen, ob das Formular zur Aktualisierung der Fahrzeugdaten gesendet wurde
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
        $fahrzeug_id = $_POST["fahrzeug_id"];
        $anzahl_schluessel = $_POST["anzahl_schluessel"];
        $fahrzeugbrief = $_POST["fahrzeugbrief"];
        $ankaufpreis = $_POST["ankaufpreis"];
        $gewinn_rate = $_POST["gewinn_rate"];

        $update_message = updateFahrzeugDaten($fahrzeug_id, $anzahl_schluessel, $fahrzeugbrief, $ankaufpreis, $gewinn_rate);

        // Hochladen des Fahrzeugfotos
        $upload_message = uploadFahrzeugFoto($fahrzeug_id);

        echo $update_message;
        echo $upload_message;
    }

    // Datenabfrage hier (Sie müssen diese Zeilen entsprechend anpassen)
    $sql_select = "SELECT * FROM fahrzeug WHERE verkaufszeit IS NULL";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        echo "<h1>Fahrzeugbestand</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Fahrzeugname</th><th>Nummernschild</th><th>Anzahl der Schlüssel</th><th>Fahrzeugbrief</th><th>Ankaufdatum</th><th>Ankaufpreis</th><th>Gewinnrate</th><th>Verkaufspreis</th><th>Fahrzeugfoto</th><th>Verkaufen</th><th>Fahrzeugdaten bearbeiten</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["fahrzeugname"] . "</td>";
            echo "<td>" . $row["nummernschild"] . "</td>";
            echo "<td>" . $row["anzahl_schluessel"] . "</td>";
            echo "<td>" . $row["fahrzeugbrief"] . "</td>";
            echo "<td>" . $row["ankaufdatum"] . "</td>";
            echo "<td>" . $row["ankaufpreis"] . "</td>";
            echo "<td>" . ($row["gewinn_rate"] * 100) . "%" . "</td>";
            echo "<td>" . $row["verkaufspreis"] . "</td>";

            // Anzeigen des Fahrzeugfotos (klein, mit Link zur Großansicht)
            if (!empty($row["fahrzeugfoto"])) {
                echo "<td><a href='" . $row["fahrzeugfoto"] . "' target='_blank'><img src='" . $row["fahrzeugfoto"] . "' width='100'></a></td>";
            } else {
                echo "<td>Kein Foto</td>";
            }

            echo "<td>";
            echo "<a href='fahrzeugverkauf.php?fahrzeug_id=" . $row["id"] . "'>Fahrzeug verkaufen</a>";
            echo "</td>";
            echo "<td>";
            echo "<form method='POST' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='fahrzeug_id' value='" . $row["id"] . "'>";
            echo "<label for='anzahl_schluessel'>Anzahl Schlüssel:</label>";
            echo "<input type='number' name='anzahl_schluessel' id='anzahl_schluessel' value='" . $row["anzahl_schluessel"] . "' required>";
            echo "<label for='fahrzeugbrief'>Fahrzeugbrief:</label>";
            echo "<select name='fahrzeugbrief' id='fahrzeugbrief' required>";
            echo "<option value='Ja' " . ($row["fahrzeugbrief"] === 'Ja' ? 'selected' : '') . ">Ja</option>";
            echo "<option value='Nein' " . ($row["fahrzeugbrief"] === 'Nein' ? 'selected' : '') . ">Nein</option>";
            echo "<option value='Wird nachgeliefert' " . ($row["fahrzeugbrief"] === 'Wird nachgeliefert' ? 'selected' : '') . ">Wird nachgeliefert</option>";
            echo "</select>";
            echo "<label for='ankaufpreis'>Ankaufpreis:</label>";
            echo "<input type='number' step='0.01' name='ankaufpreis' id='ankaufpreis' value='" . $row["ankaufpreis"] . "' required>";
            echo "<label for='gewinn_rate'>Gewinnrate:</label>";
            echo "<input type='number' step='0.01' name='gewinn_rate' id='gewinn_rate' value='" . $row["gewinn_rate"] . "' required>";
            echo "<label for='fahrzeugfoto'>Fahrzeugfoto hochladen:</label>";
            echo "<input type='file' name='fahrzeugfoto' id='fahrzeugfoto'>";
            echo "<button type='submit' name='update'>Aktualisieren</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Keine verfügbaren Fahrzeuge gefunden.";
    }

    // Verbindung zur Datenbank schließen
    $conn->close();
    ?>

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