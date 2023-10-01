<?php
require_once('config.php');

// Überprüfen, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfen, ob eine Datei hochgeladen wurde
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
        // Dateiinformationen abrufen
        $file_name = $_FILES['csv_file']['name'];
        $file_tmp = $_FILES['csv_file']['tmp_name'];

        // Überprüfen, ob die Datei eine CSV-Datei ist
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_ext == 'csv') {
            // CSV-Datei verarbeiten
            $content = file_get_contents($file_tmp);
            $lines = explode(PHP_EOL, $content);

            // CSV-Daten einlesen und in die Datenbank einfügen
        $lineCount = 0;    
	foreach ($lines as $line) {
            if ($lineCount >= 8) {
	        break;
	    }

	   $lineCount++;

                $data = str_getcsv($line, ",", '"');

                if (count($data) >= 4) {
                    $artikelname = $data[0];
                    $einkaufspreis = $data[1];
                    $empfohlener_verkaufspreis = $data[2];
                    $verkaufspreis = $data[3];

                    // Überprüfen, ob die Preise gültige numerische Werte sind
                    if (empty($einkaufspreis) || !is_numeric($einkaufspreis) || $einkaufspreis < 0 ||
                        empty($empfohlener_verkaufspreis) || !is_numeric($empfohlener_verkaufspreis) || $empfohlener_verkaufspreis < 0 ||
                        empty($verkaufspreis) || !is_numeric($verkaufspreis) || $verkaufspreis < 0) {
                        echo "Fehler beim Hinzufügen des Artikels '$artikelname': Ungültige Preise.<br>";
                        continue; // Zum nächsten Artikel in der Schleife springen
                    }

                    // SQL-Abfrage, um den neuen Artikel zur Datenbank hinzuzufügen
                    $sql = "INSERT INTO Artikel (Artikelname, Einkaufspreis, EmpfohlenerVerkaufspreis, Verkaufspreis) VALUES ('$artikelname', '$einkaufspreis', '$empfohlener_verkaufspreis', '$verkaufspreis')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Der Artikel '$artikelname' wurde erfolgreich hinzugefügt.<br>";
                    } else {
                        echo "Fehler beim Hinzufügen des Artikels '$artikelname': " . $conn->error . "<br>";
                    }
                }
            }

            echo "Der CSV-Upload wurde abgeschlossen.";
	    echo "Anzahl der Zeilen in der CSV-Datei: $lineCount";
        } else {
            echo "Es sind nur CSV-Dateien zum Upload erlaubt.";
        }
    } else {
        echo "Es gab ein Problem beim Hochladen der Datei.";
    }
}
?>

<!-- HTML-Formular zum Hochladen einer CSV-Datei -->
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="csv_file">CSV-Datei auswählen:</label>
    <input type="file" name="csv_file" id="csv_file" required>
    <button type="submit">Daten hochladen</button>
</form>

