<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?>
<body>

<?php
require_once('../config.php');

// Überprüfen, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eingaben aus dem Formular abrufen
    $artikelId = $_POST['artikel_id'];
    $geschlecht = $_POST['geschlecht'];
    $verkaufsladen = $_POST['verkaufsladen'];
    $kategorie = $_POST['kategorie'];
    $artikelname = $_POST['artikelname'];
    $einkaufspreis_org = $_POST['einkaufspreis_org'];
    $empfohlener_einkaufspreis = $_POST['empfohlenereinkaufspreis'];
    $einkaufspreis = $_POST['einkaufspreis'];
    $empfohlener_verkaufspreis = $_POST['empfohlenerverkaufspreis'];
    $verkaufspreis = $_POST['verkaufspreis'];
    $bestand = $_POST['bestand'];

    // SQL-Abfrage, um den Artikel in der Datenbank zu aktualisieren
    $sql = "UPDATE artikel SET
            Geschlecht = '$geschlecht',
            Verkaufsladen = '$verkaufsladen',
            Kategorie = '$kategorie',
            Artikelname = '$artikelname',
            Einkaufspreis_org = $einkaufspreis_org,
            EmpfohlenerEinkaufspreis = $empfohlener_einkaufspreis,
            Einkaufspreis = $einkaufspreis,
            EmpfohlenerVerkaufspreis = $empfohlener_verkaufspreis,
            Verkaufspreis = $verkaufspreis,
            Bestand = $bestand
            WHERE ID = $artikelId";

    if ($conn->query($sql) === TRUE) {
        echo "Der Artikel wurde erfolgreich aktualisiert.";
        header("Location: abfrage.php");
        exit;
    } else {
        echo "Fehler beim Aktualisieren des Artikels: " . $conn->error;
    }
} else {
    // Überprüfen, ob die Artikel-ID übergeben wurde
    if(isset($_GET['id'])) {
        $artikelId = $_GET['id'];

        // SQL-Abfrage, um den Artikel mit der angegebenen ID abzurufen
        $sql = "SELECT * FROM artikel WHERE ID = $artikelId";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Formular mit den vorhandenen Artikelinformationen anzeigen
            echo "<form action=\"bearbeiten.php\" method=\"POST\">
                     <input type=\"hidden\" name=\"artikel_id\" value=\"".$row["ID"]."\">
                    <label for=\"artikelname\">Artikelname:</label>
                    <input type=\"text\" name=\"artikelname\" id=\"artikelname\" value=\"".$row["Artikelname"]."\" required>
                    <label for=\"geschlecht\">Geschlecht:</label>
                    <input type=\"text\" name=\"geschlecht\" id=\"geschlecht\" value=\"".$row["Geschlecht"]."\" required>
                    <label for=\"verkaufsladen\">Verkaufsladen:</label>
                    <input type=\"text\" name=\"verkaufsladen\" id=\"verkaufsladen\" value=\"".$row["Verkaufsladen"]."\" required>
                    <label for=\"kategorie\">Kategorie:</label>
                    <input type=\"text\" name=\"kategorie\" id=\"kategorie\" value=\"".$row["Kategorie"]."\" required>
                    <label for=\"einkaufspreis_org\">Ladenpreis:</label>
                    <input type=\"number\" step=\"0.01\" name=\"einkaufspreis_org\" id=\"einkaufspreis_org\" value=\"".$row["Einkaufspreis_org"]."\" required>
                    <label for=\"empfohlenereinkaufspreis\">Empfohlener Einkaufspreis:</label>
                    <input type=\"number\" step=\"0.01\" name=\"empfohlenereinkaufspreis\" id=\"empfohlenereinkaufspreis\" value=\"".$row["EmpfohlenerEinkaufspreis"]."\" required>
                    <label for=\"einkaufspreis\">Einkaufspreis:</label>
                    <input type=\"number\" step=\"0.01\" name=\"einkaufspreis\" id=\"einkaufspreis\" value=\"".$row["Einkaufspreis"]."\" required>
                    <label for=\"empfohlenerverkaufspreis\">Empfohlener Verkaufspreis:</label>
                    <input type=\"number\" step=\"0.01\" name=\"empfohlenerverkaufspreis\" id=\"empfohlenerverkaufspreis\" value=\"".$row["EmpfohlenerVerkaufspreis"]."\" required>
                    <label for=\"verkaufspreis\">Verkaufspreis:</label>
                    <input type=\"number\" step=\"0.01\" name=\"verkaufspreis\" id=\"verkaufspreis\" value=\"".$row["Verkaufspreis"]."\" required>
                    <label for=\"bestand\">Bestand:</label>
                    <input type=\"number\" name=\"bestand\" id=\"bestand\" value=\"".$row["Bestand"]."\" required>
                    <button type=\"submit\">Artikel aktualisieren</button>
                </form>";
        } else {
            echo "Artikel nicht gefunden.";
        }
    } else {
        echo "Ungültige Anfrage.";
    }
}
?>
<?php
require_once('footer.php'); // Footer einfügen
?>
