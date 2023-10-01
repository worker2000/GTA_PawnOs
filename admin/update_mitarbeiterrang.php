<!DOCTYPE html>
<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?><html lang="de">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mitarbeiterrang ändern</title>
</head>
<body>
    <h1>Mitarbeiterrang ändern</h1>

    <?php
    require_once('../config.php');

    // Überprüfen, ob eine Benutzer-ID übergeben wurde
    if (isset($_GET['id'])) {
        $benutzer_id = $_GET['id'];

        // SQL-Abfrage, um den ausgewählten Benutzer abzurufen
        $sql = "SELECT benutzername, mitarbeiterrang FROM benutzer WHERE id = $benutzer_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $benutzername = $row["benutzername"];
            $aktueller_mitarbeiterrang = $row["mitarbeiterrang"];
            ?>

            <h2>Aktueller Benutzer: <?php echo $benutzername; ?></h2>
            <form action="speichere_mitarbeiterrang.php" method="POST">
                <input type="hidden" name="benutzer_id" value="<?php echo $benutzer_id; ?>" />
                <label for="neuer_mitarbeiterrang">Neuer Mitarbeiterrang:</label>
                <select name="neuer_mitarbeiterrang" id="neuer_mitarbeiterrang">
                    <option value="Admin" <?php if ($aktueller_mitarbeiterrang == 'Admin') echo 'selected'; ?>>Admin</option>
                    <option value="CEO" <?php if ($aktueller_mitarbeiterrang == 'CEO') echo 'selected'; ?>>CEO</option>
                    <option value="Co-CEO" <?php if ($aktueller_mitarbeiterrang == 'Co-CEO') echo 'selected'; ?>>Co-CEO</option>
                    <option value="Buchhalter" <?php if ($aktueller_mitarbeiterrang == 'Buchhalter') echo 'selected'; ?>>Buchhalter</option>
                    <option value="Mitarbeiter+Fahrzeugverkauf" <?php if ($aktueller_mitarbeiterrang == 'Mitarbeiter+Fahrzeugverkauf') echo 'selected'; ?>>Mitarbeiter+Fahrzeug</option>
                    <option value="Mitarbeiter" <?php if ($aktueller_mitarbeiterrang == 'Mitarbeiter') echo 'selected'; ?>>Mitarbeiter</option>
                    <option value="Praktikant" <?php if ($aktueller_mitarbeiterrang == 'Praktikant') echo 'selected'; ?>>Praktikant</option>
                </select><br /><br />
                <input type="submit" value="Mitarbeiterrang aktualisieren" />
            </form>
        <?php
        } else {
            echo "Benutzer nicht gefunden.";
        }
    } else {
        echo "Keine Benutzer-ID übergeben.";
    }

    // Verbindung zur Datenbank schließen
    $conn->close();
    ?>
<?php
require_once('footer.php'); // Footer einfügen
?>
