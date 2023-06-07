<?php
session_start();

// Überprüfen, ob der Einkaufswagen nicht leer ist
if (!empty($_SESSION['einkaufswagen'])) {
    // Daten aus dem Einkaufswagen abrufen
    $einkaufswagen = $_SESSION['einkaufswagen'];

    // Gesamtsumme initialisieren
    $gesamtsumme = 0;

    // Rechnungsinformationen
    $kunde = $_POST['kunde'];
    $mitarbeiter = $_POST['mitarbeiter'];
    $art = $_POST['art'];

    // Rechnungstabelle anzeigen
    echo "<h2>Rechnung</h2>";
    echo "<p>Kunde: $kunde</p>";
    echo "<p>Mitarbeiter: $mitarbeiter</p>";
    echo "<p>Art: $art</p>";
    echo "<table>
            <tr>
                <th>Artikelname</th>
                <th>Anzahl</th>
                <th>Verkaufspreis</th>
                <th>Gesamtpreis</th>
            </tr>";

    foreach ($einkaufswagen as $artikel) {
        $artikelname = $artikel['artikelname'];
        $anzahl = $artikel['anzahl'];
        $verkaufspreis = $artikel['verkaufspreis'];
        $gesamtpreis = $verkaufspreis * $anzahl;

        echo "<tr>
                <td>$artikelname</td>
                <td>$anzahl</td>
                <td>$verkaufspreis</td>
                <td>$gesamtpreis</td>
              </tr>";

        // Gesamtsumme aktualisieren
        $gesamtsumme += $gesamtpreis;
    }

    echo "</table>";

    // Gesamtsumme anzeigen
    echo "<p>Gesamtsumme: $gesamtsumme</p>";

    // Button für Copy & Paste
    echo "<button onclick=\"copyToClipboard()\">Copy & Paste</button>";

    // JavaScript-Funktion zum Kopieren in die Zwischenablage
    echo "<script>
            function copyToClipboard() {
                const text = document.getElementById('rechnungstext').innerText;
                navigator.clipboard.writeText(text).then(function() {
                    alert('Rechnungstext wurde in die Zwischenablage kopiert!');
                });
            }
          </script>";
} else {
    echo "<h2>Der Einkaufswagen ist leer.</h2>";
}
?>
