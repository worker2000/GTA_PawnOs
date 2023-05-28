<?php
session_start();

require_once('config.php');

// Überprüfen, ob eine Aktion (hinzufügen, entfernen, aktualisieren) durchgeführt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Artikel hinzufügen
        if ($action == 'add') {
            $articleId = $_POST['id'];
            $quantity = $_POST['quantity'];
            $_SESSION['einkaufswagen'][$articleId] = $quantity;
            echo "Artikel erfolgreich zum Einkaufswagen hinzugefügt.";
        }
        // Artikel entfernen
        elseif ($action == 'remove') {
            $articleId = $_POST['id'];
            unset($_SESSION['einkaufswagen'][$articleId]);
            echo "Artikel erfolgreich aus dem Einkaufswagen entfernt.";
        }
        // Artikelmenge aktualisieren
        elseif ($action == 'update') {
            $articleId = $_POST['id'];
            $quantity = $_POST['quantity'];
            if ($quantity > 0) {
                $_SESSION['einkaufswagen'][$articleId] = $quantity;
                echo "Artikelmenge erfolgreich aktualisiert.";
            } else {
                unset($_SESSION['einkaufswagen'][$articleId]);
                echo "Artikel erfolgreich aus dem Einkaufswagen entfernt.";
            }
        }
    }
}

// Überprüfen, ob der Einkaufswagen nicht leer ist
if (!empty($_SESSION['einkaufswagen'])) {
    echo "<h2>Einkaufswagen</h2>";

    // Auswahl Ankauf oder Verkauf
    echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>
            <label for='transaction_type'>Transaktionstyp:</label>
            <select name='transaction_type' id='transaction_type' required>
                <option value='purchase'>Ankauf</option>
                <option value='sale'>Verkauf</option>
            </select><br>
            <button type='submit'>Transaktionstyp ändern</button>
          </form>";

    // Artikel auflisten und Preis entsprechend Transaktionstyp anzeigen
    echo "<table>
            <tr>
                <th>Artikelname</th>
                <th>Preis</th>
                <th>Anzahl</th>
                <th>Gesamtpreis</th>
                <th>Aktionen</th>
            </tr>";

    $sum = 0;
    $transactionType = isset($_POST['transaction_type']) ? $_POST['transaction_type'] : $_SESSION['transaction_type'];

    foreach ($_SESSION['einkaufswagen'] as $articleId => $quantity) {
        // Artikelinformationen aus der Datenbank abrufen
        $sql = "SELECT * FROM Artikel WHERE ID = '$articleId'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $articleName = $row['Artikelname'];
        $price = ($transactionType == 'purchase') ? $row['EmpfohlenerEinkaufspreis'] : $row['EmpfohlenerVerkaufspreis'];
        $totalPrice = $price * $quantity;

        echo "<tr>
                <td>".$articleName."</td>
                <td>".$price."</td>
                <td>
                    <form action='".$_SERVER['PHP_SELF']."' method='POST'>
                        <input type='hidden' name='action' value='update'>
                        <input type='hidden' name='id' value='".$articleId."'>
                        <input type='number' name='quantity' value='".$quantity."' min='1' required>
                        <button type='submit'>Aktualisieren</button>
                    </form>
                </td>
                <td>".$totalPrice."</td>
                <td>
                    <form action='".$_SERVER['PHP_SELF']."' method='POST'>
                        <input type='hidden' name='action' value='remove'>
                        <input type='hidden' name='id' value='".$articleId."'>
                        <button type='submit'>Entfernen</button>
                    </form>
                </td>
              </tr>";

        $sum += $totalPrice;
    }

    echo "</table>";

    // Gesamtsumme berechnen
    echo "<br>Gesamtsumme: ".$sum;

    // Transaktion abschließen
    echo "<h3>Transaktionsdetails</h3>";
    echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>
            <label for='employee'>Mitarbeiter:</label>
            <input type='text' name='employee' required><br>
            <button type='submit'>Transaktion abschließen</button>
          </form>";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['employee'])) {
        $employee = $_POST['employee'];

        // Hier kannst du den Code für die Datenbankaktualisierung und andere gewünschte Aktionen einfügen
        // ...

        echo "<br>Transaktion erfolgreich abgeschlossen.";

        // Einkaufswagen leeren
        unset($_SESSION['einkaufswagen']);
    }
} else {
    echo "Der Einkaufswagen ist leer.";
}

// Zurück zur abfrage.php
echo "<br><a href='abfrage.php'>Zurück zur Artikelsuche</a>";
?>
