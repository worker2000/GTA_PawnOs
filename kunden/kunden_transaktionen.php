<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?>
<?php
require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $kunde_id = $_GET["kundennummer"];

    // SQL-Abfrage, um Transaktionen für den ausgewählten Kunden abzurufen
    $sql = "SELECT * FROM kunden_transaktionen WHERE kunde_id = $kunde_id";

    // Abfrage ausführen
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Daten für die Balkengrafik vorbereiten
        $labels = [];
        $einnahmenData = [];
        $ausgabenData = [];
        echo "<html>";
        echo "<head>";
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js'></script>";
        echo "</head>";
        echo "<body>";
        echo "<header>";
        echo "<h1>Transaktionen für ausgewählten Kunden</h1>";
        echo "</header>";
        echo "<h2>Transaktionen für ausgewählten Kunden:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Transaktionstyp</th><th>Artikel</th><th>Betrag</th><th>Transaktionsdatum</th></tr>";

        while ($row = $result->fetch_assoc()) {
            $labels[] = $row["transaktionsdatum"];
            if ($row["transaktionstyp"] === "Einnahme") {
                $einnahmenData[] = $row["betrag"];
                $ausgabenData[] = 0;
            } else {
                $ausgabenData[] = $row["betrag"];
                $einnahmenData[] = 0;
            }

            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["transaktionstyp"] . "</td>";
            echo "<td><textarea rows='4' cols='50'>" . $row["artikel"] . "</textarea></td>";
            echo "<td>" . $row["betrag"] . "</td>";
            echo "<td>" . $row["transaktionsdatum"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
// Berechnung der Gesamteinnahmen und Gesamtausgaben
$gesamtEinnahmen = array_sum($einnahmenData);
$gesamtAusgaben = array_sum($ausgabenData);

// Berechnung des Saldos
$saldo = $gesamtEinnahmen - $gesamtAusgaben;

// Darstellung der Ergebnisse
echo "<div style='text-align: left;'>";
echo "<h2>Gesamtübersicht</h2>";

// Gesamteinnahmen
echo "<p>Gesamteinnahmen: $gesamtEinnahmen</p>";

// Gesamtausgaben
echo "<p>Gesamtausgaben: $gesamtAusgaben</p>";

// Saldo
if ($saldo < 0) {
    echo "<p style='color: red; font-weight: bold;'>Saldo: $saldo</p>";
} elseif ($saldo > 0) {
    echo "<p style='color: green; font-weight: bold;'>Saldo: $saldo</p>";
} else {
    echo "<p>Saldo: $saldo</p>";
}

echo "</div>";

        // Berechnen Sie die Summe der Einnahmen und Ausgaben
        $gesamtEinnahmen = array_sum($einnahmenData);
        $gesamtAusgaben = array_sum($ausgabenData);

        // HTML-Code f�r das Pie Chart
        echo "<div style='text-align: center; width: 300px; height: 300px;'>";
        echo "<h2>Gesamtübersicht</h2>";
        echo "<canvas id='pieChart' width='200' height='200'></canvas>";
        echo "</div>";
        echo "<script>";
        echo "var ctx = document.getElementById('pieChart').getContext('2d');";
        echo "var pieChart = new Chart(ctx, {";
        echo "type: 'pie',";
        echo "data: {";
        echo "labels: ['Einnahmen', 'Ausgaben'],";
        echo "datasets: [{";
        echo "data: [$gesamtEinnahmen, $gesamtAusgaben],";
        echo "backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],";
        echo "borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],";
        echo "borderWidth: 1";
        echo "}]";
        echo "},";
        echo "options: {";
        echo "responsive: true,";
        echo "plugins: {";
        echo "legend: {";
        echo "position: 'top',";
        echo "},";
        echo "},";
        echo "}";
        echo "});";
        echo "</script>";

        echo "</body>";
        echo "</html>";
    } else {
        echo "Keine Transaktionen für ausgewählten Kunden gefunden.";
    }
}


// Verbindung zur Datenbank schließen
$conn->close();
?>


<html>
<body>
    <td>
        <a href="/pawn/kunden/kunden_hinzufuegen.html">Kunden hinzufügen</a>
    </td>
    <td>
        <a href="/pawn/kunden/kunden_suchen.html">Kunden suchen</a>
    </td>
    <td>
        <a href="/pawn/kunden/transaktion_erfassen.html">Einkauf/Verkauf erfassen</a>
    </td>
    <td>
        <a href="/pawn/index.php">Hauptmenü</a>
    </td>

    
    <?php
require_once('footer.php'); // Footer einfügen
?>
