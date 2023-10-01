<?php
require_once('../config.php');

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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $kundennummer = $_GET["kundennummer"];

    // Zuerst die zugehörigen Interessen löschen
    $sql_delete_interests = "DELETE FROM kunden_interessen WHERE kunde_id = $kundennummer";

    if ($conn->query($sql_delete_interests) === TRUE) {
        // Dann die zugehörigen Transaktionen löschen
        $sql_delete_transactions = "DELETE FROM kunden_transaktionen WHERE kunde_id = $kundennummer";

        if ($conn->query($sql_delete_transactions) === TRUE) {
            // Dann den Kunden löschen, nachdem die Transaktionen entfernt wurden
            $sql_delete_customer = "DELETE FROM kunden WHERE kundennummer = $kundennummer";

            if ($conn->query($sql_delete_customer) === TRUE) {
                echo "Kunde erfolgreich gelöscht!";
            } else {
                echo "Fehler beim Löschen des Kunden: " . $conn->error;
            }
        } else {
            echo "Fehler beim Löschen der Transaktionen: " . $conn->error;
        }
    } else {
        echo "Fehler beim Löschen der Interessen: " . $conn->error;
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
</body>
</html>