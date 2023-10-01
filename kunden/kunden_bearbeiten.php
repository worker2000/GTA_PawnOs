<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?>
<body>
    <h2>Kunde bearbeiten</h2>

    <?php
    require_once('../config.php');

    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["kundennummer"])) {
        $kundennummer = $_GET["kundennummer"];

        // SQL-Abfrage, um die aktuellen Kundendaten abzurufen
        $sql = "SELECT * FROM kunden WHERE kundennummer = '$kundennummer'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $kundenname = $row["kundenname"];
            $kundenvorname = $row["kundenvorname"];
            $geburtstag = $row["geburtstag"];
            $telefonnummer = $row["telefonnummer"];
            $email = $row["email"];
            $interessen = $row["interessen"];
            $bemerkungen = $row["bemerkungen"];
            $rabatt_stufe = $row["rabatt_stufe"];
            $kontonummer = $row["kontonummer"];
        } else {
            echo "Kunde nicht gefunden.";
            exit();
        }
    } else {
        echo "Ungültige Anfrage.";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kundendaten aus dem Formular abrufen
        $kundenname = $_POST["kundenname"];
        $kundenvorname = $_POST["kundenvorname"];
        $geburtstag = $_POST["geburtstag"];
        $telefonnummer = $_POST["telefonnummer"];
        $email = $_POST["email"];
        $interessen = $_POST["interessen"];
        $bemerkungen = $_POST["bemerkungen"];
        $rabatt_stufe = $_POST["rabatt_stufe"];
        $kontonummer = $_POST["kontonummer"];

        // SQL-Abfrage, um die Kundendaten zu aktualisieren
        $sql = "UPDATE kunden SET
                kundenname = '$kundenname',
                kundenvorname = '$kundenvorname',
                geburtstag = '$geburtstag',
                telefonnummer = '$telefonnummer',
                email = '$email',
                interessen = '$interessen',
                bemerkungen = '$bemerkungen',
                rabatt_stufe = $rabatt_stufe,
                kontonummer = '$kontonummer'
                WHERE kundennummer = '$kundennummer'";

        if ($conn->query($sql) === TRUE) {
            echo "Kundendaten erfolgreich aktualisiert.";
        } else {
            echo "Fehler beim Aktualisieren der Kundendaten: " . $conn->error;
        }
    }
    ?>

    <form method="POST" action="kunden_bearbeiten.php">
        <input type="hidden" name="kundennummer" value="<?php echo $kundennummer; ?>">
        <label for="kundenvorname">Kundenvorname:</label>
        <input type="text" name="kundenvorname" value="<?php echo $kundenvorname; ?>" required><br>
        <label for="kundenname">Kundenname:</label>
        <input type="text" name="kundenname" value="<?php echo $kundenname; ?>" required><br>
        <label for="geburtstag">Geburtstag:</label>
        <input type="date" name="geburtstag" value="<?php echo $geburtstag; ?>"><br>
        <label for="telefonnummer">Telefonnummer:</label>
        <input type="text" name="telefonnummer" value="<?php echo $telefonnummer; ?>"><br>
        <label for="email">E-Mail:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br>
        <label for="interessen">Interessen (durch Komma getrennt):</label>
        <input type="text" name="interessen" value="<?php echo $interessen; ?>"><br>
        <label for="bemerkungen">Bemerkungen:</label>
        <textarea name="bemerkungen"><?php echo $bemerkungen; ?></textarea><br>
        <label for="rabatt_stufe">Aktuelle Rabattstufe:</label>
        <input type="number" name="rabatt_stufe" value="<?php echo $rabatt_stufe; ?>"><br>
        <label for="kontonummer">Kontonummer:</label>
        <input type="text" name="kontonummer" value="<?php echo $kontonummer; ?>"><br>
        <input type="submit" value="Speichern">
    </form>

    <a href="/pawn/kunden/kunden_abfrage.php">Zurück zur Kundensuche</a>
    <?php
require_once('footer.php'); // Footer einfügen
?>
