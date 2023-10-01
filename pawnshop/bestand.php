<?php
session_start();
require_once('../config.php');

// Rollen und zugehörige Berechtigungen definieren
$rollen_berechtigungen = [
    'Admin' => [
        '/pawn/admin/admin_seite.php',
        '/pawn/fahrzeug/fahrzeugankauf.php',
        '/pawn/fahrzeug/fahrzeugbestand.php',
        '/pawn/kunden/kunden_suchen.html',
        '/pawn/kunden/kunden_hinzufuegen.html',
        '/pawn/kunden/transaktion_erfassen.html',
        '/pawn/pawnshop/artikelsuche.php',
        '/pawn/pawnshop/neuer_artikel.php',
        '/pawn/pawnshop/bestand.php',
    ],
    'CEO' => [
        // Alle Seiten anzeigen
    ],
    'Co-CEO' => [
        // Seiten für Co-CEO anzeigen
        '/pawn/fahrzeug/fahrzeugankauf.php',
        '/pawn/fahrzeug/fahrzeugbestand.php',
        '/pawn/kunden/kunden_suchen.html',
        '/pawn/kunden/kunden_hinzufuegen.html',
        '/pawn/kunden/transaktion_erfassen.html',
        '/pawn/pawnshop/artikelsuche.php',
        '/pawn/pawnshop/neuer_artikel.php',
        '/pawn/pawnshop/bestand.php',
    ],
    'Buchhalter' => [
        // Seiten für Buchhalter anzeigen
        '/pawn/fahrzeug/fahrzeugankauf.php',
        '/pawn/fahrzeug/fahrzeugbestand.php',
        '/pawn/kunden/kunden_suchen.html',
        '/pawn/kunden/kunden_hinzufuegen.html',
        '/pawn/kunden/transaktion_erfassen.html',
        '/pawn/pawnshop/artikelsuche.php',
        '/pawn/pawnshop/neuer_artikel.php',
        '/pawn/pawnshop/bestand.php',
        '/pawn/logout.php', // Beispiel-Logout-Link
    ],
    'Mitarbeiter+Fahrzeugverkauf' => [
        // Seiten für Mitarbeiter+Fahrzeugverkauf anzeigen
        '/pawn/fahrzeug/fahrzeugankauf.php',
        '/pawn/fahrzeug/fahrzeugbestand.php',
        '/pawn/kunden/kunden_suchen.html',
        '/pawn/kunden/kunden_hinzufuegen.html',
        '/pawn/kunden/transaktion_erfassen.html',
        '/pawn/pawnshop/artikelsuche.php',
        '/pawn/pawnshop/neuer_artikel.php',
        '/pawn/logout.php', // Beispiel-Logout-Link
    ],
    'Mitarbeiter' => [
        // Seiten für Mitarbeiter anzeigen
        '/pawn/fahrzeug/fahrzeugbestand.php',
        '/pawn/kunden/kunden_suchen.html',
        '/pawn/kunden/kunden_hinzufuegen.html',
        '/pawn/kunden/transaktion_erfassen.html',
        '/pawn/pawnshop/artikelsuche.php',
        '/pawn/pawnshop/neuer_artikel.php',
        '/pawn/logout.php', // Beispiel-Logout-Link
    ],
    'Praktikant' => [
        // Seiten für Praktikant anzeigen
        '/pawn/kunden/transaktion_erfassen.html',
        '/pawn/pawnshop/artikelsuche.php',
        '/pawn/pawnshop/neuer_artikel.php',
        '/pawn/logout.php', // Beispiel-Logout-Link
    ],
];

// Assoziationsliste von URLs zu Seitennamen
$url_namen = [
    '/pawn/admin/admin_seite.php' => 'Admin-Seite',
    '/pawn/fahrzeug/fahrzeugankauf.php' => 'Fahrzeugankauf',
    '/pawn/fahrzeug/fahrzeugbestand.php' => 'Fahrzeugbestand',
    '/pawn/kunden/kunden_suchen.html' => 'Kundensuche',
    '/pawn/kunden/kunden_hinzufuegen.html' => 'Kunden hinzufügen',
    '/pawn/kunden/transaktion_erfassen.html' => 'Transaktion erfassen',
    '/pawn/pawnshop/artikelsuche.php' => 'Artikelsuche',
    '/pawn/pawnshop/neuer_artikel.php' => 'Neuer Artikel',
    '/pawn/pawnshop/bestand.php' => 'Bestand',
];



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


?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startseite</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <header>
        <div class="header-content">
            <img src="../logo.png" alt="Logo" class="logo">
            <h1>PawnShop-OS</h1>
        </div>
    </header>

    <nav>
    <ul>
        <?php foreach ($berechtigte_seiten as $url): ?>
            <li><a href="<?php echo $url; ?>"><?php echo $url_namen[$url]; ?></a></li>
        <?php endforeach; ?>
    </ul>
    </nav>

<main>
<?php
require_once('../config.php');

// Überprüfen, ob eine Formularübermittlung erfolgt ist
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfen, ob der Bestätigungsbutton geklickt wurde
    if (isset($_POST['submit'])) {
        // Array mit Inventardaten erstellen
        $inventar = $_POST['inventar'];

        // Schleife zum Verarbeiten der Inventardaten
        foreach ($inventar as $artikelId => $bestand) {
            // Bestand in der Datenbank aktualisieren
            $sql = "UPDATE Artikel SET Bestand = '$bestand' WHERE ID = '$artikelId'";
            $conn->query($sql);
        }

        // Erfolgsnachricht anzeigen
        echo "Inventur erfolgreich abgeschlossen.";
    }
}

// Inventurdaten aus der Datenbank abrufen
$sql = "SELECT * FROM artikel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Inventur</h2>";
    echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
    echo "<table>
            <tr>
                <th>Artikelname</th>
                <th>Aktueller Bestand</th>
                <th>Neuer Bestand</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        $artikelId = $row['ID'];
        $artikelname = $row['Artikelname'];
        $bestand = $row['Bestand'];

        echo "<tr>
                <td>".$artikelname."</td>
                <td>".$bestand."</td>
                <td>
                    <input type='number' name='inventar[".$artikelId."]' min='0' value='".$bestand."'>
                </td>
              </tr>";
    }

    echo "</table>";
    echo "<button type='submit' name='submit'>Inventur bestätigen</button>";
    echo "</form>";
} else {
    echo "Keine Artikel gefunden.";
}

// Zurück zur abfrage.php
echo "<br><a href='/pawn/pawnshop/abfrage.php'>Zurück zur Artikelsuche</a>";
?>
</div>
</main>
</body>
</html>