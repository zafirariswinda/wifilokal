<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wifilokal_absensi";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

