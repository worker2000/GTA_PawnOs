<?php
require_once('config.php');

// Überprüfen, ob eine Suchanfrage gesendet wurde
if (isset($_GET['suchbegriff'])) {
    // Suchbegriff aus der GET-Anfrage abrufen
    $suchbegriff = $_GET['suchbegriff'];

    // SQL-Abfrage mit Suchanfrage erstellen
    $sql = "SELECT * FROM Artikel WHERE Artikelname LIKE '%$suchbegriff%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Artikelname</th>
                    <th>Ladenpreis</th>
                    <th>Empfohlener Einkaufspreis</th>
                    <th>Einkaufspreis</th>
                    <th>Empfohlener Verkaufspreis</th>
                    <th>Verkaufspreis</th>
                    <th>Aktionen</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["Artikelname"]."</td>
                    <td>".$row["Einkaufspreis_org"]."</td>
                    <td>".$row["EmpfohlenerEinkaufspreis"]."</td>
                    <td>".$row["Einkaufspreis"]."</td>
                    <td>".$row["EmpfohlenerVerkaufspreis"]."</td>
                    <td>".$row["Verkaufspreis"]."</td>
                    <td>
                        <a href=\"bearbeiten.php?id=".$row["ID"]."\">Bearbeiten</a>
                        <a href=\"loeschen.php?id=".$row["ID"]."\">Löschen</a>
                        <a href=\"einkaufswagen.php?id=".$row["ID"]."\">Einkaufswagen</a>
                    </td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "Keine Artikel gefunden.";
    }
}
?>

<!-- HTML-Formular mit Suchfeld -->
<form action="abfrage.php" method="GET">
    <input type="text" name="suchbegriff" placeholder="Artikel suchen">
    <button type="submit">Suchen</button>
</form>
