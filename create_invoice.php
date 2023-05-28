<?php
require_once 'config.php';

// Funktion zum Erstellen einer Verkaufsrechnung
function createInvoice($invoiceNumber, $employeeName, $articleName, $quantity, $salesPrice)
{
    
    // SQL-Abfrage zum Einfügen der Verkaufsrechnung
    $sql = "INSERT INTO invoices (invoice_number, employee_name, article_name, quantity, sales_price, total_amount)
            VALUES ('$invoiceNumber', '$employeeName', '$articleName', '$quantity', '$salesPrice', '$quantity' * '$salesPrice')";

    if ($conn->query($sql) === TRUE) {
        echo "Verkaufsrechnung erfolgreich erstellt.";
    } else {
        echo "Fehler beim Erstellen der Verkaufsrechnung: " . $conn->error;
    }

    // Verbindung schließen
    $conn->close();
}

// Beispielaufruf der createInvoice-Funktion
$invoiceNumber = "INV001";
$employeeName = "Max Mustermann";
$articleName = "Beispielartikel";
$quantity = 5;
$salesPrice = 10.99;

createInvoice($invoiceNumber, $employeeName, $articleName, $quantity, $salesPrice);
?>
