<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?>
<main>

    <div class="container">
        <?php
        require_once('../config.php');

        // �berpr�fen, ob eine Suchanfrage gesendet wurde
        if (isset($_GET['suchbegriff'])) {
            // Suchbegriff aus der GET-Anfrage abrufen und bereinigen
            $suchbegriff = trim($_GET['suchbegriff']);

            // �berpr�fen, ob der Suchbegriff nicht leer ist
            if (!empty($suchbegriff)) {
                // SQL-Abfrage mit Suchanfrage erstellen
                $sql = "SELECT * FROM artikel WHERE Artikelname LIKE '%$suchbegriff%'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table>
                            <tr>
                                <th>Artikelname</th>
                                <th>Geschlecht</th>
                                <th>Verkaufsladen</th>
                                <th>Kategorie</th>
                                <th>Ladenpreis</th>
                                <th>Empfohlener Einkaufspreis</th>
                                <th>Empfohlener Verkaufspreis</th>
                                <th>Aktionen</th>
                            </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["Artikelname"] . "</td>
                                <td>" . $row["Geschlecht"] . "</td>
                                <td>" . $row["Verkaufsladen"] . "</td>
                                <td>" . $row["Kategorie"] . "</td>
                                <td>" . $row["Einkaufspreis_org"] . "</td>
                                <td>" . $row["EmpfohlenerEinkaufspreis"] . "</td>
                                <td>" . $row["EmpfohlenerVerkaufspreis"] . "</td>
                                <td>
                                    <a href=\"bearbeiten.php?id=" . $row["ID"] . "\">Bearbeiten</a>
                                    <a href=\"loeschen.php?id=" . $row["ID"] . "\">Löschen</a>
                                </td>
                            </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "Keine Artikel gefunden.";
                }
            } else {
                echo "Bitte geben Sie einen Suchbegriff ein.";
            }
        }
        ?>

        <!-- HTML-Formular mit Suchfeld -->
        <form action="/pawn/pawnshop/artikelsuche.php" method="GET">
            <input type="text" name="suchbegriff" placeholder="Artikel suchen" />
            <button type="submit">Suchen</button>

         </form>

        <td>
            <a href="/pawn/pawnshop/neuer_artikel.php">Artikel erstellen</a>
        </td>
        <td>
            <a href="/pawn/index.php">Hauptmenü</a>
        </td>
    </div>
    <?php
require_once('footer.php'); // Footer einfügen
?>