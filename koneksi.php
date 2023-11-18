<?php
$host = "localhost";
$user = "root";
$pass = ""; // sesuaikan dengan password MySQL anda
$db_name = "mahasiswa_db";

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
