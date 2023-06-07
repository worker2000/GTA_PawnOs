<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einkaufswagen - Verkauf</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .form-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container select {
            padding: 5px;
            margin: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-container {
            text-align: right;
            margin-top: 10px;
        }

        .btn-container button {
            padding: 10px 20px;
            font-weight: bold;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-container button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php
session_start();
require_once('config.php');

// Überprüfen, ob der Einkaufswagen existiert, andernfalls erstellen
if (!isset($_SESSION['einkaufswagen'])) {
    $_SESSION['einkaufswagen'] = array();
}

// Überprüfen, ob die Artikel-Suche abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['suchbegriff'])) {
    // Suchbegriff aus dem Formular abrufen
    $suchbegriff = $_POST['suchbegriff'];

    // SQL-Abfrage, um Artikel mit dem Suchbegriff zu finden
    $sql = "SELECT * FROM Artikel WHERE Artikelname LIKE '%$suchbegriff%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Gefundene Artikel</h2>";
        echo "<table>
                <tr>
                    <th>Artikelname</th>
                    <th>Empfohlener Verkaufspreis</th>
                    <th>Anzahl</th>
                    <th>Aktion</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["Artikelname"]."</td>
                    <td>".$row["EmpfohlenerVerkaufspreis"]."</td>
                    <td>
                        <form action='einkaufswagen_verkauf.php' method='POST'>
                            <input type='hidden' name='artikelId' value='".$row["ID"]."'>
                            <input type='number' name='anzahl' value='1' min='1'>
                            <input type='number' name='verkaufspreis' value='".$row["EmpfohlenerVerkaufspreis"]."' step='0.01'>
                            <button type='submit'>Zum Einkaufswagen hinzufügen</button>
                        </form>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Keine Artikel gefunden.";
    }
}

// Überprüfen, ob ein Artikel dem Einkaufswagen hinzugefügt werden soll
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['artikelId']) && isset($_POST['anzahl']) && isset($_POST['verkaufspreis'])) {
    $artikelId = $_POST['artikelId'];
    $anzahl = $_POST['anzahl'];
    $verkaufspreis = $_POST['verkaufspreis'];

    // Artikelinformationen abrufen
    $artikel = $conn->query("SELECT * FROM Artikel WHERE ID = '$artikelId'")->fetch_assoc();

    // Position für den Einkaufswagen erstellen
    $position = array(
        'artikelId' => $artikelId,
        'anzahl' => $anzahl,
        'verkaufspreis' => $verkaufspreis
    );

    // Position zum Einkaufswagen hinzufügen
    $_SESSION['einkaufswagen'][] = $position;

    // Erfolgsmeldung anzeigen
    echo "Der Artikel wurde zum Einkaufswagen hinzugefügt.";
}

// Überprüfen, ob ein Artikel aus dem Einkaufswagen entfernt werden soll
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['removeArtikelId'])) {
    $removeArtikelId = $_POST['removeArtikelId'];

    // Artikel aus dem Einkaufswagen entfernen
    foreach ($_SESSION['einkaufswagen'] as $key => $position) {
        if ($position['artikelId'] == $removeArtikelId) {
            unset($_SESSION['einkaufswagen'][$key]);
            break;
        }
    }

    // Erfolgsmeldung anzeigen
    echo "Der Artikel wurde aus dem Einkaufswagen entfernt.";
}

?>

<!-- HTML-Formular mit Artikel-Suche -->
<form action="einkaufswagen_verkauf.php" method="POST">
    <input type="text" name="suchbegriff" placeholder="Artikel suchen">
    <button type="submit">Suchen</button>
</form>

<!-- Einkaufswagen anzeigen -->
<h2>Einkaufswagen</h2>
<?php

// Überprüfen, ob der Einkaufswagen existiert
if (isset($_SESSION['einkaufswagen'])) {
    $einkaufswagen = $_SESSION['einkaufswagen'];

    if (!empty($einkaufswagen)) {
        echo "<table>
                <tr>
                    <th>Artikelname</th>
                    <th>Anzahl</th>
                    <th>Verkaufspreis</th>
                    <th>Gesamtpreis</th>
                    <th>Aktion</th>
                </tr>";

        $gesamtsumme = 0;

        foreach ($einkaufswagen as $position) {
            $artikelId = $position['artikelId'];
            $artikel = $conn->query("SELECT * FROM Artikel WHERE ID = '$artikelId'")->fetch_assoc();
            $artikelname = $artikel['Artikelname'];
            $verkaufspreis = $position['verkaufspreis'];
            $gesamtpreis = $verkaufspreis * $position['anzahl'];
            $gesamtsumme += $gesamtpreis;

            echo "<tr>
                    <td>".$artikelname."</td>
                    <td>".$position['anzahl']."</td>
                    <td>
                        <form action='einkaufswagen_verkauf.php' method='POST'>
                            <input type='hidden' name='artikelId' value='".$artikelId."'>
                            <input type='number' name='anzahl' value='".$position['anzahl']."' min='1'>
                            <input type='number' name='verkaufspreis' value='".$verkaufspreis."' step='0.01'>
                            <button type='submit'>Aktualisieren</button>
                        </form>
                    </td>
                    <td>".$gesamtpreis."</td>
                    <td>
                        <form action='einkaufswagen_verkauf.php' method='POST'>
                            <input type='hidden' name='removeArtikelId' value='".$artikelId."'>
                            <button type='submit'>Entfernen</button>
                        </form>
                    </td>
                </tr>";
        }

        echo "</table>";

        echo "<p>Gesamtsumme: ".$gesamtsumme."</p>";

        // Button zum Drucken der Rechnung
        echo "<form action='rechnung.php' method='POST'>
                <input type='hidden' name='einkaufswagen' value='".serialize($einkaufswagen)."'>
                <input type='hidden' name='gesamtsumme' value='".$gesamtsumme."'>
                <button type='submit'>Rechnung drucken</button>
              </form>";
    } else {
        echo "Der Einkaufswagen ist leer.";
    }
}
?>
</body>
</html>
