<?php
require_once('config.php');

// Überprüfen, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eingaben aus dem Formular abrufen
    $artikelname = $_POST['artikelname'];
    $einkaufspreis_org = $_POST['einkaufspreis_org'];
    $einkaufspreis = $_POST['einkaufspreis'];
    $empfohlener_verkaufspreis = $_POST['empfohlener_verkaufspreis'];
    $artikelId = $_POST['artikel_id'];

    // SQL-Abfrage, um den Artikel in der Datenbank zu aktualisieren
    $sql = "UPDATE Artikel SET Artikelname = '$artikelname', Einkaufspreis_org = $einkaufspreis_org, Einkaufspreis = $einkaufspreis, EmpfohlenerVerkaufspreis = $empfohlener_verkaufspreis WHERE ID = $artikelId";

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
        $sql = "SELECT * FROM Artikel WHERE ID = $artikelId";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Formular mit den vorhandenen Artikelinformationen anzeigen
            echo "<form action=\"bearbeiten.php\" method=\"POST\">
                    <input type=\"hidden\" name=\"artikel_id\" value=\"".$row["ID"]."\">
                    <label for=\"artikelname\">Artikelname:</label>
                    <input type=\"text\" name=\"artikelname\" id=\"artikelname\" value=\"".$row["Artikelname"]."\" required>
                    <label for=\"einkaufspreis_org\">Ladenpreis:</label>
                    <input type=\"number\" step=\"0.01\" name=\"einkaufspreis_org\" id=\"einkaufspreis_org\" value=\"".$row["Einkaufspreis_org"]."\" required>
                    <label for=\"einkaufspreis\">Einkaufspreis:</label>
                    <input type=\"number\" step=\"0.01\" name=\"einkaufspreis\" id=\"einkaufspreis\" value=\"".$row["Einkaufspreis"]."\" required>
                    <label for=\"empfohlener_verkaufspreis\">Empfohlener Verkaufspreis:</label>
                    <input type=\"number\" step=\"0.01\" name=\"empfohlener_verkaufspreis\" id=\"empfohlener_verkaufspreis\" value=\"".$row["EmpfohlenerVerkaufspreis"]."\" required>
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
