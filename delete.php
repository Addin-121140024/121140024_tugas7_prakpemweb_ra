<?php
include 'koneksi.php';

$nim = $_GET['nim'];

$sql = "DELETE FROM mahasiswa WHERE nim=$nim";

if (mysqli_query($conn, $sql)) {
    header("Location: read.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
