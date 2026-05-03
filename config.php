<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "whatsapp"; // Check karein ki phpMyAdmin mein isi naam ka DB hai

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>