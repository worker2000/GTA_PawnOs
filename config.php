<?php
$servername = "localhost";
$username = "pawn";
$password = "v1euziASH8BXpcE/";
$dbname = "pawn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
?>
