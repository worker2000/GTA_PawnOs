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
$sql = "SELECT mitarbeiterrang FROM benutzer WHERE id = $benutzer_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $benutzer_rolle = $row['mitarbeiterrang'];
} else {
    echo "Benutzer nicht gefunden.";
    exit;
}

// Berechtigungen für die aktuelle Benutzerrolle abrufen
$berechtigte_seiten = $rollen_berechtigungen[$benutzer_rolle];
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


