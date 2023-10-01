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
    $erlaubte_rollen = ['Admin', 'CEO', 'Co-CEO'];
    if (!in_array($benutzer_rolle, $erlaubte_rollen)) {
        echo "Zugriff verweigert: Sie haben nicht die erforderlichen Berechtigungen.";
        exit;
    }
} else {
    echo "Benutzer nicht gefunden.";
    exit;
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin-Seite</title>
</head>
<body>
    <h1>Admin-Seite</h1>
    
    <!-- Button zum Hinzufügen eines neuen Benutzers -->
    <a href="neuer_benutzer.php"><button>Benutzer hinzufügen</button></a>
    
    <!-- Anzeige der registrierten Benutzer und Aktionen -->
    <h2>Registrierte Benutzer</h2>
    <table>
        <tr>
            <th>Benutzername</th>
            <th>Mitarbeiterrang</th>
            <th>Zugang gesperrt</th>
            <th>Aktionen</th>
        </tr>
        <?php
session_start();
require_once('../config.php');

        // SQL-Abfrage, um alle Benutzer abzurufen
        $sql = "SELECT * FROM benutzer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["benutzername"] . "</td>";
                echo "<td>" . $row["mitarbeiterrang"] . "</td>";
                
                // Überprüfen, ob der Zugang gesperrt ist
                if ($row["zugang_gesperrt"] == 1) {
                    echo "<td>Ja</td>";
                    echo "<td><a href=\"entsperre_zugang.php?id=" . $row["id"] . "\">Zugang entsperren</a></td>";
                } else {
                    echo "<td>Nein</td>";
                    echo "<td><a href=\"sperre_zugang.php?id=" . $row["id"] . "\">Zugang sperren</a></td>";
                }
                
                echo "<td><a href=\"update_mitarbeiterrang.php?id=" . $row["id"] . "\">Mitarbeiterrang ändern</a> | <a href=\"loesche_benutzer.php?id=" . $row["id"] . "\">Benutzer löschen</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Keine Benutzer gefunden.</td></tr>";
        }

        // Verbindung zur Datenbank schließen
        $conn->close();
        ?>
    </table>
    <?php
require_once('footer.php'); // Footer einfügen
?>
</body>
</html>
