<?php
// Konfigurering av database oppkobling
$host = "localhost";
$user = "root";
$password = "mU0z0]0:6=?a";
$dbname = "world_x";

// Oppretter en ny tilkobling til MySQL med mysqli objekt
$conn = new mysqli($host, $user, $password, $dbname);

// Sjekker om tilkobling feiler
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
