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

?>
<?php
require_once('../config.php');

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

$suchbegriff = isset($_GET["suchbegriff"]) ? $_GET["suchbegriff"] : "";
$suchtyp = isset($_GET["suchtyp"]) ? $_GET["suchtyp"] : "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Überprüfen, ob die Suchparameter gültig sind
    if (!in_array($suchtyp, ["name", "kundennummer", "kontonummer", "interessen"])) {
        die("Ungültiger Suchtyp.");
    }

    // SQL-Abfrage erstellen, basierend auf dem ausgewählten Suchtyp
    $sql = "";

    if ($suchtyp === "name") {
        $sql = "SELECT * FROM kunden WHERE kundenname LIKE '%$suchbegriff%' OR kundenvorname LIKE '%$suchbegriff%'";
    } elseif ($suchtyp === "kundennummer") {
        $sql = "SELECT * FROM kunden WHERE kundennummer = '$suchbegriff'";
    } elseif ($suchtyp === "kontonummer") {
        $sql = "SELECT * FROM kunden WHERE kontonummer = '$suchbegriff'";
    } elseif ($suchtyp === "interessen") {
        $sql = "SELECT k.*, GROUP_CONCAT(ki.schlagwort) AS interessen
                FROM kunden k
                JOIN kunden_interessen ki ON k.kundennummer = ki.kunde_id
                WHERE ki.schlagwort LIKE '%$suchbegriff%'
                GROUP BY k.kundennummer";
    }

    // Abfrage ausführen
    if (!empty($sql)) {
        $result = $conn->query($sql);

        if ($result === false) {
            die("Fehler bei der Abfrage: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            echo "<h2>Ergebnisse:</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Kundennummer</th><th>Name</th><th>Vorname</th><th>Geburtsdatum</th><th>Telefonnummer</th><th>Email</th><th>Interessen</th><th>Bemerkungen</th><th>Interne Bemerkungen</th><th>Rabatt-Stufe</th><th>Kontonummer</th><th>Neue Transaktion</th><th>Alle Transaktionen anzeigen</th><th>Kunden bearbeiten</th><th>Kunden löschen</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["kundennummer"] . "</td>";
                echo "<td>" . $row["kundenname"] . "</td>";
                echo "<td>" . $row["kundenvorname"] . "</td>";
                echo "<td>" . $row["geburtstag"] . "</td>";
                echo "<td>" . $row["telefonnummer"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["interessen"] . "</td>";
                echo "<td>" . $row["bemerkungen"] . "</td>";
                echo "<td>" . $row["interne_bemerkungen"] . "</td>";
                echo "<td>" . $row["rabatt_stufe"] . "</td>";
                echo "<td>" . $row["kontonummer"] . "</td>";

                // Button "Neue Transaktion erfassen" mit Kundennummer übergeben
                echo "<td><form method='GET' action='transaktion_erfassen.html'>";
                echo "<input type='hidden' name='kundennummer' value='" . $row["kundennummer"] . "'>";
                echo "<input type='submit' value='Neue Transaktion erfassen'>";
                echo "</form></td>";

                // Button "Alle Transaktionen anzeigen" mit Kundennummer übergeben
                echo "<td><form method='GET' action='kunden_transaktionen.php'>";
                echo "<input type='hidden' name='kundennummer' value='" . $row["kundennummer"] . "'>";
                echo "<input type='submit' value='Alle Transaktionen anzeigen'>";
                echo "</form></td>";
                
                // Button "Alle Transaktionen anzeigen" mit Kundennummer übergeben
                echo "<td><form method='GET' action='kunden_bearbeiten.php'>";
                echo "<input type='hidden' name='kundennummer' value='" . $row["kundennummer"] . "'>";
                echo "<input type='submit' value='Kunden bearbeiten'>";
                echo "</form></td>";

                // Button "Kunden löschen" mit Kundennummer übergeben
                echo "<td><form method='GET' action='kunden_loeschen.php'>";
                echo "<input type='hidden' name='kundennummer' value='" . $row["kundennummer"] . "'>";
                echo "<input type='submit' value='Kunden löschen'>";
                echo "</form></td>";

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Keine Ergebnisse gefunden.";
        }
    }
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
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