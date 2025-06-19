<?php
require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kunde_id = $_POST["kundennummer"];
    $transaktionstyp = $_POST["transaktionstyp"];
    $artikel = $_POST["artikel"];
    $betrag = $_POST["betrag"];
    $transaktionsdatum = $_POST["transaktionsdatum"];

    // �berpr�fen, ob die Kundennummer in der Datenbank existiert
    $check_customer_sql = "SELECT kundennummer FROM kunden WHERE kundennummer = $kunde_id";
    $result = $conn->query($check_customer_sql);

    if ($result->num_rows == 0) {
        // Kundennummer existiert nicht, weiterleiten zu kunden_hinzufuegen.html
        echo '<script>alert("Die Kundennummer existiert nicht. Bitte erfassen Sie zuerst den Kunden.");';
        echo 'window.location.href = "/pawn/kunden/kunden_hinzufuegen.html";</script>';
        exit;
    }

    // SQL-Abfrage, um die Transaktion in die Datenbank einzuf�gen
    $sql = "INSERT INTO kunden_transaktionen (kunde_id, transaktionstyp, artikel, betrag, transaktionsdatum)
    VALUES ($kunde_id, '$transaktionstyp', '$artikel', $betrag, '$transaktionsdatum')";

    if ($conn->query($sql) === TRUE) {
        echo "Transaktion erfolgreich erfasst!";
    } else {
        echo "Fehler beim Erfassen der Transaktion: " . $conn->error;
    }
}

// Verbindung zur Datenbank schlie�en
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/pawn/style/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Neue Transaktion</title>
    <script>
        function checkCustomerExists() {
            var kunde_id = document.getElementsByName("kunde_id")[0].value;
            
            // Hier sollten Sie die Logik zur �berpr�fung der Kundennummer in der Datenbank einf�gen
            // Angenommen, Sie haben eine JavaScript-Funktion "customerExistsInDatabase()" erstellt,
            // die �berpr�ft, ob die Kundennummer in der Datenbank vorhanden ist.

            if (!customerExistsInDatabase()) {
                // Kundennummer ist nicht vorhanden, Popup-Fenster anzeigen
                alert("Die Kundennummer existiert nicht. Bitte erfassen Sie zuerst den Kunden.");
                window.location.href = "/pawn/kunden/kunden_hinzufuegen.html";
                return false; // Das Formular wird nicht abgeschickt
            }
            return true; // Das Formular wird abgeschickt
        }
    </script>
</head>
<body>
    <header>
        <h1>Neue Transaktion</h1>
    </header>
    <form method="POST" action="transaktion_erfassen.php" onsubmit="return checkCustomerExists();">
        <label for="kunde_id">Kunde (Kundennummer):</label>
        <input type="number" name="kunde_id" required><br>

        <label for="transaktionstyp">Transaktionstyp:</label>
        <select name="transaktionstyp">
            <option value="Einnahme">Einnahme</option>
            <option value="Ausgabe">Ausgabe</option>
        </select><br>

        <label for="artikel">Artikel (mehrzeiliges Textfeld):</label><br>
        <textarea name="artikel" rows="20" cols="50" required></textarea><br> <!-- Mehrzeiliges Textfeld f�r Artikel -->

        <label for="betrag">Betrag:</label>
        <input type="number" step="0.01" name="betrag" required><br>

        <label for="transaktionsdatum">Transaktionsdatum:</label>
        <input type="date" name="transaktionsdatum" required><br>

        <input type="submit" value="Transaktion erfassen">
    </form>

    <td>
        <a href="/pawn/kunden/kunden_hinzufuegen.html">Kunden hinzuf�gen</a>
    </td>
    <td>
        <a href="/pawn/kunden/kunden_suchen.html">Kunden suchen</a>
    </td>
    <td>
        <a href="/pawn/kunden/transaktion_erfassen.html">Einkauf/Verkauf erfassen</a>
    </td>
    <td>
        <a href="/pawn/index.php">Hauptmen�</a>
    </td>
</body>
</html>
