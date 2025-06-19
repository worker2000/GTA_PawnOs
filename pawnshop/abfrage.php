<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikelsuche</title>
</head>
<body>
    <header>
        <h1>Artikelsuche</h1>
    </header>
    
<!-- ... vorheriger HTML-Code ... -->

<div class="container">
    <?php
    require_once('../config.php');

    // Überprüfen, ob eine Suchanfrage gesendet wurde
    if (isset($_GET['suchbegriff'])) {
        // Suchbegriff aus der GET-Anfrage abrufen
        $suchbegriff = $_GET['suchbegriff'];

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
                        <td>".$row["Artikelname"]."</td>
                        <td>".$row["Geschlecht"]."</td>
                        <td>".$row["Verkaufsladen"]."</td>
                        <td>".$row["Kategorie"]."</td>
                        <td>".$row["Einkaufspreis_org"]."</td>
                        <td>".$row["EmpfohlenerEinkaufspreis"]."</td>
                        <td>".$row["EmpfohlenerVerkaufspreis"]."</td>
                        <td>
                            <a href=\"bearbeiten.php?id=".$row["ID"]."\">Bearbeiten</a>
                            <a href=\"loeschen.php?id=".$row["ID"]."\">Löschen</a>
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
    <form action="/pawn/pawnshop/artikelsuche.php" method="GET">
        <input type="text" name="suchbegriff" placeholder="Artikel suchen" />
        <button type="submit">Suchen</button>
    </form>
    <?php
require_once('footer.php'); // Footer einfügen
?>

