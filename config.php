<?php
$servername = "localhost";
$username = "flessinb2_db1";
$password = "rvEqri%2r&J2";
$dbname = "flessinb2_db1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
?>
