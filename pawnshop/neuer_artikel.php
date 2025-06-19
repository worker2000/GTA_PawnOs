<?php
session_start();
require_once('../config.php');
require_once('../header.php'); // Header einfügen
?>

<body>

    <header>
	<h1>Artikel neu anlegen</h1>
    </header>
    <div class="container">
<?php
require_once('../config.php');

// Überprüfen, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $artikelname = $_POST['artikelname'];
      $einkaufspreis_org = $_POST['einkaufspreis_org'];
      $einkaufspreis = $_POST['einkaufspreis'];
      $empfohlener_verkaufspreis = $_POST['empfohlener_verkaufspreis'];
      $Geschlecht = $_POST['Geschlecht']; // Hier den Wert für Geschlecht abrufen
      $Verkaufsladen = $_POST['Verkaufsladen']; // Hier den Wert für Verkaufsladen abrufen
      $Kategorie = $_POST['Kategorie']; // Hier den Wert für Kategorie abrufen

    // SQL-Abfrage, um den neuen Artikel zur Datenbank hinzuzufügen
    $sql = "INSERT INTO artikel (Artikelname, Geschlecht, Verkaufsladen, Kategorie, Einkaufspreis_org, Einkaufspreis, EmpfohlenerVerkaufspreis) VALUES ('$artikelname', '$Geschlecht', '$Verkaufsladen', '$Kategorie', '$einkaufspreis_org', '$einkaufspreis', '$empfohlener_verkaufspreis')";

    if ($conn->query($sql) === TRUE) {
        echo "Der Artikel wurde erfolgreich hinzugefügt.";
    } else {
        echo "Fehler beim Hinzufügen des Artikels: " . $conn->error;
    }
}
        ?>

<!-- HTML-Formular zum Hinzufügen neuer Artikel -->
<form action="neuer_artikel.php" method="POST">
    	<label for="artikelname">Artikelname:</label>
    	<input type="text" name="artikelname" id="artikelname" required>
    	<label for="Geschlecht">Geschlecht:</label>
    	<input type="text" name="Geschlecht" id="Geschlecht" required>
	<label for="Verkaufsladen">Verkaufsladen:</label>
    	<input type="text" name="Verkaufsladen" id="Verkaufsladen" required>
	<label for="Kategorie">Kategorie:</label>
    	<input type="text" name="Kategorie" id="Kategorie" required>
    	<label for="einkaufspreis_org">Ladenpreis:</label>
    	<input type="number" step="0.01" name="einkaufspreis_org" id="einkaufspreis_org"d>
    	<label for="einkaufspreis">Einkaufspreis:</label>
    	<input type="number" step="0.01" name="einkaufspreis" id="einkaufspreis" required>
    	<label for="empfohlener_verkaufspreis">Empfohlener Verkaufspreis:</label>
    	<input type="number" step="0.01" name="empfohlener_verkaufspreis" id="empfohlener_verkaufspreis" required>    <button type="submit">Artikel hinzufügen</button>
</form>
        <td>
            <a href="/pawn/pawnshop/neuer_artikel.php">Artikel erstellen</a>
        </td>
        <td>
            <a href="/pawn/index.php">Hauptmenü</a>
        </td>
        <?php
require_once('footer.php'); // Footer einfügen
?>