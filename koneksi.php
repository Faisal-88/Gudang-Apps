<?php
// Database connection parameters
$servername = "localhost"; // e.g., "localhost"
$username = "root";
$password = "";
$database = "manajemen_gudang";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Set charset to UTF-8 (optional, adjust according to your needs)
$koneksi->set_charset("utf8");
?>
