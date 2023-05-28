<?php
require_once('config.php');

// Variablen für die Rechnung initialisieren
$rechnungsPosten = array();
$rechnungsSumme = 0.00;

// Überprüfen, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eingaben aus dem Formular abrufen
    $suchbegriff = $_POST['suchbegriff'];
    $aktion = $_POST['aktion'];
    $menge = $_POST['menge'];

    // SQL-Abfrage, um den Artikel basierend auf dem Suchbegriff abzurufen
    $sql = "SELECT * FROM Artikel WHERE Artikelname LIKE '%$suchbegriff%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $artikelname = $row["Artikelname"];

        // Preise basierend auf der ausgewählten Aktion festlegen
        if ($aktion == 'einkauf') {
            $preis = $row["Einkaufspreis"];
        } else {
            $preis = $row["Verkaufspreis"];
        }

        // Rechnungsposition hinzufügen
        $rechnungsPosten[] = array(
            "Artikelname" => $artikelname,
            "Preis" => $preis,
            "Menge" => $menge
        );

        // Rechnungssumme aktualisieren
        $rechnungsSumme += ($preis * $menge);
    }
}

// Rechnung speichern
if (isset($_POST['rechnungSpeichern'])) {
    // SQL-Code zum Speichern der Rechnung in der Datenbank
    foreach ($rechnungsPosten as $posten) {
        $artikelname = $posten['Artikelname'];
        $preis = $posten['Preis'];
        $menge = $posten['Menge'];

        $sql = "INSERT INTO Rechnung (Artikelname, Preis, Menge) VALUES ('$artikelname', '$preis', '$menge')";
        $conn->query($sql);
    }

    // Erfolgsmeldung anzeigen
    echo "Die Rechnung wurde erfolgreich gespeichert!";
}
?>

<!-- HTML-Formular zur Suche und zum Hinzufügen von Artikeln zur Rechnung -->
<form action="rechnung.php" method="POST">
    <label for="suchbegriff">Suchbegriff:</label>
    <input type="text" name="suchbegriff" id="suchbegriff" required>
    <label for="aktion">Aktion:</label>
    <select name="aktion" id="aktion">
        <option value="einkauf">Einkauf</option>
        <option value="verkauf">Verkauf</option>
    </select>
    <label for="menge">Menge:</label>
    <input type="number" name="menge" id="menge" required>
    <button type="submit">Zur Rechnung hinzufügen</button>
</form>

<!-- Anzeige der aktuellen Rechnung -->
<h2>Aktuelle Rechnung</h2>
<?php if (!
