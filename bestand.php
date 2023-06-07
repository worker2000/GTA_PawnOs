<?php
require_once('config.php');

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
$sql = "SELECT * FROM Artikel";
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
echo "<br><a href='abfrage.php'>Zurück zur Artikelsuche</a>";
?>
